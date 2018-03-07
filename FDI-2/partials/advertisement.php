<div class="row download-block">
    <div class="col-sm-5 download-first">
        <h3 class="t-1"><?php the_field('ad_title'); ?></h3>
        <h4><?php the_field('ad_content'); ?></h4>
        <p>
            <a href="<?php the_field('ios_link'); ?>"><img style="margin-top: 1em;" src="<?php the_field('app_store_logo'); ?>" width="119" height="42" data-pin-nopin="true"></a>
            <a href="<?php the_field('google_link'); ?>"><img style="margin-top: 1em;" src="<?php the_field('android_store_logo'); ?>" alt="" width="141" height="42" data-pin-nopin="true"></a>
        </p>
        <h4><?php the_field('guide_text'); ?></h4>
        <a href="<?php the_field('guide_link'); ?>" class="btn yellow-btn"><?php the_field('yellow_button_text'); ?></a>
    </div>
    <?php 
    $image = get_field('ad_image');
    if( !empty($image) ): ?>
    <div class="col-xs-6 col-sm-4 download-second">
        <img src="<?php echo $image; ?>" class="img-responsive">
    </div>
    <?php endif; ?>
    <div class="col-xs-5 col-sm-2 download-third">
        <h4><?php the_field('right_text', false, false); ?></h4>
        <div class="img-rotate-wrap">
            <?php if( have_rows('right_image') ){
                $index=0;
                while ( have_rows('right_image') ) { the_row(); $index = $index+1;?>
                    <?php if($index==1) { ?>
                        <img src="<?php the_sub_field('upload_image'); ?>" class="img-responsive img-rotate img-rotate-right animation-element">
                    <?php } elseif($index==2) { ?>
                        <img src="<?php the_sub_field('upload_image'); ?>" class="img-responsive img-rotate img-rotate-left animation-element">
                    <?php } else { ?>
                        <img src="<?php the_sub_field('upload_image'); ?>" class="img-responsive img-rotate">
                    <?php } ?>
                <?php }
            } ?>                  
        </div>
    </div>
</div>