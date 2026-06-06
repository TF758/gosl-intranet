<?php

$form_id =
    $args['form_id']
    ?? 0;

if (!$form_id) {
    return;
}

?>

<div
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
    ">

    <div
        class="
            card-body
        ">

        <?php

        echo do_shortcode(
            sprintf(
                '[wpforms id="%d"]',
                absint(
                    $form_id
                )
            )
        );

        ?>

    </div>

</div>