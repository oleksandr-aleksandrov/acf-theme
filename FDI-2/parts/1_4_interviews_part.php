<?php if (isset($post->ID)):
    $category = get_the_category();
    $categories = get_the_category($post);
    ?>

    <div class="interviews-item col-md-3">
        <a href="<?php echo get_post_permalink($post); ?>">
            <?php if (get_field('upload_image', $post->ID)) { ?>
                <?php $person_img = get_field('upload_image', $post->ID); ?>
                <?php $resizedperson_img = vt_resize('', $person_img['url'], 250, 300, true); ?>
                <img src="<?php echo $resizedperson_img['url']; ?>" alt="<?php echo $person_img['alt']; ?>"
                     class="img-responsive">
            <?php } ?>
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