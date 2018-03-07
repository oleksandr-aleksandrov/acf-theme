<?php
/*
 * =============================================================================
 * Template Name: Page Template
 * Template Post Type: post, page, article, company, interview
 * =============================================================================
 */

get_header();

if ( have_rows( 'content_builder_row' ) ): ?>

<div id="content_builder">
	<div class="container">
		<?php
		while ( have_rows( 'content_builder_row' ) ): the_row(); ?>
		<div class="row row-flex">
			<?php
			if ( have_rows( 'row_builder_row' ) ): ?>
			<?php
			while ( have_rows( 'row_builder_row' ) ): the_row(); ?>

			<?php
			if (have_rows('post_list_row')){
				$posts = array();
				while  (have_rows( 'post_list_row' ) ): the_row();
					$posts[] = get_sub_field('posts_builder_row');
				endwhile;
				render_partial( 'parts/' . get_sub_field( 'template_builder_row' ), [ 'posts' => $posts] );
			}
			// else {
			// 	render_partial( 'parts/' . get_sub_field( 'template_builder' ), [ 'post' => get_sub_field( 'post_builder' )] );
			// }
			?>
		<?php endwhile; ?>
	<?php endif; //if( get_sub_field('items') ): ?>
</div>
<?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
</div>
</div>
<?php endif; // if( get_field('to-do_lists') ): ?>

<?php get_footer(); ?>