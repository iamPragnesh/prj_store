<!-- JavaScripts --> 
<script src="<?php echo base_url(); ?>assets/js/vendors/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/vendors/wow.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/vendors/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/vendors/own-menu.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/vendors/jquery.sticky.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/vendors/owl.carousel.min.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/rs-plugin/js/jquery.tp.t.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/rs-plugin/js/jquery.tp.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/set.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/notify.js" type="text/javascript"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-624c14335adae2bb"></script>

<script type="text/javascript">window.$crisp = [];
    window.CRISP_WEBSITE_ID = "a54cf9dc-883e-41f1-ad36-43cc5a8dedc6";
    (function () {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script src="<?php echo base_url(); ?>assets/js/qrcode.js" type="text/javascript"></script>

<script>

    $("#qrcode").html("");
    var txt = $.trim($('input[name="qrvalue"]').val());
    generateQRcode('100', '100', txt);


    function generateQRcode(width, height, text) {
        $('#qrcode').qrcode({width: width, height: height, text: text});
    }




</script>

<script>

//    voice to text Coverter
    function startDictation() {

        if (window.hasOwnProperty('webkitSpeechRecognition')) {

            var recognition = new webkitSpeechRecognition();

            recognition.continuous = false;
            recognition.interimResults = false;

            recognition.lang = "en-US";
            recognition.start();

            recognition.onresult = function (e) {
                document.getElementById('transcript').value
                        = e.results[0][0].transcript;
                recognition.stop();
//        document.getElementById('filter_form').submit();
            };

            recognition.onerror = function (e) {
                recognition.stop();
            }

        }
    }
</script>

<!--google captcha link-->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>

<!--Google captcha-->
<script type="text/javascript">
    var verifyCallback = function (response) {
    };
    var onloadCallback = function () {

        widgetId1 = grecaptcha.render('example1', {
            'sitekey': '<?php echo CAPTCHA_SITE_KEY; ?>',
            'callback': verifyCallback,
            'theme': 'light'
        });
    };
</script>
