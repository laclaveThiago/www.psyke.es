<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="error-404-wrapper" class="hero-pages has-overlay hero-contact--wrapper" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/assets/bg-contact.jpg' ; ?>');">
    <div class="hero-page-content hero-terapias hero-thank-you">
        <div class="hero-page-inner" style="padding-top: 132px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title text-hero text-hero-01" style="color:#fff;"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>

                        <main class="site-main" id="main" role="main">
                            <div class="box-contact">
                                <div class="padding--inner">
                                    <p class="lead" style="color: #212121;"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?></p>
                                    <div class="form-404"><?php get_search_form(); ?></div>
                                    <div class="fast-links">
                                        <ul class="menu-badge">
                                            <li><a class="badge-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?p=37">Terapias</a></li>
                                            <li><a class="badge-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?p=41">Formación</a></li>
                                            <li><a class="badge-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?p=43">Retiros</a></li>
                                            <li><a class="badge-link" href="<?php echo esc_url( home_url( '/' ) ); ?>blog">Lunes Mindful</a></li>
                                            <li><a class="badge-link" href="<?php echo esc_url( home_url( '/' ) ); ?>meditaciones">Meditaciones</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </main><!-- #main -->

                    </div>    
                </div>    
            </div>
        </div>
        
    </div>
</div>

<?php
get_footer();
