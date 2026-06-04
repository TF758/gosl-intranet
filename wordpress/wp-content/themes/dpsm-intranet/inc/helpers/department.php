<?php

function dpsm_get_departments(): array
{
    $departments = get_posts([
        'post_type'      => 'department',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);

    return array_map(
        function ($department) {

            return [

                'id'   => $department->ID,

                'name' => $department->post_title,

                'url'  => get_permalink(
                    $department
                ),

                'code' => get_field(
                    'department_code',
                    $department->ID
                ),

            ];
        },
        $departments
    );
}
