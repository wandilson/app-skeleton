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
                            <li class="breadcrumb-item"><a href="{{ route('roles') }}">Funções</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lista Dados</li>
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
                <form action="{{ route('roles.search') }}" class="form-inline" method="POST">
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
                        <h3 class="mb-0">Lista de Funções</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Novo</a>
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
                                    <div class="mt-3">
										@foreach ($item->permissions as $itemPerm)											
											<span class="badge badge-info" data-toggle="tooltip" data-original-title="{{ $itemPerm->label }}">{{ $itemPerm->name }}</span>
										@endforeach
									</div>
                                </td>
                                <td>
                                    @if ($item->name <> 'Desenvolvedor')
                                        <a href="{{ route('roles.edit', $item->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('roles.permissions', $item->id) }}" class="mr-2 ml-2">
                                            <i class="fas fa-lock-open"></i>
                                        </a>
                                        <a href="{{ route('roles.show', $item->id) }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="float-right">
                    @if (isset($filters))
                        {!! $roles->appends($filters)->links() !!}
                    @else
                        {!! $roles->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
