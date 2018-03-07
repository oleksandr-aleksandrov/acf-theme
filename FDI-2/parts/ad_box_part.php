<?php if (isset($post->ID)): ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="sponsored_box"
             style="background: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>') no-repeat; background-size: cover;display: block!important; background-position: center;">
            <p>Sponsored Ads</p>
            <img src="<?php bloginfo('template_directory'); ?>/assets/country_img/logo.jpg"
                 class="ad-logo img-responsive">
            <div class="link-box">
                <h2><?php echo $post->post_title; ?></h2>
                <p><?php echo get_the_excerpt($post->ID); ?></p>
                <a href="<?php the_field('link_external', $post->ID); ?>" class="btn-black ">Click Here</a>
            </div>
        </div>
    </div>
<?php endif ?>