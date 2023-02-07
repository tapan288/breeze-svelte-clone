<script>
    import { useForm } from "@inertiajs/svelte";
    import InputError from "../../Components/InputError.svelte";

    export let email, token;

    let form = useForm({
        email: email,
        token: token,
        password: null,
        password_confirmation: null,
    });

    function submit() {
        $form.post(route("password.store"));
    }
</script>

<svelte:head>
    <title>Reset Password</title>
</svelte:head>

<div class="bg-gray-100">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reset Your Password
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
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
                                bind:value={$form.email}
                                autocomplete="email"
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                            <InputError message={$form.errors.email} />
                        </div>
                    </div>

                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Password
                        </label>
                        <div class="mt-1">
                            <input
                                id="password"
                                type="password"
                                bind:value={$form.password}
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                            <InputError message={$form.errors.password} />
                        </div>
                    </div>

                    <div>
                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input
                                id="password_confirmation"
                                bind:value={$form.password_confirmation}
                                type="password"
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                    </div>

                    <div>
                        <button
                            disabled={$form.processing}
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {$form.processing
                                ? "Hold on while we reset your Password..."
                                : "Reset Password"}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
