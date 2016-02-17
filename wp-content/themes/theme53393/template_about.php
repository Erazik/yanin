<?php
/*
  *
  *  Template Name: About page
  *
  * */
global $post;
$id = $post->ID;
global $cfs;
get_header();
?>
<div class="motopress-wrapper content-holder clearfix">
    <div class="container">
        <div class="row">
            <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-wrapper-file="page-fullwidth.php" data-motopress-wrapper-type="content">
                <div class="row">
                    <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
                        <?php get_template_part("static/static-title"); ?>
                    </div>






                </div>
                <div id="content" class="row">
                    <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
                        <?php get_template_part("loop/loop-page"); ?>
                    </div>
                </div>
                <div class="container">
                    <div class="CContainer">
                        <h2>Meet our staff</h2>
                        <div class="CClients">
                            <ul class="posts-grid row-fluid unstyled staff_block ul-item-0">
                                <?php
                                $args = array(
                                    'post_type' => 'team',
                                    'posts_per_page' => 6,
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
                                    $image   = aq_resize( $img_url, 170, 178, true ); //resize & crop img
                                    $los .= '<li class="span2 list-item-1">';
                                    $los .= '<figure class="featured-thumbnail thumbnail">';
                                    $los .= '<a href="'.wp_get_attachment_url(get_post_thumbnail_id($ids)).'" rel="prettyPhoto">';
                                    $los .= '<img src="'.$image.'" alt="clients"/>';
                                    $los .= '<span class="zoom-icon"></span>';
                                    $los .= '</a>';
                                    $los .= '</figure>';
                                    $los .= '<div class="clear"></div>';
                                    $los .= '<h5><a href="'.get_the_permalink($ids).'">'.get_the_title($ids).'</a></h5>';
                                    $los .= '</li>';

                                }
                                echo $los;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="CContainer">
                        <h2 >Our Mission</h2>
                        <div class="clientsSlider">
                            <?php
                            if($cfs->get('mission', $id )) {
                                $pages = $cfs->get('mission', $id);
                                echo $pages;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="CContainer">
                        <h2>Our Clients</h2>
                        <div class="CClients">
                            <ul class="posts-grid row-fluid unstyled staff_block ul-item-0">
                                <?php
                                $args = array(
                                    'post_type' => 'clients',
                                    'posts_per_page' => 6,
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
                                    $image   = aq_resize( $img_url, 'medium', true ); //resize & crop img
                                    $los .= '<li class="span2 list-item-1">';
                                        $los .= '<figure class="featured-thumbnail thumbnail">';
                                            $los .= '<a href="'.wp_get_attachment_url(get_post_thumbnail_id($ids)).'" rel="prettyPhoto">';
                                                    $los .= '<img src="'.$image.'" alt="clients"/>';
                                                    $los .= '<span class="zoom-icon"></span>';
                                            $los .= '</a>';
                                        $los .= '</figure>';
                                        $los .= '<div class="clear"></div>';
                                        $los .= '<h5><a href="'.get_the_permalink($ids).'">'.get_the_title($ids).'</a></h5>';
                                    $los .= '</li>';

                                }
                                echo $los;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="CContainer">
                        <h2 >Our Suppliers</h2>
                        <div class="clientsSlider">
                            <?php
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
        </div>
    </div>
</div>





































<?php get_footer(); ?>