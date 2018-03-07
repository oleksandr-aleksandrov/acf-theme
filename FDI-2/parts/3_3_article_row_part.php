<?php 
render_partial( 'parts/1_4_tall', [ 'post' => isset($posts[0]) ? $posts[0] : ''] );
if (isset($posts[1]) && $posts[1]->post_type == 'advertising') {
	render_partial( 'parts/ad_box', ['post' => isset($posts[1]) ? $posts[1] : '' ]);
}
else {
	render_partial('parts/1_4_tall', ['post' => isset($posts[1]) ? $posts[1] : ''   ]);	
}

render_partial('parts/1_4_tall', ['post' => isset($posts[2]) ? $posts[2] : '' ]);
render_partial('parts/1_4_tall', ['post' => isset($posts[3]) ? $posts[3] : '' ]);
?>