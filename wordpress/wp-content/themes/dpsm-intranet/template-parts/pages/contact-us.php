<?php

$departments =
    $args['departments']
    ?? [];

?>

<div
    class="
        space-y-12
    ">

    <?php

    get_template_part(
        'template-parts/components/layout/page-header',
        null,
        [
            'title' =>
            'Contact Us',

            'description' =>
            'Send inquiries, feedback, or requests to the appropriate department.',
        ]
    );

    ?>

    <?php

    get_template_part(
        'template-parts/components/contact/contact-intro'
    );

    ?>

    <?php

    get_template_part(
        'template-parts/components/contact/contact-form',
        null,
        [
            'form_id' => 111,
        ]
    );

    ?>

    <?php

    get_template_part(
        'template-parts/components/contact/contact-directory',
        null,
        [
            'departments' =>
            $departments,
        ]
    );

    ?>

</div>