<?php

$navigation =
    dpsm_get_navigation();

$departments =
    dpsm_get_departments();

?>

<div class="drawer">

    <input
        id="mobile-nav"
        type="checkbox"
        class="drawer-toggle" />

    <div class="drawer-content">

        <header
            class="
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
                                    hover:bg-base-200
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

                        <button
                            class="
                                btn
                                btn-ghost
                                btn-sm
                            "
                            aria-label="Theme Toggle">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="
                                    h-4
                                    w-4
                                ">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.752 15.002A9.718 9.718 0 0112 21c-5.385 0-9.75-4.365-9.75-9.75 0-4.033 2.448-7.494 5.94-8.962a.75.75 0 01.98.98A7.5 7.5 0 0018.75 14.83a.75.75 0 01.98.98z" />

                            </svg>

                        </button>

                        <?php
                        get_template_part(
                            'template-parts/navigation/user-dropdown'
                        );
                        ?>

                    </div>

                    <!-- Mobile Toggle -->

                    <label
                        for="mobile-nav"
                        class="
                            btn
                            btn-ghost
                            btn-sm
                            lg:hidden
                        "
                        aria-label="Open Navigation">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="
                                h-5
                                w-5
                            ">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />

                        </svg>

                    </label>

                </div>

            </div>

        </header>

    </div>

    <?php

    get_template_part(
        'template-parts/navigation/navbar-mobile',
        null,
        [
            'navigation' =>
            $navigation,

            'departments' =>
            $departments,
        ]
    );

    ?>

</div>