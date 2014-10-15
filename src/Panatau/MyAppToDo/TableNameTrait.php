<?php namespace Panatau\MyAppToDo;

/**
 * Use to return tableName()
 * reference: https://github.com/laravel/framework/issues/1436
 * User: toni
 * Date: 10/10/14
 * Time: 14:05
 */

trait TableNameTrait {
    public static function getTableName()
    {
        return ((new self)->getTable());
    }
} 