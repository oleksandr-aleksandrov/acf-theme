<?php 
   $args = array(
       'post_type' => 'interview',
       'posts_per_page' => 1,
   	    'orderby' => 'post_date',
   	'order' => 'DESC',
       'post_status' => 'publish',
       'tax_query' => array(
           array(
               'taxonomy' => 'interview_catgory',
               'field'    => 'slug',
               'terms'    => array( 'featured', 'sadc' ),
               'operator' => 'AND',
           ),
       ),
   );
    ?>
<div class="row">
   <div class="col-md-7 col-sm-8 col-xs-12">
      <?php
         $the_query = new WP_Query( $args );
         if ( $the_query->have_posts() ) {
         	while ( $the_query->have_posts() ) {
         		$the_query->the_post(); ?>
      <div class="interview">
         <h4 class="t-1"><a href="">Latest Interview</a></h4>
         <div class="row">
            <div class="col-xs-5">
               <a href="<?php the_permalink(); ?>" class="">
               <img src="<?php echo wp_get_attachment_image_url( get_field('upload_image'), 'thumbnail' ); ?>" class="img-responsive" alt="<?php echo get_the_title() ; ?>" >  
               </a>
            </div>
            <div class="col-xs-6">
               <p><?php the_excerpt(); ?></p>
               <div>
                  <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ; ?>,</a></h3>
                  <h4><?php the_field('ceo_position'); ?> 
                  <?php if(get_field('company')!="") {?>
                  of 
                     <?php $posts = get_field('company');
                        if( $posts ): 
                        	foreach( $posts as $post): 
                        		setup_postdata($post); 
                        		the_title(); 
                        	endforeach; 
                        wp_reset_postdata(); 
                        endif; ?>
                    <?php } ?>
                  </h4>
               </div>
            </div>
         </div>
      </div>
      <?php }
         wp_reset_postdata();
         }?>
   </div>
   <div class="col-sm-4 col-xs-6 col-md-offset-1">
      <div class="topics">
         <div class="row">
            <h4 class="col-xs-12 t-1">Context Story</h4>
         </div>
         <?php $posts = get_field('context_story');
            if( $posts ): 
            	foreach( $posts as $post): 
            		setup_postdata($post); ?>
         <div class="row">
            <div class="col-xs-12 topic-item">
               <div class="topic-img">
                  <a href="" style="background-image:url(<?php echo get_field('image'); ?>)">
                     <div class="topic-tag">Trade</div>
                  </a>
               </div>
               <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h5>
               <p><?php the_excerpt(); ?></p>
            </div>
         </div>
         <?php endforeach; 
            wp_reset_postdata(); 
            endif; ?>
      </div>
   </div>
</div>