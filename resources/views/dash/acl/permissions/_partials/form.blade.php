@csrf

<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-username">Nome</label>
                <input type="text" id="input-username" class="form-control" placeholder="Nome" name="name" value="{{ $permission->name ?? old('name') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label class="form-control-label" for="input-label">Descrição</label>
                <input type="text" id="input-label" class="form-control" name="label" value="{{ $permission->label ?? old('label') }}">
            </div>
        </div>
    </div>
</div>
<hr class="my-4">