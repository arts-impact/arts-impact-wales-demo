<?php
/*
 Function to deliver email from contact form

 TODO:
 Adapt to accept parameters to allow usage anywhere
 */

function proper_deliver_mail() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['email-submitted'] ) ) {

        // sanitize form values
        $name    = sanitize_text_field( $_POST["sender-name"] );
        $email   = sanitize_email( $_POST["sender-email"] );
        $message = esc_textarea( $_POST["email-message"] );
        $to      = sanitize_email( $_POST["email-recipient"] );

        $subject = 'New message from ' . get_bloginfo( 'name' );


        $headers = "From: $name <$email>" . "\r\n";

        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            echo '<div>';
            echo '<p>Thanks for contacting me, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo 'An unexpected error occurred';
        }
    }
}