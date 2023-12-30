<?php
/**
 * @package yourknowledge subscription
 * @version 0.0.1
 */
/*
Plugin Name: Yourknowledge Subscription
Plugin URI: http://kuouu.tw/
Description: This is just a test plugin.
Author: kuouu
Version: 0.0.1
Author URI: http://github.com/kuouu
*/

function subscription_order( $data ) {
  $user_id = $data['user_id'];
  return 'subscription order'.$user_id;
}

function subscription_period( $data ) {
  $user_id = $data['user_id'];
  return 'subscription period'.$user_id;
}

add_action('rest_api_init', function () {
  register_rest_route('subscription', '/test', array(
    'methods' => 'GET',
    'callback' => function () { return 'test'; }
  ));
  register_rest_route('subscription', '/order/(?P<user_id>\d+)', array(
    'methods' => 'POST',
    'callback' => 'subscription_order',
  ));
  register_rest_route('subscription', '/period/(?P<user_id>\d+)', array(
    'methods' => 'POST',
    'callback' => 'subscription_period',
  ));
});
  