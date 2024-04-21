<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Packages\crud\dto\CrudElementDto;

class CrudDiagram extends Component
{
    /**
     * @var Collection<CrudElementDto>|null $entities エンティティのリスト
     */
    private ?Collection $entities = null;

    public ?Collection $functions = null;
    public ?Collection $models    = null;
    public $json = null;
    public $text = 'hoge';

    public function mount()
    {
        $this->functions = collect(['A', 'B', 'C', 'D', 'E'])
            ->map(fn (string $f) => "機能{$f}");
        $this->models    = collect(range(1, 10))
            ->map(fn (int $i) => "Model-{$i}");

        // サンプルのエンティティを定義
        $this->entities = collect();
        $this->functions->each(
            function (string $f) {
                $this->models->each(
                    function (string $m) use ($f) {
                        $element = new CrudElementDto(
                            function_name: $f,
                            model_name: $m,
                            crud: 'CRUD'
                        );
                        $this->entities->put((string) Str::uuid(), $element);
                    }
                );
            }
        );

        $this->json = serialize($this->entities);
    }

    public function render()
    {
        return view('livewire.crud-diagram');
    }

    public function clickRow()
    {
        $this->dispatch('click-row');
    }

    /**
     * CRUDの値を取得する
     *
     * @param  string $function_name 機能名
     * @param  string $model_name    モデル名
     * @return string CRUD
     */
    public function getCrudValue(string $function_name, string $model_name): string
    {
        return $this->entities
            ->filter(fn (CrudElementDto $dto) => $dto->function_name === $function_name && $dto->model_name === $model_name)
            ->map(fn (CrudElementDto $dto) => $dto->crud)
            ->first() ?? '';
    }

    public function openRow(string $function_name): void
    {
        // CRUDデータのデータモデルと保持方法を再検討する
        //  - row: 機能名
        //    - column: モデル名(n件)
        //  - row: モデル名
        //    - column: 機能名(n件)
        $list = unserialize($this->json);
        $function_name = $list
            ->filter(fn (CrudElementDto $dto) => $dto->function_name === $function_name)
            ->first();
    }
}


// use Illuminate\Support\Collection;

// class UserDTO {
//     public $id;
//     public $name;
//     public $age;
//     public $email;

//     public function __construct($id, $name, $age, $email = null) {
//         $this->id = $id;
//         $this->name = $name;
//         $this->age = $age;
//         $this->email = $email;
//     }
// }

// class DataTable {
//     private $data;

//     public function __construct($initialData = []) {
//         $this->data = new Collection($initialData);
//     }

//     public function addRowAfterName(UserDTO $rowData, $afterName) {
//         $index = $this->data->search(function ($row) use ($afterName) {
//             return $row->name === $afterName;
//         });

//         if ($index === false) {
//             // 指定した名前が見つからなかった場合は処理を終了
//             return;
//         }

//         $index++; // 指定した名前の次に挿入するため
//         $before = $this->data->splice(0, $index);
//         $after = $this->data->splice($index);
//         $this->data = $before->concat([$rowData])->concat($after);
//     }

//     // 他のメソッドは省略
// }

// // データテーブルのインスタンス化
// $dataTable = new DataTable([
//     new UserDTO(1, 'John', 30),
//     new UserDTO(2, 'Jane', 25),
//     new UserDTO(3, 'Alice', 28)
// ]);

// // 名前の次にデータを追加
// $dataTable->addRowAfterName(new UserDTO(4, 'Bob', 35), 'Jane');
// echo "Data after adding row: ";
// print_r($dataTable);

// // 存在しない名前の次にデータを追加（何も起こらない）
// $dataTable->addRowAfterName(new UserDTO(5, 'Charlie', 40), 'Unknown');
// echo "Data after trying to add row after 'Unknown': ";
// print_r($dataTable);
