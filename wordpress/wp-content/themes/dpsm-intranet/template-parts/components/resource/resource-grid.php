<?php

$heading =
    $args['heading'] ?? '';

$description =
    $args['description'] ?? '';

$resources =
    $args['resources'] ?? [];

?>

<section
    class="
        space-y-6
    ">

    <?php if (
        $heading ||
        $description
    ) : ?>

        <div>

            <?php if (
                $heading
            ) : ?>

                <h2
                    class="
                        text-2xl
                        font-bold
                    ">

                    <?php echo esc_html(
                        $heading
                    ); ?>

                </h2>

            <?php endif; ?>

            <?php if (
                $description
            ) : ?>

                <p
                    class="
                        mt-2
                        text-base-content/70
                    ">

                    <?php echo esc_html(
                        $description
                    ); ?>

                </p>

            <?php endif; ?>

        </div>

    <?php endif; ?>

    <?php if (
        ! empty($resources)
    ) : ?>

        <div
            class="
                grid
                gap-4
                grid-cols-2
                md:grid-cols-3
                xl:grid-cols-6
            ">

            <?php foreach (
                $resources
                as $resource
            ) : ?>

                <?php

                get_template_part(
                    'template-parts/components/resource/resource-card',
                    null,
                    [
                        'resource' =>
                        $resource,
                    ]
                );

                ?>

            <?php endforeach; ?>

        </div>

    <?php else : ?>

        <div
            class="
                rounded-box
                border
                border-dashed
                border-base-300
                p-10
                text-center
            ">

            <div
                class="
                    text-5xl
                    mb-4
                ">

                📚

            </div>

            <h3
                class="
                    font-semibold
                ">

                No Resources Available

            </h3>

            <p
                class="
                    mt-2
                    text-base-content/70
                ">

                Featured resources will
                appear here once they
                are published.

            </p>

        </div>

    <?php endif; ?>

</section>