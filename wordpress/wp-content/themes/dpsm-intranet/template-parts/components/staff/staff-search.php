<?php

$placeholder =
    $args['placeholder']
    ?? 'Search staff...';

?>

<div
    class="
        form-control
        w-full
    ">

    <input
        type="search"
        placeholder="<?php echo esc_attr($placeholder); ?>"
        class="
            input
            input-bordered
            w-full
        ">

</div>