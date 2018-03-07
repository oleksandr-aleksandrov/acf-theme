<?php $currentCat = do_shortcode('[currentCategory]'); ?>
<?php
$args = array(
    'post_type' => 'article',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'article_catgory',
            'field'    => 'slug',
            'terms'    => array( 'featured', $currentCat ),
            'operator' => 'AND',
        ),
    ),
);
// The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>
<div class="topics">
    <div class="row">
        <h4 class="col-xs-12 t-1">Featured Articles</h4>
    </div>
    <div class="row">
        <?php while ( $the_query->have_posts() ) {
            $the_query->the_post();
         ?>
            <div class="col-sm-4 col-xs-6 topic-item">
                <?php 
                $image = get_field('image');
                if( !empty($image) ): ?>
                    <div class="topic-img">
                        <a href="<?php the_permalink(); ?>" style='background-image:url("<?php echo $image; ?>");'>
                            <?php $post_tags = get_the_tags();
                                if ( $post_tags ) { ?>
                                    <div class="topic-tag">
                                        <?php foreach( $post_tags as $tag ) { ?>
                                            <?php echo $tag->name; ?>
                                        <?php } ?>
                                    </div>
                             <?php } ?>
                        </a>
                    </div>
                <?php endif; ?>
                <h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                <?php $trimexcerpt = get_field('excerpt'); ?>
                <p><?php echo wp_trim_words( $trimexcerpt, $num_words = 35, $more = '… ' ); ?></p>
            </div>
        <?php } ?>
    </div>
</div>
<div class="button-row mb40">
    <div class="row">
        <a class="btn red-btn red-btn-right" href="<?php echo site_url() .'/'. $currentCat .'-articles'; ?>"><span>Top Index</span> <p class="arrow-right"></p></a>
    </div>
</div>
<?php wp_reset_postdata(); } ?>