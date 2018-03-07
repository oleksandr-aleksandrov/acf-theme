<?php

?>

<?php
/*
 * =============================================================================
 * Template Name: Country Template
 * Template Post Type: page
 * =============================================================================
 */
get_header(); ?>
<!--    <div class="container fdi-custom-position">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-12 fdi-navigation">-->
<!--                <div class="wow fadeInDown pull-left">-->
<!--                    <h2 class="t-1-2">-->
<!--                        Title Page-->
<!--                    </h2>-->
<!--                </div>-->
<!--<!--                --><?php ////echo render_template_part('content-tabs'); ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="container-fluid">
        <div class="row hidden-height-background">
            <?php echo render_partial('parts/video_masthead', ['post' => isset($post) ? $post : '']); ?>
        </div>
    </div>


<?php $article = get_posts(
    array(
        'numberposts' => 2,
        // 'offset'    => 3,
        'post_type' => 'article',
        'orderby' => 'data',
        'order' => 'DESC',
        'category_name' => get_the_title()
    )
);
$advert = get_posts(
    array(
        'numberposts' => 1,
        // 'offset'    => 1,
        'post_type' => 'advertising',
        'orderby' => 'data',
        'order' => 'DESC',
        'meta_key' => 'sponsored_block',
        'meta_value' => TRUE,
        'category_name' => get_the_title()
    )
);
$interviews = get_posts(
    array(
        'numberposts' => 2,
        'post_type' => 'interview',
        'orderby' => 'data',
        'order' => 'DESC',
        'category_name' => get_the_title()
    )
);

// array_splice($article, 1, 0, $advert);
?>
    <div class="container">
    <div class="row row-flex">
        <?php
        render_partial('parts/1_4_tall', ['post' => isset($article[0]) ? $article[0] : '']);
        render_partial('parts/ad_box', ['post' => isset($advert[0]) ? $advert[0] : '']);
        render_partial('parts/1_4_tall', ['post' => isset($article[1]) ? $article[1] : '']);
        render_partial('parts/1_4_half_block', ['posts' => $interviews]);
        ?>
    </div>


    <?php
    $interviews = get_posts(
        array(
            'numberposts' => 8,
            'offset' => 2,
            'post_type' => 'interview',
//            'meta_key' => 'featured_interview',
//            'meta_value' => TRUE,
            'orderby' => 'data',
            'order' => 'DESC',
            'category_name' => get_the_title()
        )
    );
    ?>
    <div class="row row-flex interviews">
        <h2 class="t-2 col-md-12">Featured Interviews</h2>
        <?php render_partial('parts/carousel_row', ['posts' => $interviews]); ?>

        <?php
        $company = get_posts(
            array(
                'numberposts' => 6,
                'post_type' => 'company',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => get_the_title()
            )
        );
        ?>

        <!-- </div> -->
        <?php
        $banner = get_posts(
            array(
                'numberposts' => 1,
                'post_type' => 'advertising',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => get_the_title(),
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

        <div class="row row-flex fdi-margin-medium-bottom ">
            <?php render_partial('parts/ad_banner', ['post' => isset($banner[0]) ? $banner[0] : '']); ?>
        </div>


        <div class="row row-flex fdi-margin-small-bottom fdi-margin-small-top">
            <?php render_partial('parts/6_6_row', ['posts' => $company]); ?>
        </div>
        <?php
        $article_2 = get_posts(
            array(
                'numberposts' => 3,
                'offset' => 2,
                'post_type' => 'article',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => get_the_title()
            )
        );
        $article_featured = get_posts(
            array(
                'numberposts' => 1,
                // 'offset'        => 3,
                'post_type' => 'article',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => get_the_title(),
                'tag' => 'featured'
            )
        );
        ?>

        <div class="row row-flex fdi-margin-small-bottom fdi-margin-small-top">
            <?php render_partial('parts/1_4', ['post' => isset($article_2[0]) ? $article_2[0] : '']);
            render_partial('parts/1_4', ['post' => isset($article_2[1]) ? $article_2[1] : '']);
            render_partial('parts/1_2_half', ['post' => isset($article_featured[0]) ? $article_featured[0] : '']); ?>
        </div>

        <?php
        $downloads = get_posts(
            array(
                'numberposts' => 1,
                'post_type' => 'advertising',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => get_the_title(),
                'meta_key' => 'download_block',
                'meta_value' => TRUE,
                // 'meta_query' => array(
                // 	array(
                // 		'key' => 'download_block',
                // 		'value' => '1',
                // 		'compare' => '=='
                // 	)
                // )
            )
        );
        ?>
        <div class="row row-flex">
            <?php
            render_partial('parts/download_block', ['post' => isset($downloads[0]) ? $downloads[0] : '']);
            ?>
        </div>

        <div class="row">
            <h2 class="t-2 col-md-12"><?php _e('Pan-African Opportunities
			', 'FDI-2'); ?>
            </h2>
        </div>
        <?php $article = get_posts(
            array(
                'numberposts' => 2,
                'offset' => 4,
                'post_type' => 'article',
                'orderby' => 'data',
                'order' => 'DESC',
//                'category_name' => get_the_title()
            )
        );
        $interviews_1 = get_posts(
            array(
                'numberposts' => 2,
                'offset' => 10,
                'post_type' => 'interview',
                'orderby' => 'data',
                'order' => 'DESC',
//                'category_name' => get_the_title()
            )
        );
        $interviews_2 = get_posts(
            array(
                'numberposts' => 2,
                'offset' => 12,
                'post_type' => 'interview',
                'orderby' => 'data',
                'order' => 'DESC',
//                'category_name' => get_the_title()
            )
        );
        ?>
        <div class="row row-flex fdi-margin-small-bottom fdi-margin-small-top">
            <?php
            render_partial('parts/1_4_tall', ['post' => isset($article[0]) ? $article[0] : '']);
            render_partial('parts/1_4_half_block', ['posts' => $interviews_1]);
            render_partial('parts/1_4_tall', ['post' => isset($article[1]) ? $article[1] : '']);
            render_partial('parts/1_4_half_block', ['posts' => $interviews_2]);
            ?>
        </div>
    </div>

<?php get_footer(); ?>