<?php
if (isset($post->ID)):
    $post_type = get_post_type($post->ID);
    $link_post_type = get_post_type_archive_link($post_type);
    ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="one_four_tall">
            <div class="tag-box">
                <ul class="fdi-category-sector">
                    <?php echo get_the_term_list($post->ID, 'sector', '<li>', ' ' . "</li><li>", "</li>"); ?>

                </ul>
            </div>

            <div class="pic-bg"
                 style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')"></div>
            <div class="desc-box">
                <a href="<?php echo get_post_permalink($post); ?>"><h3 class="t-3"><?php echo $post->post_title; ?></h3>
                </a>
                <p><?php echo get_the_excerpt($post->ID); ?></p>
            </div>
        </div>
    </div>

<?php endif; ?>