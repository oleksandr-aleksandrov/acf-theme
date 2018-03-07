<?php

function load_more_js()
{

    global $wp_query;

    // In most cases it is already included on the page and this line can be removed
//    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script('load-more', get_stylesheet_directory_uri() . '/assets/js/load-more.js', array('jquery'));

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script('load-more', 'MAIN', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1
//        'max_page' => $wp_query->max_num_pages
    ));

    wp_enqueue_script('load-more');
}

add_action('wp_enqueue_scripts', 'load_more_js');


function true_load_posts()
{


    // prepare our arguments for the query
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';


    query_posts($args);
    if (have_posts()) :

        while (have_posts()): the_post();

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

        endwhile;

    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');