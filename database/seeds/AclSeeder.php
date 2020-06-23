<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AclSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [ 'name'  =>  'user_view',      'label' =>  'Visualiza lista de usuários'],
            [ 'name'  =>  'user_create',    'label' =>  'Libera a opção de cadastrar novos usuários'],
            [ 'name'  =>  'user_edit',      'label' =>  'Libera a opção de editar registro do usuários'],
            [ 'name'  =>  'user_show',      'label' =>  'Visualiza todos os dados do usuário'],
            [ 'name'  =>  'user_delete',    'label' =>  'Libera opção de deletar o usuário'],
            [ 'name'  =>  'user_roles',     'label' =>  'Disponibiliza a opção de add funções ao usuário']
        ];

        Permission::insert($permissions);

        Role::create([
            'name'      => 'Desenvolvedor',
            'label'      => 'Acesso Geral ao Sistema'
        ]);
    }
}
