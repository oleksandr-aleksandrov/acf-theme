<?php
$stati_children = new WP_Query(array(
        'post_type' => 'page',
        'post_parent' => $post->ID,

    )
);
if ($stati_children->have_posts()) :
    echo '<ul class="col-md-12 fdi-stati-children without-flex fdi-margin-small-top">';
    while ($stati_children->have_posts()): $stati_children->the_post();
        ?>
        <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
        <?php
    endwhile;
    echo '</ul>';
endif;
wp_reset_query();
?>