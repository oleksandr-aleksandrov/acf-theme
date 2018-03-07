<?php if (isset($post->ID)): ?>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="one_four">
            <div class="tag-box">
                <ul class="fdi-category-sector">
                    <?php echo get_the_term_list($post->ID, 'sector', '<li>', ' ' . "</li><li>", "</li>"); ?>
                </ul>
            </div>
            <div class="pic-bg"
                 style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
            </div>
            <div class="t-4">
                <h4 class=""><?php echo $post->post_title; ?></h4>
                <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 14, ''); ?></p>
            </div>
            <a class="link-cover" href="<?php echo get_post_permalink($post); ?>"></a>
        </div>
    </div>

<?php endif ?>