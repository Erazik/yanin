<?php
/*
 *
 * Template Name: Arrival page
 *
 * */
global $post;
$id = $post->ID;
get_header(); ?>

    <div class="motopress-wrapper content-holder clearfix">
        <div class="container">
            <div class="row">
                <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-wrapper-file="page-fullwidth.php" data-motopress-wrapper-type="content">
                    <div class="row">
                        <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
                            <?php get_template_part("static/static-title"); ?>
                        </div>
                    </div>
                    <?php
                    global $cfs;
                    if($cfs->get('arrival_products', $id )) {
                        $pages = $cfs->get('arrival_products', $id);
                        $type = [];
                        foreach ($pages as $ids) {
                            $types = new WC_Product( $ids );
                            array_push($type, $types->post->ID);
                        }
                    }
                    ?>
                    <div class="woocommerce">
                        <ul class="products">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 10,
                                'post__in' => $type
                            );
                            $loop = new WP_Query( $args );
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                    wc_get_template_part( 'content', 'product' );
                                endwhile;
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
                            ?>
                        </ul><!--/.products-->
                    </div>
                    <div id="content" class="row">
                        <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
                            <?php get_template_part("loop/loop-page"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>