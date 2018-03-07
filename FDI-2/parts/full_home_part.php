<div class="flex-item col-sm-12 col-xs-12 full-width-part">
    <div class="clearfix"
         style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'banner_medium'); ?>');">
        <h2 class="t-6"><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a></h2>
        <h3>Investment map</h3>
        <p><?php echo get_the_excerpt($post->ID); ?></p>
    </div>
</div>