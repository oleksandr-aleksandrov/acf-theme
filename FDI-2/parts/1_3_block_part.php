<div class="col-md-4 col-sm-6 col-xs-12">
	<?php 
	if (isset($posts)) {
		foreach ($posts as $key => $post ) {
			if ($key == 2) break;
			render_partial( 'parts/1_3_item', [ 'post' => $post] );
		}
	}
	?>
</div>
