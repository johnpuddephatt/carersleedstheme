<?php

// functions.php
function wds_algolia_exclude_post($should_index, \WP_Post $post)
{

    // If a page has been marked not searchable
    // by some other means, don't index the post.
    if (false === $should_index) {
        return false;
    }


    // ACF Field.
    // Check if a page is searchable.
    $excluded = get_field('exclude_from_search', $post->ID);

    // If not, don't index the post.
    if (1 === $excluded) {
        return false;
    }

    // If all else fails, index the post.
    return true;
}
add_filter('algolia_should_index_searchable_post', 'wds_algolia_exclude_post', 10, 2);
add_filter('algolia_should_index_post', 'wds_algolia_exclude_post', 10, 2);
