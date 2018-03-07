<?php if (isset($post->ID)): ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="one_three">
            <div class="pic-bg"
                 style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')"></div>
            <div class="centered">
                <h2 class="t-6"><a href="<?php echo get_post_permalink($post); ?>"><?php echo $post->post_title; ?></a>
                </h2>
                <p class="fdi-excerpt-sm"><?php echo wp_trim_words(get_the_excerpt($post->ID), 6, ''); ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>