<?php if (isset($post->ID)): ?>
    <div class="col-md-8 col-sm-6 col-xs-12">
        <div class="two_three_big">
            <div class="pic-bg"
                 style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')"></div>
            <div class="centered">
                <h2 class="t-6"><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a>
                </h2>
            </div>
        </div>
    </div>
<?php endif; ?>