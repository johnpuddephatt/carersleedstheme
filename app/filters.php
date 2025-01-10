<?php

namespace App;

use Illuminate\Support\Str;
use function Roots\view;
use function Roots\bundle;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

// add_filter('carbon_fields_map_field_api_key', function ($key) {
//     return 'AIzaSyCNY11TdN4n8_smofsQV-8AbQsfC85Z7xM';
// });


add_action('load-index.php', function () {
    wp_redirect(admin_url('edit.php?post_type=page'));
});

add_filter(
    'admin_menu',
    function ($menu) {
        remove_menu_page('index.php');
        // remove_menu_page('plugins.php');
        // remove_menu_page('themes.php');
        remove_menu_page('customize.php');
        $customize_url = add_query_arg('return', urlencode(remove_query_arg(wp_removable_query_args(), wp_unslash($_SERVER['REQUEST_URI']))), 'customize.php');
        remove_submenu_page('themes.php', $customize_url);

        // add_menu_page(
        //     'Customizer',          // Page title
        //     'Customise site',          // Menu title
        //     'manage_options',      // Capability
        //     'customize.php',     // Menu slug
        //     '',
        //     '',                    // Icon URL (optional)
        //     0                      // Position (optional)
        // );
    }
);

add_action('admin_bar_menu', function ($wp_admin_bar) {
    $wp_admin_bar->remove_menu('customize');
}, 999);


add_filter('tribe_events_assets_should_enqueue_frontend', '__return_false');

add_filter('tribe_events_rewrite_base_slugs', function ($slugs) {
    unset($slugs['archive']);
    $slugs['archive'] = [];
    return $slugs;
});


add_filter('tribe_template_file', function ($file) {

    $path = str_replace('/', '.', Str::after(basename($file, '.php'), 'v2/'));

    if (is_single() && $path == 'default-template') {
        $path = 'single';
    }

    if (in_array($path, ['default-template', 'single'])) {
        return view()->exists("events.{$path}")
            ? view("events.{$path}")->makeLoader()
            : $file;
    }

    return $file;
});


add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars) {
    $toolbars['Simple'] = [];
    // $toolbars['Simple'][1] = ['bold', 'italic', 'underline', 'link', 'unlink'];
    $toolbars['Simple'][1] = ['bold', 'italic'];
    return $toolbars;
});


add_filter('acf_svg_icon_picker_folder', function () {
    return 'resources/icons/';
});

add_filter('excerpt_more', function ($more) {
    global $post;
    return ' ';
});

add_filter(
    'excerpt_length',
    function ($length) {
        return 20;
    },
    999
);



add_action('init', function () {
    $post_type_object = get_post_type_object('post');
    $post_type_object->template = array();
});

add_filter('simple_page_ordering_is_sortable', function ($sortable, $post_type) {
    return $post_type === 'person' ? $sortable : false;
}, 10, 2);


// add_filter('render_block', function ($block_content, $block) {
//     // dd($block_content);
//     if ('core/paragraph' === $block['blockName']) {
//         $block_content = new \WP_HTML_Tag_Processor($block_content);
//         $block_content->next_tag(); /* first tag should always be ul or ol */

//         $block_content->add_class('wp-block-paragraph');
//         $block_content->get_updated_html();
//     }

//     return $block_content;
// }, 10, 2);

define('TEC_HIDE_UPSELL', true);
add_filter('tec_common_telemetry_show_optin_modal', '__return_false');
