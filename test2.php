<?php
/**
 * @package Test2
 * @version 0.0.1
 */
/*
Plugin Name: test2
Plugin URI: http://kuouu.tw/
Description: This is just a test plugin.
Author: kuouu
Version: 0.0.1
Author URI: http://github.com/kuouu
*/

function my_awesome_func2( $data ) {  
    return 'Hello World2';
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v2', '/test', array(
      'methods' => 'GET',
      'callback' => 'my_awesome_func2',
    ) );
} );
  