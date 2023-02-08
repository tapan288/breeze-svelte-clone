<script>
    import { Link, useForm } from "@inertiajs/svelte";
    import InputError from "../../Components/InputError.svelte";

    export let status;

    let form = useForm({
        email: null,
        password: null,
        remember: false,
    });

    function submit() {
        $form.post(route("login"));
    }
</script>

<svelte:head>
    <title>Login</title>
</svelte:head>

<div>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
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
                                bind:value={$form.email}
                                autocomplete="email"
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                        <InputError message={$form.errors.email} />
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
                                autocomplete="current-password"
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                        <InputError message={$form.errors.password} />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                bind:checked={$form.remember}
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            />
                            <label
                                for="remember_me"
                                class="ml-2 block text-sm text-gray-900"
                            >
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <Link
                                href={route("password.request")}
                                class="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                Forgot your password?
                            </Link>
                        </div>
                    </div>

                    <div>
                        <button
                            disabled={$form.processing}
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {$form.processing ? "Loggin You In...." : "Login"}
                        </button>
                    </div>

                    <div>
                        <span class="text-sm">Don't have an Account?</span>
                        <Link
                            href={route("register")}
                            class="font-medium text-indigo-600 hover:text-indigo-500"
                        >
                            Register
                        </Link>
                    </div>
                </form>

                <div class="mt-6 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300" />
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500"
                            >Or continue with</span
                        >
                    </div>
                </div>
                <a
                    href={route("github.login")}
                    class="mt-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Github
                </a>
            </div>
        </div>
    </div>
</div>
