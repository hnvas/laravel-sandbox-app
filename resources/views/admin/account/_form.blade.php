<div class="row">
    <div class="col-md-6">
        @include('components.fields.text', [
                 'label'      => trans('models.account.attributes.name'),
                 'name'       => 'name',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6">
        @include('components.fields.select', [
             'label'      => trans('models.account.attributes.owner'),
             'name'       => 'owner_id',
             'collection' => $owners->pluck('name', 'id'),
             'selected'   => old('owner_id', $account->owner_id),
             'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => trans('models.account.attributes.balance'),
                 'value'      => old('balance', money($account->balance)->formatByDecimal()),
                 'name'       => 'balance',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label' => trans('models.account.attributes.special_limit'),
                 'value' => old('special_limit', money($account->special_limit)->formatByDecimal()),
                 'name'  => 'special_limit'])
    </div>
    <div class="col-md-4">
        @include('components.fields.select', [
             'label'      => trans('models.account.attributes.type'),
             'name'       => 'type',
             'collection' => $types,
             'selected'   => old('type', array_search($account->type, $types)),
             'attributes' => ['required' => true]])
    </div>
</div>