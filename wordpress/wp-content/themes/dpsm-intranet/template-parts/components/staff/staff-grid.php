<?php

$staff_members =
    $args['staff_members']
    ?? [];

$columns =
    $args['columns']
    ?? 4;

if (empty($staff_members)) {
    return;
}

$grid_class =
    match ($columns) {

        2 =>
        'grid-cols-1 md:grid-cols-2',

        3 =>
        'grid-cols-1 md:grid-cols-2 xl:grid-cols-3',

        default =>
        'grid-cols-1 md:grid-cols-2 xl:grid-cols-4',
    };

?>

<div
    class="
        grid
        <?php echo esc_attr($grid_class); ?>
        gap-6
    ">

    <?php foreach (
        $staff_members
        as $staff_member
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