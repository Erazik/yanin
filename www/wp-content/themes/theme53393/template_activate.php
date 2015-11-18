<?php
/*
  * Template Name: Activate
  *
  * */




echo do_shortcode('[woocommerce-email-verification]');
header('Location:'.get_home_url().'/my-account/');
exit;
?>
