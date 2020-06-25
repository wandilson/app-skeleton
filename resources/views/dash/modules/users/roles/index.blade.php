@extends('dash.layouts.dash')

@section('header')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users') }}">Usuários</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Funções do usuário</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-8">
        
        @include('dash.modules.includes.alerts')

        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
						<h3 class="mb-0">Funções do usuário: {{ $user->name }}</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-sm btn-primary">Novo</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <th scope="row">
                                    {{ $item->name }}
                                </th>
                                <td>
                                    {{ $item->label }}
                                </td>
                                <td>
                                    <a href="{{ route('users.roles.detach', [$user->id, $item->id]) }}" class="mr-2 ml-2">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
