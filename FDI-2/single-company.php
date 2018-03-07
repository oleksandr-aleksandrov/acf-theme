<?php
/**
 * =============================================================================
 * Company Single Page
 * =============================================================================
 */

get_header();

$categories = get_the_category();

$company_categories = array();
foreach ($categories as $category) {
    $company_categories[] = $category->term_id;
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
                'term' => $category->slug
            ]); ?>
        </div>
    </div>
    <?php
    $video_block = get_field('background_video_file');
    if ($video_block) { ?>
        <div class="image-or-video-background">
            <?php
            $video_webm = get_field('background_video_file_2');
            ?>
            <video width="100%" height="auto" preload="auto" autoplay="autoplay"
                   loop="loop">
                <source src="<?php echo $video_block ?>" type="video/mp4"></source>
                <source src="<?php echo $video_webm ?>" type="video/webm"></source
            </video>
            </video>
        </div>
        <?php
    } else {

        $banner_img = get_field('banner_image', $post->ID);
        if (!empty($banner_img)): ?>
            <?php if (get_field('banner_image', $post->ID)) { ?>
                <div class="image-or-video-background"><img src="<?php echo $banner_img['url']; ?>"
                                                            class="img-responsive" alt="<?php the_title(); ?>"></div>
            <?php } ?>
        <?php endif;

    }
    ?>

    <div class="row">
        <div class="col-xs-8 overlay">
            <h1 class="t-2-profile"><span class="strip"><?php the_title(); ?></span></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9">
            <h3 class="t-2-left">About the Company</h3>
            <div class="article-text">
                <?php the_field('body'); ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="company-contacts">
                <h3 class="t-2-left"><?php _e('Company Profile', 'FDI-2'); ?>
                </h3>
                <div class="company-logo">
                    <a href="<?php the_field('website'); ?>">
                        <?php if (get_field('logo')) { ?>
                            <?php $logo_img = get_field('logo'); ?>
                            <?php $resizedlogo_img = vt_resize('', $logo_img['url'], 250, 9999, true); ?>
                            <img src="<?php echo $resizedlogo_img['url']; ?>" alt="<?php the_title(); ?>"
                                 class="img-responsive">
                        <?php } ?>
                    </a>
                </div>
                <?php if (get_field('address') != "") { ?>
                    <div class="row company-contacts-item">
                        <div class="col-xs-1">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="col-xs-10">
                            <p><?php the_field('address'); ?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php if (get_field('phone_numbers') != "") { ?>
                    <div class="row company-contacts-item">
                        <div class="col-xs-1">
                            <i class="fa fa-phone-square"></i>
                        </div>
                        <div class="col-xs-10">
                            <?php if (get_field('phone_numbers')): while (has_sub_field('phone_numbers')): ?>
                                <ul>
                                    <li><?php the_sub_field('number'); ?></li>
                                </ul>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (get_field('email') != "") { ?>
                    <div class="row company-contacts-item">
                        <div class="col-xs-1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="col-xs-10">
                            <p><?php the_field('email'); ?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php if (get_field('website') != "") { ?>
                    <div class="row company-contacts-item">
                        <div class="col-xs-1">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="col-xs-10">
                            <p><?php the_field('website'); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="sidebar-company">
                <?php
                $args = array(
                    'post_type' => 'interview',
                    'posts_per_page' => '1',
                    'meta_query' => array(
                        array(
                            'key' => 'company',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        )
                    ),
                    'status' => 'publish'
                );
                // The Query
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $post_type = get_post_type($post->ID); ?>
                        <div class="person-list-item person-red-border ">
                            <!--                    --><?php //render_partial('parts/1_4_half_block', ['posts' => $the_query]); ?>
                            <div class="one_four_half">
                                <div class="tag-box">
                                    <ul class="fdi-category-sector">
                                        <?php echo get_the_term_list($post->ID, 'sector', '<li>', ' ' . "</li><li>", "</li>"); ?>
                                    </ul>
                                </div>
                                <?php if (get_field('upload_image', $post->ID)) { ?>
                                    <?php $person_img = get_field('upload_image', $post->ID); ?>
                                    <?php $resizedperson_img = vt_resize('', $person_img['url'], 158, 240, true);
                                } ?>
                                <img src="<?php echo $resizedperson_img['url']; ?>"
                                     alt="<?php echo $person_img['alt']; ?>"
                                     class="img-responsive">
                                <?php ?>
                                <a class="post-link" href="
                    <?php the_permalink($post->ID); ?>">
                                    <div class="name-box">
                                        <p class="name">
                                            <?php the_title(); ?>
                                        </p>
                                        <p class="position">
                                            <?php get_person_position($post->ID) ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php
                wp_reset_postdata(); ?>
            </div>

            <ul class="fdi-category-sector-post">
                <?php echo get_the_term_list($post->ID, 'sector', '<li>', ' ' . "</li><li>", "</li>"); ?>
            </ul>
            <h2><?php _e('Tags', 'FDI-2'); ?></h2>
            <?php the_tags('<ul class="fdi-post-tags"><li>', '</li><li>', '</li></ul>'); ?>
        </div>
    </div>
    <?php if (!empty($posts)):
        echo render_partial('parts/relevant_single', ['posts' => $posts]);
    endif; ?>
</div>

<?php
get_footer();
?>
