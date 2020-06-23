<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    protected $repository;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->repository = $user;
    }



    public function index()
    {
        return view('dash.modules.profile.index');
    }



    public function update(ProfileRequest $request)
    {
        $data = $request->all();
        $user = $this->repository->find(Auth()->user()->id);
        
        
        // Se a senha for preenchida criptografa
        if(isset($data['password']) <> null){
            $data['password'] = Hash::make($data['password']);
        }else{
            $data['password'] = $user['password'];
        }

        // Verifica e faz upload do avatar
        $data['image']  =   $user->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if($user->image)
                $name = $user->image;
            else
                $name = $user->id.Str::kebab($user->name);

            $extension = $request->image->extension();
            $nameFile = "{$name}.$extension";
            $data['image'] = $nameFile;

            $upload = $request->image->storeAs('users', $nameFile);

            if(!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer o upload da imagem');
        }

        // Usuário não localizado
        if(!$user = $this->repository->find(Auth()->user()->id))
            return redirect()->route('notfound');

        $user->update($data);

        return redirect()
                    ->route('profile')
                    ->with('message', 'Registro atualizado com sucesso');
    }
}
