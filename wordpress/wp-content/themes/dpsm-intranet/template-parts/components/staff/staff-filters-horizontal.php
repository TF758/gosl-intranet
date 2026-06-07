<?php

$search =
    $_GET['search']
    ?? '';

$unit =
    $_GET['unit']
    ?? '';

$units =
    get_terms([
        'taxonomy'   => 'staff_unit',
        'hide_empty' => false,
    ]);

?>

<form
    method="get"
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
    ">

    <div
        class="
            card-body
            p-6
            flex
            flex-col
            lg:flex-row
            gap-4
            items-stretch
            lg:items-end
        ">

        <!-- SEARCH -->

        <div
            class="
                w-full
                lg:max-w-xl
            ">

            <label
                class="
                    label
                    pb-1
                ">

                <span
                    class="
                        label-text
                        font-medium
                    ">

                    Search

                </span>

            </label>

            <div
                class="
                    flex
                    gap-2
                ">

                <input
                    type="search"
                    name="search"
                    value="<?php echo esc_attr($search); ?>"
                    placeholder="Search staff..."
                    class="
                        input
                        input-bordered
                        flex-1
                    ">

                <button
                    type="submit"
                    class="
                        btn
                        btn-primary
                    ">

                    Search

                </button>

            </div>

        </div>

        <!-- UNIT -->

        <div>

            <label
                class="
            label
            pb-1
        ">

                <span
                    class="
                label-text
                font-medium
            ">

                    Unit

                </span>

            </label>

            <select
                name="unit"
                class="
            select
            select-bordered
            w-full
            lg:w-56
        ">

                <option value="">
                    All Units
                </option>

                <?php foreach ($units as $term) : ?>

                    <option
                        value="<?php echo esc_attr($term->slug); ?>"
                        <?php selected(
                            $unit,
                            $term->slug
                        ); ?>>

                        <?php echo esc_html(
                            $term->name
                        ); ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- CLEAR -->

        <div>

            <label
                class="
                    label
                    pb-1
                    opacity-0
                ">

                <span>
                    Clear
                </span>

            </label>

            <a
                href="<?php echo esc_url(get_permalink()); ?>"
                class="
                    btn
                    btn-outline
                    w-full
                ">

                Clear

            </a>

        </div>

    </div>

</form>