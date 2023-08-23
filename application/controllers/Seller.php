<?php

class Seller extends CI_Controller {

    public function security() {
        if (!$this->session->userdata('seller')) {
            redirect('seller-login');
        }
    }

    public function verifysecurity() {
        $record = $this->md->my_select('tbl_seller', '*', array("seller_id" => $this->session->userdata('seller')))[0]->status;
        if ($record == 0) {
            redirect('seller-home');
        }
    }

    public function home() {
        $this->security();
        $this->load->view('seller/dashboard');
    }

    public function manage_new_product() {
        $this->security();
        $data = array();
        $this->verifysecurity();

        //remoove all session
        //$this->session->sess_destroy();
        //submit finish button
        if ($this->input->post('finish')) {
            $wh['product_id'] = $this->session->userdata('last_product');
            $count = count($this->md->my_select('tbl_product_image', '*', $wh));

            if ($count > 0) {
                $this->session->unset_userdata('last_product');
                $this->session->set_userdata('product_form', 1);
            } else {
                $data['error'] = "You Did't Upload Atlest One Product Image. Please Upload Image to Finish Product Uploading";
            }
        }

        //submit cancel upload button
        if ($this->input->post('cancel')) {
            $wh['product_id'] = $this->session->userdata('last_product');
            $count = count($this->md->my_select('tbl_product_image', '*', $wh));

            $this->md->my_delete('tbl_product', $wh);
            $this->md->my_delete('tbl_product_image', $wh);

            $this->session->unset_userdata('last_product');
            $this->session->set_userdata('product_form', 1);
        }

        //set default 1st form
        if (!$this->session->userdata('product_form')) {
            $this->session->set_userdata('product_form', 1);
        }

        if ($this->input->post('next')) {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Please select main category.'));
            $this->form_validation->set_rules('sub', '', 'required', array('required' => 'Please select sub category.'));
            $this->form_validation->set_rules('peta', '', 'required', array('required' => 'Please select peta category.'));
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please enter product name.'));
            $this->form_validation->set_rules('code', '', 'required', array('required' => 'Please enter product code.'));
            $this->form_validation->set_rules('price', '', 'required|numeric', array('required' => 'Please enter product price.', 'numeric' => 'Enter valid product price.'));
            $this->form_validation->set_rules('descripition', '', 'required', array('required' => 'Please enter description.'));
            $this->form_validation->set_rules('specification', '', 'required', array('required' => 'Please enter specification.'));

            if ($this->form_validation->run() == TRUE) {

                $ins['seller_id'] = $this->session->userdata('seller');
                $ins['main_id'] = $this->input->post('main');
                $ins['sub_id'] = $this->input->post('sub');
                $ins['peta_id'] = $this->input->post('peta');
                $ins['code'] = $this->input->post('code');
                $ins['name'] = $this->input->post('name');
                $ins['price'] = $this->input->post('price');
                $ins['description'] = $this->input->post('descripition');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 0;
                $ins['offer_id'] = 0;

                if (!$this->session->userdata('last_product')) {
                    $result = $this->md->my_insert('tbl_product', $ins);
                } else {
                    $result = $this->md->my_update('tbl_product', $ins, array('product_id' => $this->session->userdata('last_product')));
                }

                if ($result == 1) {
                    $data['success'] = 1;

                    $product_id = $this->md->my_query("SELECT MAX(`product_id`) AS mx FROM `tbl_product`")[0]->mx;
                    $this->session->set_userdata('last_product', $product_id);

                    $this->session->set_userdata('product_form', 2);
                }
            }
        }

        if ($this->session->userdata('last_product')) {
            $wh['product_id'] = $this->session->userdata('last_product');
            $data['product_detail'] = $this->md->my_select('tbl_product', '*', $wh)[0];
        }

        //back to frist form
        if ($this->input->post('back')) {
            $this->session->set_userdata('product_form', 1);
        }

        //submit add image button
        if ($this->input->post('add_image')) {
            $this->form_validation->set_rules('color', '', 'required', array('required' => 'Please select color.'));
            $this->form_validation->set_rules('qty', '', 'required|numeric', array('required' => 'Please enter quantity.', 'numeric' => 'Please enter valid quantity.'));

            if ($this->form_validation->run() == TRUE) {
                //blank validation
                if (strlen($_FILES['photo']['name'][0]) > 0) {
                    //count number of file
                    $count = count($_FILES['photo']['name']);

                    $product_path = "";

                    //access file one by one
                    for ($i = 0; $i < $count; $i++) {
                        //create single file array one by one
                        $_FILES['single']['name'] = $_FILES['photo']['name'][$i];
                        $_FILES['single']['error'] = $_FILES['photo']['error'][$i];
                        $_FILES['single']['size'] = $_FILES['photo']['size'][$i];
                        $_FILES['single']['type'] = $_FILES['photo']['type'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];

                        //create photo confrigration array upload it
                        $config['upload_path'] = './assets/products';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = "product_" . time();
                        $config['encrypt_name'] = true;

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('single')) {
                            $path = "assets/products/" . $this->upload->data('file_name');
                            $product_path .= $path . ",";
                            $photo_success = 1;
                            $data['photo_error'][$i] = "Photo Upload Successfully.";
                        } else {
                            $data['photo_error'][$i] = $this->upload->display_errors();
                        }
                    }

                    if (isset($photo_success) && $photo_success == 1) {
                        $product_path = rtrim($product_path, ",");

                        //store image details
                        $insm['product_id'] = $this->session->userdata('last_product');
                        $insm['color'] = $this->input->post('color');
                        $insm['qty'] = $this->input->post('qty');
                        $insm['path'] = $product_path;

                        $result = $this->md->my_insert('tbl_product_image', $insm);

                        if ($result == 1) {
                            $data['psuccess'] = "Producvt Image Upload Successfully.";
                        }
                    }
                } else {
                    $data['error'] = "Please Select Alteast One Photot.";
                }
            }
        }

