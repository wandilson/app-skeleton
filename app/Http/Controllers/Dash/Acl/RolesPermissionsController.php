<?php

namespace App\Http\Controllers\Dash\Acl;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RolesPermissionsController extends Controller
{
    protected $role, $permission;

    public function __construct(Role $role, Permission $permissions)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->permissions = $permissions;
    }

    /**
     * Permissões de Roles/Funções
     */
    public function index($idRole)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        $role = $this->role->find($idRole);

        if (!$role) {
            return redirect()->route('notfound');
        }

        $permissions = $role->permissions()->get();

        return view('dash.acl.roles.permissions.index',[
            'role'          =>      $role,
            'permissions'   =>      $permissions
        ]);
    }


    public function permissionsAvailable($idRole)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        if (!$role = $this->role->find($idRole)) {
            return redirect()->route('notfound');
        }

        $permissions = $role->permissionsAvailable()->get();

        return view('dash.acl.roles.permissions.all_permissions',[
            'role'          =>      $role,
            'permissions'   =>      $permissions
        ]);

    }


    /**
     * Desvincular Permissão da função
     */
    public function permissionsDetach($idRole, $idPermission)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        $role = $this->role->find($idRole);
        $permission = $this->permissions->find($idPermission);

        if (!$role || !$permission) {
            return redirect()->route('notfound');
        }

        $role->permissions()->detach($permission);

        return redirect()->route('roles.permissions', $idRole);
    }


    /**
     * Vincular permissão a uma função
     */
    public function permissionsAttach(Request $request, $idRole)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        if (!$role = $this->role->find($idRole)) {
            return redirect()->route('notfound');
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

}
