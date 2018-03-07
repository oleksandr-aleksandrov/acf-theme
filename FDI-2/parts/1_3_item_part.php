<?php if (isset($post->ID)): ?>
<div class="one_three">
	<div class="pic-bg" style="background-image:url('<?php echo  get_the_post_thumbnail_url($post->ID, 'full'); ?>')"></div>
	<div class="centered">
		<h2 class="t-6"><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a></h2>
		?>
		<p class="fdi-excerpt-sm"><?php get_the_excerpt($post->ID) ?></p>
	</div>
</div>
<?php endif; ?>