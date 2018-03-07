<?php 
// render_partial( 'parts/1_4', [ 'post' => $posts[0]] );
// render_partial( 'parts/1_4_half', ['post' => $posts[1]  ]);
// render_partial('parts/1_4_half', ['post' => $posts[2] ]);
// render_partial('parts/1_4', ['post' => $posts[3] ]);
foreach ($posts as $post) {
	switch ($post->post_type) {
		case 'interview' :
			render_partial('parts/1_4_half', ['post' => $post ]);
			break;
		case 'article' :
			render_partial('parts/1_4', ['post' => $post ]);
		    break;
		default:
			// code...
			break;
	}
}
?>