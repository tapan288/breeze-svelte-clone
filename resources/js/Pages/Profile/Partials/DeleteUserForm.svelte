<script>
    import DangerButton from "../../../Components/DangerButton.svelte";
    import SecondaryButton from "../../../Components/SecondaryButton.svelte";
    import InputError from "../../../Components/InputError.svelte";
    import { useForm } from "@inertiajs/svelte";
    import Modal from "../../../Components/Modal.svelte";

    let isModalOpen = false;

    const form = useForm({
        password: "",
    });

    const confirmUserDeletion = () => {
        isModalOpen = true;
    };

    const deleteUser = () => {
        $form.delete(route("profile.destroy"), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onFinish: () => $form.reset(),
        });
    };

    const closeModal = () => {
        isModalOpen = false;

        $form.clearErrors();
        $form.reset();
    };
</script>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Delete Account</h2>

        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be
            permanently deleted. Before deleting your account, please download
            any data or information that you wish to retain.
        </p>
    </header>

    <DangerButton onClick={confirmUserDeletion}>Delete Account</DangerButton>

    <Modal show={isModalOpen} onClose={closeModal}>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will
                be permanently deleted. Please enter your password to confirm
                you would like to permanently delete your account.
            </p>

            <div class="mt-6">
                <label
                    for="confirm-password"
                    class="block text-sm font-medium text-gray-700"
                >
                    Password
                </label>
                <div class="mt-1">
                    <input
                        id="confirm-password"
                        bind:value={$form.password}
                        type="password"
                        autocomplete="current-password"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
                <InputError message={$form.errors.password} />
            </div>

            <div class="mt-6 flex justify-end">
                <SecondaryButton onClick={closeModal}>Cancel</SecondaryButton>

                <DangerButton disabled={$form.processing} onClick={deleteUser}>
                    Delete Account
                </DangerButton>
            </div>
        </div>
    </Modal>
</section>
