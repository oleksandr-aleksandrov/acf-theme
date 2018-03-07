<?php 
render_partial( 'parts/1_2_big', [ 'post' => isset($posts[0]) ? $posts[0] : '' ] );
render_partial( 'parts/1_4_block', ['posts' => array( isset($posts[1]) ? $posts[1] : '', isset($posts[2]) ? $posts[2] : '' ) ]);
render_partial('parts/1_4_block', ['posts' => array(isset($posts[3]) ? $posts[3] : '', isset($posts[3]) ? $posts[3] : '' )]);
?>