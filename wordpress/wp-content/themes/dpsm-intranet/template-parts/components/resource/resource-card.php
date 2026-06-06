<?php

$resource =
    $args['resource'] ?? [];

if (empty($resource)) {
    return;
}

$type =
    strtolower(
        $resource['resource_type']
            ?? ''
    );

$icon =
    match ($type) {

        'pdf' =>
        '📄',

        'excel' =>
        '📊',

        'word' =>
        '📝',

        default =>
        '📁',
    };

$description =
    wp_trim_words(
        $resource['description']
            ?? '',
        15,
        '...'
    );

$categories =
    array_slice(
        $resource['resource_categories']
            ?? [],
        0,
        2
    );

$total_categories =
    count(
        $resource['resource_categories']
            ?? []
    );

?>

<a
    href="<?php echo esc_url(
                $resource['url']
                    ?? '#'
            ); ?>"
    class="
        card
        h-full
        bg-base-100
        border
        border-base-300
        transition-all
        hover:border-primary
        hover:shadow-md
    ">

    <div
        class="
            card-body
            h-full
            gap-4
        ">

        <div
            class="
                flex
                items-center
                gap-3
            ">

            <div
                class="
                    flex
                    h-12
                    w-12
                    items-center
                    justify-center
                    rounded-box
                    bg-primary/10
                    text-2xl
                ">

                <?php echo esc_html(
                    $icon
                ); ?>

            </div>

            <span
                class="
                    badge
                    badge-outline
                ">

                <?php echo esc_html(
                    strtoupper(
                        $type
                    )
                ); ?>

            </span>

        </div>

        <div>

            <h3
                class="
                    font-semibold
                    leading-tight
                ">

                <?php echo esc_html(
                    $resource['title']
                        ?? ''
                ); ?>

            </h3>

        </div>

        <?php if (
            ! empty($description)
        ) : ?>

            <p
                class="
                    text-sm
                    text-base-content/70
                    line-clamp-3
                ">

                <?php echo esc_html(
                    $description
                ); ?>

            </p>

        <?php endif; ?>

        <div
            class="
                mt-auto
                space-y-3
            ">

            <div
                class="
                    flex
                    flex-wrap
                    gap-2
                ">

                <?php foreach (
                    $categories
                    as $category
                ) : ?>

                    <span
                        class="
                            badge
                            badge-primary
                            badge-sm
                        ">

                        <?php echo esc_html(
                            $category
                        ); ?>

                    </span>

                <?php endforeach; ?>

                <?php if (
                    $total_categories > 2
                ) : ?>

                    <span
                        class="
                            badge
                            badge-outline
                            badge-sm
                        ">

                        +<?php echo esc_html(
                                $total_categories - 2
                            ); ?>

                    </span>

                <?php endif; ?>

            </div>

            <div
                class="
                    text-sm
                    text-base-content/60
                    space-y-1
                ">

                <?php if (
                    ! empty($resource['department_name'])
                ) : ?>

                    <div>

                        <?php echo esc_html(
                            $resource['department_name']
                        ); ?>

                    </div>

                <?php endif; ?>

                <?php if (
                    ! empty($resource['revision_date'])
                ) : ?>

                    <div>

                        Updated
                        <?php echo esc_html(
                            $resource['revision_date']
                        ); ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</a>