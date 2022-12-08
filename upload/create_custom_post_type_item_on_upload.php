<?php

add_action('init', function() {
    register_post_type( 'fv_cpt', [
        'labels'              => [
            'name'               => __( 'Contest entries', 'fv_cpt' ),
            'singular_name'      => __( 'Contest entry', 'fv_cpt' ),
            'add_new'            => _x( 'Add New entry', 'fv_cpt', 'fv_cpt' ),
            'add_new_item'       => __( 'Add New entry', 'fv_cpt' ),
            'edit_item'          => __( 'Edit entry', 'fv_cpt' ),
            'new_item'           => __( 'New entry', 'fv_cpt' ),
            'view_item'          => __( 'View entry', 'fv_cpt' ),
            'search_items'       => __( 'Search entries', 'fv_cpt' ),
            'not_found'          => __( 'No entries found', 'fv_cpt' ),
            'not_found_in_trash' => __( 'No entries found in Trash', 'fv_cpt' ),
            'parent_item_colon'  => __( 'Parent entries:', 'fv_cpt' ),
            'menu_name'          => __( 'Contest entries', 'fv_cpt' ),
        ],
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-megaphone',
        'menu_position'       => 102,
        'show_in_nav_menus'   => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'has_archive'         => false,
        'query_var'           => false,
        'can_export'          => true,
        'rewrite'             => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ],
    ] );

});

add_action('fv/public/upload_after_insert', function($insert_res) {
    if ( !$insert_res ) {
        return;
    }
    $competitor = fv_get_competitor($insert_res);
    $new_post = [
        'post_title'    => $competitor->name,
        'post_content'  => $competitor->description,
        'post_type'     => 'fv_cpt'
    ];

    $post_id = wp_insert_post($new_post);

    if ( $post_id ) {
        set_post_thumbnail( $post_id, $competitor->image_id );
    }
});
