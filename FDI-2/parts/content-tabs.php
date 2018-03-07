<?php
/**
 * @var string $term
 */
?>

<ul class="nav navbar-nav pull-right nav-menu content-tabs">
    <li>
        <a href="<?php echo get_term_link_with_cpt('articles', $term); ?>">Articles</a>
    </li>
    <li><a
            href="<?php echo get_term_link_with_cpt('interviews', $term); ?>">Interviews</a>
    </li>
    <li>
        <a href="<?php echo get_term_link_with_cpt('profiles', $term); ?>">Profiles</a>
    </li>
</ul>