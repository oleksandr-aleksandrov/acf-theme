<?php

/**
 * @param string $cpt_name
 * @param string $term_name
 * @return string
 */
function get_term_link_with_cpt($cpt_name, $term_name)
{
    $url = \network_site_url(\sprintf('/%s/%s/', $cpt_name, $term_name));

    return $url;
}

/**
 *
 */
\add_filter('query_vars', function ($query_vars) {
    $query_vars[] = 'term_name';
    $query_vars[] = 'cpt';

    return $query_vars;

});

/**
 * Setup new rewrite rules
 */
\add_action('init', function () {

    //index.php?post_type=CPT_NAME&term=TERM_NAME
    // IT WORKS
    //add_rewrite_rule("^([^/]+)/([^/]+)",'index.php?post_type=$matches[1]&term_name=$matches[2]','top');

    /**
     * Articles
     */
    add_rewrite_rule("^articles/([^/]+)/page/([0-9]{1,})", 'index.php?cpt=article&term_name=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule("^articles/([^/]+)", 'index.php?cpt=article&term_name=$matches[1]', 'top');
    /**
     * Interviews
     */
    add_rewrite_rule("^interviews/([^/]+)/page/([0-9]{1,})", 'index.php?cpt=interview&term_name=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule("^interviews/([^/]+)", 'index.php?cpt=interview&term_name=$matches[1]', 'top');
    /**
     * Profiles
     */
    add_rewrite_rule("^profiles/([^/]+)/page/([0-9]{1,})", 'index.php?cpt=company&term_name=$matches[1]&paged=$matches[2]', 'top');
    add_rewrite_rule("^profiles/([^/]+)", 'index.php?cpt=company&term_name=$matches[1]', 'top');

    add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'bottom');
    // TODO: Should be removed after active development stops
    \flush_rewrite_rules();

});

add_action("template_redirect", 'my_template_redirect');
function my_template_redirect()
{
    global $wp_query;

//    echo 'cpt=', get_query_var('cpt'), ' term_name=', get_query_var('term_name');
    // if Service CPT URL then redirect to archive.php template
    if (isset($wp_query->query_vars["cpt"]) && isset($wp_query->query_vars["term_name"])) {
        include(TEMPLATEPATH . '/archive.php');
        exit;
    }
}


function custom_pre_get_posts_filter($query)
{
    if (!is_admin() && $query->is_main_query()) {
        //Display only featured news in archive "News" if GET parameter "featured" is set up
        if (isset($query->query_vars["cpt"]) && isset($query->query_vars["term_name"])) {
            $query->set('post_type', $query->query_vars["cpt"]);
            $query->set('tax_query', array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $query->query_vars["term_name"],
            ));
            $query->set('category_name', $query->query_vars["term_name"]);
            remove_action('pre_get_posts', 'custom_pre_get_posts_filter');
        }
    }
}

add_action('pre_get_posts', 'custom_pre_get_posts_filter');