<?php
if (isset($post->ID)): ?>
    <div class="without-flex">
        <div class="col-md-12 image-or-video-background fdi-image-background fdi-margin-small-bottom">
            <?php if (get_field('background_video_file_1', $post->ID)) : ?>
                <video id="videoBlock" width="100%" height="auto" preload="auto" loop="loop" autoplay="autoplay">
                    <source src="<?php echo get_field('background_video_file_1', $post->ID); ?>" type="video/mp4">
                    <source src="<?php echo get_field('background_video_file_2', $post->ID); ?>" type="video/webm">
                </video>
                <?php
//            else : ?>
<!--                <img class="img-responsive" src="--><?php //echo get_the_post_thumbnail_url($post->ID, 'full'); ?><!--"-->
<!--                     alt=""/>-->
            <?php endif; ?>
            <div class="video-header">
                <!--                <div class="logo wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">-->
                <!--                    <span class="black-bg">FDI</span> Spotlight-->
                <!--                </div>-->
                <!-- <h2 id="video-header-page-title" class="page-title wow fadeIn" data-wow-duration="2s" data-wow-delay="0.7s">Zambia</h2> -->
                <h2 id="video-header-page-title" class="page-title wow fadeIn" data-wow-duration="2s"
                    data-wow-delay="0.7s"><?php echo $post->post_title; ?></h2>
                <div class="line-wrap clearfix">
                    <div class="left-line">
                        <div class="line wow fadeInRight" data-wow-duration="1.3s" data-wow-delay="1.3s"></div>
                    </div>
                    <div class="right-line">
                        <div class="line wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay="1.3s"></div>
                    </div>
                </div>
                <p class="description wow fadeIn" data-wow-duration="2s"
                   data-wow-delay="1s"><?php echo get_the_excerpt($post->ID); ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>