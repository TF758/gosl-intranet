
<?php

$department =
    get_queried_object();

get_template_part(
    'template-parts/layouts/department-layout',
    null,
    [
        'department' =>
        $department,

        'content_template' =>
        'template-parts/pages/department/department-content',
    ]
);
