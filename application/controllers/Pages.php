<?php

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');

        //offer
        $today = date('Y-m-d');
        $offer = $this->md->my_select('tbl_offer');

        foreach ($offer as $data) {
            //Start Offer
            $start_date = $data->start_date;

            if ($today >= $start_date) {
                $category_id = $data->category_id;
                $min_price = $data->min_price;
                $max_price = $data->max_price;

                $this->md->my_update('tbl_offer', array('status' => 1), array('offer_id' => $data->offer_id));
                if ($data->label == "all") {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                } else if ($data->label == "main") {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['main_id'] = $category_id;
                } else if ($data->label == "sub") {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['sub_id'] = $category_id;
                } else if ($data->label == "peta") {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['peta_id'] = $category_id;
                }
                $this->md->my_update('tbl_product', array('offer_id' => $data->offer_id), $wh);
            }

            //End Offer
            $end_date = $data->end_date;

            if ($today > $end_date) {
                $this->md->my_update('tbl_product', array('offer_id' => 0), array('offer_id' => $data->offer_id));
                $this->md->my_update('tbl_offer', array('status' => 0), array('offer_id' => $data->offer_id));
            }
        }
    }

    public function security() {
        if (!$this->session->userdata('user')) {
            redirect('login-register');
        }
    }

    public function seller_login() {
        $data = array();

        if ($this->input->post('login')) {
            $email = $this->input->post('email');

            //varifi email
            $record = $this->md->my_select('tbl_seller', '*', array('email' => $email));
            $count = count($record);

            if ($count == 1) {
                //verify password
                $original_pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('ps') == $original_pass) {

                    //set cookie
                    if ($this->input->post('svp')) {
                        $expire = 60 * 60 * 24 * 365;

                        set_cookie('seller_email', $email, $expire);
                        set_cookie('seller_password', $original_pass, $expire);
                    } else {
                        if ($this->input->cookie('seller_email')) {
                            //remove
                            set_cookie('seller_email', "", -10);
                            set_cookie('seller_password', "", -10);
                        }
                    }

                    //Store session
                    $this->session->set_userdata('seller', $record[0]->seller_id);
                    $this->session->set_userdata('seller_lastlogin', date('Y-m-d h:i:s'));

                    redirect('seller-home');
                } else {
                    $data['error'] = 'Invalid Email or Password.';
                }
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        }

        $this->load->view('seller_login', $data);
    }

    public function home() {
        $this->load->view('index');
    }

    public function about_us() {

        $data['about'] = $this->md->my_select('tbl_about', '*');
        $this->load->view('about_us', $data);
    }

    public function collections() {

        $this->load->view('collections');
    }

    public function view_products() {
        $data = array();

        if (!$this->uri->segment(2)) {
            redirect('home');
        } else {
            $id = base64_decode(base64_decode($this->uri->segment(2)));

            $wh['product_id'] = $id;
            $data['detail'] = $this->md->my_select('tbl_product', '*', $wh)[0];
        }

        $this->load->view('view_products', $data);
    }

    public function privacy_policy() {
        $data = array();

        $data['privacy'] = $this->md->my_select('tbl_privacy_policy', '*');
        $this->load->view('privacy_policy', $data);
    }

    public function return_policy() {
        $data = array();

        $data['return'] = $this->md->my_select('tbl_return_policy', '*');
        $this->load->view('return_policy', $data);
    }

    public function terms_condition() {
        $data = array();

        $data['terms'] = $this->md->my_select('tbl_terms_condition', '*');
        $this->load->view('terms_condition', $data);
    }

    public function frequenty_asked_questions() {
        $data = array();

        $data['faqs'] = $this->md->my_select('tbl_faqs', '*');
        $this->load->view('frequenty_asked_questions', $data);
    }

    public function u_feedback() {
        $data = array();
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Message'));
            if ($this->form_validation->run() == TRUE) {

                $ins['name'] = $this->input->post('name');
                $ins['message'] = $this->input->post('message');
                $result = $this->md->my_insert('tbl_feedback', $ins);

                if ($result == 1) {
                    $data['success'] = " Added Successfully.";
                } else {
                    $data['err'] = "Something Wrong!";
                }
            } else {
                $data['err'] = "Something Wrong!";
            }
        }

        $data['faqs'] = $this->md->my_select('tbl_feedback', '*');
        $this->load->view('feedback', $data);
    }

    public function contact_us() {
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email', 'email', 'required|valid_email', array('required' => 'Please Enter Email', 'valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('subject', '', 'required', array('required' => 'Please Enter Subject.'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please Enter Message'));
            if ($this->form_validation->run() == TRUE) {

                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['subject'] = $this->input->post('subject');
                $ins['message'] = $this->input->post('message');
                $result = $this->md->my_insert('tbl_contact_us', $ins);

                if ($result == 1) {
                    $data['success'] = " Added Successfully.";
                } else {
                    $data['err'] = "Something Wrong!";
                }
            } else {
                $data['err'] = "Something Wrong!";
            }
        }
        $this->load->view('contact_us', $data);
    }

    public function login_register() {
        $data = array();

        if ($this->input->post('register')) {
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('email', '', 'required|regex_match[/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/]|is_unique[tbl_register.email]', array('required' => 'Please enter your email.', 'regex_match' => 'Please enter valid email.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}+$/]', array('required' => 'Please Enter Subject.', 'regex_match' => 'Please Enter Valid Mobile Number.'));
            $this->form_validation->set_rules('ps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter Password.', 'min_length' => 'Please Enter Password Between 8 to 16 Character.', 'max_length' => 'Please Enter Password Between 8 to 16 Character.'));
            $this->form_validation->set_rules('cps', '', 'required|matches[ps]', array('required' => 'Please Enter Confirm Password.', 'matches' => 'Please Enter Confirm Password Same As Password.'));

            if ($this->form_validation->run() == TRUE) {
                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['mobile'] = $this->input->post('mobile');
                $ins['password'] = $this->encryption->encrypt($this->input->post('ps'));
                $ins['join_date'] = date('Y-m-d');
                $ins['status'] = 1;

                $result = $this->md->my_insert('tbl_register', $ins);

                if ($result == 1) {
                    $id = $this->md->my_query("SELECT MAX(`register_id`) AS mx FROM `tbl_register`")[0]->mx;
                    $this->session->set_userdata('member', $id);
                    $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));

                    $this->session->set_userdata('email', $this->input->post('email'));
                    $this->session->set_userdata('name', $this->input->post('name'));
                    $this->session->set_userdata('success', 'yes');

                    $to = $this->input->post('email');
                    $subject = "congratulation";
                    $message = "You are Register successfully";
                    $result = $this->md->my_mailer($to, $subject, $message);

                    if ($result == 1) {
                        redirect('member-home');
                    } else {
                        $data['error'] = "Somthing went wrong! Please check your internet connection! Try again!";
                    }
                }
            }
        }

        if ($this->input->post('login')) {
            $email = $this->input->post('lemail');

            //varifi email
            $record = $this->md->my_select('tbl_register', '*', array('email' => $email));
            $count = count($record);

            if ($count == 1) {
                //verify password
                $original_pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('lps') == $original_pass) {

                    //verify status
                    if ($record[0]->status == 1) {
                        //set cookie
                        if ($this->input->post('svp')) {
                            $expire = 60 * 60 * 24 * 365;

                            set_cookie('member_email', $email, $expire);
                            set_cookie('member_password', $original_pass, $expire);
                        } else {
                            if ($this->input->cookie('member_email')) {
                                //remove
                                set_cookie('member_email', "", -10);
                                set_cookie('member_password', "", -10);
                            }
                        }

                        //Store session
                        $this->session->set_userdata('member', $record[0]->register_id);
                        $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));

                        redirect('member-home');
                    } else {
                        $data['error'] = "Your Account is Inactive. Please Contact Admin For Active";
                    }
                } else {
                    $data['error'] = 'Invalid Email or Password.';
                }
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        }

        $this->load->view('login_register', $data);
    }

    public function forgetr_password() {
        $data = array();

        if ($this->input->post('send')) {
            $this->form_validation->set_rules('email', '', 'required', array('required' => 'Please enter email!'));
            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $record = $this->md->my_select('tbl_register', '*', array('email' => $email));
                $count = count($record);
                if ($count == 1) {
                    $ps = $this->encryption->decrypt($record[0]->password);
                    $to = $this->input->post('email');
                    $subject = "forget email";
                    $message = '<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
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
                                                                        <h1 style="color: #ffffff;"> ' . $ps . ' </h1>
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
                                                                            <p style="margin: 0; font-size: 12px; text-align: center;"><span style="">Copyright © 2021 PRJ Stores, All rights reserved.Design & Develop by 
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
                    $result = $this->md->my_mailer($to, $subject, $message);
                    if ($result == 1) {
                        redirect('login-register/1');
                    } else {
                        $data['error'] = "Somthing went wrong! Please check your internet connection and Try again!";
                    }
                } else {
                    $data['error'] = "Please enter valid email!";
                }
            }
        }

        $this->load->view('forget_password', $data);
    }
    
    public function forget_password() {
        $data = array();

        if ($this->input->post('send'))
        {
            $this->form_validation->set_rules('email', '', 'required', array('required' => 'Please enter email!'));
            
            if ($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email');
                $record = $this->md->my_select('tbl_seller', '*', array('email' => $email));
                $count = count($record);
                if ($count == 1)
                {
                    $ps = $this->encryption->decrypt($record[0]->password);
                    $to = $this->input->post('email');
                    $subject = "forget email";
                    $message = '<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
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
                                                                        <h1 style="color: #ffffff;"> ' . $ps . ' </h1>
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
                                                                            <p style="margin: 0; font-size: 12px; text-align: center;"><span style="">Copyright © 2021 PRJ Stores, All rights reserved.Design & Develop by 
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
                    $result = $this->md->my_mailer($to, $subject, $message);
                    if ($result == 1) {
                        redirect('seller-login/1');
                    } else {
                        $data['error'] = "Somthing went wrong! Please check your internet connection and Try again!";
                    }
                } else {
                    $data['error'] = "Please enter valid email!";
                }
            }
        }

        $this->load->view('forget', $data);
    }

    public function seller_registration_1() {
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Company name is required.'));
            $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[tbl_seller.email]', array('required' => 'Email is required.', 'valid_email' => 'Enter valid email.', 'is_unique' => 'Email already register.'));
            $this->form_validation->set_rules('ps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter password.', 'min_length' => 'Enter password between 8-16 charctars.', 'max_length' => 'Enter password between 8-16 charctars.'));
            $this->form_validation->set_rules('cps', '', 'required|matches[ps]', array('required' => 'Please enter confirm password.', 'matches' => 'Confirm password does not match with passsword.'));
            $this->form_validation->set_rules('mobile', '', 'required|regex_match[/^[0-9]{10}+$/]', array('required' => 'Mobile no is required.', 'regex_match' => 'Enter valid mobile number.'));
            $this->form_validation->set_rules('panno', '', 'required|regex_match[/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/]', array('required' => 'Enter PAN number.', 'regex_match' => 'Enter valid PAN number.'));
            $this->form_validation->set_rules('gstno', '', 'required|regex_match[/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/]', array('required' => 'Enter GST number.', 'regex_match' => 'Enter valid GST number.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('name', $this->input->post('name'));
                $this->session->set_userdata('email', $this->input->post('email'));
                $this->session->set_userdata('mobile', $this->input->post('mobile'));
                $this->session->set_userdata('ps', $this->input->post('ps'));
                $this->session->set_userdata('pan', $this->input->post('panno'));
                $this->session->set_userdata('gst', $this->input->post('gstno'));

                redirect('seller-registration-2');
            }
        }

        $this->load->view('seller_registration_1', $data);
    }

    public function seller_registration_2() {
        if (!$this->session->userdata('name')) {
            redirect('seller-registration-1');
        }

        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country is required.'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State is required.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'City is required.'));
            $this->form_validation->set_rules('address', '', 'required|min_length[20]', array('required' => 'Address is required.', 'min_length' => 'Enter minimum 20 charctars.'));
            $this->form_validation->set_rules('pincode', '', 'required|regex_match[/^[0-9]{6}$/]', array('required' => 'Pin code is required.', 'regex_match' => 'Pin code is required.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('country', $this->input->post('country'));
                $this->session->set_userdata('state', $this->input->post('state'));
                $this->session->set_userdata('city', $this->input->post('city'));
                $this->session->set_userdata('address', $this->input->post('address'));
                $this->session->set_userdata('pincode', $this->input->post('pincode'));

                redirect('seller-registration-3');
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $this->load->view('seller_registration_2', $data);
    }

    public function seller_registration_3() {
        if (!$this->session->userdata('name') && !$this->session->userdata('country')) {
            redirect('seller-registration-1');
        } else if ($this->session->userdata('name') && !$this->session->userdata('country')) {
            redirect('seller-registration-2');
        }

        $data = array();

        if ($this->input->post('next')) {
            $this->form_validation->set_rules('banificial_name', '', 'required', array('required' => 'Please Enter Banificial Name.'));
            $this->form_validation->set_rules('bank_name', '', 'required', array('required' => 'Please Enter Bank Name.'));
            $this->form_validation->set_rules('branch_name', '', 'required', array('required' => 'Please Enter Branch Name.'));
            $this->form_validation->set_rules('ifsc', '', 'required|regex_match[/^[A-Za-z]{4}\d{7}$/]', array('required' => 'Please Enter IFSC Code.', 'regex_match' => 'Please Enter Valid IFSC Code.'));
            $this->form_validation->set_rules('ac_no', '', 'required|min_length[11]|max_length[16]', array('required' => 'Please Enter Account Number.', 'min_length' => 'Please Enter Account Number Between 8 to 16 Character.', 'max_length' => 'Please Enter Account Number Between 8 to 16 Character.'));
            $this->form_validation->set_rules('retype_ac_no', '', 'required|matches[ac_no]', array('required' => 'Please Enter Re-Account Number.', 'matches' => 'Please Enter Same Account Number.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('banificial_name', $this->input->post('banificial_name'));
                $this->session->set_userdata('bank_name', $this->input->post('bank_name'));
                $this->session->set_userdata('branch_name', $this->input->post('branch_name'));
                $this->session->set_userdata('ifsc', $this->input->post('ifsc'));
                $this->session->set_userdata('ac_no', $this->input->post('ac_no'));

                redirect('seller-registration-4');
            }
        }

        $this->load->view('seller_registration_3', $data);
    }

    public function seller_registration_4() {
        if (!$this->session->userdata('name') && !$this->session->userdata('country') && !$this->session->userdata('banificial_name')) {
            redirect('seller-registration-1');
        } else if ($this->session->userdata('name') && !$this->session->userdata('country') && !$this->session->userdata('banificial_name')) {
            redirect('seller-registration-2');
        } else if ($this->session->userdata('name') && $this->session->userdata('country') && !$this->session->userdata('banificial_name')) {
            redirect('seller-registration-3');
        }

        $data = array();

        if ($this->input->post('next')) {
            $config['upload_path'] = './seller_assets/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024 * 2;
            $config['file_name'] = "logo_" . time();
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {


                $ins['company_name'] = $this->session->userdata('name');
                $ins['email'] = $this->session->userdata('email');
                $ins['password'] = $this->encryption->encrypt($this->session->userdata('ps'));
                $ins['mobile'] = $this->session->userdata('mobile');
                $ins['pan_no'] = $this->session->userdata('pan');
                $ins['gst_no'] = $this->session->userdata('gst');
                $ins['location_id'] = $this->session->userdata('city');
                $ins['address'] = $this->session->userdata('address');
                $ins['pincode'] = $this->session->userdata('pincode');
                $ins['bank_banificial_name'] = $this->session->userdata('banificial_name');
                $ins['bank_name'] = $this->session->userdata('bank_name');
                $ins['branch_name'] = $this->session->userdata('branch_name');
                $ins['ifsc_code'] = $this->session->userdata('ifsc');
                $ins['ac_no'] = $this->session->userdata('ac_no');
                $ins['join_date'] = date('Y-m-d');
                $ins['profile_pic'] = "seller_assets/logo/" . $this->upload->data('file_name');
                $ins['status'] = 0;

                $result = $this->md->my_insert('tbl_seller', $ins);

                if ($result == 1) {
                    $seller_id = $this->md->my_query('SELECT MAX(`seller_id`) AS mx FROM `tbl_seller`')[0]->mx;

                    $this->session->set_userdata('seller', $seller_id);
                    $this->session->set_userdata('seller_lastlogin', date('Y-m-d h:i:s'));

                    $this->session->unset_userdata('name');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('mobile');
                    $this->session->unset_userdata('ps');
                    $this->session->unset_userdata('pan');
                    $this->session->unset_userdata('gst');
                    $this->session->unset_userdata('country');
                    $this->session->unset_userdata('state');
                    $this->session->unset_userdata('city');
                    $this->session->unset_userdata('pickup');
                    $this->session->unset_userdata('pincode');
                    $this->session->unset_userdata('banificial_name');
                    $this->session->unset_userdata('bank_name');
                    $this->session->unset_userdata('branch_name');
                    $this->session->unset_userdata('ifsc');
                    $this->session->unset_userdata('ac_no');

                    redirect('seller-home');
                }
            } else {
//                $data['error'] = 'Something Went Wrong.';
                $data['error'] = $this->upload->display_errors();
            }
        }


        $this->load->view('seller_registration_4', $data);
    }

    public function seller_logout() {
        //lastlogin update
        $wh['seller_id'] = $this->session->userdata('seller');
        $data['last_login'] = $this->session->userdata('seller_lastlogin');

        $this->md->my_update('tbl_seller', $data, $wh);

        $this->session->unset_userdata('seller');
        $this->session->unset_userdata('seller_lastlogin');

        redirect('seller-login');
    }

    public function view_cart() {
        if (!$this->session->userdata('member')) {
            redirect('login-register');
        }

        $this->load->view('view_cart');
    }

    public function order_success()
    {
        $data = array();
        
        //check cart empty
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart', '*', $wh);

        $cart_item = count($data['cart_data']);

        if ($cart_item == 0)
        {
            redirect('view-cart');
        }
        
        //check order is success or not
        if( $this->session->userdata('status') != 1 )
        {
             redirect('order-fail');
        }
        else
        {
           //generate bill
           $ins['register_id'] = $this->session->userdata('member');
           $ins['shipment_id'] = $this->session->userdata('shipment_id');
           
           if( $this->session->userdata('promocode_id'))
           {
               $ins['promocode_id'] = $this->session->userdata('promocode_id');
           }
           else
           {
               $ins['promocode_id'] = 0;
           }
           
           $ins['bill_date'] = date('Y-m-d');
           $ins['amount'] = $this->session->userdata('bill_amount');
           $ins['pay_type'] = $this->session->userdata('paytype');
           
           if( $this->session->userdata('paytype') == "online")
           {
               $ins['payment_id'] = $this->session->userdata('razorpay_payment_id');
               $ins['order_id'] = $this->session->userdata('merchant_order_id');
           }
           else
           {
               $ins['payment_id'] = '';
               $ins['order_id'] = "prj_".date('Y-m-d').time();
           }
           $ins['status'] = 0;
           
           $result = $this->md->my_insert('tbl_bill',$ins);
           
            if( $result == 1)
            {
               $bill_id = $this->md->my_query("SELECT MAX(`bill_id`) as mx FROM `tbl_bill`")[0]->mx;
               
               $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('member')));
                       
               foreach ($cartdata as $item)
               {
                   //genrate bill
                   $ins2['bill_id'] = $bill_id;
                   $ins2['product_id'] = $item->product_id;
                   $ins2['image_id'] = $item->image_id;
                   $ins2['gross_price'] = $item->gross_price;
                   $ins2['discount'] = $item->discount;
                   $ins2['net_price'] = $item->net_price;
                   $ins2['qty'] = $item->qty;
                   $ins2['total_price'] = $item->total_price;
                   
                   $this->md->my_insert('tbl_transaction',$ins2);
                   
                   //get qty
                   $old_qty = $this->md->my_select("tbl_product_image",'*',array('image_id'=>$item->image_id))[0]->qty;
                   
                   //update qty
                   $current_qty = $item->qty;
                   $new_qty = $old_qty - $current_qty;
                   $this->md->my_update('tbl_product_image',array('qty'=>$new_qty),array('image_id'=>$item->image_id));
                   
                   //remove data from cart
                   $this->md->my_delete('tbl_cart',array('cart_id'=>$item->cart_id));
               }
            }
        }
        
        if( $this->session->userdata('paytype') == "online" )
        {
            $data['payment_id'] = $this->session->userdata('razorpay_payment_id');
        }
        $data['order_id'] = $ins['order_id'];
        $data['paytype'] = $this->session->userdata('paytype');
        
        //unset unnewsaasary session
        $this->session->unset_userdata('bill_amount');
        $this->session->unset_userdata('shipment_id');
        $this->session->unset_userdata('paytype');
        $this->session->unset_userdata('promocode_id');
        $this->session->unset_userdata('razorpay_payment_id');
        $this->session->unset_userdata('merchant_order_id');
        $this->session->unset_userdata('image_id');
        $this->session->unset_userdata('status');
        
        $this->load->view('ordersuccess',$data);
    }

    public function order_fail()
    {
        $data = array();
        
        //check cart empty
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart', '*', $wh);

        $cart_item = count($data['cart_data']);

        if ($cart_item == 0)
        {
            redirect('view-cart');
        }
        
        if( $this->session->userdata('status') == 1 )
        {
            redirect('order-success');
        }
        else
        {
            $data['razorpay_payment_id'] = $this->session->userdata('razorpay_payment_id');
            $data['merchant_order_id'] = $this->session->userdata('merchant_order_id');
        }
        $this->load->view('orderfail',$data);
    }

    public function check_out()
    {
        $data = array();

        //check cart empty
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart', '*', $wh);

        $cart_item = count($data['cart_data']);

        if ($cart_item == 0) {
            redirect('view-cart');
        }

        //pay button
        if ($this->input->post('pay')) {
            if ($this->input->post('paytype')) {
                $this->session->set_userdata('paytype', $this->input->post('paytype'));
            }

            if (!$this->session->userdata('shipment_id')) {
                $data['ship_err'] = "Please Select Delevery Location.";
            }

            if (!$this->session->userdata('paytype')) {
                $data['pay_err'] = "Please Select Payment Mode.";
            }

            if (!isset($data['ship_err']) && !isset($data['pay_err']))
            {
                //Genter OTP send 
                if ($this->session->userdata('paytype') == "cod") 
                {
                    $otp = rand(100000, 999999);
                    $this->session->set_userdata('otp', $otp);

                    $whh['register_id'] = $this->session->userdata('member');
                    $member = $this->md->my_select('tbl_register', '*', $whh)[0];
                    
                    $email = $member->email;
                    $name = $member->name;
                    $subject = "One Time Password For Order Confirmation";
                    $msg = '<!DOCTYPE HTML>
        <html>
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="x-apple-disable-message-reformatting">
          <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
          <title></title>

            <style type="text/css">
              @media only screen and (min-width: 570px) {
          .u-row {
            width: 550px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }

          .u-row .u-col-100 {
            width: 550px !important;
          }

        }

        @media (max-width: 570px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: calc(100% - 40px) !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }

        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }

        p {
          margin: 0;
        }

        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }

        * {
          line-height: inherit;
        }

        a[x-apple-data-detectors="true"] {
          color: inherit !important;
          text-decoration: none !important;
        }

        @media (max-width: 480px) {
          .hide-mobile {
            max-height: 0px;
            overflow: hidden;
            display: none !important;
          }

        }
        table, td { color: #000000; } a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: auto !important; } #u_content_image_1 .v-src-max-width { max-width: 60% !important; } #u_content_image_4 .v-src-width { width: auto !important; } #u_content_image_4 .v-src-max-width { max-width: 80% !important; } #u_content_menu_1 .v-container-padding-padding { padding: 26px 10px 10px !important; } #u_content_menu_1 .v-layout-display { display: block !important; } #u_content_menu_1 .v-padding { padding: 5px 14px !important; } }
            </style>



        <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css"><!--<![endif]-->

        </head>

        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #afadc9;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #038cfe;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: #038cfe;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->

        <table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">
              <a href="https://unlayer.com" target="_blank">
              <img align="center" border="0" src="https://images.unlayer.com/projects/72044/1648630496452-logo.jpg" alt="Logo" title="Logo" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 40%;max-width: 212px;" width="212" class="v-src-width v-src-max-width"/>
              </a>
            </td>
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>



        <div class="u-row-container" style="padding: 0px;background-color: transparent:border">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->

        <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 25px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">

              <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636374086763-hero.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"/>

            </td>
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 5px;font-family:arial,helvetica,sans-serif;" align="left">

          <h2 style="margin: 0px; color: #141414; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: "Open Sans",sans-serif; font-size: 28px;">
            <center><strong>Hello '.$name.',<br/> Here Is Your One Time Password(OTP)</strong></center>
          </h2>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 12px;font-family:arial,helvetica,sans-serif;" align="left">

          <h1 style="margin: 0px; color: #3b4d63; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 41px;">
            <strong><span style="text-decoration: underline;">'.$otp.'</span></strong>
          </h1>

              </td>
            </tr>
          </tbody>
        </table>
        

            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>

        </html>';
                    $this->md->my_mailer($email, $subject, $msg);
                }

                redirect('order-confirmation');
            }
        }

        $this->load->view('checkout', $data);
    }

    public function order_confirmation()
    {
        $data = array();
        
        //cart is empty or not
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart', '*', $wh);

        $cart_item = count($data['cart_data']);

        if ($cart_item == 0) {
            redirect('view-cart');
        }
        
        //cod verify
        if( $this->input->post('verify'))
        {
            $send_otp = $this->session->userdata('otp');
            $user_otp = $this->input->post('otp');
            
            if( $user_otp == $send_otp)
            {
                $this->session->unset_userdata('otp');
                $this->session->set_userdata('status',1);
                redirect('order-success');
            }
            else
            {
                $data['error'] = "OTP Not Match.";
            }
        }
        
        //razorpay paramiter
        $data['return_url'] = site_url().'pages/callback';
        $data['surl'] = site_url('order-success');
        $data['furl'] = site_url('order-fail');
        $data['currency_code'] = 'INR';

        $this->load->view('order_confirmation',$data);
    }
    
    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
    // callback method
    public function callback() {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            
            //set id in session
            $this->session->set_userdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_userdata('merchant_order_id', $this->input->post('merchant_order_id'));
            
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                //check success or not
                if( $http_status == 0)
                {
                    $this->session->set_userdata('status',1);
                }
                else 
                {
                    $this->session->set_userdata('status',0);
                }
                
                if ($result === false)
                {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                }
                else
                {
                    $response_array = json_decode($result, true);
                   // echo "<pre>";print_r($response_array);exit;
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
    
    public function resend_otp()
    {
       //check user is login
        if( !$this->session->userdata('member'))
        {
            redirect('login-register');
        }
        
        //check cart empty
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart', '*', $wh);

        $cart_item = count($data['cart_data']);

        if ($cart_item == 0)
        {
            redirect('view-cart');
        }
        
        // resend otp
        $otp = rand(100000, 999999);
        $this->session->set_userdata('otp', $otp);

        $whh['register_id'] = $this->session->userdata('member');
        $member = $this->md->my_select('tbl_register', '*', $whh)[0];

        $email = $member->email;
        $name = $member->name;
        $subject = "One Time Password For Order Confirmation";
        
        $msg = '<!DOCTYPE HTML>
        <html>
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="x-apple-disable-message-reformatting">
          <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
          <title></title>

            <style type="text/css">
              @media only screen and (min-width: 570px) {
          .u-row {
            width: 550px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }

          .u-row .u-col-100 {
            width: 550px !important;
          }

        }

        @media (max-width: 570px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: calc(100% - 40px) !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }

        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }

        p {
          margin: 0;
        }

        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }

        * {
          line-height: inherit;
        }

        a[x-apple-data-detectors="true"] {
          color: inherit !important;
          text-decoration: none !important;
        }

        @media (max-width: 480px) {
          .hide-mobile {
            max-height: 0px;
            overflow: hidden;
            display: none !important;
          }

        }
        table, td { color: #000000; } a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: auto !important; } #u_content_image_1 .v-src-max-width { max-width: 60% !important; } #u_content_image_4 .v-src-width { width: auto !important; } #u_content_image_4 .v-src-max-width { max-width: 80% !important; } #u_content_menu_1 .v-container-padding-padding { padding: 26px 10px 10px !important; } #u_content_menu_1 .v-layout-display { display: block !important; } #u_content_menu_1 .v-padding { padding: 5px 14px !important; } }
            </style>



        <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css"><!--<![endif]-->

        </head>

        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #afadc9;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->


        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #038cfe;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-color: #038cfe;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->

        <table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">
              <a href="https://unlayer.com" target="_blank">
              <img align="center" border="0" src="https://images.unlayer.com/projects/72044/1648630496452-logo.jpg" alt="Logo" title="Logo" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 40%;max-width: 212px;" width="212" class="v-src-width v-src-max-width"/>
              </a>
            </td>
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>



        <div class="u-row-container" style="padding: 0px;background-color: transparent:border">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:550px;"><tr style="background-image: url("https://cdn.templates.unlayer.com/assets/1636376675254-sdsdsd.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;"><![endif]-->

        <!--[if (mso)|(IE)]><td align="center" width="550" style="width: 550px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->

        <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 25px;font-family:arial,helvetica,sans-serif;" align="left">

        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">

              <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1636374086763-hero.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"/>

            </td>
          </tr>
        </table>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 5px;font-family:arial,helvetica,sans-serif;" align="left">

          <h2 style="margin: 0px; color: #141414; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: "Open Sans",sans-serif; font-size: 28px;">
            <center><strong>Hello '.$name.',<br/> Here Is Your One Time Password(OTP)</strong></center>
          </h2>

              </td>
            </tr>
          </tbody>
        </table>

        <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 12px;font-family:arial,helvetica,sans-serif;" align="left">

          <h1 style="margin: 0px; color: #3b4d63; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 41px;">
            <strong><span style="text-decoration: underline;">'.$otp.'</span></strong>
          </h1>

              </td>
            </tr>
          </tbody>
        </table>
        

            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>

        </html>';
        
        
        $this->md->my_mailer($email, $subject, $msg);
        
        redirect('order-confirmation');
        
    }
    
    public function page_not_found()
    {
        $this->load->view('page_not_found');
    }

}
