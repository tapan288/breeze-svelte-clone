<script>
    export let type = "submit",
        disabled = false;
</script>

<button
    {type}
    {disabled}
    class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150"
>
    <slot />
</button>
