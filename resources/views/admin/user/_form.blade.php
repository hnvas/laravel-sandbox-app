<div class="row">
    <div class="col-md-6 col-sm-12">
        @include('components.fields.text', [
                 'label'      => trans('models.user.attributes.name'),
                 'name'       => 'name',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6 col-sm-12">
        @include('components.fields.email', [
                 'label'      => trans('models.user.attributes.email'),
                 'name'       => 'email',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        @include('components.fields.password', [
                 'label'      => trans('models.user.attributes.password'),
                 'name'       => 'password'])
    </div>
    <div class="col-md-6 col-sm-12">
        @include('components.fields.password', [
                 'label'      => trans('models.user.attributes.password_confirmation'),
                 'name'       => 'password_confirmation'])
    </div>
</div>
