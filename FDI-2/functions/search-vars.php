<?php

add_filter('query_vars', 'add_qv');
function add_qv($qv)
{
    $qv[] = 'sectors';
    $qv[] = 'countries';
    $qv[] = 'tags';
    return $qv;
}


function add_meta_query($query)
{
    $sectors = get_query_var('sectors');
    $countries = get_query_var('countries');
    $tags = get_query_var('tags');

    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    $meta_query = array();
    if (isset($sectors)) {
        if (!empty($sectors)) {
            $meta_query[] = array(
                'taxonomy' => 'sector',
                'field' => 'term_id',
                'terms' => $sectors,
                'operator' => 'IN'
            );
            $query->set('tax_query', $meta_query);
        }
    }
    if (isset($countries)) {
        if (!empty($countries)) {
            $query->set('category__in', $countries);
        }
    }

    if (isset($tags)) {
        if (!empty($tags)) {
            $query->set('tag__in', $tags);
        }
    }
}

add_filter('pre_get_posts', 'add_meta_query');

//function search_posts_per_page($query)
//{
//    if ($query->is_search) {
//        $query->set('posts_per_page', '20');
//    }
//    return $query;
//}
//
//add_filter('pre_get_posts', 'search_posts_per_page');