<?php
/**
* =============================================================================
* Tag Page
* =============================================================================
*/

## PAGE HEADER ##
get_header();
?>
<div class="main-content">
    <?php
    	$tag = get_queried_object();
    	$current_tag = get_queried_object_id();
	?>

        <?php
		/******** FEATURED INTERVIEWS ***********/
		$args = array(
			'post_type' => 'article',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                'key' => 'article_tag', // name of custom field
                'value' => $current_tag, // matches exaclty "123", not just 123. This prevents a match for "1234"
                'compare' => 'LIKE'
                )
            )
		);
		$the_query = new WP_Query( $args );
		?>

        <?php if( $the_query->have_posts() ): ?>
        <div class="topics">
            <div class="row">
                <h4 class="col-xs-12 t-1">Articles assosiated with <?php single_tag_title(); ?></h4>
            </div>
            <div class="row">
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-sm-4 col-xs-6 topic-item">
                    <?php if (get_field('article_image')) { ?>
                        <?php $article_img = get_field( 'article_image' ); ?>
                        <?php $resizedarticle_img = vt_resize('', $article_img['url'], 400, 200, true); ?>
                    <?php }?>
                        <div class="topic-img">
                            <a href="<?php the_permalink(); ?>" style="background-image:url(<?php if (get_field('article_image')) { echo $resizedarticle_img['url']; } ?>)">
                                <div class="topic-tag">
                                    <?php single_tag_title(); ?>
                                </div>
                            </a>
                        </div>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p>
                            <?php the_field('article_summary'); ?>
                        </p>
                    </div>
                 <?php endwhile; ?>
                <div class="button-row">
                    <div class="row"></div>
                </div>
            </div>
        </div>

        <?php endif; ?>

        <?php wp_reset_query(); ?>

	    <?php
	    $args = array(
	        'post_type' 		=> 'interview',
	        'orderby'			=> 'post_date',
	        'order' 			=> 'DESC',
	        'post_status'		=> 'publish',
	        'meta_key'			=> 'sector',
			'meta_value'        => $current_tag
	    );
	    // The Query
	    $the_query = new WP_Query( $args );
	    if ( $the_query->have_posts() ) { ?>
	    <div class="row">
	        <div class="person-list">
	            <h4 class="t-1 col-xs-12">Interviews assosiated with Tag <?php single_tag_title(); ?></h4>

	            <?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
	                <div class="col-sm-3  col-xs-6 person-list-item">
                    <?php if (get_field('upload_image')) { ?>
	                <?php $person_img = get_field('upload_image'); ?>
	                <?php $resizedperson_img = vt_resize('', $person_img['url'], 235, 260, true); ?>
	                <a href="<?php the_permalink(); ?>" class="person-list-item-img">
					<img src="<?php echo $resizedperson_img['url']; ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>" >
					</a>
                    <?php }?>
	                <h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
	                <p>
	                   <?php get_person_position($post->ID); ?>
	                </p>
	                </div>
                <?php } ?>
	        </div>
	    </div>
	    <div class="button-row">
	        <div class="row"></div>
	    </div>
	    <?php } ?>

    <?php
		$args = array(
			'post_type' => 'company',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field'    => 'slug',
                    'terms'    => $tag->slug,
                ),
            ),
		);
		$the_query = new WP_Query( $args );
	?>

    <?php if( $the_query->have_posts() ): ?>
        <div class="row mb40">
            <div class="company-list">
                <h4 class="t-1 col-xs-12">Companies assosiated with Tag <?php single_tag_title(); ?></h4>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php if (get_field('logo')) { $company_logo = get_field('logo'); ?>
                        <?php $resizedcompany_logo = vt_resize('', $company_logo['url'], 250, 9999, true); } ?>
                            <div class="col-sm-2 col-xs-4 company-list-item">
                                <a href="<?php the_permalink(); ?>">
									<?php if (get_field('logo')) { ?><img src="<?php echo $company_logo['url']; ?>" class="img-responsive" alt="<?php the_title(); ?>" /><?php } ?>
									<h6><?php the_title(); ?></h6>
								</a>
                            </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="button-row">
            <div class="row"></div>
        </div>
    <?php endif; ?>

    <?php wp_reset_query(); ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.footer').css('border-top', '0px');
    });
</script>
<?php
## PAGE FOOTER ##
get_footer();
?>