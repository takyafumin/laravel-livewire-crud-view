<?php

namespace App\Livewire;

use Livewire\Component;

class CrudDiagram extends Component
{
    public $entities = [];

    public function mount()
    {
        // サンプルのエンティティを定義
        $this->entities = [
            ['name' => 'Entity 1', 'description' => 'Entity description 1'],
            ['name' => 'Entity 2', 'description' => 'Entity description 2'],
            ['name' => 'Entity 3', 'description' => 'Entity description 3'],
        ];
    }

    public function render()
    {
        return view('livewire.crud-diagram');
    }
}
