<?php

if (
    isset($_GET['contact'])
    && $_GET['contact'] === 'success'
) :
?>

    <div
        class="
        alert
        alert-success
        mb-6
    ">
        Message sent successfully.
    </div>

<?php endif; ?>

<?php

if (
    isset($_GET['contact'])
    && $_GET['contact'] === 'error'
) :
?>

    <div
        class="
        alert
        alert-error
        mb-6
    ">
        Unable to send message. Please try again.
    </div>

<?php endif; ?>

<?php

$departments =
    $args['departments']
    ?? [];

?>

<div
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
    ">

    <div class="card-body">

        <h2
            class="
                card-title
                mb-4
            ">
            Send a Message
        </h2>

        <form
            method="post"
            class="space-y-4">

            <?php
            wp_nonce_field(
                'dpsm_contact_form',
                'dpsm_contact_nonce'
            );
            ?>

            <div
                class="
                    grid
                    grid-cols-1
                    md:grid-cols-2
                    gap-4
                ">

                <input
                    type="text"
                    name="first_name"
                    placeholder="First Name"
                    class="input input-bordered w-full"
                    required>

                <input
                    type="text"
                    name="last_name"
                    placeholder="Last Name"
                    class="input input-bordered w-full"
                    required>

            </div>

            <input
                type="email"
                name="email"
                placeholder="Email Address"
                class="input input-bordered w-full"
                required>

            <select
                name="department_id"
                class="select select-bordered w-full"
                required>

                <option value="">
                    Select Department
                </option>

                <?php foreach (
                    $departments
                    as $department
                ) : ?>

                    <option
                        value="<?php echo esc_attr(
                                    $department['id']
                                ); ?>">

                        <?php echo esc_html(
                            $department['full_name']
                                ?: $department['name']
                        ); ?>

                    </option>

                <?php endforeach; ?>

            </select>

            <input
                type="text"
                name="subject"
                placeholder="Subject"
                class="input input-bordered w-full"
                required>

            <textarea
                name="message"
                rows="6"
                placeholder="Message"
                class="textarea textarea-bordered w-full"
                required></textarea>

            <button
                type="submit"
                name="dpsm_contact_submit"
                class="
                    btn
                    btn-primary
                ">

                Send Message

            </button>

        </form>

    </div>

</div>