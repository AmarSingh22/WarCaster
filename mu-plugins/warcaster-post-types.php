<?php
function warcaster_post_types(){
    register_post_type('spells', array(
        'public' => true,
        'labels' => array(
            'name' => "Spells",
            'add_new_item' => 'Conjure New Spell',
            'edit_item' => 'Edit Spells',
            'all_items' => 'All Spells',
            'singular_name' => "Spell",
        ),
        'menu_icon' => 'dashicons-art',
        'rewrite' => array('slug' => 'spells'),
        'has_archive' => true,
        'supports' => array('title', 'editor')
        ));

    register_post_type('subclasses', array(
        'public' => true,
        'labels' => array(
            'name' => "SubClasses",
            'add_new_item' => 'Create New Subclass',
            'edit_item' => 'Edit SubClasses',
            'all_items' => 'All SubClasses',
            'singular_name' => "SubClasse",
        ),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'subclass'),
        'has_archive' => true,
        'supports' => array('title', 'editor')
        ));

    register_post_type('feats', array(
        'public' => true,
        'labels' => array(
            'name' => "Feats",
            'add_new_item' => 'Solidify New Feat',
            'edit_item' => 'Edit Feats',
            'all_items' => 'All Feats',
            'singular_name' => "Feat",
        ),
        'menu_icon' => 'dashicons-buddicons-activity',
        'rewrite' => array('slug' => 'feats'),
        'has_archive' => true,
        'supports' => array('title', 'editor')
        ));


}

add_action('init', 'warcaster_post_types');