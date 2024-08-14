<?php

namespace Packages\crud\dto;

use Livewire\Wireable;

/**
 * CRUDの要素を表すDTO
 */
class CrudElementDto implements Wireable
{
    /**
     * @param string $function_name 機能名
     * @param string $model_name    モデル名
     * @param string $crud          CRUD
     */
    public function __construct(
        public readonly string $id,
        public readonly string $function_name,
        public readonly string $model_name,
        public readonly string $crud
    ) {
    }

    public function toLivewire()
    {
        return [
            'id'            => $this->id,
            'function_name' => $this->function_name,
            'model_name'    => $this->model_name,
            'crud'          => $this->crud,
        ];
    }

    public static function fromLivewire($value)
    {
        return new static(
            $value['id'],
            $value['function_name'],
            $value['model_name'],
            $value['crud']
        );
    }

    // public function toArray(): array
    // {
    //     return [
    //         'function_name' => $this->function_name,
    //         'model_name'    => $this->model_name,
    //         'crud'          => $this->crud,
    //     ];
    // }
}
