<?php

$departments =
    $args['departments']
    ?? [];

?>

<div
    class="
        container
        mx-auto
        px-4
        py-8
    ">

    <div
        class="
            mb-8
        ">

        <h1
            class="
                text-4xl
                font-bold
            ">
            Contact Us
        </h1>

        <p
            class="
                mt-2
                text-base-content/70
            ">
            Need assistance? Select a department and send us a message.
        </p>

    </div>

    <div
        class="
            grid
            grid-cols-1
            lg:grid-cols-3
            gap-8
        ">

        <div
            class="
                lg:col-span-2
            ">

            <?php

            get_template_part(
                'template-parts/components/contact/contact-form',
                null,
                [
                    'departments' => $departments,
                ]
            );

            ?>



        </div>


        <div
            class="
                space-y-4
            ">

            <div
                class="
        space-y-2
    ">

                <h2
                    class="
            text-xl
            font-semibold
        ">
                    Department Contacts
                </h2>

                <p
                    class="
            text-sm
            text-base-content/70
        ">
                    Prefer to contact a department directly? Use the directory below.
                </p>

            </div>
            <?php

            foreach (
                $departments
                as $department
            ) :

                get_template_part(
                    'template-parts/components/contact/department-contact-card',
                    null,
                    [
                        'department' =>
                        $department,
                    ]
                );

            endforeach;

            ?>

        </div>

    </div>

</div>