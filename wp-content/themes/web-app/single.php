<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web-app
 */

get_header();
?>
<div class="container">

	<div class="row">

		 <?php

   	       global $post;

			$sidebar = get_post_meta($post->ID, 'web_app_sidebar_layout', true);

			$custom_class = 'custom-col-8';
			if( 'sidebar-no' == $sidebar || '' == $sidebar ){
				$custom_class = 'custom-col-12';
			} elseif ( 'sidebar-both' == $sidebar ) {
				$custom_class = 'custom-col-4';
			}else{
				$custom_class = 'custom-col-8';
			}
			if($sidebar=='sidebar-both' || $sidebar=='sidebar-left'){
				get_sidebar( 'left' );
			}
			
		?> 

		<div id="primary" class="content-area <?php echo esc_attr( $custom_class );?> ">

			<main id="main" class="site-main">
	 
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->

		</div><!-- #primary -->

  		<?php  get_sidebar(); ?>

	</div>

</div>	

<?php get_footer(); ?>
 