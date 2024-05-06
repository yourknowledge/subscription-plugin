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

    $user_id = $form_data['CustomField1'];
    $payment_date_str = $form_data['PaymentDate'];
    $payment_date = strtotime($payment_date_str);

    // add user as paid subscriber
    add_user_as_paid_subscriber( $user_id, $payment_date );

    // register user to TutorLMS course
    enroll_student_to_course( $user_id, 1 ); // TODO: replace with actual course id

    return "1|OK";
}

function enroll_student_to_course( $user_id, $course_id ) {
    // register user to TutorLMS course
    $wordpress_post = array(
        'post_author' => $user_id,
        'post_parent' => $course_id,
        'post_status' => 'completed',
        'post_type' => 'tutor_enrolled',
    );
    wp_insert_post($wordpress_post);
}

function add_user_as_paid_subscriber( $user_id, $payment_date ) {
    update_user_meta( $user_id, 'subscribe_date', $payment_date );
}