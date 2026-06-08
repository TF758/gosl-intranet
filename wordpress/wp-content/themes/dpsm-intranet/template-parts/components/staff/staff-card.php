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
  
    ">

    <div
        class="
            card-body
            space-y-4
        ">

        <div
            class="
                flex
                items-start
                gap-4
            ">

            <?php if ($photo) : ?>

                <img
                    src="<?php echo esc_url($photo); ?>"
                    alt="<?php echo esc_attr($name); ?>"
                    class="
                        w-20
                        h-20
                        rounded-full
                        object-cover
                        shrink-0
                    ">

            <?php else : ?>

                <div
                    class="
            w-20
            h-20
            rounded-full
            bg-primary
            text-primary-content
            flex
            items-center
            justify-center
            shrink-0
        ">

                    <span
                        class="
                text-2xl
                font-semibold
            ">

                        <?php
                        echo strtoupper(
                            substr(
                                trim($name),
                                0,
                                1
                            )
                        );
                        ?>

                    </span>

                </div>

            <?php endif; ?>

            <div
                class="
                    min-w-0
                ">

                <h3
                    class="
                        text-lg
                        font-semibold
                        leading-tight
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
                            mt-1
                            text-sm
                            font-medium
                            text-primary
                        ">

                        <?php echo esc_html($department); ?>

                    </p>

                <?php endif; ?>

                <?php if ($unit) : ?>

                    <p
                        class="
                            text-sm
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
                            badge-sm
                        ">

                        <?php echo esc_html($tag); ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <div
            class="
                mt-auto
                pt-4
                border-t
                border-base-300
                space-y-2
                text-sm
            ">

            <?php if ($phone) : ?>

                <div
                    class="
                        flex
                        items-center
                        gap-2
                    ">

                    <span>📞</span>

                    <span>

                        <?php
                        echo esc_html(
                            $phone
                        );
                        ?>

                    </span>

                    <?php if ($extension) : ?>

                        <span
                            class="
                                text-base-content/60
                            ">

                            Ext.
                            <?php
                            echo esc_html(
                                $extension
                            );
                            ?>

                        </span>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

            <?php if ($email) : ?>

                <div
                    class="
                        flex
                        items-center
                        gap-2
                    ">

                    <span>✉</span>

                    <a
                        href="mailto:<?php echo esc_attr($email); ?>"
                        class="
                            link
                            link-hover
                            truncate
                        ">

                        <?php
                        echo esc_html(
                            $email
                        );
                        ?>

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>