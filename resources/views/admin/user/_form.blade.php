<div class="row">
    <div class="col-md-6 col-sm-12">
        @include('components.fields.text', [
                 'label'      => 'Nome',
                 'name'       => 'name',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6 col-sm-12">
        @include('components.fields.email', [
                 'label'      => 'Email',
                 'name'       => 'email',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        @include('components.fields.password', [
                 'label'      => 'Senha',
                 'name'       => 'password'])
    </div>
    <div class="col-md-6 col-sm-12">
        @include('components.fields.password', [
                 'label'      => 'Confirmação de senha',
                 'name'       => 'password_confirmation'])
    </div>
</div>
