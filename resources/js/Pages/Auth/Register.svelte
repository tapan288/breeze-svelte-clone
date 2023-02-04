<script>
    import { useForm } from "@inertiajs/svelte";
    import InputError from "../../Components/InputError.svelte";

    let form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    function submit() {
        $form.post(route("register"));
    }
</script>

<svelte:head>
    <title>Register</title>
</svelte:head>

<div>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Register
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
                            for="name"
                            class="block text-sm font-medium text-gray-700"
                            >Name</label
                        >
                        <div class="mt-1">
                            <input
                                id="name"
                                bind:value={$form.name}
                                type="text"
                                autocomplete="name"
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                        <InputError message={$form.errors.name} />
                    </div>

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
                                bind:value={$form.password}
                                type="password"
                                autocomplete="current-password"
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                        <InputError message={$form.errors.password} />
                    </div>

                    <div>
                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-gray-700"
                            >Confirm Password</label
                        >
                        <div class="mt-1">
                            <input
                                id="password_confirmation"
                                type="password"
                                bind:value={$form.password_confirmation}
                                required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-sm">
                            <a
                                href="/login"
                                class="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                Already Registered?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            disabled={$form.processing}
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {$form.processing
                                ? "Just a moment, We're setting up your account...."
                                : "Register"}
                        </button>
                    </div>
                </form>

                <!-- <div class="mt-6 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300" />
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500"
                            >Or continue with</span
                        >
                    </div>
                </div> -->
                <!-- <form action="/login/github" method="post">
                    <button
                        type="submit"
                        class="mt-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Github
                    </button>
                </form> -->
            </div>
        </div>
    </div>
</div>
