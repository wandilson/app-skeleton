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
                            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Meu Perfil</a></li>
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
		<div class="col-xl-8 order-xl-1">
			<div class="card">
				<div class="card-header">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">Meu Perfil</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					@include('dash.modules.includes.alerts')
					<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						<h6 class="heading-small text-muted mb-4">Dados do Usuário</h6>
						<div class="pl-lg-4">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Avatar</label>
										<div class="custom-file">
											<input name="image" type="file" class="custom-file-input" id="customFile">
											<label class="custom-file-label" for="customFile">Pesquisar Avatar</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="name">Nome</label>
										<input type="text" id="name" class="form-control" placeholder="Nome" name="name" value="{{ Auth::user()->name }}">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label" for="email">Email</label>
										<input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
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
										<input type="password" class="form-control" name="password" value="">
									</div>
								</div>
								<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Confirmar senha</label>
									<input type="password" class="form-control" name="password_confirmation" value="">
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
