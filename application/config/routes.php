<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/home';
$route['404_override'] = 'pages/page_not_found';
$route['translate_uri_dashes'] = FALSE;

//user
$route['home'] = 'Pages/home';
$route['about-us'] = 'Pages/about_us';
$route['privacy-policy'] = 'Pages/privacy_policy';
$route['return-policy'] = 'Pages/return_policy';
$route['terms-and-condition'] = 'Pages/terms_condition';
$route['contact-us'] = 'Pages/contact_us';
$route['u-feedback'] = 'Pages/u_feedback';
$route['frequenty-asked-questions'] = 'Pages/frequenty_asked_questions';
$route['login-register/?(:any)?'] = 'Pages/login_register/$2';
$route['forgetr-password'] = 'Pages/forgetr_password';
$route['forget-password'] = 'Pages/forget_password';
$route['collections/?(:any)?/?(:any)?'] = 'Pages/collections/$2/$3';
$route['view-products/?(:any)?'] = 'Pages/view_products/$2';
$route['seller-registration-1'] = 'Pages/seller_registration_1';
$route['seller-registration-2'] = 'Pages/seller_registration_2';
$route['seller-registration-3'] = 'Pages/seller_registration_3';
$route['seller-registration-4'] = 'Pages/seller_registration_4';
$route['seller-login/?(:any)?'] = 'Pages/seller_login/$2';
$route['seller-logout']='Pages/seller_logout';
$route['view-cart']='Pages/view_cart';
$route['checkout']='Pages/check_out';
$route['order-success']='Pages/order_success';
$route['order-fail']='Pages/order_fail';
$route['order-confirmation']='Pages/order_confirmation';
$route['resend-otp']='Pages/resend_otp';


//seller
$route['seller-home'] = 'Seller/home';
$route['seller-new-product']='Seller/manage_new_product';
$route['seller-product-review']='Seller/manage_product_review';
$route['seller-view-product']='Seller/manage_view_product';
$route['seller-setting']='Seller/manage_setting';
$route['seller-profile']='Seller/manage_profile';
$route['seller-change-profile']='Seller/seller_change_profile';
$route['seller-pending-order']='Seller/seller_pending_order';
$route['seller-confirm-order']='Seller/seller_confrim_order';
$route['seller-cancel-order']='Seller/seller_cancel_order';


//member
$route['member-home'] = 'Member/member_home';
$route['member-profile']='Member/member_profile';
$route['member-password']='Member/member_password';
$route['member-address']='Member/member_address';
$route['member-logout']='Member/logout';
$route['member-wishlist']='Member/wishlist';
$route['member-review']='Member/review';
$route['member-order']='Member/member_order';
$route['member-order-detail/(:any)']='Member/member_order_detail/$2';


//admin
$route['admin-login/?(:any)?']='Authorize/login/$2';
$route['admin-logout']='Authorize/logout';
$route['admin-forget-password']='Authorize/manage_forget_password';
$route['admin-home']='Authorize/admin_home';
$route['manage-contact']='Authorize/manage_contact';
$route['manage-subscriber']='Authorize/manage_subscriber';
$route['manage-feedback']='Authorize/manage_feedback';
$route['manage-banner']='Authorize/manage_banner';
$route['manage-aboutus/?(:any)?']='Authorize/manage_aboutus/$2';
$route['manage-privacy-policy/?(:any)?']='Authorize/manage_privacy_policy/$2';
$route['manage-return-policy/?(:any)?']='Authorize/manage_return_policy/$2';
$route['manage-terms/?(:any)?']='Authorize/manage_terms/$2';
$route['manage-faq/?(:any)?']='Authorize/manage_faq/$2';
$route['manage-country/?(:any)?']='Authorize/manage_country/$2';
$route['manage-state/?(:any)?']='Authorize/manage_state/$2';
$route['manage-city/?(:any)?']='Authorize/manage_city/$z';
$route['manage-main-category/?(:any)?']='Authorize/manage_main_category/$2';
$route['manage-sub-category/?(:any)?']='Authorize/manage_sub_category/$2';
$route['manage-peta-category/?(:any)?']='Authorize/manage_peta_category/$2';
$route['manage-member']='Authorize/manage_member';
$route['manage-seller']='Authorize/manage_seller';
$route['manage-view-product']='Authorize/manage_view_product';
$route['manage-product-review']='Authorize/manage_product_review';
$route['manage-product-offers']='Authorize/manage_product_offers';
$route['manage-promo-code']='Authorize/manage_promo_code';
$route['manage-setting']='Authorize/manage_setting';
$route['manage-commission']='Authorize/manage_commission';
$route['manage-pending-order']='Authorize/member_pending_order';
$route['manage-confirm-order']='Authorize/member_confrim_order';
$route['manage-cancel-order']='Authorize/member_cancel_order';
$route['delete/(:any)/(:any)']='Authorize/delete/$2/$3';


