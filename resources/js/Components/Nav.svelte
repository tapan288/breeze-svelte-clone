<script>
    import { Link } from "@inertiajs/svelte";
    import ApplicationLogo from "./ApplicationLogo.svelte";
    import SimpleButton from "./SimpleButton.svelte";
</script>

<nav class="bg-white shadow">
    <div class="mx-auto px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="ml-6 flex space-x-8">
                    <div class="flex-shrink-0 flex items-center">
                        <ApplicationLogo />
                    </div>
                    <Link
                        href={route("dashboard")}
                        class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                    >
                        Dashboard
                    </Link>
                </div>
            </div>
            <div class="ml-6 flex items-center">
                <SimpleButton href={route("profile.edit")}>Profile</SimpleButton
                >
                <SimpleButton href={route("logout")} method="post"
                    >Logout</SimpleButton
                >
            </div>
        </div>
    </div>
</nav>
