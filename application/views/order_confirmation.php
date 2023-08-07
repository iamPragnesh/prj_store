<?php
$productinfo = "PRJ Store";
$txnid = time();
$surl = $surl;
$furl = $furl;
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;

$bill_amount =( $this->session->userdata('bill_amount') + 100 );
if( $this->session->userdata('promocode_id') )
{
    $wh['promocode_id'] = $this->session->userdata('promocode_id');
    $promo_data = $this->md->my_select('tbl_promocode','*',$wh)[0];
    $bill_amount = ($bill_amount - $promo_data->amount );
}

$total = ($bill_amount * 100); //in paisa
$amount = $total;
$merchant_order_id = "prj_".date('Y-m-d').time();

//user info
$member = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('member')))[0];

$card_holder_name = $member->name;
$email = $member->email;
$phone = $member->mobile;
$name = APPLICATION_NAME;
$return_url = site_url() . 'pages/callback';
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Order Confirmation - PRJ Store</title>
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
            <!-- Ship Process -->
            <div class="ship-process padding-top-30 padding-bottom-30">

                <section>
                    <div class="container"> 
                        <form method="post" action="" name="confirmation">
                            <?php
                            if ($this->session->userdata('paytype') == "online")
                            {
                                ?>
                                <div class="order-success" style="border:2px solid#ddd;padding: 20px">
                                    <h6>ORDER CONFIRMATION</h6>
                                    <p>Click on this button. we will redairect you to payment page and then pay and confirm your order. Male sure while page will processing please do not refresh on payment page.</p>
                                    <button id="submit-pay" type="button" onclick="razorpaySubmit(this);" value="Pay Now" class="btn-round" style="margin-top: 8px">PAY NOW</button><br/><br/> 
                                    <a href="<?php echo base_url(); ?>checkout" class="text-danger" style="color: blue;">Back To Checkout</a>
                                </div>
                                <?php
                            } 
                            else if ($this->session->userdata('paytype') == "cod") 
                            {
                                $whh['register_id'] = $this->session->userdata('member');
                                $member = $this->md->my_select('tbl_register', '*', $whh)[0];

                                $email = $member->email;
                                ?>
                                <div class="order-success" style="border:2px solid#ddd;padding: 20px">
                                    <h6>ORDER CONFIRMATION</h6>
                                    <p>Please enter one time password for confirm order. We send one time password on your register email <a style="color: blue;"><?php echo $email; ?></a></p>
                                    <input type="text" name="otp" id="code" placeholder="Enter OTP" style="padding: 5px;width: 234px;" ><br/>
                                    <a href="<?php echo base_url('resend-otp'); ?>" style="margin-left: 140px">Resend OTP?</a><br/><br/> 
                                    <p style="color:red;">
                                    <?php 
                                        if( isset($error))
                                        {
                                            echo $error;
                                        }
                                    ?>
                                    </p>
                                    <button name="verify" value="yes" type="submit" class="btn-round" style="margin-top: 8px">VERIFY</button><br/><br/> 
                                    <a href="<?php echo base_url(); ?>checkout" class="text-danger" style="color: blue;">Back To Checkout</a>
                                </div>
                                <?php
                            }
                            ?>
                        </form>

                        <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
                            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                            <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                            <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                            <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                            <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                            <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                            <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                            <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                            <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                        </form>

                    </div>
                </section>
            </div>

            <?php
            $this->load->view('footer');
            ?>
        </div>

        <?php
        $this->load->view('footerscript');
        ?>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var razorpay_options = {
                key: "<?php echo $key_id; ?>",
                amount: "<?php echo $total; ?>",
                name: "<?php echo $name; ?>",
                description: "Order # <?php echo $merchant_order_id; ?>",
                netbanking: true,
                currency: "<?php echo $currency_code; ?>",
                prefill: {
                    name: "<?php echo $card_holder_name; ?>",
                    email: "<?php echo $email; ?>",
                    contact: "<?php echo $phone; ?>"
                },
                notes: {
                    soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                },
                handler: function (transaction) {
                    document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                    document.getElementById('razorpay-form').submit();
                },
                "modal": {
                    "ondismiss": function () {
                        window.location = "<?php echo base_url('order-fail'); ?>"
                        //location.reload();
                    }
                }
            };
            var razorpay_submit_btn, razorpay_instance;

            function razorpaySubmit(el) {
                if (typeof Razorpay == 'undefined') {
                    setTimeout(razorpaySubmit, 200);
                    if (!razorpay_submit_btn && el) {
                        razorpay_submit_btn = el;
                        el.disabled = true;
                        el.value = 'Please wait...';
                    }
                } else {
                    if (!razorpay_instance) {
                        razorpay_instance = new Razorpay(razorpay_options);
                        if (razorpay_submit_btn) {
                            razorpay_submit_btn.disabled = false;
                            razorpay_submit_btn.value = "Pay Now";
                        }
                    }
                    razorpay_instance.open();
                }
            }
        </script>
    </body>

</html>