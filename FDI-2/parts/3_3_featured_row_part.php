<?php 
render_partial( 'parts/2_3_big', [ 'post' => isset($posts[0]) ? $posts[0] : ''] );
render_partial( 'parts/1_3_block', ['posts' => array( isset($posts[1]) ? $posts[1] : '', isset($posts[2]) ? $posts[2] : '' ) ]);
?>