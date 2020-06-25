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
                            <li class="breadcrumb-item active" aria-current="page">Atualizar permissão</li>
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

            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Atualizar Permissão</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
				
				@include('dash.modules.includes.alerts')

				<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
					
					@include('dash.acl.permissions._partials.form')
                    @method('PUT')
                    
					<div class="pl-lg-4">
						<button type="submit" class="btn btn-success float-right">Salvar</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

@endsection
