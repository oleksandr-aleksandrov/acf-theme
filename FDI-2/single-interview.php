<?php
/**
 * =============================================================================
 * Interview Single Page
 * =============================================================================
 */
get_header();

$currentID = get_the_ID();
$categories = get_the_category();

$article_categories = array();
foreach ($categories as $category) {
    $article_categories[] = $category->term_id;
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

    <div class="row interview-header">
        <div class="col-xs-12 col-md-7">
            <div class="interview-title">
                <h1 class="t-2-interview">
                    In conversation with <br/>
                    <span class="strip"><?php the_title(); ?></span>
                </h1>
                <?php $theTag = "";
                $post_tags = get_the_tags();
                if ($post_tags) {
                    foreach ($post_tags as $tag) {
                        $theTag = $tag->name;
                    }
                } ?>
                <h3 class="interview-author-position">
                    <?php get_person_position($post->ID); ?>
                </h3>
            </div>
        </div>
        <div class="col-xs-12 col-md-5 interview-img">

            <?php if (get_field('upload_image', $post->ID)) { ?>
                <?php $person_img = get_field('upload_image', $post->ID); ?>
                <?php $resizedperson_img = vt_resize('', $person_img['url'], 500, 375, true); ?>
                <img src="<?php echo $resizedperson_img['url']; ?>" alt="<?php echo $person_img['alt']; ?>"
                     class="img-responsive">
            <?php } ?>
        </div>
    </div>


    <!-- <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8">

        </div>
      </div> -->

    <div class="row">
        <div class="col-sm-9">
            <div class="interview-text">
                <h2 class="article-excerpt"><?php the_field('the_excerpt'); ?></h2>
                <?php the_field('body'); ?>
            </div>
        </div>

        <div class="col-sm-3">
            <?php if (get_field('associated_company_text')) { ?>
                <div class="sidebar-company-profile col-xs-12">
                    <h3 class="t-2-left">Company Profile</h3>
                    <h5><?php the_field('associated_company_text'); ?></h5>
                </div>
            <?php } else {
                if (get_field('company') != "") { ?>
                    <div class="sidebar-company-profile col-sm-12 col-xs-7">

                        <h3 class="t-2-left">Company Profile</h3>
                        <?php
                        $posts = get_field('company');
                        if ($posts):
                            foreach ($posts as $post):
                                setup_postdata($post);
                                $companyID = $post->ID; ?>
                                <?php if (get_field('logo')) {
                                $company_logo = get_field('logo'); ?>
                                <?php $resizedcompany_logo = vt_resize('', $company_logo['url'], 250, 9999, true); ?>
                                <div class="logo"><a href="<?php the_permalink(); ?>"><img
                                            src="<?php echo $company_logo['url']; ?>" class="img-responsive"></a></div>
                            <?php } ?>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p>
                                    <?php the_field('short_description'); ?>
                                </p>
                                <!--                 <div class="tags">
                    <?php $post_tags = get_the_tags();
                                if ($post_tags) {
                                    foreach ($post_tags as $tag) { ?>
                     <a href="/tag/<?php echo $tag->slug; ?>" class="tag">#<?php echo $tag->name; ?></a>
                     <?php }
                                } ?>
               </div> -->
                                <h2><?php _e('Tags', 'FDI-2'); ?></h2>
                                <?php the_tags('<ul class="fdi-post-tags"><li>', '</li><li>', '</li></ul>'); ?>
                            <?php endforeach;
                            wp_reset_postdata(); endif; ?>
                    </div>
                <?php }
            } ?>
            <?php
            $posts = get_field('context_story');
            if ($posts): ?>
                <div class="topics col-sm-12 col-xs-7 no-paddings">
                    <div class="row">
                        <h4 class="col-xs-12">Context Story</h4>
                    </div>
                    <?php foreach ($posts as $post): ?>
                        <?php $thumbnail_post_url = get_the_post_thumbnail_url($post->ID, 'full');

                        $resizedContext_img = vt_resize('', $thumbnail_post_url, 300, 225, true); ?>
                        <div class="row">
                            <div class="col-sm-12 topic-item">
                                <div class="topic-img">
                                    <?php if ($resizedContext_img['url']) : ?>
                                        <img src="<?php echo $resizedContext_img['url']; ?>" class="img-responsive"
                                             alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php $post_tags = get_the_tags();
                                        if ($post_tags) { ?>
                                            <!--   <div class="topic-tag">
                        <?php foreach ($post_tags as $tag) { ?>
                        <?php echo $tag->name; ?>
                        <?php } ?>
                      </div> -->
                                        <?php } ?>
                                    </a>
                                </div>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <!-- <p><?php echo get_field('excerpt'); ?></p> -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
<?php if (!empty($posts)):
    echo render_partial('parts/relevant_single', ['posts' => $posts]);
endif; ?>
<?php get_footer(); ?>