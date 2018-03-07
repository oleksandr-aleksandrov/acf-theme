<?php if (isset($post->ID)):

$category = get_the_category();
$categories = get_the_category($post);
?>

<div class="one_four">
	<div class="tag-box">
		<ul class="fdi-category-sector">
			<?php echo get_the_term_list(  $post->ID, 'sector', '<li>', ' '. "</li><li>", "</li>" ); ?>
		</ul>
	</div>
	<div class="pic-bg" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full');  ?>')"></div>
	<h4 class="t-4"><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a></h4>
</div>
<?php endif ?>