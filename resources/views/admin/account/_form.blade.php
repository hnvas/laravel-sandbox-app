<div class="row">
    <div class="col-md-6">
        @include('components.fields.text', [
                 'label'      => 'Nome',
                 'name'       => 'name',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6">
        @include('components.fields.select', [
             'label' => 'Selecione um usuário',
             'name' => 'owner_id',
             'collection' => $owners->pluck('name', 'id'),
             'selected' => old('owner_id', $account->owner_id),
             'attributes' => ['required' => true]
             ])
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => 'Saldo',
                 'value'      => old('balance', money($account->balance)->formatByDecimal()),
                 'name'       => 'balance',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => 'Cheque especial',
                 'value'      => old('special_limit', money($account->special_limit)->formatByDecimal()),
                 'name'       => 'special_limit'])
    </div>
    <div class="col-md-4">
        @include('components.fields.select', [
             'label' => 'Selecione um tipo',
             'name' => 'type',
             'collection' => $types,
             'selected' => old('type', array_search($account->type, $types)),
             'attributes' => ['required' => true]
             ])
    </div>
</div>