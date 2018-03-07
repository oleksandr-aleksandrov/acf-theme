<?php

function register_fields_advertising()
{

    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'download_group',
            'title' => 'What kind of advertising?',
            'fields' => array(
                array(
                    'key' => 'download_block',
                    'label' => 'Download Block?',
                    'name' => 'download_block',
                    'type' => 'true_false',
                    'default_value' => 0,
                ),
                array(
                    'key' => 'ipad_image',
                    'label' => 'Ipad Image',
                    'name' => 'ipad_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'download_block',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'return_format' => 'array',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',

                ),
                array(
                    'key' => 'iphone_image',
                    'label' => 'Ipad Image',
                    'name' => 'iphone_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'download_block',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'return_format' => 'array',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ),
                array(
                    'key' => 'link_google_play',
                    'label' => 'Link Google Play',
                    'name' => 'link_google_play',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'download_block',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'link_app_store',
                    'label' => 'Link App Store',
                    'name' => 'link_app_store',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'download_block',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'sponsored_block',
                    'label' => 'Sponsored Block?',
                    'name' => 'sponsored_block',
                    'type' => 'true_false',
                    'default_value' => 0,
                ),
                array(
                    'key' => 'link_external',
                    'label' => 'Button link',
                    'name' => 'link_external',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'sponsored_block',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'full_advertising',
                    'label' => 'Full Advertising(external link)?',
                    'name' => 'full_advertising',
                    'type' => 'true_false',
                    'default_value' => 0,
                ),
                array(
                    'key' => 'link_external_advertising',
                    'label' => 'External link',
                    'name' => 'link_external_advertising',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'full_advertising',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
            ),

            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'advertising',
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

add_action('init', 'register_fields_advertising');