<?php

  // Add custom Post Type offers
  function create_post_type() {
    register_post_type( 'offers',
      array(
        'supports' => array( 'thumbnail', 'title', 'post-formats', 'editor', 'category'),
        'labels' => array(
          'name' => __( 'Offers' ),
          'singular_name' => __( 'Offer' )
        ),
        'public' => true,
        'has_archive' => false,
      )
    );
  }
  add_action( 'init', 'create_post_type' );

  // Add categories to offer
  function sk_add_category_taxonomy_to_events() {
  	register_taxonomy_for_object_type( 'category', 'offers' );
  }
  add_action( 'init', 'sk_add_category_taxonomy_to_events' );

  /*
  * Enqueue JQuery, JS, stylsheets, fontawsome
  */
  function custom_enqueue_scripts() {
      wp_enqueue_style( 'hip-style', get_template_directory_uri().'/dist/css/style.css' );
      wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBrjF7V8AtYYk_FrEVQclmCTHtoGKckyUU', array(), '3', true );
      wp_enqueue_script( 'hip-script', get_template_directory_uri() . '/dist/js/hip.min.js', array('google-map', 'jquery'), '0,1', true);
  }
  add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts' );

  function register_my_menus() {
    register_nav_menus(array(
      'primary' => __( 'Primary Menu' ),
    ));
  }
  add_action('after_setup_theme', 'register_my_menus');

  // add toggle class to menu item
  function special_nav_class($classes, $item){
      $classes[] = 'goTo';
      return $classes;
  }
  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

  add_theme_support( 'post-thumbnails' );
  remove_filter( 'the_content', 'wpautop' ); // Remove auto added p tags from content

  function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBrjF7V8AtYYk_FrEVQclmCTHtoGKckyUU';
    return $api;
  }
  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

?>
