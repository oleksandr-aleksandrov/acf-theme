<?php
/**
 * =============================================================================
 * Article Single Page
 * =============================================================================
 **/

get_header();

$categories = get_the_category($post);

$article_categories = array();
foreach ($categories as $category) {
    $article_categories[] = $category->term_id;
}

?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 fdi-navigation">
                <div class="wow fadeInDown pull-left">
                    <h2 class="t-1-2">
                        <?php
                        echo isset($category->cat_name) ? $category->cat_name : '';
                        ?>
                    </h2>
                </div>
                <?php echo render_template_part('content-tabs', [
                    'term' => $category->slug,
                ]); ?>
            </div>
        </div>
        <?php echo render_partial('parts/video_masthead', ['post' => isset($post) ? $post : '']); ?>

        <div class="row">
            <div class="col-xs-10 overlay">
                <h1 class="t-2-headline"><span class="strip"><?php the_title(); ?></span></h1>
            </div>
        </div>
        <?php if (get_field('article_quote')) : ?>
            <div class="row">
                <div class="col-xs-9">
                    <h2 class="article-excerpt"><?php the_field('article_quote'); ?></h2>
                </div>
            </div>
        <?php endif; ?>
        <div class="row row-flex">
            <div class="col-xs-12 col-sm-9">
                <div class="article-text">
                    <?php the_field('article_content'); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 sidebar-wrapper">
                <?php
                $posts = get_field('relevant_companies');
                if ($posts) : ?>
                    <div class="sidebar-list">
                        <h3 class="t-2">Relevant Companies</h3>
                        <ul class="list-company">
                            <?php foreach ($posts as $post): setup_postdata($post); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
                <?php

                $posts = get_field('featured_interviews');
                if ($posts) : ?>
                    <div class="person-list">
                        <?php foreach ($posts as $post):
                            echo render_partial('parts/1_4_half_item', ['post' => isset($post) ? $post : '']); ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <?php if (!empty($posts)):
            echo render_partial('parts/relevant_single', ['posts' => $posts]);
        endif; ?>
    </div>

<?php get_footer(); ?>