<?php if (get_field('background_video_file_1', $post->ID)) : ?>
    <?php echo render_partial('parts/video_bg', ['post' => isset($post) ? $post : '']); ?>
<?php elseif (has_post_thumbnail($post->ID)) : ?>
    <div class="without-flex">
        <div class="col-md-12 image-or-video-background fdi-image-background fdi-margin-small-bottom">
            <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($post->ID, 'banner_big'); ?>"
                 alt=""/>
        </div>
    </div>
<?php endif; ?>