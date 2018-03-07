<?php get_header(); ?>

<?php /*********** MIDDLE CONTENT ************/ ?>
<div class="container">
    <?php
    ## Current category
    $current_category = get_queried_object_id();
    $current_cat_slug = uri_segment(4);
    $recent_articles = wp_get_recent_posts(
        array(
            'posts_per_page'   => 1,
            'category'      => $current_category,
            'post_type'     => 'article',
            'post_status'   => 'publish'
        )
    );

    $recent_interviews = wp_get_recent_posts(
        array(
            'posts_per_page'   => 1,
            'category'      => $current_category,
            'post_type'     => 'interview',
            'post_status'   => 'publish'
        )
    );

    ?>

    <div class="row mb40">
        <?php if( isset( $recent_articles ) and ! empty( $recent_articles ) ) : $meta = get_post_meta($recent_articles[0]['ID']);?>
            <div class="col-sm-8 main-article">

                <?php if ($meta['article_image'][0]) { ?>
                <?php $article_img = $meta['article_image'][0]; ?>

                <?php $resizedarticle_img = vt_resize($article_img, '', 1000, 375, true); ?>

                <div class="article-img">
                    <a href="<?php echo get_permalink( $recent_articles[0]['ID'] ); ?>" class="main-article-img">
                        <img src="<?php echo $resizedarticle_img['url']; ?>" class="img-responsive" alt="<?php echo $recent_posts[0]['post_title']; ?>" />
                    </a>
                </div>
                <?php }?>
                <h1 class="t-1"><a href="<?php echo get_permalink( $recent_articles[0]['ID'] ); ?>"><?php echo $recent_articles[0]['post_title']; ?></a></h1>
                <p><?php echo $meta['article_summary'][0];?></p>
            </div>
        <?php endif; ?>

        <?php if( isset( $recent_interviews ) and ! empty( $recent_interviews ) ) : ?>
            <?php $interview_img = get_field( 'upload_image', $recent_interviews[0]['ID'] ); ?>
            <div class="col-sm-4 latest-interview">
                <div class="latest-interview-img-wrap">
                    <a href="<?php echo get_permalink( $recent_interviews[0]['ID'] ); ?>" class="latest-interview-img">
                        <img src="<?php echo $interview_img['url'];?>" class="img-responsive" alt="<?php echo $recent_interviews[0]['post_title']; ?>" />
                    </a>
                </div>
                <div class="author-info">
                    <h3><a href="<?php echo get_permalink( $recent_interviews[0]['ID'] ); ?>"><?php echo $recent_interviews[0]['post_title']; ?></a></h3>
                    <h4><?php get_person_position($recent_interviews[0]['ID']); ?></h4>
                </div>
                <h2 class="t-1 col-sm-12 col-xs-6"><a href="<?php echo get_permalink( $recent_interviews[0]['ID'] ); ?>">Latest Interview</a></h2>
            </div>
        <?php endif; ?>
    </div>

    <?php
    /******** FEATURED ARTICLES ***********/
    $args = array(
        'posts_per_page'   => 3,
        'post_type'     => 'article',
        'meta_key'      => 'featured_article',
        'meta_value'    => TRUE,
        'post_status'   => 'publish',
        'category__in'  => array( $current_category )
    );
    $the_query = new WP_Query( $args );
    ?>

    <?php if( $the_query->have_posts() ): ?>
        <div class="topics">
            <div class="row">
                <h4 class="col-xs-12 t-1"><a href="">Featured Articles</a></h4>
            </div>
            <div class="row">
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-sm-4 col-xs-6 topic-item">
                        <?php if (get_field('article_image')) { ?>
                        <?php $article_img = get_field( 'article_image' ); ?>
<!--                        --><?php //$resizedarticle_img = vt_resize('', $article_img['url'], 400, 200, true); ?>
                        <?php }?>
                        <div class="topic-img">
                            <a href="<?php the_permalink(); ?>" style="background-image:url(<?php if (get_field('article_image')) { echo $resizedarticle_img['url']; } ?>)">
                                <?php if( get_field( 'article_tag' ) ): ?>
                                    <?php $tag = get_field( 'article_tag' ); ?>
                                    <div class="topic-tag"><?php echo $tag[0]->name; ?></div>
                                <?php endif; ?>
                            </a>
                        </div>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php the_field('article_summary'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="button-row mb40">
            <div class="row">
                <?php if($current_cat_slug){ ?>
                <a class="btn red-btn red-btn-right" href="/articles/<?php echo $current_cat_slug; ?>"><span>Top Index</span> <p class="arrow-right"></p></a>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

    <?php
    /******** FEATURED INTERVIEWS ***********/
    $args = array(
        'posts_per_page'   => 4,
        'post_type'     => 'interview',
        'meta_key'      => 'featured_interview',
        'meta_value'    => TRUE,
        'post_status'   => 'publish',
        'category__in'  => array( $current_category )
    );
    $the_query = new WP_Query( $args );
    ?>

    <?php if( $the_query->have_posts() ): ?>
        <div class="row">
            <div class="person-list">
                <h4 class="t-1 col-xs-12"><a href="">Featured Interviews</a></h4>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php if (get_field('upload_image')) { ?>
                    <?php $person_img = get_field('upload_image'); ?>
                    <?php $resizedperson_img = vt_resize('', $person_img['url'], 235, 260, true); } ?>

                    <div class="col-sm-3  col-xs-6 person-list-item">
                        <?php if (get_field('upload_image')) { ?><a href="<?php the_permalink(); ?>" class="person-list-item-img">
                            <img src="<?php echo $resizedperson_img['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                        </a><?php }?>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php get_person_position($post->ID); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="button-row mb40">
            <div class="row">
                <?php if($current_cat_slug){ ?>
                <a class="btn red-btn red-btn-right" href="/interviews/<?php echo $current_cat_slug; ?>"><span>Top Index</span> <p class="arrow-right"></p></a>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>

    <?php wp_reset_query(); ?>

    <?php
    /******** FEATURED COMPANIES ***********/
    $args = array(
        'posts_per_page'   => 6,
        'post_type'     => 'company',
        'meta_key'      => 'featured_company',
        'meta_value'    => TRUE,
        'post_status'   => 'publish',
        'category__in'  => array( $current_category )
    );
    $the_query = new WP_Query( $args );
    ?>

    <?php if( $the_query->have_posts() ): ?>
        <div class="row mb40">
            <div class="company-list">
                <h4 class="t-1 col-xs-12"><a href="">Featured Companies</a></h4>

                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php if (get_field('logo')) { $company_logo = get_field('logo'); ?>
                    <?php $resizedcompany_logo = vt_resize('', $company_logo['url'], 250, 9999, true); } ?>
                    <div class="col-sm-2 col-xs-4 company-list-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (get_field('logo')) { ?><img src="<?php echo $company_logo['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" /><?php } ?>
                            <h6><?php the_title(); ?></h6>
                        </a>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
        <div class="button-row">
            <div class="row">
                <?php if($current_cat_slug){ ?>
                <a class="btn red-btn red-btn-right" href="/companies/<?php echo $current_cat_slug; ?>"><span>Top Index</span> <p class="arrow-right"></p></a>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>

    <?php wp_reset_query(); ?>

    <div class="row download-block">
        <div class="col-sm-5 download-first">
            <h3 class="t-1">Download the App</h3>
            <h4><?php the_field('about_app','category_'.$current_category) ?></h4>
            <p><a href="<?php the_field('app_store_link','category_'.$current_category) ?>"><img style="margin-top: 1em;" src="/wp-content/uploads/2017/04/AppStoreLogo.png" width="119" height="42" data-pin-nopin="true"></a> <a href="<?php the_field('play_store_link','category_'.$current_category) ?>"><img style="margin-top: 1em;" src="/wp-content/uploads/2017/04/AndroidStoreLogo.png" alt="" width="141" height="42" data-pin-nopin="true"></a></p>
            <h4>If you don’t have a tablet device, view the webreader version:</h4>
            <a href="<?php the_field('guide_link','category_'.$current_category) ?>" class="btn yellow-btn">Read the guide online</a>
        </div>
        <div class="col-xs-6 col-sm-4 download-second"><img src="<?php the_field('tablet_image','category_'.$current_category) ?>" class="img-responsive"></div>
        <div class="col-xs-5 col-sm-2 download-third">
            <h4>See all our <strong>Inverment</strong> and <strong>Higher Education</strong> Reports</h4>
            <a href="<?php the_field('all_reports_link','category_'.$current_category) ?>">
                <div class="img-rotate-wrap">
                    <?php if( have_rows('mini_ipads_images','category_'.$current_category) ): while ( have_rows('mini_ipads_images','category_'.$current_category) ) : the_row(); ?>
                        <img src="<?php the_sub_field('ipad_1','category_'.$current_category); ?>" class="img-responsive img-rotate img-rotate-right animation-element">
                        <img src="<?php the_sub_field('ipad_2','category_'.$current_category); ?>" class="img-responsive img-rotate img-rotate-left animation-element">
                        <img src="<?php the_sub_field('ipad_3','category_'.$current_category); ?>" class="img-responsive img-rotate">
                    <?php endwhile; endif; ?>
                </div>
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>