<?php

$department =
    $args['department']
    ?? [];

if (empty($department)) {
    return;
}

?>

<div
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
    ">

    <div
        class="
            card-body
            p-5
        ">

        <h3
            class="
                font-semibold
                text-lg
            ">

            <?php
            echo esc_html(
                $department['full_name']
                    ?? 'Department'
            );
            ?>

        </h3>

        <div
            class="
                space-y-2
                text-sm
            ">

            <?php if (!empty($department['email'])) : ?>

                <p
                    class="
                        break-all
                    ">

                    📧

                    <a
                        href="mailto:<?php
                                        echo esc_attr(
                                            $department['email']
                                        );
                                        ?>"
                        class="
                            link
                            link-primary
                        ">

                        <?php
                        echo esc_html(
                            $department['email']
                        );
                        ?>

                    </a>

                </p>

            <?php endif; ?>

            <?php if (!empty($department['phone'])) : ?>

                <p>

                    📞

                    <?php
                    echo esc_html(
                        $department['phone']
                    );
                    ?>

                </p>

            <?php endif; ?>

            <?php if (!empty($department['location'])) : ?>

                <p>

                    📍

                    <?php
                    echo esc_html(
                        $department['location']
                    );
                    ?>

                </p>

            <?php endif; ?>

        </div>

    </div>

</div>