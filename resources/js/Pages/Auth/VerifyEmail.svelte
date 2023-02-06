<script>
    import { useForm } from "@inertiajs/svelte";
    import SimpleButton from "../../Components/SimpleButton.svelte";

    export let status;

    let form = useForm();

    function submit() {
        $form.post(route("verification.send"));
    }
</script>

<svelte:head>
    <title>Email Verification</title>
</svelte:head>

<div>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Email Verification Required
            </h3>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="mb-4 text-sm text-gray-600">
                    Thanks for signing up! Before getting started, could you
                    verify your email address by clicking on the link we just
                    emailed to you? If you didn't receive the email, we will
                    gladly send you another.
                </div>

                {#if status == "verification-link-sent"}
                    <div class="mb-4 font-medium text-sm text-green-600">
                        A new verification link has been sent to the email
                        address you provided during registration.
                    </div>
                {/if}

                <form
                    class="space-y-6 mb-4"
                    action="#"
                    method="POST"
                    on:submit|preventDefault={submit}
                >
                    <div>
                        <button
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {$form.processing
                                ? "Hold on while we send you and Email..."
                                : "Resend Verification Email"}
                        </button>
                    </div>
                </form>

                <SimpleButton href={route("logout")} method="post"
                    >Logout</SimpleButton
                >
            </div>
        </div>
    </div>
</div>
