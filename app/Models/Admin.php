<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Model;

class Admin extends Model
{
    // protected $table = 'admin';

    // public function getAuthIdentifierName()
    // {
    //     return 'id';
    // }

    // public function getAuthIdentifier()
    // {
    //     return $this->id;
    // }

    use HasFactory;
}
