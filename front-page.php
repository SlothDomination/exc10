<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen_enfant
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
/*----------FONRT-PAGE----------------*/
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<?php
			$args = array("category_name" => "nouvelles");

			// The Query
			$query1 = new WP_Query( $args );

			if ( $query1->have_posts() ) {
				// The Loop
				while ( $query1->have_posts() ) {
					$query1->the_post();
					echo '<div class="conteneur">';
						echo '<section class="section-nouvelles">';
							echo '<h3 class="h3-nouvelles">' . get_the_title() . '</h3>';
							echo '<p class="paragraphe-nouvelles">' . the_content() . '</p>';
						echo '</section>';
					echo '</div>';
				}
				
				/* Restore original Post Data 
				* NB: Because we are using new WP_Query we aren't stomping on the 
				* original $wp_query and it does not need to be reset with 
				* wp_reset_query(). We just need to set the post data back up with
				* wp_reset_postdata().
				*/
				wp_reset_postdata();
			}


			$args2 = array('category_name' => 'evenements');
			/* The 2nd Query (without global var) */
			$query2 = new WP_Query( $args2 );

			if ( $query2->have_posts() ) {
				// The 2nd Loop
				while ( $query2->have_posts() ) {
					$query2->the_post();
					echo '<div class="conteneur">';
						echo '<section class="section-evenements">';
							echo '<h3 class="h3-evenements">' . get_the_title( $query2->post->ID ) . '</h3>';
							echo '<p class="paragraphe-evenements">' . the_content() . '</p>';
						echo '</section>';
					echo '</div>';
				}

				// Restore original Post Data
				wp_reset_postdata();
			}

			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
