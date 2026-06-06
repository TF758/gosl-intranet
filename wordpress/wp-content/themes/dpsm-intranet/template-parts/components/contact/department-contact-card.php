<?php

$department_name =
    $args['department_name']
    ?? '';

$department_email =
    $args['department_email']
    ?? '';

$department_phone =
    $args['department_phone']
    ?? '';

$office_location =
    $args['office_location']
    ?? '';

?>

<div
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
    ">

    <div class="card-body">

        <h3
            class="
                card-title
                text-lg
            ">

            <?php
            echo esc_html(
                $department_name
            );
            ?>

        </h3>

        <?php if (
            !empty($department_email)
        ) : ?>

            <p>

                <strong>Email:</strong>

                <a
                    href="mailto:<?php
                                    echo esc_attr(
                                        $department_email
                                    );
                                    ?>"
                    class="
                        link
                        link-primary
                    ">

                    <?php
                    echo esc_html(
                        $department_email
                    );
                    ?>

                </a>

            </p>

        <?php endif; ?>

        <?php if (
            !empty($department_phone)
        ) : ?>

            <p>

                <strong>Phone:</strong>

                <?php
                echo esc_html(
                    $department_phone
                );
                ?>

            </p>

        <?php endif; ?>

        <?php if (
            !empty($office_location)
        ) : ?>

            <p>

                <strong>Location:</strong>

                <?php
                echo esc_html(
                    $office_location
                );
                ?>

            </p>

        <?php endif; ?>

    </div>

</div>