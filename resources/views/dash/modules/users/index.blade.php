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
                            <li class="breadcrumb-item active" aria-current="page">Atualizar Dados</li>
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
                <form action="{{ route('users.search') }}" class="form-inline" method="POST">
                    @csrf
                    <div class="form-group mr-2 mb-2">
                        <label for="search" class="sr-only">Pesquisar:</label>
                        <input name="filter" type="search" class="form-control" id="search" placeholder="pesquisar" value="{{ $filters['filter'] ?? '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                </form>
            </div>
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Lista de Usuários</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Novo</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Usuários</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Data Criação</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">
                                    {{ $item->name }}
                                </th>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $item->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="" class="mr-2 ml-2">
                                        <i class="fas fa-lock-open"></i>
                                    </a>
                                    <a href="">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-body">
                @if($users == '')
                    <div class="alert alert-warning" role="alert">
                        Não encontramos registros!
                    </div>
               @endif
            </div>

            <div class="card-footer">
                <div class="float-right">
                    @if (isset($filters))
                        {!! $users->appends($filters)->links() !!}
                    @else
                        {!! $users->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
