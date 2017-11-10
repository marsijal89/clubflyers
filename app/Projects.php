<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";
    
    protected $fillable = [
            'userId','name','content','preview',
        ];
    
 
        public function user()

        {

            return $this->hasOne('App\User');

        }
       

}
