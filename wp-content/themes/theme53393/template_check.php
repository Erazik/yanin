<?php
if($_SERVER['HTTP_REFERER'] != NUll){
/*
  *
  * Template Name: Check
  *
  * */

get_header();
?>
<div class="row hg">
    <section class="title-section">
        <h1 class="title-header">Please check your eMail!</h1>
    </section>
</div>

<?php get_footer(); }else {
    header('Location: /');
}?>
<style>
    .row.hg{
        min-height: 350px;
        padding-top: 250px;
    }
</style>