        $data['main'] = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
        $this->load->view('seller/manage_new_product', $data);
    }

    public function manage_setting() {
        $this->security();
         $this->security();
        $data = array();

        //change password
        if ($this->input->post('add')) {
            //verify old password
            $record = $this->md->my_select('tbl_seller', '*', array('seller_id' => $this->session->userdata('seller')))[0];
            $current_ps = $this->encryption->decrypt($record->password);

            if ($current_ps == $this->input->post('ops')) {
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter new password.', 'min_length' => 'Enter password between 8-16 charctars.', 'max_length' => 'Enter password between 8-16 charctars.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please enter confirm password.', 'matches' => 'Confirm password does not match with new passsword.'));

                if ($this->form_validation->run() == TRUE) {
                    $wh['seller_id'] = $this->session->userdata('admin');

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_seller', $ins, $wh);

                    if ($result == 1) {
                        $data['success'] = "Password Change Successfully.";

                        if ($this->input->cookie('seller_password'))
                            $expire = 60 * 60 * 24 * 365;
                        set_cookie('seller_password', $this->input->post('nps'), $expire);
                    }
                }
            } else {
                $data['error'] = 'Old password is wrong.';
            }
        }


        $this->load->view('seller/manage_setting',$data);
    }

    public function seller_change_profile() {
        $this->security();
        $data = array();

        $data['record'] = $this->md->my_select('tbl_seller', '*', array("seller_id" => $this->session->userdata('seller')))[0];
        
        if ($this->input->post('add'))
        {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Company name is required.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Email is required.', 'valid_email' => 'Enter valid email.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}+$/]', array('required' => 'Mobile no is required.', 'regex_match' => 'Enter valid mobile number.'));
            $this->form_validation->set_rules('pno', '', 'required|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]', array('required' => 'Enter PAN number.', 'regex_match' => 'Enter valid PAN number.'));
            $this->form_validation->set_rules('gno', '', 'required|regex_match[/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/]', array('required' => 'Enter GST number.', 'regex_match' => 'Enter valid GST number.'));
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country is required.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State is required.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'City is required.'));
            $this->form_validation->set_rules('address', '', 'required|min_length[20]', array('required' => 'Address is required.', 'min_length' => 'Enter minimum 20 charctars.'));
            $this->form_validation->set_rules('pincode', '', 'required|regex_match[/^[0-9]{6}$/]', array('required' => 'Pin code is required.', 'regex_match' => 'Pin code is required.'));
            $this->form_validation->set_rules('banificial_name', '', 'required', array('required' => 'Please Enter Banificial Name.'));
            $this->form_validation->set_rules('bank_name', '', 'required', array('required' => 'Please Enter Bank Name.'));
            $this->form_validation->set_rules('branch_name', '', 'required', array('required' => 'Please Enter Branch Name.'));
            $this->form_validation->set_rules('ifsc', '', 'required|regex_match[/^[A-Za-z]{4}\d{7}$/]', array('required' => 'Please Enter IFSC Code.', 'regex_match' => 'Please Enter Valid IFSC Code.'));
            $this->form_validation->set_rules('acno', '', 'required|min_length[11]|max_length[16]', array('required' => 'Please Enter Account Number.', 'min_length' => 'Please Enter Account Number Between 8 to 16 Character.', 'max_length' => 'Please Enter Account Number Between 8 to 16 Character.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $old_email = $data['record']->email;
                $new_email = $this->input->post('email');
                
                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_seller` WHERE `email` != '".$old_email."' AND `email` = '".$new_email."'")[0]->cc;
                
                if( $count == 0 )
                {
                    if(strlen($_FILES['photo']['name']) > 0 )
                    {
                        $config['upload_path']          = './seller_assets/logo/';
                        $config['allowed_types']        = 'jpg|jpeg|png';
                        $config['max_size']             = 1024 * 2;
                        $config['file_name']            = "logo_".time();
                        $config['encrypt_name']         = true;

                        $this->load->library('upload', $config);

                        if( $this->upload->do_upload('photo') )
                        {
                            $wh['seller_id'] = $this->session->userdata('seller');
                            $path = $this->md->my_select('tbl_seller', 'profile_pic', $wh)[0]->profile_pic;

                            unlink("./".$path);

                            $ins['profile_pic'] = 'seller_assets/logo/'. $this->upload->data('file_name');   
                        }

                    }
                    
                    $wh['seller_id'] = $this->session->userdata('seller');                    
                    
                    $ins['company_name'] = $this->input->post('name');
                    $ins['pan_no'] = $this->input->post('pno');
                    $ins['gst_no'] = $this->input->post('gno');
                    $ins['email'] = $this->input->post('email');
                    $ins['mobile'] = $this->input->post('mobile');
                    $ins['location_id'] = $this->input->post('city');
                    $ins['address'] = $this->input->post('address');
                    $ins['pincode'] = $this->input->post('pincode');
                    $ins['bank_name'] = $this->input->post('bank_name');
                    $ins['branch_name'] = $this->input->post('branch_name');
                    $ins['ifsc_code'] = $this->input->post('ifsc');
                    $ins['ac_no'] = $this->input->post('acno');
                    $ins['bank_banificial_name'] = $this->input->post('banificial_name');
                      
                    $result = $this->md->my_update('tbl_seller', $ins, $wh);
                    
                    
                    if($result == 1)
                    {
                        redirect('seller-profile');
                    }
                    else 
                    {
                        $data['error'] = "Somthing Want Weong.";
                    }
                }
                else 
                {
                    $data['error'] = "Email allready register.";
                }
            }
        }

        $data['city'] = $this->md->my_query("SELECT c.location_id as country, s.location_id as state, ct.location_id as city FROM `tbl_location` as c , `tbl_location` as s , `tbl_location` as ct WHERE c.`location_id` = s.`parent_id` and s.`location_id` = ct.`parent_id` and ct.`location_id` =" . $data['record']->location_id . ";")[0];
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $this->load->view('seller/seller_change_profile', $data);
    }

    public function manage_product_review() {
        $this->security();
        $this->verifysecurity();

        $this->load->view('seller/manage_product_review');
    }

    public function manage_view_product() 
    {
        $this->security();
        $this->verifysecurity();
        $data = array();

        if($this->input->post('update'))
        {
            $ins['qty'] = $this->input->post('qty');
            $wh['product_id'] = $this->input->post('product-id');
            
            $result = $this->md->my_update('tbl_product_image', $ins , $wh );
            
            if($result == 1)
            {
                redirect('seller-view-product');
            }
        }
        
        $data['products'] = $this->md->my_select('tbl_product', '*', array("seller_id" => $this->session->userdata('seller')));
        $this->load->view('seller/manage_view_product', $data);
    }
    
    public function seller_pending_order()
    {
        $this->security();
        $this->verifysecurity();
        
        $data = array();
        
        $id = $this->session->userdata('seller');
        $data['bill_data'] = $this->md->my_query("SELECT b.* FROM `tbl_bill` AS b , `tbl_transaction` as t , `tbl_product` AS p WHERE b.`bill_id` = t.`bill_id` AND t.`product_id` = p.`product_id` AND p.`seller_id` = ".$id." AND b.`status` = 0");
        
        $this->load->view('seller/seller_pending_order',$data);
    }
    
    public function seller_confrim_order() 
    {
        $this->security();
        $this->verifysecurity();
        
        $data = array();
        
        $id = $this->session->userdata('seller');
        $data['bill_data'] = $this->md->my_query("SELECT b.* FROM `tbl_bill` AS b , `tbl_transaction` as t , `tbl_product` AS p WHERE b.`bill_id` = t.`bill_id` AND t.`product_id` = p.`product_id` AND p.`seller_id` = ".$id." AND b.`status` = 1");
        
       $this->load->view('seller/seller_confirm_order',$data);
    }
    
    public function seller_cancel_order() 
    {
        $this->security();
        $this->verifysecurity();
        
        $id = $this->session->userdata('seller');
        $data['bill_data'] = $this->md->my_query("SELECT b.* FROM `tbl_bill` AS b , `tbl_transaction` as t , `tbl_product` AS p WHERE b.`bill_id` = t.`bill_id` AND t.`product_id` = p.`product_id` AND p.`seller_id` = ".$id." AND b.`status` = 2");
        
        $this->load->view('seller/seller_cancel_order',$data);
    }

    public function manage_profile() {
        $this->security();

        $data['record'] = $this->md->my_select('tbl_seller', '*', array("seller_id" => $this->session->userdata('seller')))[0];
        $data['city'] = $this->md->my_query("SELECT c.name as country, s.name as state , ct.name as city FROM `tbl_location` as c , `tbl_location` as s , `tbl_location` as ct WHERE c.`location_id` = s.`parent_id` and s.`location_id` = ct.`parent_id` and ct.`location_id` =" . $data['record']->location_id . ";")[0];
        $this->load->view('seller/manage_profile', $data);
    }

}
