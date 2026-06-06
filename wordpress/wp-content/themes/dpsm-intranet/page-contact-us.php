<?php

get_header();

get_template_part(
    'template-parts/pages/contact-us',
    null,
    [
        'departments' =>
        dpsm_get_department_contacts(),
    ]
);

get_footer();
