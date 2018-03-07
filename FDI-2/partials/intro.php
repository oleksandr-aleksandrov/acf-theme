<?php $currentCat = do_shortcode('[currentCategory]'); ?>
<div class="row mb40">
    <div class="col-sm-8 main-article">
        <?php $posts = get_field('hero_article');
          if( $posts ): 
          foreach( $posts as $post): 
          setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" class="main-article-img">
                <img src="<?php the_field('image'); ?>" class="img-responsive" alt="<?php the_title(); ?>">
            </a>
            <h1 class="t-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php the_field('excerpt'); ?>
        <?php endforeach; wp_reset_postdata(); endif; ?>
    </div>
    <?php
    $args = array(
        'post_type' => 'interview',
        'posts_per_page' => '1',
        'tax_query' => array(
            array(
                'taxonomy' => 'interview_catgory',
                'field'    => 'slug',
                'orderby'  => 'post_date',
                'order'    => 'DESC',
                'terms'    => array( $currentCat ),
                'operator' => 'AND',
            ),
        ),
    );
    // The Query
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) { 
    while ( $the_query->have_posts() ) {
    $the_query->the_post(); ?>
    <div class="col-sm-4 latest-interview">
        <div class="latest-interview-img-wrap">
            <a href="<?php the_permalink(); ?>" class="latest-interview-img">
                <img src="<?php echo wp_get_attachment_image_url( get_field('upload_image'), 'thumbnail' ); ?>" alt="<?php echo get_the_title(); ?>" class="img-responsive">
            </a>
        </div>
        <div class="author-info">
          <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
          <h4><?php the_field('ceo_position') ; ?>,
          <?php $posts = get_field('company');
          if( $posts ): 
          foreach( $posts as $post): 
          setup_postdata($post); ?>
          <?php the_title(); ?>
          <?php endforeach; wp_reset_postdata(); endif; ?>
          </h4>
        </div>
        <h2 class="t-1 col-sm-12 col-xs-6">Latest Interview</h2>
    </div>
    <?php } wp_reset_postdata(); } ?>
</div>