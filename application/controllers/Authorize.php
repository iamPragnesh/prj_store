<?php

class Authorize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');
        
        //offer
        $today = date('Y-m-d');
        $offer = $this->md->my_select('tbl_offer');
        
        foreach ($offer as $data)
        {
            //Start Offer
            $start_date = $data->start_date;
            
            if($today >= $start_date)
            {
                $category_id = $data->category_id;
                $min_price = $data->min_price;
                $max_price = $data->max_price;
                
                $this->md->my_update('tbl_offer',array('status'=>1),array('offer_id'=>$data->offer_id));
                if($data->label == "all")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;                
                }
                else if($data->label == "main")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['main_id'] = $category_id;
                }
                else if($data->label == "sub")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['sub_id'] = $category_id;
                }
                else if($data->label == "peta")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['peta_id'] = $category_id;
                }
                $this->md->my_update('tbl_product',array('offer_id'=>$data->offer_id),$wh);
            }
            
            //End Offer
            $end_date = $data->end_date;
            
            if( $today > $end_date )
            {
                $this->md->my_update('tbl_product',array('offer_id'=>0),array('offer_id'=>$data->offer_id));
                $this->md->my_update('tbl_offer',array('status'=>0),array('offer_id'=>$data->offer_id));
            }
        }
    }

    public function login() {
        $data = array();

        if ($this->input->post('login')) {
            $email = $this->input->post('email');

            //varifi email
            $record = $this->md->my_select('tbl_admin_login', '*', array('email' => $email));
            $count = count($record);

            if ($count == 1) {
                //verify password
                $original_pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('password') == $original_pass) {
                    //set cookie
                    if ($this->input->post('svp')) {
                        $expire = 60 * 60 * 24 * 365;

                        set_cookie('admin_email', $email, $expire);
                        set_cookie('admin_password', $original_pass, $expire);
                    } else {
                        if ($this->input->cookie('admin_email')) {
                            //remove
                            set_cookie('admin_email', "", -10);
                            set_cookie('admin_password', "", -10);
                        }
                    }

                    //Store session
                    $this->session->set_userdata('admin', $record[0]->admin_id);
                    $this->session->set_userdata('admin_lastlogin', date('Y-m-d h:i:s'));

                    redirect('admin-home');
                } else {
                    $data['error'] = 'Invalid Email or Password.';
                }
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        }

        $this->load->view('admin/index', $data);
    }

    public function logout() {

        //lastlogin
        $wh['admin_id'] = $this->session->userdata('admin');
        $data['last_login'] = $this->session->userdata('admin_lastlogin');

        $this->md->my_update('tbl_admin_login', $data, $wh);

        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_lastlogin');

        redirect('admin-login');
    }

    public function manage_forget_password() {

        $data = $this->md->my_select('tbl_admin_login')[0];
        $email = $data->email;
        $ps = $this->encryption->decrypt($data->password);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pragneshtraveling007@gmail.com', // change it to yours
            'smtp_pass' => 'Bhumi@2022', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = '
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            @media (max-width:620px) {
                .icons-inner {
                    text-align: center;
                }

                .icons-inner td {
                    margin: 0 auto;
                }

                .row-content {
                    width: 100% !important;
                }

                .column .border {
                    display: none;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>
    </head>
    <body style="margin: 0; background-color: #091548; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #091548;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #091548; background-image: url("images/background_2.png"); background-position: center top; background-repeat: repeat;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="width:100%;padding-right:0px;padding-left:0px;padding-top:8px;">
                                                                    <div align="center" style="line-height:10px"><img alt="Main Image" src="https://carvilleauto2022.000webhostapp.com/PRJ-Store/header.png" style="display: block; height: auto; border: 0; width: 232px; max-width: 100%;" title="Main Image" width="232"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-top:10px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:30px;">Reset Your Password</span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="5" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;">Hello PRJ Store! We received a request to forget your password.</p>
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;">Your Password is Show in Box. Please be carefull next time.</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;">
                                                                    <div align="center">
                                                                        <h1 style="color: #ffffff;"> '.$ps.' </h1>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="60%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #5A6BA8;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 10px; padding-right: 10px; padding-top: 15px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="5" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="line-height:10px"><img alt="Your Logo" src="https://carvilleauto2022.000webhostapp.com/PRJ-Store/logo.png" style="display: block; height: auto; border: 0; width: 145px; max-width: 100%;" title="Your Logo" width="145"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="60%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #5A6BA8;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="15" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 12px; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #4a60bb; line-height: 1.2;">
                                                                            <p style="margin: 0; font-size: 12px; text-align: center;"><span style="">Copyright © 2021 Hello PRJ Store, All rights reserved.Design & Develop by 
                                                                               <a href="https://www.instagram.com/mr_pragnesh_007/" target="_new">Pragnesh,</a>
                                                                               <a href="https://www.instagram.com/ritik___jasani/" target="_new">Rutvik,</a>
                                                                               <a href="https://www.instagram.com/mr_jenil123/" target="_new">Jenil</a>         
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>
</html>';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('pragneshtraveling007@gmail.com'); // change it to yours
        $this->email->to($email); // change it to yours
        $this->email->subject('Passsword Changes.');
        $this->email->message($message);
        if ($this->email->send()) {
            redirect('admin-login/1');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function admin_home() {
        $this->security();
        $this->load->view('admin/dashboard');
    }

    public function manage_contact() {
        $this->security();
        $this->session->set_userdata('admin_page', 'page');

        $data['contactdata'] = $this->md->my_select('tbl_contact_us', '*');
        $this->load->view('admin/manage_contact', $data);
    }

    public function manage_subscriber() {
        $this->security();
        $data = array();

        if ($this->input->post('send')) {
            $this->form_validation->set_rules('subject', '', 'required', array('required' => 'Email subject is required.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Email message is required.'));

            if ($this->form_validation->run() == TRUE) {
                $count = count($this->input->post('to'));

                if ($count > 0) {
                    $to = $this->input->post('to');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');

                    $result = $this->md->my_mailer($to, $subject, $message);

                    if ($result == 1) {
                        $data['success'] = 'Email Send Successfully.';
                    } else {
                        $data['error'] = 'Sumthing Went Worng. Please Check Your Email Address';
                    }
                } else {
                    $data['error'] = 'Please select Atlist One Email.';
                }
            }
        }



        $data['subscriber'] = $this->md->my_select('tbl_email_subscriber', '*');
        $this->load->view('admin/manage_subscriber', $data);
    }

    public function manage_feedback() {
        $this->security();
        $this->session->set_userdata('admin_page', 'page');

        $data['feedback'] = $this->md->my_select('tbl_feedback', '*');
        $this->load->view('admin/manage_feedback', $data);
    }

    public function manage_banner() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('title', '', 'required', array('required' => 'Title is required.'));
            $this->form_validation->set_rules('subtitle', '', 'required', array('required' => 'Please enter Subtitle.'));

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/banner';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 1024 * 4;
                $config['file_name'] = "banner_" . time();
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('banner')) {
                    $ins['title'] = $this->input->post('title');
                    $ins['subtitle'] = $this->input->post('subtitle');
                    $ins['path'] = "assets/banner/" . $this->upload->data('file_name');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_banner', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Banner added successfully';
                    }
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
        }
        $data['banner'] = $this->md->my_select('tbl_banner', '*');
        $this->load->view('admin/manage_banner', $data);
    }

    public function manage_aboutus() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('about', '', 'required', array('required' => ' About Us is required'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('about');
                $count = count($this->md->my_query("SELECT * from tbl_about WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('about');
                    $result = $this->md->my_insert('tbl_about', $ins);
                    if ($result == 1) {
                        $data['success'] = $name . ' added successfully';
                    }
                } else {
                    $data['error1'] = $name . ' already added';
                }
            } else {
                $data['error'] = 'Plese Insert';
            }
        }

        if ($this->uri->segment(2)) {
            $wh['about_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editabout'] = $this->md->my_select('tbl_about', '*', $wh);
        }
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('about', '', 'required', array('required' => ' About Us is required'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('about');
                $count = count($this->md->my_query("select * from tbl_about WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('about');
                    $result = $this->md->my_update('tbl_about', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-aboutus');
                    }
                } else {
                    $data['error'] = $name . ' already added';
                }
            }
        }
        $data['about'] = $this->md->my_select('tbl_about', '*');
        $this->load->view('admin/aboutus', $data);
    }

    public function manage_privacy_policy() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('privacy', '', 'required', array('required' => ' Privacy policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('privacy');
                $count = count($this->md->my_query("SELECT * from tbl_privacy_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('privacy');
                    $result = $this->md->my_insert('tbl_privacy_policy', $ins);
                    if ($result == 1) {
                        $data['success'] = $name . ' added successfully';
                    }
                } else {
                    $data['error1'] = $name . ' already added';
                }
            } else {
                $data['error'] = 'Plese Insert';
            }
        }

        if ($this->uri->segment(2)) {
            $wh['policy_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editprivacy'] = $this->md->my_select('tbl_privacy_policy', '*', $wh);
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('privacy', '', 'required', array('required' => ' Privacy policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('privacy');
                $count = count($this->md->my_query("select * from tbl_privacy_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('privacy');
                    $result = $this->md->my_update('tbl_privacy_policy', $ins, $wh);

                    if ($result == 1) {
                        redirect('manage-privacy-policy');
                    }
                } else {
                    $data['error'] = $name . ' already added';
                }
            }
        }
        $data['privacy'] = $this->md->my_select('tbl_privacy_policy', '*');
        $this->load->view('admin/manage_privacy_policy', $data);
    }

    public function manage_return_policy() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('return', '', 'required', array('required' => ' Return policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('return');
                $count = count($this->md->my_query("SELECT * from tbl_return_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('return');
                    $result = $this->md->my_insert('tbl_return_policy', $ins);
                    if ($result == 1) {
                        $data['success'] = $name . ' added successfully';
                    }
                } else {
                    $data['error1'] = $name . ' already added';
                }
            } else {
                $data['error'] = 'Plese Insert';
            }
        }

        if ($this->uri->segment(2)) {
            $wh['return_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editreturn'] = $this->md->my_select('tbl_return_policy', '*', $wh);
        }
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('return', '', 'required', array('required' => ' Return policy is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('return');
                $count = count($this->md->my_query("select * from tbl_return_policy WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('return');
                    $result = $this->md->my_update('tbl_return_policy', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-return-policy');
                    }
                } else {
                    $data['error'] = $name . ' already added';
                }
            }
        }
        $data['return'] = $this->md->my_select('tbl_return_policy', '*');
        $this->load->view('admin/manage_return_policy', $data);
    }

    public function manage_terms() {
        $this->security();
        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('terms', '', 'required', array('required' => ' Terms is required'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('terms');
                $count = count($this->md->my_query("SELECT * from tbl_terms_condition WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('terms');
                    $result = $this->md->my_insert('tbl_terms_condition', $ins);
                    if ($result == 1) {
                        $data['success'] = $name . ' added successfully';
                    }
                } else {
                    $data['error1'] = $name . ' already added';
                }
            } else {
                $data['error'] = 'Plese Insert';
            }
        }

        if ($this->uri->segment(2)) {
            $wh['terms_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editterms'] = $this->md->my_select('tbl_terms_condition', '*', $wh);
        }
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('terms', '', 'required', array('required' => ' Terms is required'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('terms');
                $count = count($this->md->my_query("select * from tbl_terms_condition WHERE  data = '" . $name . "' "));
                if ($count == 0) {
                    $ins['data'] = $this->input->post('terms');
                    $result = $this->md->my_update('tbl_terms_condition', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-terms');
                    }
                } else {
                    $data['error'] = $name . ' already added';
                }
            }
        }
        $data['terms'] = $this->md->my_select('tbl_terms_condition', '*');
        $this->load->view('admin/manage_terms', $data);
    }

    public function manage_faq() {
        $this->security();
        $data = array();
        //click event
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('question', '', 'required|is_unique[tbl_faqs.question]', array('required' => 'Question name is required.', 'is_unique' => 'Question already exist.'));
            $this->form_validation->set_rules('answer', '', 'required', array('required' => ' Answer is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_faqs WHERE  question = '" . $question . "' AND answer = '" . $answer . "' "));
                if ($count == 0) {
                    $ins['question'] = $question;
                    $ins['answer'] = $answer;

                    $result = $this->md->my_insert('tbl_faqs', $ins);
                    if ($result == 1) {
                        $data['success'] = 'FAQs added successfully';
                    }
                } else {
                    $data['error'] = 'FAQs already added';
                }
            }
        }
        $data['faqs'] = $this->md->my_select('tbl_faqs', '*', array('question', 'answer'));

        // click event of clear
        if ($this->uri->segment(2)) {
            $wh['faqs_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editfaqs'] = $this->md->my_select('tbl_faqs', '*', $wh);
        }

        //Update Record
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('question', '', 'required|is_unique[tbl_faqs.question]', array('required' => 'Question name is required.', 'is_unique' => 'Question already exist.'));
            $this->form_validation->set_rules('answer', '', 'required', array('required' => ' Answer is required.'));
            //check - form validation
            if ($this->form_validation->run() == TRUE) {
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                //unique validation
                $count = count($this->md->my_query("SELECT * FROM tbl_faqs WHERE  question = '" . $question . "' AND answer = '" . $answer . "' "));
                if ($count == 0) {
                    $ins['question'] = $question;
                    $ins['answer'] = $answer;

                    $result = $this->md->my_update('tbl_faqs', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-faq');
                    }
                } else {
                    $data['error'] = 'FAQs already added';
                }
            }
        }

        $data['faqs'] = $this->md->my_select('tbl_faqs', '*');
        $this->load->view('admin/manage_faq', $data);
    }

    public function manage_country() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country.', 'regex_match' => 'Please enter valid name.'));

            if ($this->form_validation->run() == TRUE) {
                $country = $this->input->post('country');
                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $country . "' and label='country'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('country');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'country';
                    $result = $this->md->my_insert('tbl_location', $ins);

                    if ($result == 1) {
                        $data['success'] = "success";
                    } else {
                        $data['error'] = 'somthing wrong';
                    }
                }
            }
        }

        // click event of clear
        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcountry'] = $this->md->my_select('tbl_location', '*', $wh);
        }

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country.', 'regex_match' => 'Please enter valid name.'));

            // validation run
            if ($this->form_validation->run() == TRUE) {


                $country = $this->input->post('country');
                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $country . "' and label='country'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('country');
                    $count = $this->md->my_update('tbl_location', $ins, $wh);

                    if ($count == true) {
                        redirect('manage-country');
                    } else {
                        $data['error'] = "Something Wrong";
                    }
                }
            }
        }

        $data['allrecords'] = $this->md->my_select('tbl_location', "*", array('label' => 'country'));
        $this->load->view('admin/manage_country', $data);
    }

    public function manage_state() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please enter state.', 'regex_match' => 'Please enter valid name.'));

            if ($this->form_validation->run() == TRUE) {
                $country = $this->input->post('country');
                $state = $this->input->post('state');

                $resultdata = $this->md->my_query("select * from `tbl_location` where `name`='" . $state . "' and `parent_id` = '" . $country . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('state');
                    $ins['parent_id'] = $country;
                    $ins['label'] = 'state';
                    $result = $this->md->my_insert('tbl_location', $ins);

                    if ($result == 1) {
                        $data['success'] = $state . "success";
                    } else {
                        $data['error'] = $state . 'somthing wrong';
                    }
                }
            }
        }

        //edit code
        if ($this->uri->segment(2)) {

            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editstate'] = $this->md->my_select('tbl_location', '*', $wh);
        }

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State name is required.', 'regex_match' => 'Please enter valid state name.'));

            if ($this->form_validation->run() == TRUE) {

                $country = $this->input->post('country');
                $state = $this->input->post('state');

                $resultdata = $this->md->my_query("select * from `tbl_location` where `name`='" . $state . "' and `parent_id` = '" . $country . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "already exsist";
                } else {
                    $ins['name'] = $state;
                    $ins['parent_id'] = $country;

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-state');
                    } else {

                        $data['error'] = "already exsist";
                    }
                }
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['state'] = $this->md->my_query("SELECT c.name as country , s.* FROM tbl_location AS c, tbl_location AS S WHERE c. location_id = s. parent_id AND s.label = 'state'");
        $this->load->view('admin/manage_state', $data);
    }

    public function manage_city() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State name is required.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City name is required.', 'regex_match' => 'Please enter valid city name.'));

            if ($this->form_validation->run() == TRUE) {

                $state = $this->input->post('state');
                $city = $this->input->post('city');

                $resultdata = $this->md->my_query("select * from `tbl_location` where `name`='" . $city . "' and `parent_id` = '" . $state . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = $city . " already exsist";
                } else {

                    $ins['name'] = $city;
                    $ins['parent_id'] = $state;
                    $ins['label'] = 'city';
                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $city . " Added successfully";
                    }
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcity'] = $this->md->my_select('tbl_location', '*', $wh);
            $data['editstate'] = $this->md->my_select('tbl_location', '*', array('location_id' => $data['editcity'][0]->parent_id));
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State name is required.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City name is required.', 'regex_match' => 'Please enter valid city name.'));

            if ($this->form_validation->run() == TRUE) {

                $state = $this->input->post('state');
                $city = $this->input->post('city');

                $resultdata = $this->md->my_query("select * from `tbl_location` where `name`='" . $city . "' and `parent_id` = '" . $state . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = $city . " already exsist";
                } else {

                    $ins['name'] = $city;
                    $ins['parent_id'] = $state;

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-city');
                    }
                }
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['city'] = $this->md->my_query("SELECT c.name as country , s.name as state, ct.* FROM `tbl_location` as c , `tbl_location` as s , `tbl_location` as ct WHERE c.`location_id` = s.`parent_id` AND s.`location_id` = ct.`parent_id`;");
        $this->load->view('admin/manage_city', $data);
    }

    public function manage_main_category() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('maincategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter category.', 'regex_match' => 'Please enter valid name.'));

            if ($this->form_validation->run() == TRUE) {
                $maincategory = $this->input->post('maincategory');
                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $maincategory . "' and label='maincategory'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('maincategory');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'main';
                    $result = $this->md->my_insert('tbl_category', $ins);

                    if ($result == 1) {
                        $data['success'] = "success";
                    } else {
                        $data['error'] = 'somthing wrong';
                    }
                }
            }
        }

        // click event of clear
        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editmaincategory'] = $this->md->my_select('tbl_category', '*', $wh);
        }

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('maincategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please enter main category.', 'regex_match' => 'Please enter valid name.'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                // validation run
                $maincategory = $this->input->post('maincategory');
                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $maincategory . "' and label='maincategory'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('maincategory');
                    $count = $this->md->my_update('tbl_category', $ins, $wh);

                    if ($count == true) {
                        redirect('manage-main-category');
                    } else {
                        $data['error'] = "Something Wrong";
                    }
                }
            }
        }


        $data['allrecords'] = $this->md->my_select('tbl_category', "*", array('label' => 'main'));

        $this->load->view('admin/manage_main_category', $data);
    }

    public function manage_sub_category() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Maincategory name is required.'));
            $this->form_validation->set_rules('subcategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please enter subcategory.', 'regex_match' => 'Please enter valid name.'));

            if ($this->form_validation->run() == TRUE) {
                $maincategory = $this->input->post('maincategory');
                $subcategory = $this->input->post('subcategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where `name`='" . $subcategory . "' and `parent_id` = '" . $maincategory . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('subcategory');
                    $ins['parent_id'] = $maincategory;
                    $ins['label'] = 'sub';
                    $result = $this->md->my_insert('tbl_category', $ins);

                    if ($result == 1) {
                        $data['success'] = $subcategory . "success";
                    } else {
                        $data['error'] = $subcategory . 'somthing wrong';
                    }
                }
            }
        }

        //edit code
        if ($this->uri->segment(2)) {

            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editsubcategory'] = $this->md->my_select('tbl_category', '*', $wh);
        }

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Maincategory name is required.'));
            $this->form_validation->set_rules('subcategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Subcategory name is required.', 'regex_match' => 'Please enter valid state name.'));

            if ($this->form_validation->run() == TRUE) {

                $maincategory = $this->input->post('maincategory');
                $subcategory = $this->input->post('subcategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where `name`='" . $subcategory . "' and `parent_id` = '" . $maincategory . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "already exsist";
                } else {
                    $ins['name'] = $subcategory;
                    $ins['parent_id'] = $maincategory;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-sub-category');
                    } else {

                        $data['error'] = "already exsist";
                    }
                }
            }
        }

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
        $data['subcategory'] = $this->md->my_query("SELECT c.name as maincategory , s.* FROM tbl_category AS c, tbl_category AS S WHERE c. category_id = s. parent_id AND s.label = 'sub'");
        $this->load->view('admin/manage_sub_category', $data);
    }

    public function manage_peta_category() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Maincategory name is required.'));
            $this->form_validation->set_rules('subcategory', '', 'required', array('required' => 'Subcategory name is required.'));
            $this->form_validation->set_rules('petacategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Petacategory name is required.', 'regex_match' => 'Please enter valid petacategory name.'));

            if ($this->form_validation->run() == TRUE) {

                $subcategory = $this->input->post('subcategory');
                $petacategory = $this->input->post('petacategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where `name`='" . $petacategory . "' and `parent_id` = '" . $subcategory . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "already exsist";
                } else {

                    $ins['name'] = $petacategory;
                    $ins['parent_id'] = $subcategory;
                    $ins['label'] = 'peta';
                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $petacategory . " Added successfully";
                    }
                }
            }
        }

        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editpetacategory'] = $this->md->my_select('tbl_category', '*', $wh);
            $data['editsubcategory'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['editpetacategory'][0]->parent_id));
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Maincategory name is required.'));
            $this->form_validation->set_rules('subcategory', '', 'required', array('required' => 'Subcategory name is required.'));
            $this->form_validation->set_rules('petacategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Petacategory name is required.', 'regex_match' => 'Please enter valid petacategory name.'));

            if ($this->form_validation->run() == TRUE) {

                $subcategory = $this->input->post('subcategory');
                $petacategory = $this->input->post('petacategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where `name`='" . $petacategory . "' and `parent_id` = '" . $subcategory . "'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['error'] = "already exsist";
                } else {

                    $ins['name'] = $petacategory;
                    $ins['parent_id'] = $subcategory;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-peta-category ');
                    }
                }
            }
        }

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
        $data['petacategory'] = $this->md->my_query("SELECT c.name as maincategory , s.name as subcategory, ct.* FROM `tbl_category` as c , `tbl_category` as s , `tbl_category` as ct WHERE c.`category_id` = s.`parent_id` AND s.`category_id` = ct.`parent_id`;");

        $this->load->view('admin/manage_peta_category', $data);
    }

     public function manage_member() {
        $this->security();
        $data = array();
        
         $data['member'] = $this->md->my_select('tbl_register', '*');
        $this->load->view('admin/manage_member',$data);
    }

    public function manage_seller()
    {
        $this->security();
        $data = array();
        
         $data['seller'] = $this->md->my_select('tbl_seller', '*');
         $this->load->view('admin/manage_seller',$data);
    }
    
    public function member_pending_order()
    {
        $data = array();
        
        $data['bill_data'] = $this->md->my_select('tbl_bill','*',array('status' => 0));
        
        $this->load->view('admin/member_pending_order',$data);
    }
    
    public function member_confrim_order()
    {
        $data = array();
        
        $data['bill_data'] = $this->md->my_select('tbl_bill','*',array('status' => 1));
        
        $this->load->view('admin/member_confirm_order',$data);
    }
    
    public function member_cancel_order()
    {
        $data = array();
        
        $data['bill_data'] = $this->md->my_select('tbl_bill','*',array('status' => 2));
        
        $this->load->view('admin/member_cancel_order',$data);
    }


    public function manage_view_product()
    {
        $this->security();
        
        $data=array();
        
        $data['products'] = $this->md->my_query("SELECT * FROM `tbl_product` ORDER BY `product_id` DESC");
        
        $this->load->view('admin/manage_view_product',$data);
    }

    public function manage_product_offers() {

        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Offer name is required.'));
            $this->form_validation->set_rules('rate', '', 'required|numeric', array('required' => 'Offer rate is required.', 'numeric' => 'Enter valid offer rate.'));
            $this->form_validation->set_rules('min_price', '', 'required|numeric', array('required' => 'Offer minimum price is required.', 'numeric' => 'Enter valid offer rate.'));
            $this->form_validation->set_rules('max_price', '', 'required|numeric', array('required' => 'Offer maximum price is required.', 'numeric' => 'Enter valid offer rate.'));
            $this->form_validation->set_rules('start_date', '', 'required', array('required' => 'Start date is required.'));
            $this->form_validation->set_rules('end_date', '', 'required', array('required' => 'End date is required.'));

            if ($this->form_validation->run() == TRUE) {
                $start_date = $this->input->post('start_date');

                if ($start_date < date('Y-m-d')) {
                    $data['start_date_err'] = 'Please select valid start date.';
                } else {
                    $end_date = $this->input->post('end_date');

                    if ($end_date < $start_date) {
                        $data['end_date_err'] = 'Please select valid date.';
                    } else {
                        //inset code
                        $ins['name'] = $this->input->post('name');
                        $ins['rate'] = $this->input->post('rate');
                        $ins['min_price'] = $this->input->post('min_price');
                        $ins['max_price'] = $this->input->post('max_price');
                        $ins['start_date'] = $this->input->post('start_date');
                        $ins['end_date'] = $this->input->post('end_date');

                        if (!$this->input->post('main') && !$this->input->post('sub') && !$this->input->post('peta')) 
                        {
                            $ins['category_id'] = 0;
                            $ins['label'] = 'all';
                        }
                        else if ($this->input->post('main') && !$this->input->post('sub') && !$this->input->post('peta')) 
                        {
                            $ins['category_id'] = $this->input->post('main');
                            $ins['label'] = 'main';
                        } 
                        else if ($this->input->post('main') && $this->input->post('sub') && !$this->input->post('peta')) 
                        {
                            $ins['category_id'] = $this->input->post('sub');
                            $ins['label'] = 'sub';
                        }
                        else if ($this->input->post('main') && $this->input->post('sub') && $this->input->post('peta')) 
                        {
                            $ins['category_id'] = $this->input->post('peta');
                            $ins['label'] = 'peta';
                        }

                        $result = $this->md->my_insert('tbl_offer', $ins);

                        if ($result == 1) {
                            $data['success'] = "Offer Insert Successfully";
                        }
                    }
                }
            }
        }

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
        $data['offer'] = $this->md->my_select('tbl_offer');

        $this->load->view('admin/manage_product_offers', $data);
    }

    public function manage_promo_code() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required|is_unique[tbl_promocode.code]', array('required' => 'Code name is required.', 'is_unique' => 'Code already exist.'));
            $this->form_validation->set_rules('amount', '', 'required|regex_match[/^[0-9 ]+$/]', array('required' => 'Amount is required.', 'regex_match' => 'Please enter valid Amount.'));
            $this->form_validation->set_rules('price', '', 'required|regex_match[/^[0-9 ]+$/]', array('required' => 'Min.Bill Price is required.', 'regex_match' => 'Please enter valid Min.Bill Price .'));

            if ($this->form_validation->run() == TRUE) {

                $ins['code'] = $this->input->post('name');
                $ins['amount'] = $this->input->post('amount');
                $ins['min_bill_price'] = $this->input->post('price');
                $ins['status'] = 1;

                $result = $this->md->my_insert('tbl_promocode', $ins);
                if ($result == 1) {
                    $data['success'] = "Promo Code Added successfully";
                }
            }
        }
        $data['promocode'] = $this->md->my_select('tbl_promocode', '*');
        $this->load->view('admin/manage_promocode', $data);
    }

    public function manage_product_review() 
    {
        $this->security();
        $data = array();
        
        $data['review'] = $this->md->my_select('tbl_review','*');
        $this->load->view('admin/manage_product_review',$data);
    }
    
    public function demo() {
        $this->security();
        $this->load->view('admin/demo');
    }

    public function manage_setting() {
        $this->security();
        $data = array();

        //change password
        if ($this->input->post('add')) {
            //verify old password
            $record = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];
            $current_ps = $this->encryption->decrypt($record->password);

            if ($current_ps == $this->input->post('ops')) {
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter new password.', 'min_length' => 'Enter password between 8-16 charctars.', 'max_length' => 'Enter password between 8-16 charctars.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please enter confirm password.', 'matches' => 'Confirm password does not match with new passsword.'));

                if ($this->form_validation->run() == TRUE) {
                    $wh['admin_id'] = $this->session->userdata('admin');

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                    if ($result == 1) {
                        $data['success'] = "Password Change Successfully.";

                        if ($this->input->cookie('admin_password'))
                            $expire = 60 * 60 * 24 * 365;
                        set_cookie('admin_password', $this->input->post('nps'), $expire);
                    }
                }
            } else {
                $data['error'] = 'Old password is wrong.';
            }
        }


        //photo uploading
        if ($this->input->post('change_photo')) {
            //set configration
            $config['upload_path'] = './admin_assets/images';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 2;
            $config['file_name'] = 'img_' . time();
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {

                $wh['admin_id'] = $this->session->userdata('admin');
                $path = $this->md->my_select('tbl_admin_login', 'profile_pic', $wh)[0]->profile_pic;

                if (strlen($path) > 0) {
                    unlink("./" . $path);
                }

                $ins['profile_pic'] = "admin_assets/images/" . $this->upload->data('file_name');
                $result = $this->md->my_update('tbl_admin_login', $ins, array('admin_id' => $this->session->userdata('admin')));
                if ($result == 1) {
                    $data['photo_success'] = 'Profile changed successfully.';
                }
            } else {
                $data['photo_error'] = 'Select file to upload.';
            }
        }


        $this->load->view('admin/manage_setting', $data);
    }

    public function manage_commission() {
        $this->security();
        $data = array();

        if ($this->input->post('edit')) {
            
            $ins['rate'] = $this->input->post('commission');
            $result = $this->md->my_update('tbl_commssion', $ins);
            if ($result == 1) {
                redirect('manage-commission');
            }
        }

        $data['commission'] = $this->md->my_select('tbl_commssion', '*');
        $this->load->view('admin/manage_commission',$data);
    }

    public function delete() {
        $action = $this->uri->segment(2);
        $id = base64_decode(base64_decode($this->uri->segment(3)));

        if ($action == "country") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-country');
            } else {
                $this->md->my_truncate('tbl_location');
                redirect('manage-country');
            }
        } else if ($action == "state") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-state');
            } else {
                $this->md->my_delete('tbl_location', array('label' => 'state'));
                redirect('manage-state');
            }
        } else if ($action == "city") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-city');
            } else {
                $this->md->my_delete('tbl_location', array('label' => 'city'));
                redirect('manage-city');
            }
        } else if ($action == "maincategory") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-main-category');
            } else {
                $this->md->my_truncate('tbl_category');
                redirect('manage-main-category');
            }
        } else if ($action == "subcategory") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-sub-category');
            } else {
                $this->md->my_delete('tbl_category', array('label' => 'subcategory'));
                redirect('manage-sub-category');
            }
        } else if ($action == "petacategory") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-peta-category');
            } else {
                $this->md->my_delete('tbl_category', array('label' => 'petacategory'));
                redirect('manage-peta-category');
            }
        } else if ($action == "contact") {
            if ($id > 0) {
                $this->md->my_delete('tbl_contact_us', array('contact_id' => $id));
                redirect('manage-contact');
            } else {
                $this->md->my_truncate('tbl_contact_us');
                redirect('manage-contact');
            }
        } else if ($action == "feedback") {
            if ($id > 0) {
                $this->md->my_delete('tbl_feedback', array('feedback_id' => $id));
                redirect('manage-feedback');
            } else {
                $this->md->my_truncate('tbl_feedback');
                redirect('manage-feedback');
            }
        } else if ($action == "about") {
            if ($id > 0) {
                $this->md->my_delete('tbl_about', array('about_id' => $id));
                redirect('manage-aboutus');
            } else {
                $this->md->my_truncate('tbl_about');
                redirect('manage-aboutus');
            }
        } else if ($action == "privacy") {
            if ($id > 0) {
                $this->md->my_delete('tbl_privacy_policy', array('policy_id' => $id));
                redirect('manage-privacy-policy');
            } else {
                $this->md->my_truncate('tbl_privacy_policy');
                redirect('manage-privacy-policy');
            }
        } else if ($action == "return") {
            if ($id > 0) {
                $this->md->my_delete('tbl_return_policy', array('return_id' => $id));
                redirect('manage-return-policy');
            } else {
                $this->md->my_truncate('tbl_return_policy');
                redirect('manage-return-policy');
            }
        } else if ($action == "terms") {
            if ($id > 0) {
                $this->md->my_delete('tbl_terms_condition', array('terms_id' => $id));
                redirect('manage-terms');
            } else {
                $this->md->my_truncate('tbl_terms_condition');
                redirect('manage-terms');
            }
        } else if ($action == "contact") {
            if ($id > 0) {
                $this->md->my_delete('tbl_contact_us', array('contact_id' => $id));
                redirect('manage-contact');
            } else {
                $this->md->my_truncate('tbl_contact_us');
                redirect('manage-contact');
            }
        } else if ($action == "feedback") {
            if ($id > 0) {
                $this->md->my_delete('tbl_feedback', array('feedback_id' => $id));
                redirect('manage-feedback');
            } else {
                $this->md->my_truncate('tbl_feedback');
                redirect('manage-feedback');
            }
        } else if ($action == "faqs") {
            if ($id > 0) {
                $this->md->my_delete('tbl_faqs', array('feqs_id' => $id));
                redirect('manage-faq');
            } else {
                $this->md->my_truncate('tbl_faqs');
                redirect('manage-faq');
            }
        } else if ($action == "subscriber") {
            if ($id > 0) {
                $this->md->my_delete('tbl_email_subscriber', array('subscriber_id' => $id));
                redirect('manage-subscriber');
            } else {
                $this->md->my_truncate('tbl_email_subscriber');
                redirect('manage-subscriber');
            }
        } else if ($action == "banner") {
            if ($id > 0) {

                $wh['banner_id'] = $id;
                $path = $this->md->my_select('tbl_banner', 'path', $wh)[0]->path;
                unlink('./' . $path);

                $this->md->my_delete('tbl_banner', array('banner_id' => $id));
                redirect('manage-banner');
            } else {

                $all = $this->md->my_select('tbl_banner');
                foreach ($all as $data) {
                    unlink('./' . $data->path);
                }
                $this->md->my_truncate('tbl_banner');
                redirect('manage-banner');
            }
        } else if ($action == "offer") {
            if ($id > 0) {
                $this->md->my_update('tbl_product', array('offer_id' => 0), array('offer_id' => $id));
                $this->md->my_delete('tbl_offer', array('offer_id' => $id));

                redirect('manage-product-offers');
            }
        } else if ($action == "address") {
            if ($id > 0) {
                $this->md->my_delete('tbl_shipment', array('shipment_id' => $id));
                redirect('member-address');
            }
        } else if ($action == "wishlist") {
            if ($id > 0) {
                $this->md->my_delete('tbl_wishlist', array('wish_id' => $id));
                redirect('member-wishlist');
            }
        }else if ($action == "review") {
            if ($id > 0) {
                $this->md->my_delete('tbl_review', array('review_id' => $id));
                redirect('manage-product-review');
            } else {
                $this->md->my_truncate('tbl_review');
                redirect('manage-product-review');
            }
        }
    }

}
