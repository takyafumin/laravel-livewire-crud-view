<?php

namespace Packages\crud\dto;

/**
 * CRUDの要素を表すDTO
 */
class CrudElementDto
{
    /**
     * @param string $function_name 機能名
     * @param string $model_name    モデル名
     * @param string $crud          CRUD
     */
    public function __construct(
        public readonly string $function_name,
        public readonly string $model_name,
        public readonly string $crud
    ) {
    }
}

