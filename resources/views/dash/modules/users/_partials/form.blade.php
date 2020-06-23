@csrf

<h6 class="heading-small text-muted mb-4">Dados do Usuário</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-username">Nome</label>
                <input type="text" id="input-username" class="form-control" placeholder="Nome" name="name" value="{{ $user->name ?? old('name') }}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-email">Email</label>
                <input type="email" id="input-email" class="form-control" name="email" value="{{ $user->email ?? old('email') }}">
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
                <input type="password" name="password" class="form-control" value="">
            </div>
        </div>
        <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Confirmar senha</label>
            <input type="password" name="password_confirmation" class="form-control" value="">
        </div>
        </div>
    </div>
</div>