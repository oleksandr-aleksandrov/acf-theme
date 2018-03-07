<?php
/*
 * =============================================================================
 * Template Name: Sector Template
 * Template Post Type: page
 * =============================================================================
 */
get_header();
$ids = [];
$terms = get_terms(
    array(
        'taxonomy' => 'sector',
    )
);
foreach ($terms as $term) {
    array_push($ids, $term->term_id);
    $term_link = get_term_link($term);

    if (is_wp_error($term_link)) {
        continue;
    }
}
?>

<?php $article_featured = get_posts(
    array(
        'numberposts' => 1,
        'post_type' => 'article',
        'orderby' => 'data',
        'order' => 'DESC',
        'tag' => 'featured'
    )
);

$downloads = get_posts(
    array(
        'numberposts' => 1,
        'post_type' => 'advertising',
        'orderby' => 'data',
        'order' => 'DESC',
        //      'category_name' => get_the_title(),
        'meta_key' => 'download_block',
        'meta_value' => TRUE,
        'tax_query' => array(
            array(
                'taxonomy' => 'sector',
                'field' => 'term_id',
                'terms' => $ids
            )
        )
    )
);

$article = get_posts(
    array(
        'numberposts' => 2,
        //            'offset' => 4,
        'post_type' => 'article',
        'orderby' => 'data',
        'order' => 'DESC',
        //            'category_name' => get_the_title()
    )
);

$interviews_1 = get_posts(
    array(
        'numberposts' => 2,
        'post_type' => 'interview',
        'orderby' => 'data',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'sector',
                'field' => 'term_id',
                'terms' => $ids
            ),
        ),
    )
);

$interviews_2 = get_posts(
    array(
        'numberposts' => 2,
        'offset' => 2,
        'post_type' => 'interview',
        'orderby' => 'data',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'sector',
                'field' => 'term_id',
                'terms' => $ids
            ),
        ),
    )
);
?>

<div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="row fdi-margin-small-top">
        <?php
        //        $ids = [];
        //        $terms = get_terms(
        //            array(
        //                'taxonomy' => 'sector',
        //            )
        //        );
        //        foreach ($terms as $term) {
        //            array_push($ids, $term->term_id);
        //            $term_link = get_term_link($term);
        //
        //            if (is_wp_error($term_link)) {
        //                continue;
        //            }
        //        }
        ?>
    </div>
    <div class="row fdi-margin-small-top">
        <?php echo render_partial('parts/video_masthead', ['post' => isset($post) ? $post : '']); ?>
        <?php render_partial('parts/1_2_big', ['post' => isset($article_featured[0]) ? $article_featured[0] : '']); ?>

        <?php foreach ($terms as $key => $term) :
            ?>
            <?php
            if ($key == 8) {
                $banner = get_posts(
                    array(
                        'post_type' => 'advertising',
                        'numberposts' => -1,
                        'orderby' => 'data',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'sector',
                                'field' => 'term_id',
                                'terms' => $ids
                            ),
                        ),
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'sponsored_block',
                                'value' => '1',
                                'compare' => '!='
                            ),
                            array(
                                'key' => 'download_block',
                                'value' => '1',
                                'compare' => '!='
                            )
                        )

                    )
                );
                ?>
                <div class="row fdi-margin-medium-bottom">
                    <div class="col-md-12">
                        <?php render_partial('parts/ad_banner', ['post' => isset($banner[0]) ? $banner[0] : '']); ?>
                    </div>
                </div>
                <?php
            }
            $image_sector = get_field('image-sector', $term);
            $term_link = get_term_link($term);
            ?>
            <div class="col-md-3">
                <div class="sector-item"
                     style="background-image: url('<?php echo $image_sector['sizes']['sector_thumb']; ?>')">
                    <h2><?php echo $term->name ?></h2>
                    <?php
                    echo '<a href="' . esc_url($term_link) . '"></a>';
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row row-flex">
        <?php
        render_partial('parts/download_block', ['post' => isset($downloads[0]) ? $downloads[0] : '']);
        ?>
    </div>
    <div class="row row-flex fdi-margin-small-bottom fdi-margin-small-top">
        <?php
        render_partial('parts/1_4_tall', ['post' => isset($article[0]) ? $article[0] : '']);
        render_partial('parts/1_4_half_block', ['posts' => $interviews_1 ? $interviews_1 : '']);
        render_partial('parts/1_4_tall', ['post' => isset($article[1]) ? $article[1] : '']);
        render_partial('parts/1_4_half_block', ['posts' => $interviews_2]);
        ?>
    </div>
</div>

<?php get_footer(); ?>
