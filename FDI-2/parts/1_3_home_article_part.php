	<?php if (isset($post->ID)):

	?>
	<div class="flex-item col-sm-3 col-xs-12">
		<div class="clearfix fdi-content"  style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
			<div class="tag-box-new">
				<ul class="fdi-category-sector">
					<?php echo get_the_term_list(  $post->ID, 'sector', '<li>', ' '. "</li><li>", "</li>" ); ?>

				</ul>
			</div>
			<h2><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a></h2>
			<h3><?php echo get_the_excerpt($post->ID); ?></h3>
		</div>
	</div>
<?php endif; ?>