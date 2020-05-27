<div class="row">
    <div class="col-md-6">
        @include('components.fields.text', [
                 'label'      => $account::translate()->name,
                 'name'       => 'name',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6">
        @include('components.fields.select', [
             'label'      => $account::translate()->owner,
             'name'       => 'owner_id',
             'collection' => $owners->pluck('name', 'id'),
             'selected'   => old('owner_id', $account->owner_id),
             'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('components.fields.number', [
                 'label'      => $account::translate()->balance,
                 'value'      => old('balance', money($account->balance)->formatByDecimal()),
                 'name'       => 'balance',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6">
        @include('components.fields.select', [
             'label'      => $account::translate()->kind,
             'name'       => 'kind',
             'collection' => $kinds::translate(),
             'selected'   => old('kind', !$account->kind ?: $account->kind->getKey()),
             'attributes' => ['required' => true]])
    </div>
</div>