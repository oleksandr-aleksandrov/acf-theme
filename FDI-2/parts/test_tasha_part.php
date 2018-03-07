<?php 

$item_number = ceil(count($posts) / 4); ?>
<div id="myCarousel" class="carousel slide" data-ride="" style="width: 100%";>
	<ol class="carousel-indicators">
		<?php for ( $i=0; $i < $item_number; $i++) : ?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $i==0 ? 'active' : '' ?>"  ></li>
		<?php endfor;?>
	</ol>

	<div class="carousel-inner">
		<?php $i = 1; ?>
		<div class="item active">
		<?php
			foreach ($posts as $post ) {
			render_partial( 'parts/1_4_interviews', [ 'post' => $post] );
				if ($i % 4 == 0) : ?>
					</div>
					<div class="item">
				<?php endif;
			$i++;
			if ($i == count($posts) + 1) {
				echo '</div>';
			}
		}
		?>
	</div>
</div>