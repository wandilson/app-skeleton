<?php

namespace App\Http\Controllers\Dash\Acl;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersRolesController extends Controller
{
    protected $user, $role;

    public function __construct(User $user, Role $role)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Lista Funções de cada usuário
     */
    public function index($idUser)
    {

        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->route('notfound');
        }

        $roles = $user->roles()->with('permissions')->get();

        return view('dash.modules.users.roles.index',[
            'user'           =>      $user,
            'roles'          =>      $roles
        ]);
    }

    public function rolesAvailable($idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->route('notfound');
        }

        $roles = $user->rolesAvailable()->get();
        
        return view('dash.modules.users.roles.all_roles',[
            'role'          =>      $roles,
            'user'          =>      $user
        ]);

    }

    /**
     * Desvincular Permissão da função
     */
    public function rolesDetach($idUser, $idRoles)
    {
        $user = $this->user->find($idUser);
        $role = $this->role->find($idRoles);

        if (!$user || !$role) {
            return redirect()->route('notfound');
        }

        $user->roles()->detach($role);

        return redirect()->route('users.roles', $idUser);
    }


    /**
     * Vincular funçã a um usuário
     */
    public function rolesAttach(Request $request, $idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->route('notfound');
        }

        if (!$request->roles || count($request->roles) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $user->roles()->attach($request->roles);

        return redirect()->route('users.roles', $user->id);
    }

}
