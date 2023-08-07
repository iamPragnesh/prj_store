<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>404 Page Not Found - PRJ Store</title>
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

             <!-- Error Page -->
            <section>
              <div class="container">
                  <div class="order-success error-page"> <img src="<?php echo base_url(); ?>assets/images/error-img.jpg" alt="" >
                  <h3>Error <span>404</span> Not Found</h3>
                  <p>We’re sorry but the page you are looking for does nor exist.<br>
                    You could return to <a href="#.">homepage</a> or using <a href="#.">search!</a></p>
                </div>
              </div>
            </section>

            <?php
//require './headerscript.php';
            $this->load->view('footer');
            ?>
             
            <?php
//require './headerscript.php';
            $this->load->view('footerscript');
            ?>
    </body>

</html>
