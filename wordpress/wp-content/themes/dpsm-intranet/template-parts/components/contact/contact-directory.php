<?php

$departments =
    $args['departments']
    ?? [];

if (
    empty($departments)
) {
    return;
}

?>

<section
    class="
        space-y-6
    ">

    <div>

        <h2
            class="
                text-2xl
                font-bold
            ">

            Department Contacts

        </h2>

        <p
            class="
                text-base-content/70
            ">

            Contact departments directly
            using the information below.

        </p>

    </div>

    <div
        class="
            grid
            gap-6
            md:grid-cols-2
            xl:grid-cols-4
        ">

        <?php foreach (
            $departments
            as $department
        ) : ?>

            <?php

            get_template_part(
                'template-parts/components/contact/department-contact-card',
                null,
                [
                    'department_name' =>
                    $department['name']
                        ?? '',

                    'department_email' =>
                    $department['email']
                        ?? '',

                    'department_phone' =>
                    $department['phone']
                        ?? '',

                    'office_location' =>
                    $department['location']
                        ?? '',
                ]
            );

            ?>

        <?php endforeach; ?>

    </div>

</section>