<div class="alphabetic-index">
    <h3 class="t-1">Companies in <?php echo strtoupper($current_category_name);?> Region</h3>
    <div class="filter">
        <ul class="nav nav-pills">
            <?php
             $taxonomy = 'post_tag';
             $tax_terms = $tax_terms = get_terms($taxonomy, array('hide_empty' => true));
             ?>
            <li class="active"><a href="#all" data-toggle="tab">All Sectors</a></li>
            <?php
            foreach ($tax_terms as $tax_term) { 
            $slug = $tax_term->slug; 
            $term_id = $tax_term->term_id;
            $comp_args = array(
                'post_type' => 'company',
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'category__in'  => array( $current_category ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'slug',
                        'terms'    => $slug,
                    ),
                ),
            );
            $comp_query = new WP_Query( $comp_args );
            if ( $comp_query->have_posts() ) {
            ?>
            <li>
                <a href="#<?php echo  $tax_term->slug; ?>" data-toggle="tab">
                    <?php echo  $tax_term->name; ?>
                </a>
            </li>
            <?php } } ?>
        </ul>
    </div>
    <div class="tab-content row">
        <div id="all" class="tab-pane fade in active">
            <?php 
            $args = array(
                'post_type' => 'company',
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'category__in'  => array( $current_category )
            );?>

            <?php
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>

                <div class="col-xs-4 alphabetic-index-item">
                    <a href="<?php the_permalink(); ?>">
                        <p>
                            <?php echo get_the_title() ; ?>
                        </p>
                    </a>
                </div>
                <?php }
              wp_reset_postdata();
            } ?>
        </div>

        <?php
           foreach ($tax_terms as $tax_term) { 
            $slug = $tax_term->slug; 
            $term_id = $tax_term->term_id;?>
            <div id="<?php echo  $slug ?>" class="tab-pane fade">

            <?php
               $comp_args = array(
                    'post_type' => 'company',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'category__in'  => array( $current_category ),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => $slug,
                        ),
                    ),
                );
                $comp_query = new WP_Query( $comp_args );
                if ( $comp_query->have_posts() ) {

                  while ( $comp_query->have_posts() ) {
                    $comp_query->the_post(); ?>

                <div class="col-xs-4 alphabetic-index-item">
                    <a href="<?php the_permalink(); ?>">
                        <p>
                            <?php echo get_the_title() ; ?>
                        </p>
                    </a>
                </div>
            <?php }
                wp_reset_postdata();
            }else { ?>
                <div class="col-xs-4 alphabetic-index-item">
                    <p>No Companies Found</p>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>