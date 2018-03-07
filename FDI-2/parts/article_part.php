<?php if (isset($post->ID)): ?>
    <div class="article col-md-3 col-sm-6 col-xs-12">
        <div class="pic-bg"
             style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')"></div>
        <div class="desc-box">
            <div class="category">
                <ul class="fdi-sector-article">
                    <?php echo get_the_term_list($post->ID, 'sector', '<li>', ', ' . "</li><li>", "</li>"); ?>
                </ul>
            </div>
            <a href="<?php echo get_post_permalink($post); ?>"><h3 class="t-3"><?php echo $post->post_name; ?></h3></a>
            <p><?php echo get_the_excerpt($post->ID); ?>
            </p>
        </div>
    </div>
<?php endif; ?>