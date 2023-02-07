<script context="module">
    export { default as layout } from "../../Layouts/AuthenticatedLayout.svelte";
</script>

<script>
    export let mustVerifyEmail = false,
        status = null;

    import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.svelte";
    import UpdatePasswordForm from "./Partials/UpdatePasswordForm.svelte";
    import DeleteUserForm from "./Partials/DeleteUserForm.svelte";
</script>

<svelte:head>
    <title>Profile</title>
</svelte:head>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <UpdateProfileInformationForm
                must-verify-email="mustVerifyEmail"
                status="status"
                class="max-w-xl"
            />
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <DeleteUserForm class="max-w-xl" />
        </div>
    </div>
</div>
