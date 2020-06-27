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
							<li class="breadcrumb-item"><a href="{{ route('users.roles', $role->id ) }}">{{ $role->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Funções disponíveis</li>
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
							<h3 class="mb-0">Disponível para: {{ $role->name }}</h3>
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<form action="{{ route('roles.permissions.attach', $role->id) }}" method="POST">

						<table class="table align-items-center table-flush table-striped mb-4">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Função</th>
									<th>Descrição</th>
								</tr>
							</thead>
							<tbody>
								
									@csrf

									@foreach ($permissions as $item)
										<tr>
											<th>
												<div class="form-group form-check">
													<input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $item->id }}">
												</div>
											</th>
											<td class="table-user">
												<b>{{ $item->name }}</b>
											</td>
											<td>
												<span class="text-muted">{{ $item->label }}</span>
											</td>
										</tr>
									@endforeach
									
											
									</tr>
								
							</tbody>
						</table>
						
						<div class="card-footer mb-4">
							<button type="submit" class="btn btn-success float-right">Vincular Selecionadas</button>
							<br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
