<div class="alphabetic-index">
  <h3 class="t-1">Alphabetic Index</h3>
  <div class="filter">
    <ul class="nav nav-pills">
      <?php
      $taxonomy = 'post_tag';
      $tax_terms = get_terms($taxonomy, array('hide_empty' => true));
      ?>
      <li class="active"><a href="#all" data-toggle="tab">All Sectors</a></li>
      <?php
      foreach ($tax_terms as $tax_term) : 
      $slug = $tax_term->slug; 
      $termId = $tax_term->term_id; 
       $tagargs = array(
          'post_type'     => 'interview',
          'orderby'       => 'post_date',
          'order'         => 'DESC',
          'post_status'   => 'publish',
          'category__in'  => array( $current_category ),
          'meta_key'      => 'sector',
          'meta_value'    => $termId,
        );

        $tag_query = new WP_Query( $tagargs );
        if ( $tag_query->have_posts() ) { ?>
        <li>
          <a href="#<?php echo  $tax_term->slug; ?>" data-toggle="tab">
            <?php echo  $tax_term->name; ?>
          </a>
        </li>
      <?php } endforeach; ?>
    </ul>
  </div>
  <div class="tab-content row">
    <div id="all" class="tab-pane fade in active">
      <?php 
      $args = array(
        'post_type'     => 'interview',
        'orderby'       => 'post_date',
        'order'         => 'DESC',
        'post_status'   => 'publish',
        'category__in'  => array( $current_category )
      );
      $the_query = new WP_Query( $args );
      ?>

      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-xs-4 alphabetic-index-item">
            <a href="<?php the_permalink(); ?>">
              <p><?php the_title(); ?></p>
              <p><?php get_person_position($post->ID); ?></p>
            </a>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      <?php endif; ?>
    </div>

    <?php
    foreach ($tax_terms as $tax_term) { 
      $slug = $tax_term->slug; 
      $termId = $tax_term->term_id; 

    ?>
      <div id="<?php echo $slug ?>" class="tab-pane fade">

        <?php       
        $tagargs = array(
          'post_type'     => 'interview',
          'orderby'       => 'post_date',
          'order'         => 'DESC',
          'post_status'   => 'publish',
          'category__in'  => array( $current_category ),
          'meta_key'      => 'sector',
          'meta_value'    => $termId,
        );

        $tag_query = new WP_Query( $tagargs );
        if ( $tag_query->have_posts() ) {?>
          <?php while ( $tag_query->have_posts() ) : $tag_query->the_post(); ?>

              <div class="col-xs-4 alphabetic-index-item">
                  <a href="<?php the_permalink(); ?>">
                      <p><?php the_title() ; ?></p>
                      <p><?php get_person_position($post->ID); ?></p>
                  </a>
              </div>

          <?php endwhile; ?>
          <?php wp_reset_query(); ?>
        <?php }else{ ?>
          <div class="col-xs-4 alphabetic-index-item">
            <p>No Interviews Found</p>
          </div>
        <?php } ?>

      </div>
    <?php } ?>
  </div>
</div>