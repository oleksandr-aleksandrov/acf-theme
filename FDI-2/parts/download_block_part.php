<?php if (isset($post->ID)): ?>

    <div class="download-block"
         style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>'); width: 100%;">
        <div class="col-sm-5 col-xs-3 download-devices">
            <?php
            $ipad_image = get_field('ipad_image', $post->ID);
            $iphone_image = get_field('iphone_image', $post->ID);
            if (!empty($ipad_image)): ?>
                <img src="<?php echo $ipad_image['url']; ?>" alt="<?php echo $ipad_image['alt']; ?>"
                     class="img-responsive download-ipad wow fadeInLeft">
            <?php endif; ?>
            <?php
            if (!empty($iphone_image)): ?>
                <img src="<?php echo $iphone_image['url']; ?>" alt="<?php echo $iphone_image['alt']; ?>"
                     class="img-responsive download-iphone wow fadeInLeft">
            <?php endif; ?>
        </div>
        <div class="col-sm-6 col-xs-8 download-desc">
            <h4>Download Zambia</h4>
            <h2><?php echo $post->post_title; ?></h2>
            <p><?php echo $post->post_content; ?></p>
            <p>
                <a href="<?php the_field('link_google_play', $post->ID); ?>">
                    <img style="margin-top: 1em;"
                         src="<?php bloginfo('template_directory'); ?>/assets/country_img/AndroidStoreLogo.png"
                         class="img-responsive" data-pin-nopin="true">
                </a>
                <a href="<?php the_field('link_app_store', $post->ID); ?>">
                    <img style="margin-top: 1em;"
                         src="<?php bloginfo('template_directory'); ?>/assets/country_img/AppStoreLogo.png"
                         class="img-responsive" data-pin-nopin="true">
                </a>
            </p>
        </div>
    </div>
<?php endif; ?>