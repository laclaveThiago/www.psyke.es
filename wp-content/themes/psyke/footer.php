<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

</div><!-- #page we need this extra closing tag here -->

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">
    <footer class="site-footer padding-large" id="colophon">

        <div class="site-info">

            <div class="container">
                <div class="padding-large--bottom">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="suscribe-text">
                                <h4>¡Suscríbete al blog!</h4>
                                <p>para estar al día de todas nuestras Reflexiones Terapéuticas</p>
                            </div>
                        </div>
                        <div class="col-md-7 align-self-center">
                            <div class="tnp tnp-subscription">
                                <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="categories-footer-blog">
                <div class="categories--inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="category-footer-list">
                                    <div class="category-item">
                                        <ul>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-autoestima/">Autoestima</a>
                                                <ul>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-autoestima/articulos-terapueticos-autocompasion/">Autocompasión</a></li>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-autoestima/articulos-terapeuticos-amor/">Amor</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category-item">
                                        <ul>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-desarrollo-personal/">Desarrollo personal</a>
                                                <ul>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-desarrollo-personal/articulos-terapueticos-crecimiento-personal/">Crecimiento Personal</a></li>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-desarrollo-personal/articulos-terapeuticos-autorrealizacion/">Autorrealización</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category-item">
                                        <ul>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-emociones/">Emociones</a>
                                                <ul>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-emociones/articulos-terapeuticos-educacion-emocional/">Educación Emocional</a></li>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-emociones/articulos-terapeuticos-inteligencia-emocional/">Inteligencia Emocional</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category-item">
                                        <ul>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-mente/">Mente</a>
                                                <ul>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-mente/articulos-terapeuticos-entrenamiento-mental/">Entrenamiento Mental</a></li>
                                                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-mente/articulos-terapueticos-pensamientos/">Pensamientos</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category-item">
                                        <ul>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>category/reflexiones-terapeuticas-ansiedad-estres/">Ansiedad - Estrés</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <a class="navbar-brand navbar-brand--footer" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 360 130" style="enable-background:new 0 0 360 130;" xml:space="preserve">
                                <g class="psyke-logo">
                                    <circle class="smile-base" cx="40.9" cy="40.9" r="40.9"/>
                                    <g class="smile-group">
                                        <path d="M40.1,64.8c-6,0.1-12.2-1.2-18.1-4c-0.6-0.3-1.1-0.5-1.6-0.9c-0.6-0.4-0.9-1-0.6-1.8c0.4-0.8,1-1.1,1.9-0.8
                                            c0.3,0.1,0.5,0.2,0.7,0.4c11.9,5.7,23.8,5.4,35.8,0.5c0.6-0.2,1.1-0.5,1.7-0.8c0.8-0.3,1.5-0.2,1.9,0.6c0.4,0.7,0.1,1.5-0.7,2.1
                                            c-0.4,0.2-0.9,0.4-1.3,0.6C53.7,63.5,47.2,64.8,40.1,64.8z"/>
                                        <path d="M25.9,37.9c-3-0.1-5.6-1-7.9-3c-0.4-0.3-0.8-0.7-0.9-1.1c-0.1-0.5,0-1.3,0.3-1.6s1.1-0.3,1.6-0.2c0.4,0.1,0.8,0.6,1.1,0.9
                                            c3.6,2.7,8,2.7,11.6,0c0.3-0.2,0.6-0.5,1-0.8c0.7-0.5,1.4-0.5,2,0.2s0.5,1.4-0.1,2c-0.3,0.3-0.7,0.7-1.1,1
                                            C31.3,37.1,28.8,37.9,25.9,37.9z"/>
                                        <path d="M57.3,37.9c-3.5-0.1-5.9-0.9-8-2.6c-0.4-0.3-0.9-0.7-1.1-1.2c-0.2-0.4-0.2-1.2,0.1-1.5c0.4-0.4,1-0.4,1.6-0.5
                                            c0.3,0,0.6,0.3,0.8,0.5c3.2,3,8.3,3,11.6,0c0.1,0,0.1-0.1,0.2-0.1c1-0.7,1.8-0.7,2.3,0c0.6,0.7,0.5,1.5-0.5,2.3
                                            c-0.9,0.7-1.8,1.5-2.9,1.9C59.9,37.3,58.2,37.6,57.3,37.9z"/>
                                    </g>
                                </g>
                                <g class="psyke-type">
                                    <g>
                                        <path class="st1" d="M110.2,118.1c1.3-1.3,2.9-2,4.8-2c1.2,0,2.4,0.3,3.1,0.6c0.7,0.3,1.3,0.7,1.5,0.9l0.2,0.2l-0.7,1
                                            c-0.1-0.1-0.2-0.2-0.7-0.5c-0.3-0.2-0.6-0.3-0.8-0.5c-0.6-0.2-1.6-0.5-2.5-0.5c-1.6,0-2.8,0.5-3.9,1.6c-1,1.1-1.5,2.4-1.5,4
                                            s0.5,3,1.5,4.1s2.3,1.7,3.9,1.7c2.1,0,3.7-1.1,4.1-1.6l0.2-0.2l0.8,0.9c-0.1,0.1-0.2,0.2-0.9,0.7c-0.3,0.2-0.7,0.5-1,0.6
                                            c-0.7,0.4-2,0.7-3.2,0.7c-2,0-3.6-0.7-4.8-2c-1.3-1.3-1.9-3-1.9-5C108.3,121,108.9,119.4,110.2,118.1z"/>
                                        <path class="st1" d="M124.3,129.7v-13.4h7.5v1.2h-6.2v4.9h5.1v1.2h-5.1v5h6.6v1.2L124.3,129.7L124.3,129.7z"/>
                                        <path class="st1" d="M136.4,129.7v-13.4h1.3l6.8,9.6l1.1,1.8l0,0c-0.1-0.7-0.1-1.3-0.1-1.8v-9.6h1.3v13.4h-1.3l-6.8-9.6l-1.1-1.8
                                            l0,0c0.1,0.7,0.1,1.3,0.1,1.8v9.6H136.4z"/>
                                        <path class="st1" d="M155,129.7v-12.2h-4.8v-1.2h10.9v1.2h-4.8v12.2H155z"/>
                                        <path class="st1" d="M164.5,129.7v-13.4h4c1.1,0,2,0.1,2.5,0.4c1.3,0.6,2,1.8,2,3.4c0,1.8-1,3.2-2.5,3.6l0,0
                                            c0.1,0.1,0.2,0.3,0.3,0.5l2.9,5.4h-1.5l-3-5.6h-3.4v5.6h-1.3V129.7z M165.8,122.9h3.2c1.6,0,2.6-1,2.6-2.7c0-1.1-0.4-1.9-1.2-2.3
                                            c-0.4-0.2-1-0.3-1.9-0.3h-2.7L165.8,122.9L165.8,122.9z"/>
                                        <path class="st1" d="M178.8,118.1c1.3-1.3,2.9-2,4.8-2s3.5,0.7,4.8,2s2,2.9,2,4.8c0,2-0.7,3.6-2,5c-1.3,1.3-2.9,2-4.8,2
                                            c-1.9,0-3.5-0.7-4.8-2s-2-3-2-5C176.8,121.1,177.5,119.5,178.8,118.1z M179.8,127.1c1,1.1,2.3,1.7,3.9,1.7c1.5,0,2.8-0.6,3.8-1.7
                                            c1.1-1.1,1.6-2.5,1.6-4.1s-0.5-2.9-1.6-4c-1-1.1-2.3-1.6-3.8-1.6s-2.8,0.5-3.9,1.6c-1,1.1-1.6,2.4-1.6,4
                                            C178.2,124.6,178.7,126,179.8,127.1z"/>
                                        <path class="st1" d="M201.1,129.7v-13.4h4.3c2,0,3.6,0.6,4.9,1.8c1.2,1.2,1.8,2.8,1.8,4.9s-0.6,3.7-1.8,4.9s-2.8,1.8-4.9,1.8
                                            H201.1z M202.4,128.6h2.9c3.3,0,5.5-2,5.5-5.5s-2.1-5.5-5.5-5.5h-2.9V128.6z"/>
                                        <path class="st1" d="M216.4,129.7v-13.4h7.5v1.2h-6.2v4.9h5.1v1.2h-5.1v5h6.6v1.2L216.4,129.7L216.4,129.7z"/>
                                        <path class="st1" d="M235,129.7v-13.4h4.6c1.2,0,2.2,0.4,3,1.1s1.2,1.7,1.2,2.9c0,1.2-0.4,2.2-1.2,3c-0.8,0.7-1.7,1.1-3,1.1h-3.3
                                            v5.2H235V129.7z M236.3,123.3h3.1c1.8,0,2.9-1.1,2.9-2.9s-1.1-2.8-2.9-2.8h-3.2L236.3,123.3L236.3,123.3z"/>
                                        <path class="st1" d="M246.6,128.3l0.8-1c0.1,0.1,0.2,0.2,0.6,0.5c0.6,0.4,1.6,0.9,2.9,1c1.5,0,2.7-0.9,2.7-2.3
                                            c0-1.2-1-2.1-2.4-2.6c-1.9-0.8-4.4-1.7-4.3-4c0-1,0.4-1.8,1.2-2.5s1.8-1.1,3-1.1c0.7,0,1.3,0.1,1.9,0.3s1,0.4,1.3,0.6l0.4,0.3
                                            l-0.6,1.1c-0.1-0.1-0.2-0.2-0.4-0.3c-0.2-0.1-0.5-0.3-1-0.5s-1-0.3-1.5-0.3c-0.8,0-1.5,0.2-2,0.7s-0.8,1-0.8,1.6
                                            c0,1.2,1,1.9,2.3,2.5c1.9,0.7,4.4,1.6,4.3,4.2c0,1-0.4,1.9-1.1,2.6c-0.7,0.7-1.7,1-2.9,1c-0.8,0-1.6-0.1-2.3-0.4
                                            c-0.7-0.3-1.2-0.6-1.5-0.9L246.6,128.3z"/>
                                        <path class="st1" d="M259.1,129.7v-13.4h1.3v13.4H259.1z"/>
                                        <path class="st1" d="M266.6,118.1c1.3-1.3,2.9-2,4.8-2c1.2,0,2.4,0.3,3.1,0.6c0.7,0.3,1.3,0.7,1.5,0.9l0.2,0.2l-0.7,1
                                            c-0.1-0.1-0.2-0.2-0.7-0.5c-0.3-0.2-0.6-0.3-0.8-0.5c-0.6-0.2-1.6-0.5-2.5-0.5c-1.6,0-2.8,0.5-3.9,1.6c-1,1.1-1.5,2.4-1.5,4
                                            s0.5,3,1.5,4.1s2.3,1.7,3.9,1.7c2.1,0,3.7-1.1,4.1-1.6l0.2-0.2l0.8,0.9c-0.1,0.1-0.2,0.2-0.9,0.7c-0.3,0.2-0.7,0.5-1,0.6
                                            c-0.7,0.4-2,0.7-3.2,0.7c-2,0-3.6-0.7-4.8-2c-1.3-1.3-1.9-3-1.9-5C264.7,121,265.4,119.4,266.6,118.1z"/>
                                        <path class="st1" d="M281.7,118.1c1.3-1.3,2.9-2,4.8-2s3.5,0.7,4.8,2s2,2.9,2,4.8c0,2-0.7,3.6-2,5c-1.3,1.3-2.9,2-4.8,2
                                            s-3.5-0.7-4.8-2s-2-3-2-5C279.7,121.1,280.4,119.5,281.7,118.1z M282.7,127.1c1,1.1,2.3,1.7,3.9,1.7c1.5,0,2.8-0.6,3.8-1.7
                                            c1.1-1.1,1.6-2.5,1.6-4.1s-0.5-2.9-1.6-4c-1-1.1-2.3-1.6-3.8-1.6s-2.8,0.5-3.9,1.6c-1,1.1-1.6,2.4-1.6,4
                                            C281.1,124.6,281.6,126,282.7,127.1z"/>
                                        <path class="st1" d="M297.6,129.7v-13.4h1.3v12.2h6.2v1.2H297.6z"/>
                                        <path class="st1" d="M309.2,118.1c1.3-1.3,2.9-2,4.8-2s3.5,0.7,4.8,2s2,2.9,2,4.8c0,2-0.7,3.6-2,5c-1.3,1.3-2.9,2-4.8,2
                                            s-3.5-0.7-4.8-2s-2-3-2-5C307.2,121.1,307.9,119.5,309.2,118.1z M310.2,127.1c1,1.1,2.3,1.7,3.9,1.7c1.5,0,2.8-0.6,3.8-1.7
                                            c1.1-1.1,1.6-2.5,1.6-4.1s-0.5-2.9-1.6-4c-1-1.1-2.3-1.6-3.8-1.6s-2.8,0.5-3.9,1.6c-1,1.1-1.6,2.4-1.6,4
                                            C308.6,124.6,309.1,126,310.2,127.1z"/>
                                        <path class="st1" d="M326.1,118.2c1.3-1.3,2.9-2,4.8-2c0.9,0,1.8,0.1,2.5,0.4c0.8,0.2,1.4,0.5,1.7,0.8l0.5,0.4l-0.7,1
                                            c-0.1-0.1-0.3-0.2-0.5-0.4c-0.2-0.2-0.7-0.3-1.4-0.6c-0.7-0.2-1.4-0.4-2.1-0.4c-1.6,0-2.9,0.6-3.9,1.6s-1.5,2.4-1.5,4
                                            c0,1.7,0.5,3,1.5,4.1s2.3,1.6,3.8,1.6c0.8,0,1.5-0.2,2.2-0.5s1.2-0.7,1.5-1l0.5-0.5v-2.3h-2.3v-1.2h3.5v6.4H335v-1V128l0,0
                                            c-0.1,0.1-0.2,0.2-0.7,0.6c-0.3,0.2-0.6,0.4-0.9,0.6c-0.6,0.3-1.7,0.6-2.7,0.6c-1.8,0-3.4-0.7-4.7-2c-1.3-1.3-1.9-3-1.9-4.9
                                            C324.2,121.1,324.9,119.5,326.1,118.2z"/>
                                        <path class="st1" d="M340.8,129.7v-13.4h1.3v13.4H340.8z M340.8,115.5l1.3-2.3h1.5l-1.6,2.3H340.8z"/>
                                        <path class="st1" d="M355.4,129.7l-1.5-4.3h-5.4l-1.5,4.3h-1.4l4.9-13.4h1.4l4.9,13.4H355.4z M351.2,117.8L351.2,117.8
                                            c-0.2,0.7-0.4,1.3-0.6,1.7l-1.8,4.8h4.6l-1.7-4.8L351.2,117.8z"/>
                                    </g>
                                    <g>
                                        <path class="st2" d="M148.7,41.2c-3.4-2.1-7.3-3.1-11.6-3.1c-7.3,0-13,3-16.9,9c0-0.9-0.1-1.8-0.3-2.8c-0.7-3.7-2.6-5.5-5.9-5.5
                                            c-0.9,0-1.8,0.1-2.5,0.4c-0.7,0.3-1.1,0.5-1.1,0.7v62.5c0,3.1,1.5,4.7,4.4,4.7h1.1c2.9,0,4.4-1.6,4.4-4.7V79.8
                                            c1.5,2.6,3.6,4.8,6.5,6.5c2.9,1.7,6.2,2.6,10,2.6c4.4,0,8.3-1.1,11.8-3.2s6.2-5.1,8.1-9c1.9-3.9,2.9-8.3,2.9-13.2
                                            c0-5-1-9.4-2.9-13.3C154.8,46.2,152.1,43.3,148.7,41.2z M145.8,75.8c-2.8,3.1-6.4,4.7-10.9,4.7c-2.7,0-5.1-0.6-7.4-1.9
                                            c-2.3-1.2-4.1-2.9-5.4-5.1c-1.3-2.1-2-4.5-2-7.2v-10c1.3-3.1,3.2-5.6,5.8-7.4c2.6-1.8,5.7-2.7,9.3-2.7c2.9,0,5.4,0.7,7.7,2.2
                                            c2.2,1.5,4,3.5,5.3,6.1s1.9,5.5,1.9,8.8C150,68.6,148.6,72.7,145.8,75.8z"/>
                                        <path class="st2" d="M196.9,61.7c-2.4-0.9-5.3-1.7-8.9-2.4c-3.1-0.7-5.5-1.3-7.1-1.8s-2.8-1.2-3.7-2s-1.3-2-1.3-3.4c0-2.1,0.9-3.7,2.7-4.9
                                            s4.4-1.8,7.7-1.8c2.9,0,5.6,0.6,8.1,1.9c2.5,1.2,4.5,2.9,6,5c0.1,0.1,0.4,0,1.2-0.4c0.7-0.4,1.4-1,2-1.7s0.9-1.6,0.9-2.5
                                            c0-1.2-0.4-2.3-1.2-3.4c-1.3-1.9-3.4-3.4-6.4-4.6c-3-1.2-6.6-1.8-11-1.8c-5.8,0-10.5,1.4-14,4.2s-5.3,6.4-5.3,11
                                            c0,3.1,0.9,5.6,2.6,7.5c1.7,1.9,3.7,3.2,6,4.1c2.3,0.9,5.1,1.6,8.4,2.3c3.3,0.7,5.8,1.3,7.3,1.8s2.8,1.2,3.7,2.1s1.4,2.1,1.4,3.7
                                            c0,2-0.9,3.6-2.8,4.8c-1.8,1.2-4.5,1.8-7.9,1.8c-3.6,0-6.8-0.7-9.5-2s-5-3.1-6.7-5.3c-0.1-0.1-0.5,0.1-1.2,0.5s-1.3,0.9-1.9,1.6
                                            c-0.6,0.7-0.9,1.5-0.9,2.5s0.3,2,1,3.1s1.6,2,2.8,2.9c1.8,1.3,4.1,2.3,6.9,3.1c2.8,0.8,6,1.2,9.6,1.2c6.2,0,11.1-1.4,14.7-4.1
                                            c3.6-2.7,5.4-6.4,5.4-11c0-3.2-0.9-5.8-2.7-7.7C201.4,64,199.3,62.6,196.9,61.7z"/>
                                        <path class="st2" d="M257.4,40.5c-0.5-0.4-1.2-0.8-2.1-1.2c-0.8-0.4-1.7-0.6-2.5-0.6c-2.9,0-5,1.9-6.2,5.8l-11.5,33.1l-13-33.3
                                            c-0.8-2.1-1.7-3.5-2.7-4.4c-1-0.8-2.2-1.3-3.7-1.3c-1,0-1.9,0.2-2.7,0.6c-0.8,0.4-1.4,0.8-1.9,1.3s-0.7,0.9-0.6,1.1l9.5,22.2l0,0
                                            l10.4,24.4l-6.5,15.9c-0.1,0.2,0.1,0.5,0.7,1c0.5,0.4,1.2,0.8,2,1.2c0.8,0.4,1.7,0.6,2.6,0.6c2.7,0,4.8-1.8,6.1-5.5l22.7-60
                                            C258.1,41.3,257.9,41,257.4,40.5z"/>
                                        <path class="st2" d="M285.4,62l17.5-19.3c0.1-0.2,0-0.6-0.4-1.3s-1-1.3-1.9-1.8c-0.8-0.5-1.8-0.8-2.9-0.8c-2.1,0-4.1,1.1-5.9,3.4l-16.7,18.7
                                            V27.2c0-3.1-0.6-5.3-1.8-6.6c-1.2-1.3-2.7-1.9-4.5-1.9c-0.9,0-1.8,0.1-2.5,0.4s-1.1,0.5-1.1,0.7v63.4c0,3.1,1.5,4.7,4.4,4.7h1.1
                                            c2.9,0,4.4-1.6,4.4-4.7V63.9l19.1,20.6c1.8,2.3,3.8,3.4,5.9,3.4c1.1,0,2-0.3,2.9-0.9s1.5-1.2,2-1.9c0.5-0.7,0.6-1.1,0.5-1.3
                                            L285.4,62z"/>
                                        <path class="st2" d="M354.7,49.7c-1.9-3.7-4.6-6.5-8.1-8.6c-3.5-2-7.5-3.1-12.1-3.1c-4.7,0-8.9,1.1-12.6,3.3s-6.7,5.3-8.8,9.2
                                            c-2.1,3.9-3.2,8.3-3.2,13.1c0,4.9,1.1,9.3,3.2,13.1c2.1,3.8,5.1,6.8,9,8.9c3.8,2.1,8.3,3.2,13.3,3.2c6,0,11.1-1.3,15.2-3.9
                                            c1.7-1.1,3-2.2,3.9-3.5s1.4-2.4,1.4-3.5c0-1.3-0.4-2.3-1.2-3.1c-0.8-0.8-1.6-1.3-2.5-1.6s-1.4-0.4-1.6-0.2
                                            c-1.4,2.5-3.3,4.4-5.7,5.9c-2.4,1.4-5.5,2.2-9.4,2.2c-4.3,0-7.9-1.2-10.8-3.6s-4.7-5.6-5.5-9.5c-0.1-0.8-0.2-1.4-0.2-1.8h35.6
                                            c1.1,0,1.9-0.2,2.4-0.7c0.4-0.4,0.7-1.2,0.7-2.3v-0.8C357.6,57.6,356.7,53.4,354.7,49.7z M319.2,59.3c0.6-4,2.3-7.3,5.1-9.9
                                            c2.8-2.6,6.2-3.9,10.1-3.9c4,0,7.2,1.2,9.6,3.7s3.7,5.8,4,10L319.2,59.3L319.2,59.3z"/>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <p class="footer-tagline">Centro de Psicología General Sanitaria autorizado por la Conselleria de Sanidad (n&deg;13619/2013)</p>
                    </div>
                    <div class="col-md-4">
                        <?php
							wp_nav_menu(
								array(
									'theme_location'  => 'menu_footer_footer',
									'container_class' => 'navbar-footer',
									'container_id'    => 'navbarFooter',
									'menu_class'      => 'navbar',
									'fallback_cb'     => '',
									'menu_id'         => 'menu_footer_footer',
									'depth'           => 1,
									'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
						?>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info contact-info--footer">
                            <?php
                                $phone1 = get_option('address_cod_phone1', '') . get_option('address_phone1', '');
                                //$phone2 = get_option('address_cod_phone2', '') . get_option('address_phone2', '');
                                $phone1 = preg_replace('/\s+/', '', $phone1);
                                //$phone2 = preg_replace('/\s+/', '', $phone2);
                            ?>
                            <p><a href="tel:<?php echo $phone1; ?>"><?php echo get_option('address_phone1', ''); ?></a></p>
                            <p><a href="mailto:psyke@psyke.es">psyke.es</a></p>
                            <?php echo do_shortcode('[web_social_media]'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- wrapper end -->

    <div class="search--wrapper" style="display: none;">
        <div class="search--inner">
            <div class="search--row">
                <p class="text-right">
                    <a class="javascript:void(0);" id="triggerCloseSearchForm">
                        <svg class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                    </a>
                </p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <div id="insertModal"></div>
    <div id="insertModalCourses"></div>
</body>

</html>

