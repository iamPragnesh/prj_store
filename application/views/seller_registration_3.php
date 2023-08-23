<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Sell Product On PRJ Store</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/2.png">
    </head>
    
    <head>
        <?php
        $this->load->view('link');
        ?>
        <?php
        // require './header.php';
        $this->load->view('header');
        ?>
        <!-- Fonts Online -->
    </head>
    <body>

        <!-- Page Wrapper -->


        <!-- Blog -->
        <section class="login-sec padding-top-30 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h5>Welcome, <?php echo $this->session->userdata('name'); ?></h5>
                        <!-- FORM -->
                        <form method="post" action="" name="register" novalidate="" class="myform">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Bank Benificial Name</label>
                                    <input type="text" class="form-control <?php
                                        if (form_error('banificial_name')) {
                                            echo "error-border";
                                        }
                                        ?>" name="banificial_name" value="<?php
                                        if( !isset($success) && set_value('banificial_name') )
                                        {
                                            echo set_value('banificial_name');
                                        }
                                        else
                                        {
                                             echo $this->session->userdata('banificial_name');
                                        }
                                        ?>" placeholder="XYZ" required="" style="width: 100%;position: relative;">
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('banificial_name');
                                        ?>
                                    </p>
                                </li>

                                <li class="col-sm-12">
                                    <label class="text-uppercase">Bank Name</label>
                                  
                                        <select class="form-control <?php if (form_error('bank_name')) { echo "error-border";} ?>" name="bank_name" style="cursor: pointer" required="" aria-label="Floating label select example">
                                            <option value="">Select Bank</option>
                                            <option <?PHP if( !isset($success) && set_select('bank_name', 'ICICI Bank') )
                                            {
                                                echo set_select('bank_name', 'ICICI Bank');
                                            }
                                            else
                                            {
                                                if($this->session->userdata('bank_name') == 'ICICI Bank')
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>ICICI Bank</option>
                                            <option <?PHP if( !isset($success) && set_select('bank_name', 'Axis Bank') )
                                            {
                                                echo set_select('bank_name', 'Axis Bank');
                                            }
                                            else
                                            {
                                                if($this->session->userdata('bank_name') == 'Axis Bank')
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>Axis Bank</option>
                                            <option <?PHP if( !isset($success) && set_select('bank_name', 'HDFC Bank') )
                                            {
                                                echo set_select('bank_name', 'HDFC Bank');
                                            }
                                            else
                                            {
                                                if($this->session->userdata('bank_name') == 'HDFC Bank')
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>HDFC Bank</option>
                                            <option <?PHP if( !isset($success) && set_select('bank_name', 'The Youth Varachha Bank') )
                                            {
                                                echo set_select('bank_name', 'The Youth Varachha Bank');
                                            }
                                            else
                                            {
                                                if($this->session->userdata('bank_name') == 'The Youth Varachha Bank')
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>The Youth Varachha Bank</option>
                                        </select>
                             
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('bank_name');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-6">
                                    <label>Branch Name
                                        <input type="text" class="form-control <?php
                                        if (form_error('branch_name')) {
                                            echo "error-border";
                                        }
                                        ?>" name="branch_name" required="" value="<?php
                                        if( !isset($success) && set_value('branch_name') )
                                        {
                                            echo set_value('branch_name');
                                        }
                                        else
                                        {
                                             echo $this->session->userdata('branch_name');
                                        }
                                        ?>" placeholder="Enter Brach Name" style="width: 100%;position: relative;">
                                    </label>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('branch_name');
                                        ?>
                                    </p>
                                </li>
                                <li class="col-sm-6">
                                    <label>IFSC Code
                                        <input type="text" class="form-control <?php
                                        if (form_error('ifsc')) {
                                            echo "error-border";
                                        }
                                        ?>" name="ifsc" required="" value="<?php
                                        if( !isset($success) && set_value('ifsc') )
                                        {
                                            echo set_value('ifsc');
                                        }
                                        else
                                        {
                                             echo $this->session->userdata('ifsc');
                                        }
                                        ?>" placeholder="Enter IFSC Code" style="width: 100%;position: relative;">
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('ifsc');
                                        ?>
                                    </p>
                                </li>

                                <li class="col-sm-12">
                                    <label>Account Number
                                        <input type="password" class="form-control <?php
                                        if (form_error('ac_no')) {
                                            echo "error-border";
                                        }
                                        ?>"  id="abc" name="ac_no" placeholder="Enter Account No" value="<?php
                                        if( !isset($success) && set_value('ac_no') )
                                        {
                                            echo set_value('ac_no');
                                        }
                                        else
                                        {
                                             echo $this->session->userdata('ac_no');
                                        }
                                        ?>" required="" style="width: 100%;position: relative;">
                                        <i class="fa fa-eye-slash" id="eye" style="color: gray;font-size: 15px;cursor: pointer;position: absolute;top: 38px;left: 545px;" onclick="show();"></i>
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('ac_no');
                                        ?>
                                    </p>
                                </li>
                                
                                <li class="col-sm-12">
                                    <label>Re-type Account Number
                                        <input type="text" class="form-control <?php
                                        if (form_error('retype_ac_no')) {
                                            echo "error-border";
                                        }
                                        ?>" name="retype_ac_no" placeholder="Re-Enter Account No" required="" style="width: 100%;position: relative;">
                                    </label> 
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('retype_ac_no');
                                        ?>
                                    </p>
                                </li>

                                <li class="col-md-6 text-center">
                                    <a href="<?php echo base_url(); ?>seller-registration-2" class="btn-round" style=" width: 80%; margin-top: 40px;border: 1px solid white; margin-right: 70px;"> <  Previous  </a>
                                </li>
                                <li class="col-md-6 text-center">
                                    <button type="submit" name="next" value="yes" class="btn-round" style=" width: 80%; margin-top: 40px;border: 1px solid white; margin-right: 70px;"> Next > </button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients img -->
      <!-- Newslatter -->
        <section class="newslatter">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h3>Subscribe our Newsletter <span>Get <strong>Offers and Stocks</strong> Details</span></h3>
                    </div>
                    <div class="col-md-5">
                        <input type="email" id="email" placeholder="Your email address here...">
                        <button type="button" onclick="subscribe();">Subscribe</button>
                        <p id="msg"></p>
                    </div>
                </div>
            </div>
        </section>    
        <!-- End Content --> 

        <!-- Footer -->


        <!-- Rights -->


        <!-- End Footer --> 
        <?php
// require './footer.php';
        $this->load->view('footer');
        ?>
            <script>
                function show()
                {
                    var abc = document.getElementById('abc');
                    if (abc.type == "password")
                    {
                        abc.type = "text";
                        $('#eye').removeClass('fa fa-eye-slash');
                        $('#eye').addClass('fa fa-eye');
                    } else
                    {
                        abc.type = "password";
                        $('#eye').removeClass('fa fa-eye');
                        $('#eye').addClass('fa fa-eye-slash');

                    }
                }
            </script>
            <?php
//require './headerscript.php';
        $this->load->view('footerscript');
        ?>
    </body>

</html>