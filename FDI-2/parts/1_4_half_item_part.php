<?php if (isset($post->ID)):
    $categories = get_the_category($post);
    $post_type = get_post_type($post->ID);
    $link_post_type = get_post_type_archive_link($post_type);
    ?>
    <div class="one_four_half">
        <div class="tag-box">
            <ul class="fdi-category-sector">
                <?php echo get_the_term_list($post->ID, 'sector', '<li>', ' ' . "</li><li>", "</li>"); ?>
            </ul>
        </div>
        <?php if (get_field('upload_image', $post->ID)) { ?>
            <?php $person_img = get_field('upload_image', $post->ID); ?>
            <?php $resizedperson_img = vt_resize('', $person_img['url'], 170, 240, true); ?>
            <img src="<?php echo $resizedperson_img['url']; ?>" alt="<?php echo $person_img['alt']; ?>"
                 class="img-responsive">
        <?php } ?>
        <a class="post-link" href="<?php echo get_post_permalink($post); ?>">
            <div class="name-box">
                <p class="name">
                    <?php echo $post->post_title; ?>
                </p>
                <p class="position">
                    <?php get_person_position($post->ID); ?>
                </p>
            </div>
        </a>
    </div>


<?php endif; ?>
