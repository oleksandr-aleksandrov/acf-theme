	<?php if (isset($post->ID)): ?>
	<div class="flex-item col-sm-4 col-xs-12">
		<div class="clearfix"  style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'banner_medium'); ?>')">
			<h2><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a></h2>
			<h3><?php echo get_the_excerpt($post->ID); ?></h3>
		</div>
	</div>
	<?php endif ?>