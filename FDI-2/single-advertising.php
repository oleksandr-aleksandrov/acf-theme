<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="cover-container height-medium">
                <?php $thumbnail_post_url = get_the_post_thumbnail_url($post->ID, 'full');
                ?>
                <img class="img-cover" src="<?php echo $thumbnail_post_url; ?>" alt="">
            </div>
        </div>
        <div class="row">
            <h1 class="col-md-12"><?php the_title(); ?></h1>
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="row">
                    <div class="col-md-10">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php get_footer();