<?php


function wds_algolia_custom_fields(array $attributes, WP_Post $post)
{
    // Eligible post meta fields.
    $fields = [
        '_EventStartDate',
    ];

    // Loop over each field...
    foreach ($fields as $field) {

        // Standard WordPress Post Meta.
        $data = get_post_meta($post->ID, $field);

        // Only index when a field has content.
        if (! empty($data)) {
            $attributes[$field] = $data[0];
        }
    }

    $attributes['_Tags'] = implode(',', wp_list_pluck(get_the_terms($post->ID, 'post_tag'), 'name'));

    return $attributes;
}
add_filter('algolia_post_shared_attributes', 'wds_algolia_custom_fields', 10, 2);
add_filter('algolia_searchable_post_shared_attributes', 'wds_algolia_custom_fields', 10, 2);
