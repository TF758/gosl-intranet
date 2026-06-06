<?php

/** @var array $args */

$navigation =
    $args['navigation'];

$departments =
    $args['departments'];

?>

<div class="lg:hidden w-full">

    <div class="drawer w-full">

        <input
            id="mobile-nav"
            type="checkbox"
            class="drawer-toggle" />

        <!-- Mobile Header -->

        <div class="drawer-content">

            <header
                class="
                     sticky
                     top-0
                     z-50
                     w-full
                     border-b
                     border-base-300
                     bg-base-100/90
                     backdrop-blur
                     shadow-sm
                 ">

                <div
                    class="
                         px-6
                     ">

                    <div
                        class="
                             flex
                             h-16
                             items-center
                             justify-between
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

                        </a>

                        <!-- Mobile Toggle -->

                        <label
                            for="mobile-nav"
                            class="
                                 btn
                                 btn-ghost
                                 btn-sm
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


        <!-- Drawer -->

        <div class="drawer-side z-[60]">

            <label
                for="mobile-nav"
                aria-label="Close Navigation"
                class="drawer-overlay">
            </label>

            <aside
                class="
                    min-h-full
                    w-80
                    bg-base-100
                    border-r
                    border-base-300
                ">

                <div class="p-4">

                    <!-- Navigation -->

                    <ul class="menu w-full">

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

                            <li>

                                <a
                                    href="<?php echo esc_url(
                                                home_url(
                                                    $item['path']
                                                )
                                            ); ?>"
                                    class="
                                            <?php echo $is_active
                                                ? 'bg-primary text-primary-content'
                                                : 'hover:bg-base-200';
                                            ?>
                                        ">

                                    <?php echo esc_html(
                                        $item['label']
                                    ); ?>

                                </a>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                    <!-- Departments -->

                    <?php if (
                        !empty($departments)
                    ) : ?>

                        <div class="divider">

                            Departments

                        </div>

                        <ul class="menu w-full">

                            <?php foreach (
                                $departments
                                as $department
                            ) : ?>

                                <?php

                                $is_active =
                                    dpsm_is_current_url(
                                        $department['url']
                                    );

                                ?>

                                <li>

                                    <a
                                        href="<?php echo esc_url(
                                                    $department['url']
                                                ); ?>"
                                        class="
                                            flex
                                            items-center
                                            justify-between

                                            <?php echo $is_active
                                                ? 'bg-primary text-primary-content'
                                                : 'hover:bg-base-200';
                                            ?>
                                        ">

                                        <span>

                                            <?php echo esc_html(
                                                $department['name']
                                            ); ?>

                                        </span>

                                        <?php if (
                                            !empty($department['code'])
                                        ) : ?>

                                            <span
                                                class="
                                                    badge
                                                    badge-outline
                                                    badge-sm
                                                ">

                                                <?php echo esc_html(
                                                    $department['code']
                                                ); ?>

                                            </span>

                                        <?php endif; ?>

                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    <?php endif; ?>

                </div>

            </aside>

        </div>

    </div>

</div>