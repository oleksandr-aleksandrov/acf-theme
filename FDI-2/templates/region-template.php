<?php
/*
 * =============================================================================
 * Template Name: Region Template
 * Template Post Type: page
 * =============================================================================
 */

get_header();


?>


<?php
$articles = get_posts(
    array(
        'numberposts' => 3,
        'post_type' => 'article',
        'orderby' => 'data',
        'order' => 'DESC',
        'category_name' => get_the_title()
    )
);

$interviews_col1 = get_posts(
    array(
        'numberposts' => 2,
        'post_type' => 'interview',
        'orderby' => 'data',
        'order' => 'DESC',
        'category_name' => get_the_title()
    )
);
$interviews_col2 = get_posts(
    array(
        'numberposts' => 2,
        'offset' => 2,
        'post_type' => 'interview',
        'orderby' => 'data',
        'order' => 'DESC',
        'category_name' => get_the_title()
    )
);
?>

    <div class="container fdi-custom-position">
        <!--== Child Page ==-->
        <div class="row fdi-margin-small-top">
            <?php echo render_partial('parts/sub_navigation', ['post' => isset($post) ? $post : '']); ?>
        </div>
        <!--== /Child Page ==-->
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php echo render_partial('parts/video_masthead', ['post' => isset($post) ? $post : '']); ?>
        </div>
    </div>
    <div class="container">
        <div class="row row-flex fdi-margin-medium-top">
            <?php
            render_partial('parts/1_2_accordeon', ['posts' => $articles]);
            render_partial('parts/1_4_half_block', ['posts' => $interviews_col1]);
            render_partial('parts/1_4_half_block', ['posts' => $interviews_col2]);
            ?>
        </div>
        
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
        <?php $article_col1 = get_posts(
            array(
                'numberposts' => 1,
                'offset' => 3,
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
                'category_name' => get_the_title(),
                'meta_key' => 'sponsored_block',
                'meta_value' => TRUE,
                // 'meta_query' => array(
                // 	array(
                // 		'key' => 'sponsored_block',
                // 		'value' => '1',
                // 		'compare' => '=='
                // 	),
                // )
            )
        );
        $article_col2 = get_posts(
            array(
                'numberposts' => 2,
                'offset' => 4,
                'post_type' => 'article',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => get_the_title()
            )
        );

        ?>
        <div class="row row-flex">
            <?php
            render_partial('parts/1_4_tall', ['post' => isset($article_col1[0]) ? $article_col1[0] : '']);
            render_partial('parts/ad_box', ['post' => isset($advert[0]) ? $advert[0] : '']);
            render_partial('parts/1_4_tall', ['post' => isset($article_col2[0]) ? $article_col2[0] : '']);
            render_partial('parts/1_4_tall', ['post' => isset($article_col2[1]) ? $article_col2[1] : '']);
            ?>
        </div>
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
        <div class="row row-flex">
            <?php render_partial('parts/6_6_row', ['posts' => $company]); ?>
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
            <h2 class="col-md-12"><?php _e('Around the Network', 'FDI-2'); ?>
            </h2>
        </div>
        <div class="row row-flex">
            <?php $article = get_posts(
                array(
                    'numberposts' => 2,
                    'offset' => 6,
                    'post_type' => 'article',
                    'orderby' => 'data',
                    'order' => 'DESC',
                    'category_name' => get_the_title()
                )
            );
            $interviews = get_posts(
                array(
                    'numberposts' => 2,
                    'offset' => 4,
                    'post_type' => 'interview',
                    'orderby' => 'data',
                    'order' => 'DESC',
                    'category_name' => get_the_title()
                )
            );

            array_splice($article, 1, 0, $interviews);
            ?>
            <?php render_partial('parts/1_3_article_interview', ['posts' => $article]); ?>
        </div>
    </div>
<?php get_footer(); ?>