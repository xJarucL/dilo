<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $table = 'password_reset_tokens';

    protected $primaryKey = 'email';

    protected $fillable = [
        'email', 'token', 'created_at', 'updated_at',
    ];
}
