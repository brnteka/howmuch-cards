<?php
/*
Plugin Name: Howmuch Cards
Author: brnteka
*/
defined( 'ABSPATH' ) || exit;

function myplugin_enqueue_block_editor_assets() {
    wp_enqueue_script(
      'howmuch',
      plugins_url( 'build/index.js', __FILE__ ),
      array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );
    
    wp_register_style(
      'howmuch',
      plugins_url( 'style.css', __FILE__ ),
      array( ),
      filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
    );

    wp_register_style(
      'howmuch-editor',
      plugins_url( 'editor.css', __FILE__ ),
      array( ),
      filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
    );
    
    register_block_type( 'howmuch/example-05-recipe-card-esnext', array(
      'style' => 'howmuch',
      'editor_style' => 'howmuch-editor',
      'editor_script' => 'howmuch'
	) );

}
add_action( 'init', 'myplugin_enqueue_block_editor_assets' );
?>