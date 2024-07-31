<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'info_users';

    public function user_info()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
