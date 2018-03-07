<?php

function register_fields_sectors()
{
    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'group_5a689d4494590',
            'title' => 'test1',
            'fields' => array(
                array(
                    'key' => 'field_5a689d4ad18c6',
                    'label' => 'Image Sector',
                    'name' => 'image-sector',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => '',
                                'operator' => '!=',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'sector_thumb',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5a71a2429f47a',
                    'label' => 'asd',
                    'name' => 'asd',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'taxonomy',
                        'operator' => '==',
                        'value' => 'sector',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

    endif;
}

add_action('init', 'register_fields_sectors');
