<?php

$department =
    $args['department'] ?? null;

if (!$department) {
    return;
}

?>

<section
    class="
        bg-base-200
        py-16
    ">

    <div
        class="
            max-w-container
            mx-auto
            px-6
        ">

        <div
            class="
                max-w-3xl
                space-y-4
            ">

            <div
                class="
                    badge
                    badge-primary
                ">

                Department

            </div>

            <h1
                class="
                    text-4xl
                    font-bold
                ">

                <?php
                echo esc_html(
                    $department->post_title
                );
                ?>

            </h1>

            <p
                class="
                    text-base-content/70
                ">

                Department landing page.

            </p>

        </div>

    </div>

</section>