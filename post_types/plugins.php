<?php

$file_name = basename( __FILE__, ".php" );

$my_cpt['name'] = ucfirst( $file_name );
$my_cpt['type'] = $file_name;
$my_cpt['slug'] = strtolower( $file_name );
$my_cpt['menu_name'] = 'zM ' . $my_cpt['name'];

$plugin = new $my_cpt['name']();
$plugin->asset_url = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/';
$plugin->post_type = array(
    array(
        'name' => $my_cpt['name'],
        'type' => $my_cpt['type'],
        'menu_name' => $my_cpt['menu_name'],
        'rewrite' => array(
            'slug' => $my_cpt['slug']
            ),
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'comments'
        ),
        'taxonomies' => array(
            'license'
            )
    )
);

$plugin->taxonomy = array(
     array(
         'name' => 'license',
         'post_type' => $my_cpt['type']
         )
);

$plugin->meta_sections['repository'] = array(
    'name' => 'repository',
    'label' => __('Repository Settings'),
    'fields' => array(
        array(
            'label' => 'GitHub URL',
            'type' => 'text',
            'placeholder' => 'http://github.com/user/repo'
            ),
        array(
            'label' => 'WordPress URL',
            'type' => 'text',
            'class' => 'datetime-picker-end',
            'placeholder' => 'http://wordpress.org/extends/plugins/your-plugin/'
            ),
        array(
            'label' => 'Download URL',
            'type' => 'text',
            'placeholder' => 'http://additional-download-link.com/repo.zip'
            )
    )
);

$plugin->meta_sections['demo'] = array(
    'name' => 'demo',
    'label' => __('Demo Links'),
    'fields' => array(
        array(
            'label' => 'Demo Link',
            'type' => 'text',
            'placeholder' => ''
            ),
        array(
            'label' => 'Demo Admin Link',
            'type' => 'text',
            'class' => 'datetime-picker-end',
            'placeholder' => 'http://wordpress.org/extends/plugins/your-plugin/'
            )
    )
);
