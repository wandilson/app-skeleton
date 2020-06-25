<?php

namespace App\Http\Controllers\Dash\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

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
        $permissions = $this->repository->latest()->paginate();
        return view('dash.acl.permissions.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('dash.acl.permissions.create');
    }


    public function store(PermissionRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()
                    ->route('permissions')
                    ->with('message', "Permissão: {$request->name}, cadastrada com sucesso!");
    }

    public function show($id)
    {
        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.acl.permissions.show', [
            'permission'  =>  $permission
        ]);
    }


    public function edit($id)
    {
        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.acl.permissions.edit', [
            'permission'  =>  $permission
        ]);
    }


    public function update(PermissionRequest $request, $id)
    {
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
        if(!$permission = $this->repository->find($id))
            return redirect()->route('notfound');

        $permission->delete();

        return redirect()
                    ->route('permissions')
                    ->with('message', "Permissão: {$permission->name}, removida com sucesso!");
    }

    public function search(Request $request)
    {
        
        $filters = $request->except('_token');

        $permissions = $this->repository->search($request->filter);

        return view('dash.acl.permissions.index', [
            'permissions' => $permissions,
            'filters' => $filters,
        ]);
    }
}