<?php
/**
* Template Name: Home Page
*/
global $post;
$id = $post->ID;
get_header(); ?>



<style>
	.btn {font-family:<?php $typography_mixed_fonts ?>}
</style>
<script>
	$(document).ready(function(){

	$(window).resize(
	   function(){
		$('.carousel-wrap.carousel_home').width($(window).width());
		$('.carousel-wrap.carousel_home').css({width: $(window).width(), "margin-left": ($(window).width()/-2), "left": "50%"});
	   }
	  ).trigger('resize');
	
	});
</script>
<div class="motopress-wrapper content-holder clearfix">
	<div class="container">
		<div class="row">
			<?php do_action( 'cherry_before_home_page_content' ); ?>
			<div class="<?php echo apply_filters( 'cherry_home_layout', 'span12' ); ?>" data-motopress-wrapper-file="page-home.php" data-motopress-wrapper-type="content">
				<div class="row">
					<div class="<?php echo apply_filters( 'cherry_home_layout', 'span12' ); ?>" data-motopress-type="static" data-motopress-static-file="static/static-slider.php">
						<?php //get_template_part("static/static-slider"); ?>
					</div>
				</div>
				<div class="row">
					<div class="<?php echo apply_filters( 'cherry_home_layout', 'span12' ); ?>" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
						<?php get_template_part("loop/loop-page"); ?>
					</div>
				</div>
			</div>
			<?php  do_action( 'cherry_after_home_page_content' ); ?>
		</div>
	</div>
    <div class="SliderParent">
        <h2>Products</h2>
        <div class="SliderB">
            <?php

            $taxonomy     = 'product_cat';
            $orderby      = 'name';
            $show_count   = 0;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;
            $empty        = 0;

            $args = array(
                'taxonomy'     => $taxonomy,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
            );
            $all_categories = get_categories( $args );
            foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;
                    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    echo '<div class="bSlide"><a href="'. get_term_link($cat->slug, 'product_cat') .'">
                            <div class="slideTopB" title='.$cat->name.'><h2>'.$cat->name.'</h2></div>';
                    echo "<img src='{$image}' alt='Categories' title='{$cat->name}' /></div></a>";
                }
            }
            ?>
        </div>
    </div>
    <div id="BG">
        <div class="container">
            <div class="CContainer">
                <h2>Testimonials</h2>
                <div class="SSlider">
                    <?php
                    $args = array(
                        'post_type' => 'testi',
                        'posts_per_page' => -1,
                    );
                    $posts = get_posts($args);
                    $los = '';
                    foreach($posts as $post)
                    {
                        $ids = $post->ID;
                        $content_post = get_post($ids);
                        $content = $content_post->post_content;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        $content = substr($content, 0, 275).'...';

                        $thumb   = get_post_thumbnail_id($ids);
                        $img_url = wp_get_attachment_url( $thumb,'full' ); //get img URL
                        $image   = aq_resize( $img_url, 120, 120, true ); //resize & crop img
                        $los .= '<div class="opin">';
                            $los .= '<a href="'.get_the_permalink($ids).'">';
                                $los .= '<div class="BotOp">';
                                    $los .= '<div class="BotIm">';
                                        $los .= '<img src="'.$image.'" alt="clients"/>';
                                    $los .= '</div>';
                                    $los .= '<div class="BotText">';
                                        $los .= '<h3>'.get_the_title($ids).'</h3>';
                                        $los .= $content;
                                    $los .= '</div>';
                                $los .= '</div>';
                            $los .= '</a>';
                        $los .= '</div>';
                    }
                    echo $los;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="CContainer Blog">
            <h2 >Our Blog</h2>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
            );
            $posts = get_posts($args);
            $los = '';
            foreach($posts as $post)
            {
                $ids = $post->ID;

                $thumb   = get_post_thumbnail_id($ids);
                $img_url = wp_get_attachment_url( $thumb,'full' ); //get img URL
                $image   = aq_resize( $img_url, 120, 120, true ); //resize & crop img
                $los .= '<div class="postBlog"><a href="'.get_the_permalink($ids).'">';
                    $los .= '<div class="topBlog">';
                        $los .= get_the_title($ids);
                    $los .= '</div>';
                    $los .= '<div class="BotBlog">';
                        $los .= '<img src="'.$image.'" alt="clients"/>';
                    $los .= '</div>';
                    $los .= 'More >></a>';
                $los .= '</div>';
            }
            echo $los;
            ?>
            <div class="clear"></div>
        </div>
    </div>
    <div class="container">
        <div class="CContainer">
            <h2 >Our Suppliers</h2>
            <div class="clientsSlider">
                <?php
                global $cfs;
                if($cfs->get('supplier', $id )) {
                    $pages = $cfs->get('supplier', $id);
                    foreach ($pages as $ids) {
                        $types .= '<div class="client">';
                            $types .= '<a target="_blank" href="'.$ids['link'].'">';
                                $types .= '<img src="'.$ids['logo'].'" />';
                            $types .= '</a>';
                        $types .= '</div>';
                    }
                    echo $types;
                }
                ?>
            </div>
        </div>
    </div>
</div>
    <div class="popUp Login">
        <form method="post" class="login">

            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <p class="form-row form-row-wide">
                <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
            </p>
            <p class="form-row form-row-wide">
                <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input class="input-text" type="password" name="password" id="password" />
            </p>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <p class="form-row">
                <?php wp_nonce_field( 'woocommerce-login' ); ?>
                <input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
                <label for="rememberme" class="inline">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
                </label>
            </p>
            <p class="lost_password">
                <a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
            </p>

            <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>
    </div>
    <div class="popUp signUp">
        <form method="post" class="register">
            <h5>Sign Up to become client</h5>
            <p>( ! ) After registration you will receive an email with a verification link</p>
            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <p class="form-row form-row-wide">
                    <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                </p>

            <?php endif; ?>

            <p class="form-row form-row-wide">
                <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <p class="form-row form-row-wide">
                    <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password" id="reg_password" />
                </p>

            <?php endif; ?>

            <!-- Spam Trap -->
            <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

            <?php do_action( 'woocommerce_register_form' ); ?>
            <?php do_action( 'register_form' ); ?>

            <p class="form-row">
                <?php wp_nonce_field( 'woocommerce-register' ); ?>
                <input type="submit" class="button" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>
    </div>
    <div class="bGrey" ></div>
<?php get_footer(); ?>