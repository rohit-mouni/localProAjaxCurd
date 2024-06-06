<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DummyUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'dummy_users';
}
