<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

----------------------- category-cours-----------------------------
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?> <!--Y a-t-il eu un post?-->

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<div class="conteneur">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				 //echo $post->post_name;
				 

				if($post->post_name === "tim-111-environnement-professionnel" || $post->post_name === "tim-121-animation" || $post->post_name === "tim-122-image-numerique-1" || $post->post_name === "tim-131-design-graphique-1" || $post->post_name === "tim-141-initiation-a-la-programmation" || $post->post_name === "tim-151-creation-web"){
				?>

				<script type="text/javascript">
				/*	window.onload = function couleurParSession(){
						premiereSession = ["tim-111-environnement-professionnel", "tim-121-animation", "tim-122-image-numerique-1", "tim-131-design-graphique-1", "tim-141-initiation-a-la-programmation", "tim-151-creation-web"];
						let i = 0;
						for(i=0; i<premiereSession.length-1; i++){						
							document.getElementsByClassName("entry-title")[i].querySelectorAll("a")[i].classList.add("couleurParSession");
							console.log(i);
						}
					}*/
				</script>

				<?php
				}
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'titre-cours' );//exerpt = petit résumé -> affiche titres du cours

				// End the loop.
			endwhile;?>
			</div>
			<?php
			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();
		endif;
		?>
		
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
