<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'label',
    ];

    /**
     * Retorna permissão relacionada a Role
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Pesquisa roles
     */
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;
    }
}
