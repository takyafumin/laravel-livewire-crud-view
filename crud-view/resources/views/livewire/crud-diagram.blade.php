<div>
    <h1 class="text-2xl font-bold mb-4">CRUD Diagram</h1>

    <div class="overflow-x-auto">
        <x-table :functions="$functions" :models="$models" :entities="$entities" />
    </div>
</div>

@script
<script>
    $wire.on('click-row', () => {
        console.log('hoge');
    });
</script>
@endscript

