<?php
/**
 * Card post
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="card-post card-post--default">
    <a href="<?php the_permalink(); ?>" class="card-post--inner">
        <div class="card-image card-image--rounded">
            <div class="card-image--inner">
                <?php 
                    if (has_post_thumbnail()) :
                        $featured_img_url = get_the_post_thumbnail_url(get_the_id(), 'thumbnailQuad'); 
                    else:
                        $featured_img_url = get_stylesheet_directory_uri().'/img/assets/thumbnail-quad.jpg';
                    endif;
                ?>
                <canvas class="" width="620" height="620" style="background-image: url('<?php echo $featured_img_url; ?>');"></canvas>
            </div>
        </div>
        <div class="card-header">
        <ul class="post-categories">
            <?php
                // get top level terms
                $parents = get_terms( 'category', array( 'parent' => 0 ) );
                $hasParentsCategories = false;

                // get post categories
                $categories = get_the_terms( $post->ID, 'category' );
                // output top level cats and their children
                foreach( $parents as $parent ):
                    // output parent name and link
                    //echo '<li><a href="' . get_term_link( $parent ) . '">' . $parent->name . '</a></li>: ';
                    // initialize array to hold child links
                    $links = array();
                    foreach( $categories as $category ):
                        if( $parent->term_id == $category->parent ):
                            // put link in array
                            $links[] = '<li>' . $category->name . '</li>';
                            $hasParentsCategories = true;
                        endif;
                    endforeach;
                    // join and output links with separator
                    echo join( ', ', $links );
                endforeach;

                if(!$hasParentsCategories) :
                    foreach( $categories as $category ):
                            echo '<li>' . $category->name . '</li>';
                    endforeach;
                endif;
            ?>
        </ul>
            <h3><?php the_title(); ?></h3>
            <?php $author = get_the_author(); ?>
            <p>By <?php echo $author; ?></p>
        </div>
    </a>
</div>

