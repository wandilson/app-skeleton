<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->repository = $user;
    }


    public function index()
    {
        $users = $this->repository->latest()->paginate(1);
        return view('dash.modules.users.index', ['users' => $users]);
    }


    public function create()
    {
        return view('dash.modules.users.create');
    }


    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        $this->repository->create($data);

        return redirect()
                    ->route('users')
                    ->with('message', "Usuário: {$request->name}, cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if(!$user = $this->repository->find($id))
            return redirect()->route('notfound');

        return view('dash.modules.users.edit', [
            'user'  =>  $user
        ]);
    }


    public function update(UserRequest $request, $id)
    {
        if(!$user = $this->repository->find($id))
            return redirect()->route('notfound');

        $data = $request->all();
        if(isset($data['password']) <> null){
            $data['password'] = Hash::make($data['password']);
        }else{
            $data['password'] = $user['password'];
        }

        $user->update($data);

        return redirect()
                    ->route('users')
                    ->with('message', "Usuário: {$request->name}, atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        
        $filters = $request->except('_token');

        $users = $this->repository->search($request->filter);

        return view('dash.modules.users.index', [
            'users' => $users,
            'filters' => $filters,
        ]);
    }
}
