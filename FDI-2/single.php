<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Kastner
 * @since Kastner 1.0.0
 */
?>
<?php
get_header( 'page' );

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<h1>Single page</h1>
			<?php
		// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'all', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'kastner' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'kastner' ) . '</span> ' .
					'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'kastner' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'kastner' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				) );
			endwhile;
			?>

		</main>
	</div>
</div>


<?php get_footer( 'page' );
?>

