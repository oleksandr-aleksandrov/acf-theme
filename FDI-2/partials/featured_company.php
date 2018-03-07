<?php $currentCat = do_shortcode('[currentCategory]'); ?>
<?php
$args = array(
    'post_type' => 'company',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'company_catgory',
            'field'    => 'slug',
            'terms'    => array( 'featured', $currentCat ),
            'operator' => 'AND',
        ),
    ),
);
// The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>
<div class="row mb40">
    <div class="company-list">
        <h4 class="t-1 col-xs-12">Featured Companies</h4>
        <?php while ( $the_query->have_posts() ) {
            $the_query->the_post();
         ?>
        <div class="col-sm-2 col-xs-4 company-list-item">
            <?php 
                $image = get_field('logo');
                if( !empty($image) ): ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $image; ?>" class="img-responsive">
                    <h6><?php echo get_the_title(); ?></h6>
                </a>
            <?php endif; ?>
        </div>
        <?php } ?>
    </div>
</div>
<div class="button-row">
    <div class="row">
        <a class="btn red-btn red-btn-right" href="<?php echo site_url() .'/'. $currentCat .'-companies'; ?>"><span>Companies Index</span> <p class="arrow-right"></p></a>
    </div>
</div>
<?php wp_reset_postdata(); } ?>