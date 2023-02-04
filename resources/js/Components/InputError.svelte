<script>
    export let message, classes;
</script>

{#if message}
    <div class="text-red-500 {classes}">
        {message}
    </div>
{/if}
