<?php

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

function unenroll_student_from_course( $user_id, $course_id ) {
    // unenroll user from TutorLMS course
    $enrolled_post = get_posts( array(
        'post_author' => $user_id,
        'post_parent' => $course_id,
        'post_status' => 'completed',
        'post_type' => 'tutor_enrolled',
    ) );
    foreach ($enrolled_post as $post) {
        wp_delete_post($post->ID, true);
    }
}
