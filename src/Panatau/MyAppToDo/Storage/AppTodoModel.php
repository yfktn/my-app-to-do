<?php namespace Panatau\MyAppToDo\Storage;
/**
 * AppToDo Model ...
 * User: toni
 * Date: 10/10/14
 * Time: 13:31
 */
use DB;
use Panatau\MyAppToDo\TableNameTrait;

class AppTodoModel extends \Eloquent {
    use TableNameTrait;

    protected $table = "my_app_todo";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    static $enum_type = array(
        'bug'=>'Bug Program',
        'enhancement'=>'Peningkatan Pada Fasilitas',
        'explanation'=>'Penjelasan Fasilitas Program',
        'new_feature'=>'Fasilitas Baru Program'
    );

    static $enum_status = array(
        'progress'=>'In Progress',
        'done'=>'Selesai'
    );

    public function getTypeAttribute($value) {
        if(isset($this->attributes['type']))
            return self::$enum_type[$this->attributes['type']];
        return null;
    }

    public function getStatusAttribute() {
        if(isset($this->attributes['status']))
            return self::$enum_status[$this->attributes['status']];
        return null;
    }
    /**
     * return only the value of status
     * @return null
     */
    public function getStatusPureAttribute() {
        if(isset($this->attributes['status']))
            return $this->attributes['status'];
        return null;
    }

    public function scopeSortByStatus($query) {
        return $query->orderBy('status', 'asc');
    }
} 