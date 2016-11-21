<?php

// Custom Post Types
function aiw_register_organisations() {

  $labels = array(
    'name'                  => _x( 'Organisations', 'Post Type General Name', 'properbear' ),
    'singular_name'         => _x( 'Organisation', 'Post Type Singular Name', 'properbear' ),
    'menu_name'             => __( 'Organisations', 'properbear' ),
    'name_admin_bar'        => __( 'Organisation', 'properbear' ),
    'archives'              => __( 'Organisation Archives', 'properbear' ),
    'parent_item_colon'     => __( 'Parent Item:', 'properbear' ),
    'all_items'             => __( 'All Organisations', 'properbear' ),
    'add_new_item'          => __( 'Add New Organisation', 'properbear' ),
    'add_new'               => __( 'Add New', 'properbear' ),
    'new_item'              => __( 'New Organisation', 'properbear' ),
    'edit_item'             => __( 'Edit Organisation', 'properbear' ),
    'update_item'           => __( 'Update Organisation', 'properbear' ),
    'view_item'             => __( 'View Organisation', 'properbear' ),
    'search_items'          => __( 'Search Organisation', 'properbear' ),
    'not_found'             => __( 'Not found', 'properbear' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'properbear' ),
    'featured_image'        => __( 'Organisation Logo', 'properbear' ),
    'set_featured_image'    => __( 'Set organisation logo', 'properbear' ),
    'remove_featured_image' => __( 'Remove organisation logo', 'properbear' ),
    'use_featured_image'    => __( 'Use as organisation logo', 'properbear' ),
    'insert_into_item'      => __( 'Insert into item', 'properbear' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'properbear' ),
    'items_list'            => __( 'Items list', 'properbear' ),
    'items_list_navigation' => __( 'Items list navigation', 'properbear' ),
    'filter_items_list'     => __( 'Filter items list', 'properbear' ),
  );
  $args = array(
    'label'                 => __( 'Organisation', 'properbear' ),
    'description'           => __( 'Arts organisations', 'properbear' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-building',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'organisation', $args );

}

add_action( 'init', 'aiw_register_organisations', 0 );


// Register Custom Post Type
function aiw_register_projects() {

  $labels = array(
    'name'                => _x( 'Projects', 'Post Type General Name', 'properbear' ),
    'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'properbear' ),
    'menu_name'           => __( 'Projects', 'properbear' ),
    'name_admin_bar'      => __( 'Project', 'properbear' ),
    'parent_item_colon'   => __( 'Parent Item:', 'properbear' ),
    'all_items'           => __( 'All Projects', 'properbear' ),
    'add_new_item'        => __( 'Add New Project', 'properbear' ),
    'add_new'             => __( 'Add New', 'properbear' ),
    'new_item'            => __( 'New Project', 'properbear' ),
    'edit_item'           => __( 'Edit Project', 'properbear' ),
    'update_item'         => __( 'Update Project', 'properbear' ),
    'view_item'           => __( 'View Project', 'properbear' ),
    'search_items'        => __( 'Search Item', 'properbear' ),
    'not_found'           => __( 'Not found', 'properbear' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'properbear' ),
  );
  $args = array(
    'label'               => __( 'project', 'properbear' ),
    'description'         => __( 'Post Type Description', 'properbear' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor'),
    'taxonomies'          => array( 'category' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-desktop',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'aiw_register_projects', 0 );


// Register Artforms Taxonomy
function aiw_register_artforms() {

    $labels = array(
        'name'                       => _x( 'Art Forms', 'Taxonomy General Name', 'properbear' ),
        'singular_name'              => _x( 'Art Form', 'Taxonomy Singular Name', 'properbear' ),
        'menu_name'                  => __( 'Artforms', 'properbear' ),
        'all_items'                  => __( 'All Artforms', 'properbear' ),
        'parent_item'                => __( '', 'properbear' ),
        'parent_item_colon'          => __( '', 'properbear' ),
        'new_item_name'              => __( 'New Artform Name', 'properbear' ),
        'add_new_item'               => __( 'Add New Artform', 'properbear' ),
        'edit_item'                  => __( 'Edit Artform', 'properbear' ),
        'update_item'                => __( 'Update Artform', 'properbear' ),
        'view_item'                  => __( 'View Artform', 'properbear' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'properbear' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'properbear' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'properbear' ),
        'popular_items'              => __( 'Popular Artforms', 'properbear' ),
        'search_items'               => __( 'Search Artforms', 'properbear' ),
        'not_found'                  => __( 'Not Found', 'properbear' ),
        'no_terms'                   => __( 'No items', 'properbear' ),
        'items_list'                 => __( 'Items list', 'properbear' ),
        'items_list_navigation'      => __( 'Items list navigation', 'properbear' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'artform', array( 'project' ), $args );

}
add_action( 'init', 'aiw_register_artforms', 0 );


 ?>