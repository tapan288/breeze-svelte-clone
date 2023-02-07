<script>
    import { useForm } from "@inertiajs/svelte";
    import InputError from "../../../Components/InputError.svelte";
    import PrimaryButton from "../../../Components/PrimaryButton.svelte";

    const form = useForm({
        current_password: "",
        password: "",
        password_confirmation: "",
    });

    const updatePassword = () => {
        $form.put(route("password.update"), {
            preserveScroll: true,
            onSuccess: () => $form.reset(),
            onError: () => {
                if ($form.errors.password) {
                    $form.reset("password", "password_confirmation");
                }
                if ($form.errors.current_password) {
                    $form.reset("current_password");
                }
            },
        });
    };
</script>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">Update Password</h2>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form on:submit|preventDefault={updatePassword} class="mt-6 space-y-6">
        <div>
            <label
                for="current_password"
                class="block text-sm font-medium text-gray-700"
            >
                Current Password
            </label>
            <div class="mt-1">
                <input
                    id="current_password"
                    bind:value={$form.current_password}
                    type="password"
                    autocomplete="current-password"
                    required
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                />
            </div>
            <InputError message={$form.errors.current_password} />
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
                    autocomplete="new-password"
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
                    autocomplete="new-password"
                    required
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <PrimaryButton disabled={$form.processing}>Save</PrimaryButton>

            {#if $form.recentlySuccessful}
                <p class="text-sm text-gray-600">Saved.</p>
            {/if}
        </div>
    </form>
</section>
