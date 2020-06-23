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
                            <li class="breadcrumb-item active" aria-current="page">Criar registro</li>
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
                        <h3 class="mb-0">Cadastrar Usuário</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
				<form>
					<h6 class="heading-small text-muted mb-4">Dados do Usuário</h6>
					<div class="pl-lg-4">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Nome</label>
									<input type="text" id="input-username" class="form-control" placeholder="Nome" value="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-email">Email</label>
									<input type="email" id="input-email" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<hr class="my-4">
					<!-- Address -->
					<h6 class="heading-small text-muted mb-4">Informações de Acesso</h6>
					<div class="pl-lg-4">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Senha</label>
									<input type="text" class="form-control" value="">
								</div>
							</div>
							<div class="col-lg-4">
							<div class="form-group">
								<label class="form-control-label">Confirmar senha</label>
								<input type="text" class="form-control" value="">
							</div>
							</div>
						</div>
					</div>
					<div class="pl-lg-4">
						<button type="submit" class="btn btn-success float-right">Salvar</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

@endsection
