<?php 
/******** FEATURED INTERVIEWS ***********/
$args = array(
    'posts_per_page'   => 4,
    'post_type'     => 'interview',
    'orderby'       => 'post_date',
    'post_status'   => 'publish',
    'order'         => 'DESC',
    'category__in'  => array( $current_category ),
    'meta_key'      => 'featured_interview',
    'meta_value'    => 1,
);
$the_query = new WP_Query( $args );
?>

<?php if ( $the_query->have_posts() ) { ?>
    <div class="row">
        <div class="person-list">
            <h4 class="t-1 col-xs-12">Featured Interviews</h4>
            <?php while ( $the_query->have_posts() ) {
                $the_query->the_post();
             ?>
            <div class="col-sm-3  col-xs-6 person-list-item">
                <?php if( get_field('upload_image') ): 
                $person_img = get_field('upload_image');
                $resizedperson_img = vt_resize('', $person_img['url'], 235, 260, true);
                ?>
                    <a href="<?php the_permalink(); ?>" class="person-list-item-img">
                        <img src="<?php echo $resizedperson_img['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                    </a>
                <?php endif; ?>
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <?php $trimexcerpt = get_field('the_excerpt'); ?>
                <p><?php echo wp_trim_words( $trimexcerpt, $num_words = 35, $more = '… ' ); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="button-row mb40">
        <div class="row">
            <a class="btn red-btn red-btn-right" href="/interviews/<?php echo $category_slug;?>"><span>Interview Index</span> <p class="arrow-right"></p></a>
        </div>
    </div>
<?php wp_reset_postdata(); } ?>