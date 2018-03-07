<?php 
/******** FEATURED INTERVIEWS ***********/
$args = array(
	'posts_per_page'   => 1,
	'post_type'     => 'interview',
	'orderby' 		=> 'post_date',
	'post_status'   => 'publish',
	'order' 		=> 'DESC',
	'category__in'  => array( $current_category ),
    'meta_key'      => 'featured_interview',
    'meta_value'    => 0,
);
$the_query = new WP_Query( $args );
?>

<?php if( $the_query->have_posts() ): ?>
	<div class="row">
		<div class="col-md-7 col-sm-8 col-xs-12">
			<div class="interview">
				<h4 class="t-1">Latest Interview</h4>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="row">
						<div class="col-xs-5">
							<?php $interview_img = get_field( 'upload_image' ); ?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo $interview_img['url'];?>" class="img-responsive" alt="<?php the_title() ; ?>" />  
							</a>
						</div>
						<div class="col-xs-6">
							<p><?php the_excerpt(); ?></p>
							<div>
								<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ; ?>,</a></h3>
								<h4><?php get_person_position($post->ID) ?></h4>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>

		<div class="col-sm-4 col-xs-6 col-md-offset-1">
			<div class="topics">
				<?php
				if( get_field('context_story') ): $context_story = get_field('context_story'); ?>
					<div class="row">
						<h4 class="col-xs-12 t-1">Context Story</h4>
					</div>
					<?php 
					foreach ($context_story as $story) {
					?>
					<div class="row">
						<div class="col-xs-12 topic-item">
							<div class="topic-img">
								<?php if( get_field( 'article_image', $story->ID ) ) : ?>
									<?php $article_img = get_field( 'article_image', $story->ID ); ?>
									<a href="<?php the_permalink($story->ID); ?>" style="background-image:url(<?php echo $article_img['url'];?>)">
										<?php if( get_field( 'article_tag', $story->ID ) ): ?>
											<?php $tag = get_field( 'article_tag', $story->ID ); ?>
											<div class="topic-tag"><?php echo $tag[0]->name; ?></div>
										<?php endif; ?>
									</a>
								<?php endif; ?>
							</div>
							<h5><a href="<?php the_permalink( $story->ID ); ?>"><?php echo get_the_title( $story->ID ); ?> </a></h5>
							<p><?php echo $story->post_excerpt; ?></p>
						</div>
					</div>
         			<?php
					}
					wp_reset_postdata();
				endif; 
				?>
			</div>
		</div>
	</div>
<?php endif; ?>