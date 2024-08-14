@props([
    'functions' => [],
    'models' => [],
    'entities' => [],
])

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            @foreach ($models as $m)
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ $m }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($functions as $key => $f)
            <tr wire:click="clickRow('{{ $key }}')">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $key }}</div>
                </td>
                @foreach ($models as $m)
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $entities[key($f) . '---' . $m]->crud }}</div>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
