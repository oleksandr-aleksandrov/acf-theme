<?php
// $category = get_the_category();
// $categories = get_the_category($post);
// $thumbnail_post_url = get_the_post_thumbnail_url($post->ID, 'full'); 


?>

<div class="col-xs-12 col-md-6">
	<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">


		<?php 
		foreach ($posts as $key => $post) : ?>
		<?php if ($key >2 ) break; ?>

		<div class="panel" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo get_the_post_thumbnail_url($post->ID, 'full');  ?>) no-repeat center; background-size: cover;">
			<div class="panel-heading" role="tab" id="heading-<?php echo $post->ID.$key ?>">
				<div class="tag-box">
					<ul class="fdi-category-sector">
						<?php echo get_the_term_list(  $post->ID, 'sector', '<li>', ' '. "</li><li>", "</li>" ); ?>
					</ul>
				</div>
				<h4 class="panel-title">
					<a role="button" class="<?php echo $key==0 ? '' : 'collapsed' ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $post->ID.$key ?>" aria-expanded="<?php echo $key==0 ? 'true' : 'false' ?>" aria-controls="collapse-<?php echo $post->ID.$key ?>"><?php echo $post->post_title; ?></a>
				</h4>
			</div>
			<div id="collapse-<?php echo $post->ID.$key ?>" class="panel-collapse collapse <?php echo $key==0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading-<?php echo $post->ID.$key ?>">
				<div class="panel-body">
					<p><?php echo get_the_excerpt($post->ID); ?></p>
					<a href="<?php echo get_post_permalink($post); ?>" class="btn-black ">Read more</a>
				</div>
			</div>
		</div>
	<?php endforeach;?> 
</div> 
</div>