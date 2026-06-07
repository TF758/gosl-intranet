<?php

$name = $args['name'] ?? 'Unknown Staff Member';

$job_title = $args['job_title'] ?? '';

$department = $args['department'] ?? '';

$unit = $args['unit'] ?? '';

$email = $args['email'] ?? '';

$phone = $args['phone'] ?? '';

$extension = $args['extension'] ?? '';

$photo = $args['photo'] ?? '';

$tags = $args['tags'] ?? [];

$show_department =
    $args['show_department']
    ?? true;

?>

<div
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
        hover:shadow-md
        transition-all
        h-full
    ">

    <div class="card-body">

        <div class="flex items-center gap-4">

            <?php if ($photo) : ?>

                <img
                    src="<?php echo esc_url($photo); ?>"
                    alt="<?php echo esc_attr($name); ?>"
                    class="
                        w-16
                        h-16
                        rounded-full
                        object-cover
                    ">

            <?php else : ?>

                <div
                    class="
                        avatar
                        placeholder
                    ">

                    <div
                        class="
                            bg-primary
                            text-primary-content
                            rounded-full
                            w-16
                        ">

                        <span>
                            <?php
                            echo strtoupper(
                                substr($name, 0, 1)
                            );
                            ?>
                        </span>

                    </div>

                </div>

            <?php endif; ?>

            <div>

                <h3
                    class="
                        font-semibold
                        text-lg
                    ">
                    <?php echo esc_html($name); ?>
                </h3>

                <?php if ($job_title) : ?>

                    <p
                        class="
                            text-sm
                            text-base-content/70
                        ">
                        <?php echo esc_html($job_title); ?>
                    </p>

                <?php endif; ?>

                <?php if (
                    $show_department
                    && $department
                ) : ?>

                    <p
                        class="
                            text-sm
                            text-primary
                        ">
                        <?php echo esc_html($department); ?>
                    </p>

                <?php endif; ?>

                <?php if ($unit) : ?>

                    <p
                        class="
                            text-xs
                            text-base-content/60
                        ">
                        <?php echo esc_html($unit); ?>
                    </p>

                <?php endif; ?>

            </div>

        </div>

        <?php if (!empty($tags)) : ?>

            <div
                class="
                    flex
                    flex-wrap
                    gap-2
                    mt-4
                ">

                <?php foreach ($tags as $tag) : ?>

                    <div
                        class="
                            badge
                            badge-outline
                        ">
                        <?php echo esc_html($tag); ?>
                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <div
            class="
                mt-4
                pt-4
                border-t
                border-base-300
                text-sm
                space-y-2
            ">

            <?php if ($phone) : ?>

                <div>
                    📞
                    <?php echo esc_html($phone); ?>

                    <?php if ($extension) : ?>

                        (Ext.
                        <?php echo esc_html($extension); ?>)

                    <?php endif; ?>

                </div>

            <?php endif; ?>

            <?php if ($email) : ?>

                <div>

                    ✉

                    <a
                        href="mailto:<?php echo esc_attr($email); ?>"
                        class="link link-hover">

                        <?php echo esc_html($email); ?>

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>