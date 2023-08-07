<?php

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function security() {

        if (!$this->session->userdata('member')) {
            redirect('sign-in');
        }
    }

    public function logout() {
        $wh['register_id'] = $this->session->userdata('member');
        $data['last_login'] = $this->session->userdata('member_lastlogin');
        $this->md->my_update('tbl_register', $data, $wh);

        $this->session->unset_userdata('member');
        $this->session->unset_userdata('member_lastlogin');

        redirect('home');
    }

    public function member_home()
    {
        $this->security();
        $this->session->set_userdata('mpage','dashboard');
        $data = array();

        $data['member'] = $this->md->my_select('tbl_register', '*')[0];
        $this->load->view('member/member_home', $data);
    }
    
    public function wishlist()
    {
        $this->security();
        $this->session->set_userdata('mpage','wishlist');
        $data = array();
        
        $wh['register_id'] = $this->session->userdata('member');
        $data['wishlist'] = $this->md->my_select('tbl_wishlist','*',$wh);
        
        $this->load->view('member/wishlist', $data);
    }
    
    
    public function member_address() 
    {
        $this->security();
        $this->session->set_userdata('mpage','address');
        $data = array();
        
        if ($this->input->post('add')) 
        {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please enter name.'));
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Please select country.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select state.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please select city.'));
            $this->form_validation->set_rules('address_type', '', 'required', array('required' => 'Please select address type.'));
            $this->form_validation->set_rules('address', '', 'required', array('required' => 'Please enter address.'));
            
            if ($this->form_validation->run() == TRUE)
            {
                $ins['register_id'] = $this->session->userdata('member');
                $ins['location_id'] = $this->input->post('city');
                $ins['name'] = $this->input->post('name');
                $ins['address'] = $this->input->post('address');
                $ins['address_type'] = $this->input->post('address_type');
                
                $result = $this->md->my_insert('tbl_shipment', $ins);
                if ($result == 1) {
                    $data['success'] ='Record insert successfully';
                }
            }
        }
        
        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        
        $wh['register_id'] = $this->session->userdata('member');
        $data['address'] = $this->md->my_select('tbl_shipment','*',$wh);
        
        
        $this->load->view('member/member_address',$data);
    }

    public function member_profile()
    {
        $this->security();
        $this->session->set_userdata('mpage','profile');    
        
        $data = array();
        $wh['register_id'] = $this->session->userdata('member');
        $data['detail'] = $this->md->my_select('tbl_register', '*', $wh)[0];

        if ($this->input->post('change')) {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please enter new password.', 'regex_match' => 'enter valid name!'));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please enter new Email.', 'valid_email' => 'enter valid email!'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}+$/]', array('required' => 'Please enter Mobile number.', 'regex_match' => 'enter valid Mobile Number!'));
            $this->form_validation->set_rules('gender', '', 'required', array('required' => 'Please enter gender.'));
            $this->form_validation->set_rules('dob', '', 'required', array('required' => 'Please enter Date of Birth.'));
            if ($this->form_validation->run() == TRUE) {

                $old_email = $data['detail']->email;
                $new_email = $this->input->post('email');

                $count = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_register` WHERE `email` !='" . $old_email . "' AND `email` = '" . $new_email . "'")[0]->cc;

                if ($count == 0) {

                    // date of birth
                    $end_date = date('Y-m-d');
                    if ($this->input->post('dob') >= $end_date) {
                        $data['dob_err'] = 'Please Select Valid Date';
                    } else {
                        $path = "";
                        
                        if (strlen($_FILES['memberphoto']['name']) > 0) {

                            $config['upload_path'] = './member_assets/profile/';
                            $config['allowed_types'] = 'jpeg|jpg|png';
                            $config['max_size'] = 1024 * 2;
                            $config['file_name'] = "profile_" . time();
                            $config['encrypt_name'] = true;

                            $this->load->library('upload', $config);

                            if ($this->upload->do_upload('memberphoto')) {

                                $path = "member_assets/profile/" . $this->upload->data('file_name');

                                $old_path = $data['detail']->profile_pic;
                                if (strlen($old_path)) {
                                    unlink("./".$old_path);
                                }
                            } else {
                                $data['err'] = $this->upload->display_errors();
                            }
                        }

                        $up['name'] = $this->input->post('name');
                        $up['email'] = $this->input->post('email');
                        $up['mobile'] = $this->input->post('mobile');
                        $up['birth_date'] = $this->input->post('dob');
                        $up['gender'] = $this->input->post('gender');

                        if (strlen($path) > 0) {
                            $up['profile_pic'] = $path;
                        }
                        $result = $this->md->my_update('tbl_register', $up, $wh);

                        if ($result == 1) {
                            $data['success'] = 'profile change successfully.';
                        }
                    }
                } else {
                    $data['email_err'] = 'Email already Exist!';
                }
            }
        }

        $data['detail'] = $this->md->my_select('tbl_register', '*', $wh)[0];
        $this->load->view('member/member_profile', $data);
    }

    public function member_password()
    {
       $this->security();
       $this->session->set_userdata('mpage','password');
        $data = array();

        //change password
        if ($this->input->post('add')) {
            //verify old password
            $record = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];
            $current_ps = $this->encryption->decrypt($record->password);

            if ($current_ps == $this->input->post('ops')) {
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter new password.', 'min_length' => 'Enter password between 8-16 charctars.', 'max_length' => 'Enter password between 8-16 charctars.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please enter confirm password.', 'matches' => 'Confirm password does not match with new passsword.'));

                if ($this->form_validation->run() == TRUE) {
                    $wh['register_id'] = $this->session->userdata('member');

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_register', $ins, $wh);

                    if ($result == 1) {
                        $data['success'] = "Password Change Successfully.";

                        if ($this->input->cookie('member_password'))
                            $expire = 60 * 60 * 24 * 365;
                        set_cookie('member_password', $this->input->post('nps'), $expire);
                    }
                }
            } else {
                $data['error'] = 'Old password is wrong.';
            }
        }
        
         $this->load->view('member/member_password',$data);
    }

    public function member_order() 
    {
        $this->security();
        $this->session->set_userdata('mpage','order');
        
        $id = $this->session->userdata('member');
        $data['bill_data'] = $this->md->my_query("SELECT * FROM `tbl_bill` WHERE `register_id` = $id ORDER BY `bill_id` DESC");
        $this->load->view('member/member_order',$data);
    }
    
    public function member_order_detail() 
    {
        $this->security();
        $data = array();
        
        $wh['bill_id'] = base64_decode(base64_decode($this->uri->segment(2)));
        $data['bill_detail'] = $this->md->my_select('tbl_bill','*',$wh)[0];
        
        $this->load->view('member/member_order_detail',$data);
    }
    
    public function review() 
    {
        $this->security();
        $data = array();
        
        $wh['register_id'] = $this->session->userdata('member');
        $data['review'] = $this->md->my_select('tbl_review','*',$wh);
        $this->load->view('member/member_review',$data);
    }
}
