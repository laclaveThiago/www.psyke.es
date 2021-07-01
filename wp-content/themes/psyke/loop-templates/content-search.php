<?php
/**
 * Search results partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="card-post card-post--search">
        <div class="card-post--inner">
            <div class="card-image">
                <div class="card-image--inner">
                    <?php 
                        if (has_post_thumbnail()) :
                            $featured_img_url = get_the_post_thumbnail_url(get_the_id(), 'thumbnailQuad'); 
                        else:
                            $featured_img_url = get_stylesheet_directory_uri().'/img/assets/thumbnail-quad.jpg';
                        endif;
                    ?>
                    <div class="label label-primary">
                        <?php 
                            switch (get_post_type()) {
                                case 'post':
                                    echo 'Blog';
                                    break;
                                case 'page':
                                    echo 'Página';
                                    break;
                                case 'meditaciones':
                                    echo "Meditación";
                                    break;
                                case 'materiales':
                                    echo "Material";
                                    break;
                                case 'terapias':
                                    echo "Terapia";
                                    break;
                                default:
                                    echo get_post_type();
                            }
                        ?>
                    </div>
                    <a href="<?php the_permalink(); ?>"><canvas class="" width="620" height="320" style="background-image: url('<?php echo $featured_img_url; ?>');"></canvas></a>
                </div>
            </div>
            <div class="card-header">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->
            </div>
            
        </div>
    </div>

</article><!-- #post-## -->
