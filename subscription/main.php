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

if (!function_exists('subscription_payment')) {
    function subscription_payment( $data ) {
        // get request form data
        $form_data = file_get_contents('php://input');

        // send request to https://notify-api.line.me/api/notify
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://notify-api.line.me/api/notify');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'message='.urlencode($form_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer z3MZ3FUt64VbsvkRav88DUhlUBAN9j1b91JK2gFAzNP',
            'Content-Type: application/x-www-form-urlencoded'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return "1|OK";
    }
}