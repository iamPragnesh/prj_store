<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>About Us - PRJ Store</title>
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
                                <li class="active">Feedback</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Skills -->
                    <!-- MAP -->
                    <section class="contact-sec padding-top-40 padding-bottom-80">
                        <div class="container">
                            <div class="heading">
                                <h2>Feedback</h2>
                                <hr>
                            </div>


                            <!-- Conatct -->
                            <div class="contact">
                                <div class="contact-form"> 
                                    <!-- FORM  -->
                                    <form id="contact_form" action="" class="myform" method="post" novalidate="" name="feedback">
                                        <div class="row">
                                            <div class="col-md-8"> 
                                                <!-- Payment information -->
                                                 <ul class="row">
                                                    <li class="col-sm-12">
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
                                                     <li class="col-sm-12">
                                                        <label>Message </label>
                                                        <textarea class="form-control <?php
                                                        if (form_error('message')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" name="message" id="message" rows="5"  placeholder="Enter Messge"  autocomplete="off" placeholder=""" required="" /><?php
                                                                  if (!isset($success) && set_value('message')) {
                                                                      echo set_value('message');
                                                                  }
                                                                  ?></textarea>
                                                        <p class="err-msg">
                                                            <?php echo form_error('message'); ?>
                                                        </p>

                                                    </li>
                                                    <li class="col-sm-12 no-margin">
                                                        <button type="submit" value="add" name="add" class="btn-round" id="btn_submit" >Send Message</button>
                                                    </li>
                                                </ul>
                                                <?php
                                                if (isset($success)) {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible d-flex align-items-center mb-0" role="alert">
                                                        <i class="ti ti-checks alert-icon me-2"></i>
                                                        <div>
                                                            <strong>Ok!</strong> <?php echo $this->input->post('feedback'); ?> Insert Successfully.
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
