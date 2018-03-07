<?php if (isset($post->ID)): ?>
    <div class="col-xs-12">
        <div class="header-bg"
             style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
            <div class="wow fadeInDown pull-left">
                <h1 class="t-1"><?php the_title(); ?></h1>
            </div>


            <ul class="nav navbar-nav pull-right nav-menu">
                <li><a href="#">Articles</a></li>
                <li class="active"><a href="#">Interviews</a></li>
                <li><a href="#">Profiles</a></li>
            </ul>
            <div class="col-xs-12 chart-wrap">
                <svg id="chart"></svg>
            </div>
        </div>
    </div>
<?php endif; ?>