<script>
    import { Link } from "@inertiajs/svelte";

    export let href,
        method = "get";
</script>

<Link
    {href}
    {method}
    class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
    <slot />
</Link>
