<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

add_action('template_redirect', function ($template) {
    global $wp_query;
    if ($wp_query->is_404) {
        return '404!';
    }
});

function getParagraphs($content)
{
    $content_array = explode("</p><p>", $content);

    $paragraphs = [];
    foreach ($content_array as $content) {
        $paragraphs[] = [
            'core/paragraph',
            [
                'placeholder' => 'Lorem ipsum dolar amet...',
                'content' => str_replace("\n", "", strip_tags($content, "<a><strong><em><ul><ol><li>"))
            ]
        ];
    }
    return $paragraphs;
}



add_action('init', function () {


    $post_type_object = get_post_type_object('opportunity');
    $blocks = [];
    if (get_field('default_vacancy_sections', 'option')) {
        foreach (get_field('default_vacancy_sections', 'option') as $section) {
            $blocks[] =
                [
                    'core/heading',
                    [
                        'level' => 2,
                        'placeholder' => 'Enter heading',
                        'content' => $section['title']
                    ]
                ];


            $blocks = array_merge($blocks, getParagraphs($section['content']));
        }
    }

    if (get_field('default_vacancy_faqs', 'option')) {



        foreach (get_field('default_vacancy_faqs', 'option') as $section) {

            $content = str_replace("\n", '', $section['content']);

            $blocks[] =
                [
                    'core/details',
                    ['summary' => $section['title']],

                    getParagraphs($content)

                ];
        }
    }

    $post_type_object->template = $blocks;


    $post_type_object = get_post_type_object('volunteering');
    $blocks = [];
    if (get_field('default_volunteering_sections', 'option')) {
        foreach (get_field('default_volunteering_sections', 'option') as $section) {
            $blocks[] =
                [
                    'core/heading',
                    [
                        'level' => 2,
                        'placeholder' => 'Enter heading',
                        'content' => $section['title']
                    ]
                ];


            $blocks = array_merge($blocks, getParagraphs($section['content']));
        }
    }

    if (get_field('default_volunteering_faqs', 'option')) {



        foreach (get_field('default_volunteering_faqs', 'option') as $section) {

            $content = str_replace("\n", '', $section['content']);

            $blocks[] =
                [
                    'core/details',
                    ['summary' => $section['title']],

                    getParagraphs($content)

                ];
        }
    }

    $post_type_object->template = $blocks;
});

add_action('admin_menu', function () {
    remove_action('admin_notices', 'update_nag', 3);
});

add_action('admin_init', function () {
    $options_pages = ['page_for_events', 'page_for_applications', 'page_for_opportunities', 'page_for_404'];

    foreach ($options_pages as $option) {
        add_settings_field($option, ucfirst(str_replace('_', ' ', $option)), function ($args) use ($option) {
            wp_dropdown_pages(array(
                'name'              => $option,
                'show_option_none'  => '&mdash; Select &mdash;',
                'option_none_value' => '0',
                'selected'          => get_option($option),
            ));
        }, 'reading', 'default', array(
            'label_for' => 'field-' . $option,
            'class'     => 'row-' . $option,
        ));

        add_filter('allowed_options', function ($options) use ($option) {
            $options['reading'][] = $option;
            return $options;
        });
    }
});


add_filter('acf/settings/show_admin', '__return_false');


// How to use:
// e.g. http://carersleeds.test/wp/wp-admin/admin.php?export_form=43446&export_meta_key=_happyforms_email_2&export_meta_key=fowoxubyh@yahoo.com

if ($_GET['export_form'] ?? false) {
    require_once(happyforms_get_include_folder() . '/classes/class-exporter-csv.php');
    $exporter = new \HappyForms_Exporter_CSV($_GET['export_form'], 'export.csv'); // FORM id

    $message_ids =
        get_posts(array(
            'fields'          => 'ids', // Only get post IDs
            'post_type' => 'happyforms-message',
            'meta_key' => $_GET['export_meta_key'] ?? null, // META KEY
            'meta_value' => $_GET['export_meta_value'] ?? null, // META VALUE
        ));

    $exporter->export($message_ids);
}

add_filter(
    'pre_get_posts',
    function ($query) {
        if (!is_admin())
            return;

        if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'happyforms-message') {
            // $query->set('orderby', 'meta_value');
            // $query->set('order', 'DESC');
            if ($_GET['form_id'] ?? false) {
                $query->set('meta_query', [
                    [
                        'key' => '_happyforms_form_id',
                        'value' => $_GET['form_id'],
                        'compare' => '=',
                    ],
                ]);
            }
        }
    }
);

add_action('init', function () {
    remove_post_type_support('form_submission', 'editor');
}, 99);

add_action('admin_head', function () {
    echo view('svg')->render();
});

add_action('customize_controls_print_styles', function () {
    echo <<<'HTML'
<style>
    
    #happyforms-steps-nav [data-step="style"] {
        display: none;
    }
</style>
HTML;
});



add_action('admin_head', function () {
    $screen = get_current_screen();
    // if ($screen && $screen->id === 'settings_page_my_options_page') {
    echo "<style>            
            [data-toolbar='simple'] iframe {
            height: 75px !important;
            min-height: 75px !important;
            }

            [data-toolbar='simple'] .mce-statusbar {
            display: none;
            }

             [data-toolbar='simple'] .mce-top-part {
            display: none;
            }

            .edit-post-fullscreen-mode-close.components-button {
            background-color: #eee;
}

.edit-post-fullscreen-mode-close.components-button:before {
content: none;
}
        </style>";
    // }
});

add_action('login_enqueue_scripts', function () { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/public/logo.svg);
            height: 120px;
            width: 200px;

            background-size: 100% auto;
            background-position: center;
            background-repeat: no-repeat;

        }
    </style>
<?php });



/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {

    define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'secondary_navigation' => __('Secondary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation (bottom)', 'sage'),
        'footer_navigation_2' => __('Footer Navigation (top)', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register image sizes
 */

add_image_size('landscape', 300, 200, true);
add_image_size('landscape-lg', 600, 400, true);
add_image_size('landscape-xl', 900, 600, true);
add_image_size('landscape-2xl', 1200, 800, true);
add_image_size('landscape-3xl', 1500, 1000, true);

add_image_size('square', 300, 300, true);
add_image_size('square-lg', 600, 600, true);
add_image_size('square-xl', 900, 900, true);
add_image_size('square-2xl', 1200, 1200, true);


add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];
    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);
    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
