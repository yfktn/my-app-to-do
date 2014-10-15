<?php namespace Panatau\MyAppToDo\Storage;
/**
 * Interface
 * User: toni
 * Date: 10/10/14
 * Time: 13:24
 */

interface AppTodoInterface {
    public function index();
    public function store(Array $input);
    public function resetStatus($id, $input);
    public function getStatistic();
} 