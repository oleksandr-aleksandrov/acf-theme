<?php

foreach ($posts as $key => $post) {
    if ($key > 5) break;
    if ($key == 0 || $key == 3) {
        render_partial('parts/1_4_tall', ['post' => isset($post) ? $post : '']);
        render_partial('parts/1_4_half_block', ['posts' => array(isset($posts[$key + 1]) ? $posts[$key + 1] : '', isset($posts[$key + 2]) ? $posts[$key + 2] : '')]);
    }
}

?>