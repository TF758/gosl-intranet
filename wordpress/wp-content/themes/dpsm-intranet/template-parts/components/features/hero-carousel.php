<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'slides' => [],
        'class'  => '',
    ]
);

if (
    empty($args['slides'])
) {
    return;
}

?>

<div
    class="
        overflow-hidden
        rounded-box
        bg-base-100
        shadow-lg

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <div
        class="
            hero-carousel
            swiper
        ">

        <div
            class="
                swiper-wrapper
            ">

            <?php foreach (
                $args['slides']
                as $slide
            ) : ?>

                <div
                    class="
                        swiper-slide
                    ">

                    <div
                        class="
                            grid
                            lg:min-h-[500px]
                            lg:grid-cols-5
                        ">

                        <div
                            class="
                                col-span-2
                                flex
                                items-center
                            ">

                            <div
                                class="
                                    p-8
                                    lg:p-12
                                ">

                                <?php if (
                                    ! empty($slide['badge'])
                                ) : ?>

                                    <div
                                        class="
                                            badge
                                            badge-primary
                                            badge-lg
                                        ">

                                        <?php echo esc_html(
                                            $slide['badge']
                                        ); ?>

                                    </div>

                                <?php endif; ?>

                                <?php if (
                                    ! empty($slide['title'])
                                ) : ?>

                                    <h2
                                        class="
                                            mt-6
                                            text-4xl
                                            font-bold
                                            lg:text-5xl
                                        ">

                                        <?php echo esc_html(
                                            $slide['title']
                                        ); ?>

                                    </h2>

                                <?php endif; ?>

                                <?php if (
                                    ! empty($slide['description'])
                                ) : ?>

                                    <p
                                        class="
                                            mt-6
                                            text-base-content/70
                                        ">

                                        <?php echo esc_html(
                                            $slide['description']
                                        ); ?>

                                    </p>

                                <?php endif; ?>

                                <?php if (
                                    ! empty($slide['button_label'])
                                ) : ?>

                                    <div
                                        class="
                                            mt-8
                                        ">

                                        <a
                                            href="<?php echo esc_url(
                                                        $slide['button_url']
                                                    ); ?>"
                                            class="
                                                btn
                                                btn-primary
                                            ">

                                            <?php echo esc_html(
                                                $slide['button_label']
                                            ); ?>

                                        </a>

                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div
                            class="
                                col-span-3
                            ">

                            <?php if (
                                ! empty($slide['image'])
                            ) : ?>

                                <img
                                    src="<?php echo esc_url(
                                                $slide['image']
                                            ); ?>"
                                    alt="<?php echo esc_attr(
                                                $slide['image_alt']
                                                    ?? ''
                                            ); ?>"
                                    class="
                                        h-[250px]
                                        w-full
                                        object-cover
                                        md:h-[350px]
                                        lg:h-full
                                    ">

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

    <div
        class="
            border-t
            border-base-300
            bg-base-100
            px-6
            py-4
        ">

        <div
            class="
                flex
                items-center
                justify-center
                gap-6
            ">

            <div
                class="
                    swiper-button-prev
                    !static
                    !m-0
                    flex
                    !h-12
                    !w-12
                    items-center
                    justify-center
                    rounded-full
                    border
                    border-base-300
                    bg-base-100
                    shadow
                    transition
                    hover:scale-105
                    hover:shadow-md
                ">
            </div>

            <div
                class="
                    swiper-pagination
                    !static
                    !m-0
                    !w-auto
                ">
            </div>

            <div
                class="
                    swiper-button-next
                    !static
                    !m-0
                    flex
                    !h-12
                    !w-12
                    items-center
                    justify-center
                    rounded-full
                    border
                    border-base-300
                    bg-base-100
                    shadow
                    transition
                    hover:scale-105
                    hover:shadow-md
                ">
            </div>

        </div>

    </div>

</div>