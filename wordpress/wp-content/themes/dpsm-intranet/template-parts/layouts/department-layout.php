<?php

$department =
    $args['department']
    ?? null;

$content_template =
    $args['content_template']
    ?? '';

if (
    empty($department)
    || empty($content_template)
) {
    return;
}

$department_code =
    strtoupper(
        get_field(
            'department_code',
            $department->ID
        ) ?: ''
    );

$navigation =
    dpsm_get_department_navigation(
        $department_code,
        $department->post_name
    );

?>

<div
    class="
        container
        mx-auto
        px-4
        py-8
    ">

    <?php

    get_template_part(
        'template-parts/navigation/department-mobile-nav',
        null,
        [
            'title' =>
            $department->post_title,

            'items' =>
            $navigation,
        ]
    );

    ?>

    <div
        class="
            flex
            gap-8
        ">

        <?php

        get_template_part(
            'template-parts/navigation/department-sidebar',
            null,
            [
                'title' =>
                $department->post_title,

                'items' =>
                $navigation,
            ]
        );

        ?>

        <main
            class="
                flex-1
                min-w-0
            ">

            <?php

            get_template_part(
                $content_template,
                null,
                [
                    'department' =>
                    $department,
                ]
            );

            ?>

        </main>

    </div>

</div>