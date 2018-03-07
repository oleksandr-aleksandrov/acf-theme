<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <!--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css"> -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="main-container container">
    <nav class="navbar navbar-default">
        <?php $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
        <div class="container-fluid header-row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php bloginfo('url'); ?>" class="logo navbar-brand">
                    <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"/>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <form role="search" method="get" id="searchform" class="navbar-form navbar-right"
                      action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-block">
                        <button type="submit" class="search-submit" id="searchsubmit"><i class="fa fa-search"
                                                                                         aria-hidden="true"></i>
                        </button>
                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="search-input"
                               placeholder="Search" id="s"/>
                    </div>
                </form>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'menu_id' => '',
                    'container' => 'nav',
                    'menu_class' => 'nav navbar-nav navbar-right header-menu',
                    'walker' => new My_Walker_Nav_Menu()
                ));
                ?>
            </div>
        </div>
    </nav>
</header>
<?php //if (is_archive()) : ?>
<!--<main class="post-listing">-->
<!--    --><?php //else: ?>
<main>
<?php //endif; ?>