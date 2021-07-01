<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="hero-pages hero-blog" style="background-color: #efecea;">
    <div class="hero-inner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="title-hero text-center">Meditaciones</h2>
                    <p class="text-center text-dark-gray">Cada vez que nos sentamos durante unos minutos a meditar, cultivamos nuestra capacidad de estar más presentes. Aprendemos a calmar nuestra mente y soltar aquello en lo que se ha detenido. A través de la práctica diaria de Mindfulness vamos consolidando la potencia de nuestra atención, para llevarla a lo que de verdad importa.</p>
                </div>    
            </div>    
        </div>
        <section class="bottom-text">
            <div class="bottom-text--inner">
                <p class="text-center">ENCUENTRA TU MOMENTO Y TU LUGAR PARA MEDITAR</p>
            </div>
        </section>
    </div>
</div>


<div class="wrapper bg-white" id="wrapper-meditaciones">

		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="sr-only">
				<?php 
					$showPost = false;
					if( get_post_meta( get_the_id(), 'numberMeditation', true) ) :
						if(get_post_meta(get_the_id(), 'numberMeditation', true) < 15):
							$showPost = true;
						endif;		
					endif;
				
					if($showPost):
						echo 'Free content - Enjoy! - meditation < 15';
					else:
						echo 'meditation > 15';
						if ( is_user_logged_in() ) :
							echo 'logged user - show post';
						else:
							echo 'Only for logged users - Login/Create account';
						endif;
					endif;
				?>
			</div>
				<section class="main-content--product padding-large">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="d-flex audio-flex">
									<?php  if (has_post_thumbnail()) : ?>
										<div class="audio-image">
											<?php the_post_thumbnail( 'thumbnailQuad', array( 'class' => 'img-fluid img-rounded' ) );  ?>
										</div>
									<?php  endif; ?>
									<div class="audio-content">
										<h1><?php the_title(); ?></h1>
										<p><strong class="meditation-time"><span class="icon-clock icon-awesome"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-clock fa-w-16"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" class=""></path></svg></span> <?php if( get_post_meta( get_the_id(), 'timeMeditation', true) ) :  echo get_post_meta( get_the_id(), 'timeMeditation', true);  endif; ?></strong></p>
										<div class="padding-regular">
											<?php the_content(); ?>
										</div>
										<?php 
											if( get_post_meta( get_the_id(), 'descriptionMeditation', true) ) :
												echo do_shortcode(get_post_meta(get_the_id(), 'descriptionMeditation', true)); 
											endif;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</article>

		<?php endwhile; // end of the loop. ?>



		<!-- Lasts Posts-->     
		<?php 
		$meditaciones = new WP_Query(
			array(
				'post_type'   => 'meditaciones',
				'posts_per_page' => 8,
				'post__not_in'   => array( $post->ID ),
			)
		);

		if( $meditaciones->have_posts() ) : 
		?>
		<section class="section-treatments"> 
		
			<div class="section-treatments--wp padding-large--bottom"> 
				<div class="section-treatments--inner"> 
			
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div class="padding-large--bottom">
									<h3 class="title-h1 text-primary title-icon title-icon--crown">Otras meditaciones</h3>
								</div>
							</div>
						</div><!-- row -->
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div class="slick-meditaciones">
									<?php
										while( $meditaciones->have_posts() ) : 
											$meditaciones->the_post(); 
												?>
												<div class="slick-item">
													<?php get_template_part( 'loop-templates/content-card--meditaciones' ); ?>
												</div>
												<?php
										endwhile;
										wp_reset_postdata();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>		


</div><!-- #single-wrapper -->



<?php get_footer();