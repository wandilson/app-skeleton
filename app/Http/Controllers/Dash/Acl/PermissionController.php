<?php

namespace App\Http\Controllers\Dash\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->middleware('auth');
        $this->repository = $permission;
    }


    public function index()
    {   
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        $permissions = $this->repository->latest()->paginate();
        return view('dash.acl.permissions.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        return view('dash.acl.permissions.create');
    }


    public function store(PermissionRequest $request)
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        $data = $request->all();
        $this->repository->create($data);

        return redirect()
                    ->route('permissions')
                    ->with('message', "Permissão: {$request->name}, cadastrada com sucesso!");
    }

    public function show($id)
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.acl.permissions.show', [
            'permission'  =>  $permission
        ]);
    }


    public function edit($id)
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.acl.permissions.edit', [
            'permission'  =>  $permission
        ]);
    }


    public function update(PermissionRequest $request, $id)
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        $data = $request->all();
        $permission->update($data);

        return redirect()
                    ->route('permissions')
                    ->with('message', "Permissão: {$request->name}, atualizada com sucesso!");
    }

    public function destroy($id)
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        $permission->delete();

        return redirect()
                    ->route('permissions')
                    ->with('message', "Permissão: {$permission->name}, removida com sucesso!");
    }

    public function search(Request $request)
    {
        if( Gate::denies('acl_permissions'))
            return redirect()->route('unauthorized');

        $filters = $request->except('_token');

        $permissions = $this->repository->search($request->filter);

        return view('dash.acl.permissions.index', [
            'permissions' => $permissions,
            'filters' => $filters,
        ]);
    }
}