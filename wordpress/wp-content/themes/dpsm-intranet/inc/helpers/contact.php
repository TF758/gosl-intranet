<?php

add_action(
    'init',
    'dpsm_handle_contact_form'
);

/**
 * Handle Contact Us form submissions.
 */
function dpsm_handle_contact_form(): void
{
    if (
        !isset(
            $_POST['dpsm_contact_submit']
        )
    ) {
        return;
    }

    if (
        empty($_POST['dpsm_contact_nonce'])
    ) {
        return;
    }

    if (
        !wp_verify_nonce(
            $_POST['dpsm_contact_nonce'],
            'dpsm_contact_form'
        )
    ) {
        return;
    }

    $first_name =
        sanitize_text_field(
            $_POST['first_name']
                ?? ''
        );

    $last_name =
        sanitize_text_field(
            $_POST['last_name']
                ?? ''
        );

    $email =
        sanitize_email(
            $_POST['email']
                ?? ''
        );

    $department_id =
        absint(
            $_POST['department_id']
                ?? 0
        );

    $subject =
        sanitize_text_field(
            $_POST['subject']
                ?? ''
        );

    $message =
        sanitize_textarea_field(
            $_POST['message']
                ?? ''
        );

    /**
     * Basic validation.
     */
    if (
        empty($first_name)
        || empty($last_name)
        || empty($email)
        || empty($department_id)
        || empty($subject)
        || empty($message)
    ) {
        wp_safe_redirect(
            add_query_arg(
                'contact',
                'error',
                wp_get_referer()
            )
        );

        exit;
    }

    if (
        !is_email(
            $email
        )
    ) {
        wp_safe_redirect(
            add_query_arg(
                'contact',
                'error',
                wp_get_referer()
            )
        );

        exit;
    }

    /**
     * Contact routing email.
     *
     * This is intentionally separate from
     * contact_email which is displayed
     * publicly in department directories.
     */
    if (
        !function_exists(
            'get_field'
        )
    ) {
        wp_safe_redirect(
            add_query_arg(
                'contact',
                'error',
                wp_get_referer()
            )
        );

        exit;
    }

    $department_email =
        get_field(
            'department_email',
            $department_id
        );

    if (
        !$department_email
        || !is_email(
            $department_email
        )
    ) {
        wp_safe_redirect(
            add_query_arg(
                'contact',
                'error',
                wp_get_referer()
            )
        );

        exit;
    }

    $department_name =
        get_the_title(
            $department_id
        );

    /**
     * Email body.
     */
    $body =
        sprintf(
            "Department: %s\n\nName: %s %s\nEmail: %s\n\nMessage:\n%s",
            $department_name,
            $first_name,
            $last_name,
            $email,
            $message
        );

    /**
     * Email headers.
     */
    $headers = [

        sprintf(
            'Reply-To: %s <%s>',
            trim(
                $first_name
                    . ' '
                    . $last_name
            ),
            $email
        ),

        'Content-Type: text/plain; charset=UTF-8',
    ];

    /**
     * Optional oversight mailbox.
     */
    $oversight_email =
        get_option(
            'admin_email'
        );

    $recipients = [
        $department_email,
    ];

    if (
        $oversight_email
        && is_email(
            $oversight_email
        )
    ) {
        $recipients[] =
            $oversight_email;
    }

    $sent = wp_mail(
        $recipients,
        $subject,
        $body,
        $headers
    );

    if ($sent) {

        wp_safe_redirect(
            add_query_arg(
                'contact',
                'success',
                wp_get_referer()
            )
        );

        exit;
    }

    wp_safe_redirect(
        add_query_arg(
            'contact',
            'error',
            wp_get_referer()
        )
    );

    exit;
}
