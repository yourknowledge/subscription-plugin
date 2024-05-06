<?php

function subscription_order( $data ) {
    $user_id = $data['user_id'];
    return 'subscription order: '.$user_id;
}

function subscription_period( $data ) {
    $user_id = $data['user_id'];
    return 'subscription period:'.$user_id;
}

function subscription_payment( $data ) {
    // get request form data
    $form_data_str = file_get_contents('php://input');

    parse_str($form_data_str, $form_data);

    // register user to TutorLMS course
    $wordpress_post = array(
        'post_author' => $form_data['CustomField1'],
        'post_parent' => 9, // TODO: replace with actual course id
        'post_status' => 'completed',
        'post_type' => 'tutor_enrolled',
    );
    wp_insert_post($wordpress_post);

    return "1|OK";
}