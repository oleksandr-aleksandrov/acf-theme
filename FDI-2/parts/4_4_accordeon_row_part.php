<?php 
if (isset($posts[0]) && isset($posts[1]) && isset($posts[2]) )
{
render_partial( 'parts/1_2_accordeon', ['posts' => array( isset($posts[0]) ? $posts[0] : '', isset($posts[1]) ? $posts[1] : '' , isset($posts[2]) ? $posts[2] : '' ) ]);
}
render_partial( 'parts/1_4_half_block', ['posts' => array( isset($posts[3]) ? $posts[3] : '' , isset($posts[4]) ? $posts[4] : '' ) ]);
render_partial('parts/1_4_half_block', ['posts' => array( isset($posts[5]) ? $posts[5] : '', isset($posts[6]) ? $posts[6] : '' )]);

?>