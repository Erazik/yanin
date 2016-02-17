<?php /* Wrapper Name: Header */ ?>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,900,900italic,700italic,500' rel='stylesheet' type='text/css'>
<style>
    .sf-menu{display: block !important;}
</style>
<div class="row">
	<div class="stuck_menu_wrap">
	<div class="span4" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
		<?php get_template_part("static/static-logo"); ?>
        <div class="miniMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
	</div>
    <div class="span8">
    	<div class="<?php echo cherry_get_layout_class( 'span8' ); ?>" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
			<?php get_template_part("static/static-nav"); ?>
		</div>
    </div>
    </div>
</div>
<div class="row">
	<div class="hidden-phone" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
		<?php get_template_part("static/static-search"); ?>
	</div>
</div>
 