<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Route Contact Us form submissions
 * to the appropriate department email.
 */
add_action(
    'wpforms_process_complete',
    'dpsm_route_contact_form',
    10,
    3
);

function dpsm_route_contact_form(
    array $fields,
    array $entry,
    array $form_data
): void {

    /*
     * Only process the
     * Contact Us form.
     */
    if (
        (int) $form_data['id']
        !== 111
    ) {
        return;
    }

    /*
     * Department selected
     * by the user.
     */
    $department_name =
        trim(
            $fields[13]['value']
                ?? ''
        );

    if (empty($department_name)) {
        return;
    }

    /*
     * Find matching department
     * using the Department CPT.
     */
    $departments = get_posts([
        'post_type'      => 'department',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    $recipient_email = '';

    foreach (
        $departments
        as $department
    ) {

        $full_name =
            get_field(
                'full_name',
                $department->ID
            );

        if (
            $full_name
            !== $department_name
        ) {
            continue;
        }

        /*
         * Internal routing email.
         *
         * This may differ from
         * the public contact email.
         */
        $recipient_email =
            get_field(
                'department_email',
                $department->ID
            );

        break;
    }

    /*
     * No department email configured.
     */
    if (
        empty($recipient_email)
    ) {
        return;
    }

    /*
     * Validate email address.
     */
    if (
        !is_email(
            $recipient_email
        )
    ) {
        return;
    }

    /*
     * Form fields.
     */
    $first_name =
        trim(
            $fields[5]['value']
                ?? ''
        );

    $last_name =
        trim(
            $fields[6]['value']
                ?? ''
        );

    $sender_email =
        trim(
            $fields[12]['value']
                ?? ''
        );

    $subject =
        trim(
            $fields[9]['value']
                ?? ''
        );

    $message =
        trim(
            $fields[11]['value']
                ?? ''
        );

    if (empty($subject)) {
        $subject =
            'DPSM Intranet Contact Request';
    }

    /*
     * Email body.
     */
    $body = sprintf(
        "Name: %s %s\n\nEmail: %s\n\nDepartment: %s\n\nMessage:\n%s",
        $first_name,
        $last_name,
        $sender_email,
        $department_name,
        $message
    );

    /*
     * Allow department staff
     * to reply directly to
     * the sender.
     */
    $headers = [];

    if (
        !empty($sender_email)
        && is_email(
            $sender_email
        )
    ) {

        $headers[] =
            sprintf(
                'Reply-To: %s <%s>',
                trim(
                    $first_name
                        . ' '
                        . $last_name
                ),
                $sender_email
            );
    }

    /*
     * Debug logging.
     * Remove once routing
     * has been fully tested.
     */
    error_log(
        sprintf(
            'DPSM Contact Router: %s -> %s',
            $department_name,
            $recipient_email
        )
    );

    /*
     * Send routed email.
     */
    wp_mail(
        $recipient_email,
        $subject,
        $body,
        $headers
    );
}
