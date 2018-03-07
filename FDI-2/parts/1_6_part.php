
<?php if (isset($post->ID)): ?>
	<div class="col-md-2 col-sm-4 col-xs-6">
		<div class="one_six text-center">

			<a href="<?php echo get_post_permalink($post); ?>">


				
				<?php $person_img = get_field('logo', $post->ID); ?>

				<?php if (!empty($person_img)): ?>
					<?php $resizedperson_img = vt_resize('', $person_img['url'], 100, 100, true); ?>
					<img src="<?php echo $resizedperson_img['url']; ?>" alt="<?php echo $person_img['alt']; ?>" class="img-responsive">
				<?php endif;?>
			</a>

		</div>
	</div>
<?php endif; ?>
