<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataset extends Model
{
    protected $table = 'datasets';
    protected $primaryKey = 'id_dataset';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'name_dataset',
        'filename',
        'path',
    ];

    public function task()
    {
      return $this->hasMany('App\task', 'id_dataset');
    }
}
