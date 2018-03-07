<?php

/*********
 * /* This category template is being created for specific Higher Education.
 * /*
 * /* It will render for Higher Education category.
 *********/
get_header();


?>
    <div class="container fdi-margin-top">
    <div class="row fdi-archive-page">

<?php
if (have_posts()) :

    if (is_tag()) {
        the_archive_title('<h1 class="col-md-12 achive-title">', '</h1>');
    } elseif (is_archive()) {
        the_archive_title('<h1 class="col-md-12 achive-title">', '</h1>');
    } else {
        $term = get_term_by('slug', get_query_var('term_name'), 'category');
        echo '<h1 class="col-md-12">' . '<span class="cpt-name">' . get_query_var('cpt') . '</span>' . '/' . '<span class="term-name">' . $term->name . '</span>' . '</h1>';
    }
    ?>
    <?php
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

        //               echo get_post_type();
        //                render_partial()
        //                get_template_part('templates/content', 'search');

    endwhile; ?>
    </div>

    <div class="loader"></div>
    
    <?php
else :
    get_template_part('templates/content', 'none');
    ?>
    </div>
<?php endif; ?>
<?php get_footer();