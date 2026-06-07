<?php

$staff_members =
    $args['staff_members']
    ?? [];

if (empty($staff_members)) {
    return;
}

?>


<div
    class="
            grid
            gap-6
            grid-cols-1
            md:grid-cols-2
            l:grid-cols-4
            xl:grid-cols-5
        ">

    <?php foreach (
        $staff_members as $staff_member
    ) : ?>

        <?php

        get_template_part(
            'template-parts/components/staff/staff-card',
            null,
            $staff_member
        );

        ?>

    <?php endforeach; ?>

</div>