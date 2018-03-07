<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title text-center text-error404">
                    404
                </h1>
                <p class="text-error404-found text-center ">
                    <?php _e('page not found', 'FDI-2'); ?>
                </p>
                <p class="text-center error404-description">
                    <?php _e('Sorry, we couldn\'t find the page you were looking for. Please return to the homepage or use the search bar.', 'FDI-2'); ?>
                </p>
            </div>
        </div>
        <div class="row d-flex error404-footer">
<!--            <div class="col-md-6">-->
<!--                <a class="text-center error404-link" href="--><?php //echo home_url(); ?><!--">-->
<!--                    <i class="fa fa-home" aria-hidden="true"></i>-->
<!--                </a>-->
<!--            </div>-->
            <div class="error404-search">
                <form role="search" method="get" class="text-center" id="searchform"
                      action="<?php echo home_url('/') ?>">
                    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s"/>
                    <input type="submit" id="searchsubmit" value="Search"/>
                </form>
            </div>
        </div>
    </div>
<?php get_footer();


