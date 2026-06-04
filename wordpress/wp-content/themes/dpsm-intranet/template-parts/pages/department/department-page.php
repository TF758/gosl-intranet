<?php

$department = get_queried_object();

get_template_part(
    'template-parts/pages/department/department-hero',
    null,
    [
        'department' => $department,
    ]
);

get_template_part(
    'template-parts/pages/department/department-news',
    null,
    [
        'department' => $department,
    ]
);

get_template_part(
    'template-parts/pages/department/department-projects',
    null,
    [
        'department' => $department,
    ]
);

get_template_part(
    'template-parts/pages/department/department-resources',
    null,
    [
        'department' => $department,
    ]
);

get_template_part(
    'template-parts/pages/department/department-staff',
    null,
    [
        'department' => $department,
    ]
);
