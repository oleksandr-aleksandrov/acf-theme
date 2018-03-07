
<?php 
foreach ($posts as $key => $post ) {
	if ($key!=2)
	{
		render_partial( 'parts/1_4', [ 'post' => $post] );
	}
	else{
		render_partial( 'parts/1_2_half', [ 'post' => $post] );
	}


	$i++;
}
?>