<?php 
$args = array(
  'post_type'       => 'company',
  'posts_per_page'  => 6,
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'post_status'     => 'publish',
  'category__in'    => array( $current_category )
);

$the_query = new WP_Query( $args );
?>

<?php if ( $the_query->have_posts() ) : ?>
  <div class="row mb40">
     <div class="company-list">
        <h4 class="t-1 col-xs-12"><a href="<?php the_permalink(); ?>">Recent Updates</a></h4>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-sm-2 col-xs-4 company-list-item">
           <?php $company_logo = get_field('logo'); ?>
           <?php $resizedcompany_logo = vt_resize('', $company_logo['url'], 250, 9999, true); ?>
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo $resizedcompany_logo['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" />
              <h6><?php the_title(); ?></h6>
            </a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
     </div>
  </div>
<?php endif; ?>