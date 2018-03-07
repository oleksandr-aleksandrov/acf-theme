<?php if (isset($post->ID)): ?>
    <?php if (get_field('background_video_file_1', $post->ID)): ?>
        <div class="without-flex">
            <a target="_blank" class="1ad_banner"
               href="<?php echo get_field('full_advertising', $post->ID) ? the_field('link_external_advertising', $post->ID) :
                   the_permalink($post->ID); ?>">
                <div
                    class="parallax-background col-md-12 image-or-video-background fdi-image-background fdi-margin-small-bottom">
                    <video id="videoBlock" width="100%" height="auto" preload="auto" loop="loop"
                           autoplay="autoplay">
                        <source src="<?php echo get_field('background_video_file_1', $post->ID); ?>"
                                type="video/mp4">
                        <source src="<?php echo get_field('background_video_file_2', $post->ID); ?>"
                                type="video/webm">
                    </video>
                    <div class="parallax-text">
                        <div class="element">Sponsored Ads</div>
                        <p><?php echo $post->post_content; ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php else: ?>
        <a target="_blank" class="1ad_banner"
           href="<?php echo get_field('full_advertising', $post->ID) ? the_field('link_external_advertising', $post->ID) :
               the_permalink($post->ID); ?>" style="width: 100%;">
            <div class="parallax-background"
                 style="width: 100%; background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'banner_big'); ?>')">
                <div class="parallax-text">
                    <!--                    <h2 class="t-7">--><?php //echo $post->post_title; ?><!--</h2>-->
                    <div class="element">Sponsored Ads</div>
                    <p><?php echo $post->post_content; ?></p>
                </div>
            </div>
        </a>
    <?php endif;
endif; ?>
