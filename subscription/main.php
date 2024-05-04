<?php
if (!function_exists('subscription_order')) {
    function subscription_order( $data ) {
        $user_id = $data['user_id'];
        return 'subscription order: '.$user_id;
    }
}

if (!function_exists('subscription_period')) {
    function subscription_period( $data ) {
        $user_id = $data['user_id'];
        return 'subscription period:'.$user_id;
    }
}