	<div class="col-md-3 col-sm-6 col-xs-12 fdi-two-item">
		<?php 
		if (isset($posts)) {
			foreach ($posts as $key => $post ) {
				if ($key == 2) break;
				if (isset($post->ID)) {
					render_partial( 'parts/1_4_half_item', [ 'post' => isset($post) ? $post : ''] );
				}
			}
		}
		?>
	</div>