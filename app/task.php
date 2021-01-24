<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'id_task';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'name_task',
        'status',
        'id_user',
        'id_dataset',
    ];
    public function dataset()
    {
      return $this->belongsTo('App\dataset', 'id_dataset');
    }
    public function user()
    {
      return $this->belongsTo('App\user', 'id_user');
    }
}
