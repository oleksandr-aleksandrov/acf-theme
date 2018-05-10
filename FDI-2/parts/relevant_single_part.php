<div class="row fdi-margin-medium-top">
    <div class="col-md-12">
        <h2><?php _e('More On Topic', 'FDI-2'); ?></h2>
    </div>

    <?php
    $taxs = wp_get_post_terms(get_the_ID(), 'sector');
    $tags = wp_get_post_tags(get_the_ID());
    $categories = get_the_category(get_the_ID());
    
    if ($taxs && $tags && $categories) {
        $taxs_ids = array();
        foreach ($taxs as $tax) $taxs_ids[] = $tax->term_id;
        $tag_ids = array();
        foreach ($tags as $tag) $tag_ids[] = $tag->term_id;
        $category_ids = array();
        foreach ($categories as $category) $category_ids[] = $category->term_id;

        $interview1 = get_posts(
            array(
                'numberposts' => 2,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'sector',
                        'field' => 'term_id',
                        'terms' => $taxs_ids
                    ),
                    array(
                        'taxonomy' => 'post_tag',
                        'field' => 'term_id',
                        'terms' => $tag_ids,
                    ),
                    array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $category_ids,
                    ),
                ),
                'post__not_in' => array(get_the_ID()),
                'post_type' => 'interview',
                'orderby' => 'rand'
            )
        );

        $interview2 = get_posts(
            array(
                'numberposts' => 2,
                'offset' => 2,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'sector',
                        'field' => 'term_id',
                        'terms' => $taxs_ids
                    ),
                    array(
                        'taxonomy' => 'post_tag',
                        'field' => 'term_id',
                        'terms' => $tag_ids,
                    ),
                    array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $category_ids,
                    ),
                ),
                'post__not_in' => array(get_the_ID()),
                'post_type' => 'interview',
                'orderby' => 'rand'
            )
        );

        $article = get_posts(
            array(
                'numberposts' => 2,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'sector',
                        'field' => 'term_id',
                        'terms' => $taxs_ids
                    ),
                    array(
                        'taxonomy' => 'post_tag',
                        'field' => 'term_id',
                        'terms' => $tag_ids,
                    ),
                    array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $category_ids,
                    ),
                ),
                'post__not_in' => array(get_the_ID()),
                'post_type' => 'article',
                'orderby' => 'rand',
                'order' => 'DESC',

            )
        );
        render_partial('parts/1_4_tall', ['post' => isset($article[0]) ? $article[0] : '']);
        render_partial('parts/1_4_half_block', ['posts' => $interview1]);
        render_partial('parts/1_4_tall', ['post' => isset($article[1]) ? $article[1] : '']);
        render_partial('parts/1_4_half_block', ['posts' => $interview2]);
    }

    ?>
</div>
