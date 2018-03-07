<?php
/*
 * =============================================================================
 * Template Name: Report Template
 * Template Post Type: page
 * =============================================================================
 */

get_header();
$term = get_field('term_category'); ?>
    <div class="container">
        <div class="row header-report"
             style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'reports-background'); ?>)">
            <div class="col-md-4">
                <?php $logo_image = get_field('logo_image'); ?>
                <img class="img-responsive"
                     src="<?php echo $logo_image['sizes']['photo_big']; ?>" alt="<?php echo $logo_image['alt']; ?>">
                <?php the_field('content_left_column'); ?>
                <?php if (get_field('link_web_version')) : ?>
                    <a class="web-version-link" href="http://webreader.fdispotlight.com/invest-asean/"><?php _e('Read the guide
                        online', 'FDI-2'); ?></a>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php $ipad_img = get_field('logo_image_ipad'); ?>
                <img class="img-responsive"
                     src="<?php echo $ipad_img['sizes']['image400_500']; ?>" alt="<?php echo $ipad_img['alt']; ?>">
            </div>
            <div class="col-md-4">
                <?php the_field('content_right_column'); ?>
            </div>
        </div>

        <?php
        $company = get_posts(
            array(
                'numberposts' => 12,
                'post_type' => 'company',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => $term->name
            )
        );
        ?>
        <div class="row">
            <h2 class="col-md-12">
                Supported By
            </h2>
            <?php render_partial('parts/6_6_row', ['posts' => $company]); ?>
        </div>
        <?php $article = get_posts(
            array(
                'numberposts' => 4,
                'post_type' => 'article',
                'orderby' => 'data',
                'order' => 'DESC',
                'category_name' => $term->name
            )
        );
        ?>
        <div class="row">
            <h2 class="col-md-12">
                Featured Articles
            </h2>
            <?php
            render_partial('parts/1_4_tall', ['post' => isset($article[0]) ? $article[0] : '']);
            render_partial('parts/1_4_tall', ['post' => isset($article[1]) ? $article[1] : '']);
            render_partial('parts/1_4_tall', ['post' => isset($article[2]) ? $article[2] : '']);
            render_partial('parts/1_4_tall', ['post' => isset($article[3]) ? $article[3] : '']);
            ?>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-report text-center">
                    <?php the_field('reports_footer_content'); ?>
                    <div class="link-wrapper">
                        <?php if (get_field('market_link')): ?>
                            <a class="market-link" href="<?php the_field('market_link'); ?>">
                                iPad Version
                            </a>
                        <?php endif; ?>
                        <?php if (get_field('google_market_link')): ?>
                            <a class="market-link" href="<?php the_field('google_market_link'); ?>">Android Version</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>