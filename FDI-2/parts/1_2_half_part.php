<?php if (isset($post->ID)): ?>
<div class="col-md-6 col-xs-12">
	<div class="one_two_big">
		<div class="tag-box">
			<ul class="fdi-category-sector">
				<?php echo get_the_term_list(  $post->ID, 'sector', '<li>', ' '. "</li><li>", "</li>" ); ?>
			</ul>
		</div>
		<div class="pic-bg" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full');  ?>')"></div>
		<h4 class="t-5">
			<a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a>
		</h4>
	</div>
</div>

<?php endif; ?>