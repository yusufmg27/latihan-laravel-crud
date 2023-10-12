<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    use HasFactory;

    protected $table = 'master_category';
    protected $fillable = ['id', 'name', 'description', 'seq', 'is_deleted'];
}

