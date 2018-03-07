<?php
$i = 0;
if (isset($posts)) {
    foreach ($posts as $key => $post) {
        if ($key > 2) break;
        render_partial('parts/1_3', ['post' => $post]);

        $i++;
    }
}
?>