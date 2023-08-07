<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Frequenty Asked Questions - PRJ Store</title>
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
                                <li class="active">Frequenty Asked Questions</li>
                            </ol>
                        </div>
                    </div>

                    <!-- heading -->
                    <div class="heading container padding-top-45">
                        <h2>Frequenty Asked Questions</h2>
                        <hr>
                    </div>




                    <!-- Skills -->
                   
                    <section class="skills padding-top-35 padding-bottom-80">
                        <div class="container my_faq"> 
                            <?php
                            foreach ($faqs as $data) {
                                ?> 
                                <div>
                                    <a class="question" role="button"  aria-expanded="false" aria-controls="collapseExample">
                                        <p><b>Q.&nbsp;<?php echo $data->question; ?></b></p>
                                    </a>
                                    <div style="display:none;" class="collapse" id="collapse">
                                        <div class="padding-left-25">
                                            <p style="padding-right:10px; " >Ans:&nbsp;<?php echo $data->answer; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?> 
                        </div>
                    </section>

                    <!-- Newslatter -->
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
                <!-- End Content --> 

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