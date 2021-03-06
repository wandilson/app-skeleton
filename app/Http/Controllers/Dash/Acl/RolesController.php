<?php

namespace App\Http\Controllers\Dash\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    protected $repository;

    public function __construct(Role $roles)
    {
        $this->middleware('auth');
        $this->repository = $roles;
    }


    public function index()
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        $roles = $this->repository->latest()->paginate();
        return view('dash.acl.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        return view('dash.acl.roles.create');
    }


    public function store(RoleRequest $request)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        $data = $request->all();
        $this->repository->create($data);

        return redirect()
                    ->route('roles')
                    ->with('message', "Função: {$request->name}, cadastrada com sucesso!");
    }

    public function show($id)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        if(!$role = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.acl.roles.show', [
            'role'  =>  $role
        ]);
    }


    public function edit($id)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        if(!$role = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.acl.roles.edit', [
            'role'  =>  $role
        ]);
    }


    public function update(RoleRequest $request, $id)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        if(!$role = $this->repository->find($id))
            return redirect()->route('notfound');

        $data = $request->all();
        $role->update($data);

        return redirect()
                    ->route('roles')
                    ->with('message', "Função: {$request->name}, atualizada com sucesso!");
    }

    public function destroy($id)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        if(!$role = $this->repository->find($id))
            return redirect()->route('notfound');

        $role->delete();

        return redirect()
                    ->route('roles')
                    ->with('message', "Função: {$role->name}, removida com sucesso!");
    }

    public function search(Request $request)
    {
        if( Gate::denies('acl_roles'))
            return redirect()->route('unauthorized');

        $filters = $request->except('_token');

        $roles = $this->repository->search($request->filter);

        return view('dash.acl.roles.index', [
            'roles' => $roles,
            'filters' => $filters,
        ]);
    }
}
