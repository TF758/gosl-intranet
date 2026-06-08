<?php

$department =
    get_queried_object();

$content_template =
    dpsm_get_department_template(
        dpsm_get_department_section()
    );

get_template_part(
    'template-parts/layouts/department-layout',
    null,
    [
        'department' =>
        $department,

        'content_template' =>
        $content_template,
    ]
);
