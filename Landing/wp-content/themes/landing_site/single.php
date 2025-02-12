<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Landing_site
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		
			the_post_navigation(array(
				'prev_text' => '<span class="post-nav__prev">Prev</span><h2>%title</h2>',
				'next_text' => '<span class="post-nav__next">Next</span><h2>%title</h2>',
				'screen_reader_text' => 'Post navigation',
			));
			

			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			

		endwhile; // End of the loop.
		?>
		<?php
		if (have_comments()) : ?>
				<h3><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></h3>
				<ul class="comment-list">
					<?php wp_list_comments(); ?>
				</ul>
			<?php endif;?>
		

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
