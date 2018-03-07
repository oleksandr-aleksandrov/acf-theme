<?php
$args = array(
   'posts_per_page'     	=> 12,
   'posts_per_page'		=> 12,
   'post_type'       	=> 'article',
   'orderby'         	=> 'post_date',
   'post_status'     	=> 'publish',
   'order'           	=> 'DESC',
   'category__in'    	=> array( $current_category ),
   'post__not_in'		=> array( $latest_post_id )
);
$the_query = new WP_Query( $args );
?>
<?php if( $the_query->have_posts() ): ?>
	<div class="topics">
		<div class="row">
			<h4 class="col-xs-12 t-1">Other Topics</h4>
		</div>
		<div class="row">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php if ( get_field( 'article_image' ) ) : ?>
                	<?php $article_img = get_field('article_image'); ?>
					<?php $resizedarticle_img = vt_resize('', $article_img['url'], 1000, 375, true); ?>
                <?php endif; ?>
				<div class="col-sm-4 col-xs-6 topic-item">
					<div class="topic-img">
						<a href="<?php the_permalink(); ?>" style="background-image:url(<?php if ( get_field( 'article_image' ) ) { echo $resizedarticle_img['url']; } ?>)">
							<?php if( get_field( 'article_tag' ) ): ?>
								<?php $tag = get_field( 'article_tag' ); ?>
                                <div class="topic-tag"><?php echo $tag[0]->name; ?></div>
                            <?php endif; ?>
						</a>
					</div>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p><?php the_field('excerpt'); ?></p>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
<?php endif; ?>