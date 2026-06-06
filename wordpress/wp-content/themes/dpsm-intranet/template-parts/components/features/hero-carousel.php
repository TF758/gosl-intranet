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

<section class="py-6">

    <div
        class="
            mx-auto
            max-w-screen-2xl
            px-4
            sm:px-6
            lg:px-8
        ">

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
                            lg:min-h-[400px]
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
                                    p-6
                                    lg:p-8
                                ">

                                        <?php if (
                                            ! empty($slide['badge'])
                                        ) : ?>

                                            <div
                                                class="
                                            badge
                                            badge-primary
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
                                            mt-3
                                            text-3xl
                                            font-bold
                                            leading-tight
                                            lg:text-4xl
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
                                            mt-3
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
                                            mt-3
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
                                          h-[220px]
                                            md:h-[250px]
                                            lg:h-[350px]
                                            w-full
                                            object-cover
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
            py-3
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
                    !h-10
                    !w-10
                    items-center
                    justify-center
                    rounded-full
                    border
                    border-base-300
                    bg-base-100
                    shadow-sm
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
                    !h-10
                    !w-10
                    items-center
                    justify-center
                    rounded-full
                    border
                    border-base-300
                    bg-base-100
                    shadow-sm
                    transition
                    hover:scale-105
                    hover:shadow-md
                ">
                    </div>

                </div>

            </div>

        </div>