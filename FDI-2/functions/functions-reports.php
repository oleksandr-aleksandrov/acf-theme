<?php

function register_fields_reports()
{

    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'report_content',
            'title' => 'Report Content',
            'fields' => array(

                array(
                    'key' => 'term_category',
                    'label' => 'Category',
                    'name' => 'term_category',
                    'type' => 'taxonomy',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'taxonomy' => 'category',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'object',
                    'multiple' => 0,
                ),
                array(
                    'key' => 'header_tab',
                    'label' => __('Header Report Content'),
                    'name' => 'header_tab',
                    'type' => 'tab',
                ),

                array(
                    'key' => 'logo_image',
                    'label' => 'Logo Image',
                    'name' => 'logo_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'logo_image_ipad',
                    'label' => 'Image Ipad',
                    'name' => 'logo_image_ipad',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'content_left_column',
                    'label' => 'Left Content',
                    'name' => 'content_left_column',
                    'type' => 'wysiwyg',
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'tabs' => 'all',
                    'delay' => 0,
                ),
                array(
                    'key' => 'link_web_version',
                    'label' => 'Read the guide online',
                    'name' => 'link_web_version',
                    'type' => 'url',
                ),
                array(
                    'key' => 'content_right_column',
                    'label' => 'Right Content',
                    'name' => 'content_right_column',
                    'type' => 'wysiwyg',
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'tabs' => 'all',
                    'delay' => 0,
                ),
                array(
                    'key' => 'footer_tab',
                    'label' => __('Footer Report Content'),
                    'name' => 'footer_tab',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'reports_footer_content',
                    'label' => 'Footer Content',
                    'name' => 'reports_footer_content',
                    'type' => 'wysiwyg',
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'tabs' => 'all',
                    'delay' => 0,
                ),
                array(
                    'key' => 'market_link',
                    'label' => 'App Store',
                    'name' => 'market_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'google_market_link',
                    'label' => 'Google Play',
                    'name' => 'google_market_link',
                    'type' => 'url',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/report-template.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => 1,
            'description' => '',
        ));

    endif;
}

add_action('init', 'register_fields_reports');