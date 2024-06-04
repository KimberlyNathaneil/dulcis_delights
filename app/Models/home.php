<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    //use HasFactory;
    protected $table ="home";
    protected $primarykey ="id";
    protected $fillable = ['id','expense_id','income_id'];

    public function expenses()
    {
        return $this->hasMany(expenses::class);
    }

    public function income()
    {
        return $this->hasMany(income::class);
    }
}
