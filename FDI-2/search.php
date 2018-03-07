<?php get_header(); ?>

    <div class="container">
    <div class="row fdi-margin-small-top">
        <form role="search" method="get" id="" class="fdi-search-form" action="<?php echo site_url() ?>">
            <div>
                <div class="col-xs-9 col-md-9">
                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="search-input1"
                           placeholder="Search" id="s"/>
                </div>
                <div class="col-xs-3 col-md-3">
                    <button type="submit" class="search-submit1" id="searchsubmit">Find</button>
                </div>
            </div>
            <div class="fdi-filter">
                <div class="col-md-4">
                    <p class="select2-selection--multiple">
                        Filter By Sector...
                    </p>
                    <?php
                    $terms = get_terms(
                        array(
                            'taxonomy' => 'sector',
                            'hide_empty' => false
                        )
                    );

                    if (is_array($terms)) { ?>
                        <select class="js-example-basic-multiple" name="sectors[]" multiple="multiple">
                            <?php foreach ($terms as $term) : ?>
                                <option
                                    value="<?php echo $term->term_id ?>"<?php echo in_array($term->term_id, !empty(get_query_var('sectors')) ? get_query_var('sectors') : []) ? 'selected' : '' ?>><?php echo $term->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php }; ?>
                </div>

                <div class="col-md-4">
                    <p class="select2-selection--multiple">Filter By Country...
                    </p>
                    <?php $categories = get_categories(array(
                        'orderby' => 'term_group',
                        'order' => 'DESC'
                    )); ?>
                    <select class="js-example-basic-multiple" name="countries[]" multiple="multiple">
                        <?php foreach ($categories as $category) : ?>
                            <option
                                value="<?php echo $category->term_id ?>" <?php echo in_array($category->term_id, !empty(get_query_var('countries')) ? get_query_var('countries') : []) ? 'selected' : '' ?>><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <p class="select2-selection--multiple">Filter By Tag...
                    </p>
                    <?php $tags = get_tags(); ?>
                    <select class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                        <?php foreach ($tags as $tag): ?>
                            <option
                                value="<?php echo $tag->term_id ?>" <?php echo in_array($tag->term_id, !empty(get_query_var('tags')) ? get_query_var('tags') : []) ? 'selected' : '' ?>><?php echo $tag->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="row fdi-margin-medium-top fdi-archive-page">
<?php

/* Start the Loop */

if (have_posts()) :
    while (have_posts()) :
        the_post();
        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */

        switch (get_post_type()) {
            case 'interview':
                render_partial('parts/1_4_half', ['post' => get_post()]);
                break;
            case 'company':
                render_partial('parts/1_4_company', ['post' => get_post()]);
                break;
            case 'article':
                render_partial('parts/1_4', ['post' => get_post()]);
                break;
        }

    endwhile; ?>
    </div>

    <div class="loader"></div>
<?php else :
    get_template_part('templates/content', 'none');
    ?>
    </div>
<?php endif; ?>
<?php get_footer();