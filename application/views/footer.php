<footer>
    <div class="container"> 

        <!-- Footer Upside Links -->
        <div class="foot-link">
            <ul class="nav">
                <li> 
                    <a href="<?php echo base_url(); ?>home">Home</a>
                </li>
                <?php
                $main = $this->md->my_select('tbl_category', '*', array('label' => 'main'));
                foreach ($main as $maindata) {
                    ?>
                    <!-- Main Menu Nav -->
                    <li class="dropdown megamenu">
                        <a href="<?php echo base_url(); ?>collections/main-collection/<?php echo base64_encode(base64_encode($maindata->category_id)); ?>" class="dropdown-toggle"><?php echo $maindata->name; ?></a>
                    </li>
                    <?php
                }
                ?>
                <li> <a href="<?php echo base_url(); ?>collections/todays-offer"> Today's Offer</a></li>
                <li> <a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
            </ul>
        </div>
        <div class="row"> 

            <!-- Contact -->
            <div class="col-md-4">
                <h4>PRJ Store</h4>
                <p>Address: C.B.Patel Navnirman Education Campus,
                    New City Light Road,
                    Bharthana(Vesu),
                    Surat-395017.</p>
                <p>Phone: (+91) 8347716750</p>
                <p>Email: prjstore727@gmail.com</p>
                <div class="social-links"  > <a target="_new" href="https://www.facebook.com/PRJ-Store-104543262137021/"><i class="fa fa-facebook"></i></a> <a target="_new" href="https://twitter.com/PrjStore?t=IxQX9vkYIaxevngfLkoUng&s=09"><i class="fa fa-twitter"></i></a> <a target="_new" href="https://www.linkedin.com/in/prj-store-a98b89230"><i class="fa fa-linkedin"></i></a> <a target="_new" href="https://www.instagram.com/prj_store_007/"><i class="fa fa-instagram"></i></a> <a target="_new" href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWrRlQhgQskhHsgxsbZVdPGqndqPnPsPtjpxWvgcJkcckVqdrRqLqpqvJwQvBkrhsnzNfCXSg"><i class="fa fa-google"></i></a> </div>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>Our Pages</h4>
                <ul class="links-footer">
                    <li><a href="<?php echo base_url(); ?>about-us"> About Us</a></li>
                    <li><a href="<?php echo base_url(); ?>contact-us"> Contact Us</a></li>
                    <li><a href="<?php echo base_url(); ?>u-feedback"> Feedback</a></li>
                    <li><a href="<?php echo base_url(); ?>privacy-policy"> Privacy Policy</a></li>
                    <li><a href="<?php echo base_url(); ?>return-policy"> Return Policy</a></li>
                    <li><a href="<?php echo base_url(); ?>terms-and-condition"> Terms And Condition</a></li>
                    <li><a href="<?php echo base_url(); ?>frequenty-asked-questions"> FAQ's</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-2">
                <h4>My Account</h4>
                <ul class="links-footer">
                    <?php
                    if (strlen($this->session->userdata('member'))) {
                        ?>
                        <li><a href="<?php echo base_url(); ?>member-home">My Account </a></li>
                        <li><a href="<?php echo base_url(); ?>member-logout">Logout </a></li>
                        <li><a href="<?php echo base_url(); ?>member-wishlist"> My Wish List</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="<?php echo base_url(); ?>login-register">Login | Register </a></li>
                        <li><a href="<?php echo base_url(); ?>login-register"> My Wish List</a></li>
                        <?php
                    }
                    ?>
                    
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>Join Us On facebook </h4>
                <div>
                    <div id="fb-root"></div>
                     <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="KcqKFIkw"></script>
                    <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100077400233861" data-tabs="timeline" data-width="260" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100077400233861" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100077400233861">PRJ Store</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Rights -->
<div class="rights">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 d-none d-sm-block">
                Copyright © 2022 <a href="https://www.instagram.com/prj_store_007/" target="_new" class="ri-li">PRJ Store </a> All Right Reserved, Designed &#10084;&#65039 by
                <a href="https://www.instagram.com/mr_pragnesh_007/" target="_new">Pragnesh,</a>
                <a href="https://www.instagram.com/ritik___jasani/" target="_new">Rutvik,</a>
                <a href="https://www.instagram.com/mr_jenil123/" target="_new">Jenil</a>
            </div>
            <div class="col-sm-5 text-right"> <img src="images/card-icon.png" alt=""> </div>
        </div>
    </div>
</div>

<!-- GO TO TOP  --> 
<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
<!-- GO TO TOP End --> 