<?php

$departments =
    $args['departments'] ?? [];

if (empty($departments)) {
    return;
}



?>



<div
    class="
        dropdown
        dropdown-end
    ">

    <button
        tabindex="0"
        class="
            btn
            btn-ghost
            btn-sm
            gap-2
        ">

        Departments

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
                d="M19 9l-7 7-7-7" />

        </svg>

    </button>

    <ul
        tabindex="0"
        class="
            dropdown-content
            menu
            mt-2
            w-72
            rounded-box
            border
            border-base-300
            bg-base-100
            p-2
            shadow-xl
            z-50
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
                        flex
                        items-center
                        justify-between
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

</div>