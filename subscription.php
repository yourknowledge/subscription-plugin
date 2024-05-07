<?php

include(plugin_dir_path(__FILE__) . 'tutor.php');

// TODO: replace with actual course id
$subscription_courses = array(8, 9);

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
    for ($subscription_courses as $course_id) {
        enroll_student_to_course( $user_id, $course_id );
    }

    return "1|OK";
}

function add_user_as_paid_subscriber( $user_id, $payment_date ) {
    update_user_meta( $user_id, 'subscribe_date', $payment_date );
}

function subscription_check() {
    // get all users whose subscribe_date is pass 2 days
    $subscribe_users = get_users( array(
        'meta_key' => 'subscribe_date',
        'meta_value' => strtotime('-2 days', time()),
        'meta_compare' => '<',
    ) );

    // unenroll users from TutorLMS course
    foreach ($subscribe_users as $user) {
        foreach ($subscription_courses as $course_id) {
            unenroll_student_from_course( $user->ID, $course_id );
    }
}
