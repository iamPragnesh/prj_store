<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact- Bus Booking </title>

        <?php
        $this->load->view('headerlink');
        ?>
    </head>
    <body>
        <!--Popup search area start -->
        <div id="popup-search-box-id" class="popup-search-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="popup-search-box-inner">

                            <div class="row">
                                <div class="col-md-10">
                                    <input type="search" placeholder="Search here...">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </div>
                            </div>

                            <span class="close-btn-search"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Popup search area end -->
        <!--page-welcome-area start -->
        <div class="page-welcome-area">
            <?php
            $this->load->view('menu');
            //require_once './footerscript.php';
            ?>

            <div class="page-title-area black-overlay text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-inner">
                                <div class="page-title-inner-table-cell">
                                    <h1>Contact</h1>
                                    <div class="page-title-menu">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-welcome-area end -->
        <!--contact-page-conent-area start -->
        <div class="contact-page-conent-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <div class="contact-page-form">
                            <h3>Get in touch</h3>
                            <form method="post" action="" name="contact" novalidate="" class="myform">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="contact-us-name">Name*</label>
                                        <input  placeholder="Enter Name" id="contact-us-name" name="name" <?php
                                        if (form_error('name')) {
                                            echo "error_border";
                                        }
                                        ?>" required pattern="^[a-zA-Z ]+$" value="<?php
                                               if (!isset($success) && set_value('name')) {
                                                   echo set_value('name');
                                               }
                                               ?>" type="text">
                                        <p class="err-msg">
                                            <?php echo form_error('name'); ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact-us-email">Email*</label>
                                        <input placeholder="Enter Email" id="contact-us-email" name="email" <?php
                                        if (form_error('email')) {
                                            echo "error_border";
                                        }
                                        ?>" required value="<?php
                                               if (!isset($success) && set_value('email')) {
                                                   echo set_value('email');
                                               }
                                               ?>" type="email">
                                        <p class="err-msg">
                                            <?php echo form_error('email'); ?>
                                        </p>
                                    </div>
                                </div>
                                <label for="contact-us-subject">Subject*</label>
                                <input placeholder="Enter Subject" id="contact-us-subject" name="subject" <?php
                                        if (form_error('subject')) {
                                            echo "error_border";
                                        }
                                        ?>" required  value="<?php
                                               if (!isset($success) && set_value('subject')) {
                                                   echo set_value('subject');
                                               }
                                               ?>" type="text">
                                        <p class="err-msg">
                                            <?php echo form_error('subject'); ?>
                                        </p>
                                <label for="contact-us-message">Message*</label>
                                <textarea placeholder=" Enter Message" id="contact-us-message" name="message"  class="<?php
                                    if (form_error('message')) {
                                        echo "error_border";
                                    }
                                    ?>" required><?php
                                                  if (!isset($success) && set_value('message')) {
                                                      echo set_value('message');
                                                  }
                                                  ?></textarea>    
                                    <p class="err-msg">
                                        <?php echo form_error('message'); ?>
                                    </p>
                                    <button type="submit" name="add" value="yes" class="pink-btn">Submit</button><br/><br/>
                                    <?php
                                                        if (isset($success)) {
                                                            
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                                <strong>Ok!</strong> <?php echo $this->input->post('contact'); ?> Data Insert Successfully.
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <i class="ti ti-close"></i>
                                                                </button>
                                                            </div>
                                                            <?php
                                                        } if (isset($error)) {
                                                            ?>
                                                            <br/>
                                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                                <strong>Oops!</strong> <?php echo $this->input->post('contact'); ?> Data Already Exists.
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <i class="ti ti-close"></i>
                                                                </button>
                                                            </div>
                                                        <?php } ?>
                            </form>
                        </div> 
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="contact-us-right-area">
                            <h3>Contact</h3>
                            <a class="contact-info-box" href="#"><i class="zmdi zmdi-home"></i>C.B.Patel Computer College, Bharthana.</a>
                            <a class="contact-info-box" href="#"><i class="zmdi zmdi-phone"></i>9016041131<br>8980708710</a>
                            <a class="contact-info-box" href="#"><i class="zmdi zmdi-email"></i>busboosking111@gmail.com <br>sumitsutsriys53@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--contact-page-conent-area end -->
        <!--contact-map-area start -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.0113929528748!2d72.7968723149347!3d21.15194488593183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dff37ee2f05%3A0x2ed617f17458fa81!2sC%20B%20Patel%20Computer%20College!5e0!3m2!1sen!2sin!4v1643777192296!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <!--contact-map-area end -->
        <!--contact-page-socials-area start -->
        <div class="contact-page-socials-area text-center padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <!--<a href="https://www.facebook.com/profile.php?id=100077522102538" target="_new"><i class="fa fa-facebook"></i></a>&nbsp;-->
                            <!--<a href="https://twitter.com/BusBooking111" target="_new"><i class="fa fa-twitter"></i></a>&nbsp;-->
                            <!--<a href="http://www.instagram.com/bus_booking_111" target="_blank"><i class="fa fa-instagram"></i></a>&nbsp;-->
                            <!--<a href="https://www.linkedin.com/feed/?trk=onboarding-landing" target="_new"><i class="fa fa-linkedin"></i></a>&nbsp;-->
                            <!--<a href="https://mail.google.com/mail/u/1/?hl=en_GB#inbox?compose=GTvVlcSBncMcDxWbHwxBJFSTMRGbmgBwVJZKwnpvjwpTnHXpstKvcHpkrVbnDdPnBBprGnPvrxCQX" target="_new"><i class="fa fa-envelope"></i></a>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--contact-page-socials-area end -->
        <!--aboutus-page-content-area end -->
        <!--footer-area start -->
        <?php
        $this->load->view('footer');
        ?>
        <!--footer-area start -->

        <?php
        $this->load->view('footerscript');
        ?>
    </body>
</html>