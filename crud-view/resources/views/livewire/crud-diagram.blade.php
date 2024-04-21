<div>
    <h1 class="text-2xl font-bold mb-4">CRUD Diagram</h1>

    <div class="overflow-x-auto">
        <x-table :entities="$entities" />
    </div>
    <button wire:click="openRow('')"
        class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">行を開く</button>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        $wire.on('click-row', () => {
            console.log('hoge');
        })
    });
</script>
