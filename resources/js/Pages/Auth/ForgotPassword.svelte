<script>
    import { useForm } from "@inertiajs/svelte";
    import InputError from "../../Components/InputError.svelte";

    export let status;

    let form = useForm({
        email: null,
    });

    function submit() {
        $form.post(route("password.email"));
    }
</script>

<svelte:head>
    <title>Forgot Password</title>
</svelte:head>

<div class="bg-gray-100">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Password Reset
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="mb-4 text-sm text-gray-600">
                    Forgot your password? No problem. Just let us know your
                    email address and we will email you a password reset link
                    that will allow you to choose a new one.
                </div>

                {#if status}
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {status}
                    </div>
                {/if}

                <form
                    class="space-y-6"
                    action="#"
                    method="POST"
                    on:submit|preventDefault={submit}
                >
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Email address
                        </label>
                        <div class="mt-1">
                            <input
                                id="email"
                                type="email"
                                autocomplete="email"
                                bind:value={$form.email}
                                required
                                placeholder="Please enter your Email Address"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                            <InputError message={$form.errors.email} />
                        </div>
                    </div>

                    <div>
                        <button
                            disabled={$form.processing}
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {$form.processing
                                ? "Hold on while we send you and Email..."
                                : "Send Password Reset Link"}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
