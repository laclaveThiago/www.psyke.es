<?php
/**
 * The template for displaying search results pages
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">
	<div id="content" tabindex="-1">
		
			<main class="site-main" id="main">
                <div class="hero-pages hero-search has-overlay" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/assets/bg-contact.jpg);">
                    <div class="hero-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <header class="page-header padding-large">
                                        <h1 class="page-title text-center">
                                            <?php
                                            printf(
                                                /* translators: %s: query term */
                                                esc_html__( 'Search Results for: %s', 'understrap' ),
                                                '<span>' . get_search_query() . '</span>'
                                            );
                                            ?>
                                        </h1>
                                    </header><!-- .page-header -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="padding-large">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <?php if ( have_posts() ) : ?>
                                    <div class="padding-large grid-masonry--container">
                                        <div class="grid-masonry">
                                            <div class="grid-sizer"></div>
                                            <?php
                                                /* Start the Loop */
                                                while ( have_posts() ) :
                                                    the_post();
                                                    /*
                                                    * Run the loop for the search to output the results.
                                                    * If you want to overload this in a child theme then include a file
                                                    * called content-search.php and that will be used instead.
                                                    */
                                                    echo '<div class="grid-item">';
                                                    get_template_part( 'loop-templates/content', 'search' );
                                                    echo '</div>';
                                                endwhile;
                                            ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

			</main><!-- #main -->
			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

	</div><!-- #content -->
</div><!-- #search-wrapper -->
<?php
get_footer();
