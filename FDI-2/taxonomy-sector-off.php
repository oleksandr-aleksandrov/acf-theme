<?php 
get_header();
?>
<div class="container">
	<div class="row">



		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				 <h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1> 


				<?php if ( category_description() ) : ?>
					<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header>




			<ul class="fdi-grid">
				<?php
				while ( have_posts() ) : the_post();
					$thumbnail_post_url = get_the_post_thumbnail_url($post->ID, 'full'); 
					?>

					<li style="background-image:url('<?php echo $thumbnail_post_url; ?>')">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

						<div class="entry">
							<!-- <?php the_content(); ?> -->
							<?php get_the_excerpt($post->ID); ?>
							<p class="postmetadata"><?php
							comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
							?></p>
						</div>
					</li>

				<?php endwhile; ?>
			</ul>
			<?php posts_nav_link(); ?>
		<?php else: ?>
			<p>Sorry, no posts matched your criteria.</p>


		<?php endif; ?>

	</div>
</div>


<?php get_footer();