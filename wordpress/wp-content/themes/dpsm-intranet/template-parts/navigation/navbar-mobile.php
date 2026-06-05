<?php

$navigation =
    $args['navigation'] ?? [];

$departments =
    $args['departments'] ?? [];

?>

<div
    class="
        drawer-side
        z-50
    ">

    <label
        for="mobile-nav"
        aria-label="Close Navigation"
        class="
            drawer-overlay
        ">
    </label>

    <aside
        class="
            min-h-full
            w-96
            overflow-y-auto
            bg-base-100
            border-r
            border-base-300
            flex
            flex-col
        ">

        <!-- Branding -->

        <div
            class="
                bg-primary
                text-primary-content
                p-6
            ">

            <div
                class="
                    flex
                    items-center
                    gap-4
                ">

                <img
                    src="<?php echo esc_url(
                                get_template_directory_uri()
                                    . '/assets/images/logo.png'
                            ); ?>"
                    alt="DPSM Logo"
                    class="
                        h-12
                        w-auto
                    ">

                <div>

                    <h2
                        class="
                            font-bold
                            text-lg
                        ">

                        DPSM Intranet

                    </h2>

                    <p
                        class="
                            text-sm
                            opacity-80
                        ">

                        Ministry of Public Service

                    </p>

                </div>

            </div>

        </div>

        <!-- Navigation -->

        <div
            class="
                p-4
            ">

            <h3
                class="
                    mb-3
                    text-xs
                    font-semibold
                    uppercase
                    tracking-wider
                    text-base-content/60
                ">

                Navigation

            </h3>

            <ul
                class="
                    menu
                    w-full
                    gap-1
                ">

                <?php foreach (
                    $navigation
                    as $item
                ) : ?>

                    <li>

                        <a
                            href="<?php echo esc_url(
                                        home_url(
                                            $item['path']
                                        )
                                    ); ?>"
                            class="
                                rounded-box
                                font-medium
                            ">

                            <?php echo esc_html(
                                $item['label']
                            ); ?>

                        </a>

                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

        <!-- Divider -->

        <div
            class="
                mx-4
                border-t
                border-base-300
            ">
        </div>

        <!-- Departments -->

        <div
            class="
                p-4
            ">

            <h3
                class="
                    mb-3
                    text-xs
                    font-semibold
                    uppercase
                    tracking-wider
                    text-base-content/60
                ">

                Departments

            </h3>

            <ul
                class="
                    menu
                    w-full
                    gap-1
                ">

                <?php foreach (
                    $departments
                    as $department
                ) : ?>

                    <li>

                        <a
                            href="<?php echo esc_url(
                                        $department['url']
                                    ); ?>"
                            class="
                                rounded-box
                                flex
                                items-center
                                justify-between
                            ">

                            <span>

                                <?php echo esc_html(
                                    strtoupper(
                                        $department['name']
                                    )
                                ); ?>

                            </span>

                            <?php if (
                                !empty($department['code'])
                            ) : ?>

                                <span
                                    class="
                                        badge
                                        badge-primary
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

        </div>

        <!-- Footer -->

        <div
            class="
                mt-auto
                border-t
                border-base-300
                p-6
            ">

            <p
                class="
                    mb-2
                    text-xs
                    font-semibold
                    uppercase
                    text-base-content/50
                ">

                Powered By

            </p>

            <p
                class="
                    text-sm
                    text-base-content/80
                ">

                Department of Public Service Modernisation

            </p>

        </div>

    </aside>

</div>