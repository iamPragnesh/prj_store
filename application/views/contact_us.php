<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Contact Us - PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">


    </head>
    <body>

        <!-- Page Wrapper -->
        <div id="wrap" class="layout-1"> 
            <?php
            $this->load->view('link');
            ?>
            <?php
            // require './header.php';
            $this->load->view('header');
            ?>

            <!-- Slid Sec -->
            <section class="slid-sec">
                <div class="container">
                    <div class="container-fluid">

                    </div>
                </div>
            </section>

            <!-- Content -->
            <div id="content"> 

                <div id="content"> 

                    <!-- Linking -->
                    <div class="linking">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                                <li class="active">Contact Us</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Skills -->
                    <!-- MAP -->
                    <section class="contact-sec padding-top-40 padding-bottom-80">
                        <div class="container">
                            <div class="heading">
                                <h2>Contact Us</h2>
                                <hr>
                            </div>

                            <!-- MAP -->
                            <section class="map-block margin-bottom-40">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.011392952867!2d72.7968723148855!3d21.151944885931787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dff37ee2f05%3A0x2ed617f17458fa81!2sC%20B%20Patel%20Computer%20College!5e0!3m2!1sen!2sin!4v1644228677679!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </section>

                            <!-- Conatct -->
                            <div class="contact">
                                <div class="contact-form"> 
                                    <!-- FORM  -->
                                    <form id="contact_form" action="" class="myform" method="post" novalidate="" name="contact_us" onsubmit=" return (grecaptcha.getResponse(widgetId1) == '')? false : true;">
                                        <div class="row">
                                            <div class="col-md-8"> 

                                                <!-- Payment information -->
                                                <div class="heading">
                                                    <h2>Do You have a Question for Us ?</h2>
                                                </div>
                                                <ul class="row">
                                                    <li class="col-sm-6">
                                                        <label>Name </label>
                                                        <input type="text" required=""  pattern="^[a-zA-Z ]+$" autocomplete="off" class="form-control
                                                        <?php
                                                        if (form_error('name')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" 
                                                               placeholder="Enter Name" name="name" id="name" placeholder="enter name"
                                                               value="<?php
                                                               if (!isset($success) && set_value('name')) {
                                                                   echo set_value('name');
                                                               }
                                                               ?>" required="" pattern="^[a-zA-Z ]+$"/>
                                                        <p class="err-msg">
                                                            <?php echo form_error('name'); ?>
                                                        </p> 

                                                    </li>
                                                    <li class="col-sm-6">
                                                        <label>Email  </label>
                                                        <input type="text"  autocomplete="off" class="form-control <?php
                                                        if (form_error('email')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" placeholder="Enter Email" name="email" id="email" placeholder="" value="<?php
                                                               if (!isset($success) && set_value('email')) {
                                                                   echo set_value('email');
                                                               }
                                                               ?>" required="" />
                                                        <p class="err-msg">
                                                            <?php echo form_error('email'); ?>    
                                                        </p>

                                                    </li>

                                                    <li class="col-sm-12">
                                                        <label>Subject </label>
                                                        <input type="text" autocomplete="off" class="form-control <?php
                                                        if (form_error('subject')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" name="subject" placeholder="Enter subject" id="subject" placeholder="" value="<?php
                                                               if (!isset($success) && set_value('subject')) {
                                                                   echo set_value('subject');
                                                               }
                                                               ?>" required="" />
                                                        <p class="err-msg">
                                                            <?php echo form_error('subject'); ?>
                                                        </p>

                                                    </li>
                                                    <li class="col-sm-12">
                                                        <label>Message </label>
                                                        <textarea class="form-control <?php
                                                        if (form_error('message')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" name="message" id="message" rows="5"  placeholder="Enter Messge" style="height: 140px !important" autocomplete="off" placeholder=""" required="" /><?php
                                                                  if (!isset($success) && set_value('message')) {
                                                                      echo set_value('message');
                                                                  }
                                                                  ?></textarea>
                                                        <p class="err-msg">
                                                            <?php echo form_error('message'); ?>
                                                        </p>

                                                    </li>
                                                    <li class="col-sm-12 no-margin">
                                                        <div id="example1" style="margin-left:15px;"></div>
                                                        <br/>
                                                        <button type="submit" value="add" name="add" class="btn-round" id="btn_submit" >Send Message</button>
                                                    </li>
                                                </ul>
                                                <?php
                                                if (isset($success)) {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible d-flex align-items-center mb-0" role="alert">
                                                        <i class="ti ti-checks alert-icon me-2"></i>
                                                        <div>
                                                            <strong>Ok!</strong> <?php echo $this->input->post('contact_us'); ?> Insert Successfully.
                                                        </div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>

                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible d-flex align-items-center mb-0" role="alert">
                                                        <i class="ti ti-checks alert-icon me-2"></i>
                                                        <div>
                                                            <strong>Oops!</strong> Something Wrong.
                                                        </div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>


                                            <!-- Conatct Infomation -->
                                            <div class="col-md-4">
                                                <div class="contact-info">
                                                    <h5>PRJ Store</h5>
                                                    <hr>
                                                    
                                                    <h6> Address:</h6>
                                                    <p>C.B.Patel Navnirman Education Campus,
                                                        New City Light Road,
                                                        Bharthana(Vesu),
                                                        Surat-395017.</p>
                                                    
                                                    <h6>Phone:</h6>
                                                    <a href="tel:8347716750">(+91)83477 16750</p>
                                                        <a href="tel:8735800946">(+91)87358 00946</a>
                                                        <p><a href="tel:9909236882">(+91)99092 36882</a></p>

                                                    <h6>Email:</h6>
                                                    <a href="mailto:prjstore727@gmail.com">prjstore727@gmail.com</a>
                                                    
                                                    <h6>Scan QR Code For Detail</h6>
                                                    <input type="hidden" name="qrvalue" value="<?php echo " Name : PRJ Store, \n Address :C.B.Patel Computer College, \n Phone : (+91)83477 16750 \n Email :prjstore727@gmail.com" ?>"/>
                                                    
                                                    <!--Qr Code-->
                                                    <div id="qrcode"></div>
                                                    <a id="get_img" style="display: none" download="">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>



                    <!--  Newslatter -->
                    <section class="newslatter">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>Subscribe our Newsletter <span>Get <strong>Offers and Stocks</strong> Details</span></h3>
                                </div>
                                <div class="col-md-5">
                                    <form>
                                        <input type="email" placeholder="Your email address here...">
                                        <button type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--  End Content-->

                <!-- Footer -->
                <?php
// require './footer.php';
                $this->load->view('footer');
                ?>


                <!-- End Footer --> 

                <!-- GO TO TOP  --> 
                <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
                <!-- GO TO TOP End --> 
            </div>
            <!-- End Page Wrapper --> 

            <?php
//require './headerscript.php';
            $this->load->view('footerscript');
            ?>
            
            
    </body>

</html>
