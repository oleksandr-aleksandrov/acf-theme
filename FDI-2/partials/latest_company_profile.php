<?php 
$args = array(
  'post_type'       => 'company',
  'posts_per_page'  => 1,
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'post_status'     => 'publish',
  'category__in'    => array( $current_category )
);

$the_query = new WP_Query( $args );
?>

<div class="row mb40">
  <?php if ( $the_query->have_posts() ) : ?>
    <div class="col-sm-8 main-article">
      <h1 class="t-1">Latest Company Profile</h1>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="article-header mb20">
           <div class="article-title-bottom">
              <div class="article-title-border" style="z-index: 5">
                <a href="<?php the_permalink(); ?>"><h1 class="t-3"><?php the_title(); ?></h1></a>
              </div>
           </div>
           <div class="article-img-mini">
           <?php if (get_field('banner_image')) { $person_img = get_field('banner_image'); ?>
           <?php $resizedperson_img = vt_resize('', $person_img['url'], 750, 255, true); ?>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo $resizedperson_img['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" />
            </a>
            <?php } ?>
           </div>
        </div>
        <p><?php the_field('excerpt'); ?></p>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      </div>
    <?php endif; ?>
    <div class="col-sm-4">
      <h2 class="t-1"><a href="">In Interview</a></h2>
    </div>

<?php 
$args = array(
  'post_type'       => 'interview',
  'posts_per_page'  => 1,
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'post_status'     => 'publish',
  'category__in'    => array( $current_category )
);

$the_query = new WP_Query( $args );
?>

  <?php if ( $the_query->have_posts() ) : ?>  
    <div class="col-sm-4 latest-interview">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="latest-interview-img-wrap">
        <?php if (get_field('upload_image')) { $person_img = get_field('upload_image'); ?>
        <?php $resizedperson_img = vt_resize('', $person_img['url'], 235, 260, true); ?>
          <a href="<?php the_permalink(); ?>" class="latest-interview-img">
            <img src="<?php echo $resizedperson_img['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>">  
          </a>
        <?php } ?>
      </div>
      <div class="author-info">
         <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?>,&nbsp;</a></h3>
         <h4><?php the_field('ceo_position') ; ?></h4>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </div>
  <?php endif; ?>
</div>
