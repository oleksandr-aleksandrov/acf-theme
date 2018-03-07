<?php 
/******** LATEST ARTICLE ***********/
$args = array(
   'posts_per_page'     => 1,
   'post_type'       => 'article',
   'orderby'         => 'post_date',
   'post_status'     => 'publish',
   'order'           => 'DESC',
   'category__in'    => array( $current_category ),
    'meta_key'       => 'featured_article',
    'meta_value'     => TRUE,
);
$the_query = new WP_Query( $args );
?>
<div class="row">
   <?php if( $the_query->have_posts() ): ?>
      <div class="col-sm-8 col-xs-15 main-article">
         <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $latest_post_id = get_the_ID(); ?>
            <?php $article_img = get_field( 'article_image' ); ?>
            <?php $resizedarticle_img = vt_resize('', $article_img['url'], 750, 255, true); ?>
            <a href="<?php the_permalink(); ?>" class="main-article-img">
               <img src="<?php echo $resizedarticle_img['url'] ?>" class="img-responsive" alt="<?php the_title(); ?>" />
            </a>
            <h1 class="t-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php the_field('excerpt'); ?></p>
         <?php endwhile; ?>
         <?php wp_reset_query(); ?>
      </div>
   <?php endif; ?>

<?php 
$args = array(
   'posts_per_page'     => 4,
   'posts_per_page'  => 4,
   'post_type'       => 'interview',
   'orderby'         => 'post_date',
   'post_status'     => 'publish',
   'order'           => 'DESC',
   'category__in'    => array( $current_category ),
);
$the_query = new WP_Query( $args );
?>
<?php if( $the_query->have_posts() ): ?>
   <div class="col-sm-4 col-xs-12 opinions-block">
      <div class="row">
         <h4 class="col-xs-12 opinions-title t-1">Opinions</h4>
      </div>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
         <?php $person_img = get_field('upload_image'); ?>
         <?php $resizedperson_img = vt_resize('', $person_img['url'], 150, 130, true); ?>
         <div class="row opinion-item">
            <div class="col-xs-5 opinion-img">
               <a href="<?php the_permalink(); ?>"><img src="<?php echo $resizedperson_img['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" /></a>
            </div>
            <div class="col-xs-6 opinion-author">
				  <a href="<?php the_permalink(); ?>"><span><?php the_title(); ?>,</span></a> <?php get_person_position($post->ID); ?>
			   </div>
         </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
   </div>
<?php endif; ?>
</div>