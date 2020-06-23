<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'label',
    ];

    /**
     * Retorna as roles que estão usando a permissão
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
