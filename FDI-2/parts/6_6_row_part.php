<?php 
$i = 0;
if (isset($posts)) {
	foreach ( $posts as $post ) {

		render_partial( 'parts/1_6', [ 'post' => $post] );

		$i++;
	}
}
?>