<script>
    import { Link, page, useForm } from "@inertiajs/svelte";
    import InputError from "../../../Components/InputError.svelte";
    import PrimaryButton from "../../../Components/PrimaryButton.svelte";

    export let mustVerifyEmail = false,
        status = null;

    const user = $page.props.auth.user;

    const form = useForm({
        name: user.name,
        email: user.email,
    });
</script>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>

        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>
    </header>

    <form
        on:submit|preventDefault={$form.patch(route("profile.update"))}
        class="mt-6 space-y-6"
    >
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700"
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
            <label for="email" class="block text-sm font-medium text-gray-700">
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

        {#if mustVerifyEmail && user.email_verified_at === null}
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                {#if status === "verification-link-sent"}
                    <div
                        v-show="props.status === 'verification-link-sent'"
                        class="mt-2 font-medium text-sm text-green-600"
                    >
                        A new verification link has been sent to your email
                        address.
                    </div>
                {/if}
            </div>
        {/if}

        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

            {#if $form.recentlySuccessful}
                <p class="text-sm text-gray-600">
                    Profile updated Successfully.
                </p>
            {/if}
        </div>
    </form>
</section>
