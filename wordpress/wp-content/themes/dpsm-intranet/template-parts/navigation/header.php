<?php

$navigation =
    dpsm_get_navigation();

$departments =
    dpsm_get_departments();

?>

<?php

get_template_part(
    'template-parts/navigation/navbar-main',
    null,
    [
        'navigation' =>
        $navigation,

        'departments' =>
        $departments,
    ]
);

?>

<?php

get_template_part(
    'template-parts/navigation/navbar-mobile',
    null,
    [
        'navigation' =>
        $navigation,

        'departments' =>
        $departments,
    ]
);

?>