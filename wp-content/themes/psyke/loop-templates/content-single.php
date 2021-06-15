<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <div class="padding-large--top">
                    <div class="row">
                        <div class="col-md-6">
                            <header class="entry-header">
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
                                                    $links[] = '<li><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></li>';
                                                    $hasParentsCategories = true;
                                                endif;
                                            endforeach;
                                            // join and output links with separator
                                            echo join( ', ', $links );
                                        endforeach;

                                        if(!$hasParentsCategories) :
                                            foreach( $categories as $category ):
                                                    echo '<li><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></li>';
                                            endforeach;
                                        endif;
                                    ?>
                                </ul>
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                <div class="entry-meta">
                                    <?php $author = get_the_author(); ?>
                                    <p>By <?php echo $author; ?> / <?php echo get_the_date(); ?> <?php if( get_post_meta( get_the_id(), 'time_reading', true) ) :  echo ' / ' . get_post_meta( get_the_id(), 'time_reading', true) . ' lectura';  endif; ?></p>
                                </div><!-- .entry-meta -->
                                <?php $postURL = esc_url( get_permalink(get_the_id()) ); ?>
                                <div class="share_toolbox psyke_default_style" addthis:url="<?php echo $postURL ?>">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urldecode($postURL) ?>" class="share_toolbox--btn share_toolbox--facebook">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve">
                                            <g>
                                                <path class="stStroke" d="M24.1,35.6h-3.8c-0.6,0-1.1-0.5-1.1-1.2v-8.6h-2.2c-0.6,0-1.1-0.5-1.1-1.2V21c0-0.6,0.5-1.2,1.1-1.2h2.2V18
                                                    c0-1.8,0.6-3.4,1.7-4.5c1.1-1.1,2.6-1.7,4.4-1.7l2.9,0c0.6,0,1.2,0.5,1.2,1.2v3.4c0,0.6-0.5,1.2-1.2,1.2h-1.9
                                                    c-0.6,0-0.8,0.1-0.8,0.2c0,0.1-0.1,0.2-0.1,0.7v1.5h2.7c0.2,0,0.4,0.1,0.6,0.1c0.4,0.2,0.6,0.6,0.6,1v3.7c0,0.6-0.5,1.2-1.2,1.2
                                                    h-2.7v8.6C25.2,35.1,24.7,35.6,24.1,35.6 M20.5,34.2h3.3v-9c0-0.4,0.3-0.8,0.8-0.8h3.1v-3.2h-3.1c-0.4,0-0.8-0.3-0.8-0.8v-2.1
                                                    c0-0.5,0.1-1.2,0.5-1.6c0.5-0.6,1.3-0.6,1.8-0.6l1.7,0v-2.9l-2.7,0c-2.9,0-4.7,1.8-4.7,4.8v2.5c0,0.4-0.3,0.8-0.8,0.8h-2.6v3.2h2.6
                                                    c0.4,0,0.8,0.3,0.8,0.8V34.2z"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urldecode($postURL) ?>&text=" class="share_toolbox--btn share_toolbox--twitter">
                                    <svg version="1.1" id="Capa_35" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve">
                                        <path class="stStroke" d="M37,16.2c-0.1,0.1-0.3,0.1-0.4,0.2c0.3-0.4,0.5-0.9,0.7-1.4l0.6-1.8l-1.7,1c-0.9,0.5-1.8,0.9-2.8,1.1
                                            c-1.1-1-2.6-1.6-4.2-1.6c-3.4,0-6.1,2.7-6.1,6.1c0,0.1,0,0.3,0,0.4c-3.8-0.4-7.3-2.3-9.6-5.3L12.9,14l-0.5,0.9
                                            c-0.6,0.9-0.8,2-0.8,3.1c0,1.1,0.3,2.1,0.8,3l-0.8-0.4v1.2c0,1.7,0.7,3.4,2,4.5L13,26.3l0.4,1.1c0.6,1.8,2,3.3,3.8,3.9
                                            c-1.4,0.8-3.1,1.2-4.7,1.2c-0.5,0-0.8,0-1.2-0.1l-3.1-0.4l2.6,1.7c2.6,1.7,5.6,2.5,8.6,2.5c6,0,9.8-2.8,11.9-5.2
                                            c2.6-3,4.1-6.9,4.1-10.8c0-0.1,0-0.2,0-0.3c1-0.8,1.8-1.7,2.5-2.7l1.4-2.1L37,16.2z M33.9,19.7c0,0.2,0,0.4,0,0.6v0
                                            c0,9.1-7.4,14.5-14.5,14.5c-1.8,0-3.6-0.3-5.3-1c2-0.3,3.9-1.1,5.5-2.3l1.6-1.3l-2,0c-1.6,0-3-0.9-3.9-2.2c0.5,0,1-0.1,1.4-0.2
                                            l3.1-0.8l-3.1-0.6c-1.7-0.4-3.1-1.7-3.6-3.5c0.5,0.1,1,0.2,1.5,0.3l2.6,0.1L15,21.9C13.7,21,13,19.6,13,18c0-0.5,0.1-0.9,0.2-1.4
                                            c2.8,3,6.7,4.8,10.8,5l0.9,0l-0.2-0.9c-0.1-0.4-0.1-0.7-0.1-1.1c0-2.6,2.1-4.6,4.6-4.6c1.3,0,2.5,0.5,3.4,1.5l0.3,0.3l0.4-0.1
                                            c0.5-0.1,1-0.2,1.4-0.4c-0.3,0.3-0.6,0.5-0.9,0.7L31,18.8l3.3-0.4c0.3,0,0.5-0.1,0.8-0.1c-0.3,0.3-0.6,0.5-0.9,0.7l-0.3,0.2
                                            L33.9,19.7z"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urldecode($postURL) ?>" class="share_toolbox--btn share_toolbox--linkedin">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve">
                                            <path class="stStroke" d="M16.7,18.5h-4.5c-0.5,0-0.9,0.4-0.9,0.9v17.1c0,0.5,0.4,0.9,0.9,0.9h4.5c0.5,0,0.9-0.4,0.9-0.9V19.4
                                                C17.6,18.9,17.2,18.5,16.7,18.5 M16,35.9h-3.2V20.1H16V35.9z"/>
                                            <path class="stStroke" d="M14.4,10.5c-1.8,0-3.2,1.4-3.2,3.2c0,1.8,1.4,3.2,3.2,3.2c1.8,0,3.2-1.4,3.2-3.2C17.6,12,16.2,10.5,14.4,10.5
                                                M14.4,15.4c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C16,14.7,15.3,15.4,14.4,15.4"/>
                                            <path class="stStroke" d="M32.3,20.5c-1.1-0.9-2.5-1.4-3.9-1.4c-0.9,0-1.7,0.2-2.5,0.6v-0.4c0-0.5-0.4-0.9-0.9-0.9h-4.6
                                                c-0.5,0-0.9,0.4-0.9,0.9v17.2c0,0.5,0.4,0.9,0.9,0.9h4.7c0.4,0,0.8-0.4,0.8-0.8V26.4c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.7,0.7,1.7,1.6
                                                v10.3c0,0.4,0.3,0.8,0.8,0.8h4.5c0.4,0,0.8-0.3,0.8-0.8v-10C35.2,24.3,34.1,22.1,32.3,20.5 M33.6,35.9h-2.9v-9.5
                                                c0-1.8-1.4-3.2-3.2-3.2c-1.8,0-3.2,1.4-3.2,3.2v9.5h-3.2V20.1h3.2v1.1c0,0.2,0.1,0.4,0.2,0.5c0.3,0.3,0.8,0.4,1.1,0.1
                                                c0.8-0.7,1.8-1.1,2.8-1.1c1,0,2.1,0.3,2.8,1c1.5,1.2,2.3,3.1,2.3,5V35.9z"/>
                                        </svg>
                                    </a>
                                </div> 
                            </header><!-- .entry-header -->
                        </div>
                        <div class="col-md-6">
                            <?php echo get_the_post_thumbnail( $post->ID, 'thumbnailQuad', array('class' => 'img-center img-fluid') ); ?>
                        </div>
                    </div>
                </div>
                <div class="padding-large">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                            <footer class="entry-footer">
                                <?php understrap_entry_footer(); ?>
                            </footer><!-- .entry-footer -->
                        </div>
                    </div>
                </div>
                

                <?php 
                    $nextPost = get_next_post(true);
                    if($nextPost) : 
                ?>
                    <div class="next-content padding-large--bottom">
                        <div class="nav-box next">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php 
                                        $nextPostURL = esc_url( get_permalink($nextPost->ID) ); 
                                        $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'thumbnailQuad', array('class' => 'img-center img-fluid') ); 
                                    ?>
                                    <a href="<?php echo $nextPostURL; ?>">
                                        <?php echo $nextthumbnail; ?>
                                    </a>
                                </div>
                                <div class="col-md-6 align-self-center text-center">
                                    <div class="label-next--wrapper"><strong class="label-next">Siguiente</strong></div>
                                    <ul class="post-categories">
                                    <?php
                                        // get top level terms
                                        $parents = get_terms( 'category', array( 'parent' => 0 ) );
                                        $hasParentsCategories = false;

                                        // get post categories
                                        $categories = get_the_terms( $nextPost->ID, 'category' );
                                        // output top level cats and their children
                                        foreach( $parents as $parent ):
                                            // output parent name and link
                                            //echo '<li><a href="' . get_term_link( $parent ) . '">' . $parent->name . '</a></li>: ';
                                            // initialize array to hold child links
                                            $links = array();
                                            foreach( $categories as $category ):
                                                if( $parent->term_id == $category->parent ):
                                                    // put link in array
                                                    $links[] = '<li><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></li>';
                                                    $hasParentsCategories = true;
                                                endif;
                                            endforeach;
                                            // join and output links with separator
                                            echo join( ', ', $links );
                                        endforeach;

                                        if(!$hasParentsCategories) :
                                            foreach( $categories as $category ):
                                                    echo '<li><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></li>';
                                            endforeach;
                                        endif;
                                    ?>
                                    </ul>
                                    <h3 class="text-center"><a href="<?php echo $nextPostURL; ?>"><?php echo get_the_title($nextPost->ID); ?></a></h3>
                                    <?php $authorNext = get_the_author(); ?>
                                    <p class="text-center">By <?php echo $authorNext; ?> 
                                </div>
                            </div>
                        </div>
                    </div><!-- .next-content -->
                <?php 
                    endif;
                ?>
            </article><!-- #post-## -->
            
            <?php
            $termsRelated = get_the_terms( $post->ID , array( 'category') );
		    $termsRelatedList = '';
		    $actualPost = $post->ID;
            if ($nextPost->ID) :
                $arrayRemovePostsID = array($nextPost->ID, $post->ID );
            else :
                $arrayRemovePostsID = array($post->ID );
            endif;
		    // init counter
		    $i = 1;
            foreach ( $termsRelated as $termRelated ) {
                $term_link = get_term_link( $termRelated, array( 'category') );
                if( is_wp_error( $term_link ) )
                continue;
                $termsRelatedList = $termsRelatedList.$termRelated->name;
                //  Add comma (except after the last theme)
                echo ($i < count($termsRelated))? " / " : "";
                // Increment counter
                $i++;
            }

            $related = new WP_Query(
                array(
                    'post_type' => 'post',
                    //'category__in'   => wp_get_post_categories( $post->ID ),
                    'posts_per_page' => 6,
                    'post__not_in'   => $arrayRemovePostsID,
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'category', // the custom vocabulary
                                'field'    => 'name',          // term_id, slug or name  (Define by what you want to search the below term)    
                                'terms'    => array($termsRelatedList),      // provide the term slugs
                            ),
                        ),
                )
            );

            if( $related->have_posts() ) : 
            ?>

                <section id="related-products" class="padding-large">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <h3 class="title-related">
                                    Más sobre 
                                    <?php
                                    $termsAcabados = get_the_terms(get_the_id(), 'category', array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ));
                                    if ( ! empty( $termsAcabados ) && ! is_wp_error( $termsAcabados ) ) {
                                        foreach($termsAcabados as $termsAcabado) {
                                            echo '<strong class="title-related--name">'.$termsAcabado->name.'</strong>';
                                        }
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slick-related">
                                    <div class="slick-posts--style2">
                                        <?php
                                            while( $related->have_posts() ) : 
                                                $related->the_post(); 
                                                ?>
                                                <div class="slick-item">
                                                    <?php get_template_part( 'loop-templates/content-card--post-default' ); ?>
                                                </div>
                                                <?php
                                            endwhile;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            wp_reset_postdata();
                        ?>
                    </div>
                </section>
            <?php endif; ?>

        </div>
    </div>
</div>
