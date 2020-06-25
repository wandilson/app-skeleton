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
                            <li class="breadcrumb-item"><a href="{{ route('permissions') }}">Permissões</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalhes da função</li>
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
        
        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-0">Detalhes</h5>
            </div>
            <div class="card-body">
                <h1>{{ $permission->name }}</h1>
                <h4>{{ $permission->label }}</h4>
                <hr>
                <form action="{{ route('permissions.delete', $permission->id) }}" method="POST" onsubmit="return confirm('Deseja realmente remover esse registro?');">
                    @csrf
					@method('DELETE')
                    <button type="submit" class="btn btn-danger">Remover permissão</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
