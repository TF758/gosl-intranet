<?php

$navigation =
    dpsm_get_navigation();

$departments =
    dpsm_get_departments();

?>

<header
    class="
        hidden
        lg:block
        sticky
        top-0
        z-50
        border-b
        border-base-300
        bg-base-100/90
        backdrop-blur
        shadow-sm
            ">

    <div
        class="
                    max-w-screen-2xl
                    mx-auto
                    px-6
                ">

        <div
            class="
                        flex
                        h-16
                        items-center
                        justify-between
                        gap-8
                    ">

            <!-- Logo -->

            <a
                href="<?php echo esc_url(
                            home_url('/')
                        ); ?>"
                class="
                            flex
                            items-center
                            gap-3
                            shrink-0
                        ">

                <img
                    src="<?php echo esc_url(
                                get_template_directory_uri()
                                    . '/assets/images/logo.png'
                            ); ?>"
                    alt="DPSM Logo"
                    class="
                                h-10
                                w-auto
                            ">

                <div
                    class="
                                hidden
                                md:block
                            ">

                    <h1
                        class="
                                    font-bold
                                    text-base
                                    leading-tight
                                ">

                        Public Service Intranet

                    </h1>

                    <p
                        class="
                                    text-[11px]
                                    uppercase
                                    tracking-wide
                                    text-base-content/60
                                ">

                        Ministry of Public Service

                    </p>

                </div>

            </a>

            <!-- Desktop Navigation -->

            <nav
                class="
                            hidden
                            lg:flex
                            items-center
                            gap-1
                            flex-1
                            justify-center
                        ">

                <?php foreach (
                    $navigation
                    as $item
                ) : ?>

                    <?php

                    $is_active =
                        dpsm_is_active_path(
                            $item['path']
                        );

                    ?>

                    <a
                        href="<?php echo esc_url(
                                    home_url(
                                        $item['path']
                                    )
                                ); ?>"
                        class="
            rounded-box
            px-4
            py-2
            text-sm
            font-medium
            transition-colors

            <?php echo $is_active
                        ? 'bg-primary text-primary-content'
                        : 'hover:bg-base-200';
            ?>
        ">

                        <?php echo esc_html(
                            $item['label']
                        ); ?>

                    </a>

                <?php endforeach; ?>

                <?php

                get_template_part(
                    'template-parts/navigation/department-dropdown',
                    null,
                    [
                        'departments' =>
                        $departments,
                    ]
                );

                ?>

            </nav>

            <!-- Desktop Actions -->

            <div
                class="
                            hidden
                            lg:flex
                            items-center
                            gap-2
                        ">

                <?php
                get_template_part(
                    'template-parts/navigation/search-bar'
                );
                ?>

                <!-- Future Theme Toggle -->

                <?php
                get_template_part(
                    'template-parts/navigation/theme-toggle'
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/navigation/user-dropdown'
                );
                ?>

            </div>

        </div>

    </div>

</header>