<div class="row">
    <div class="col-md-12">
        @include('components.fields.text', [
                 'label'      => 'Descrição',
                 'name'       => 'description',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('components.fields.date', [
                 'label'      => 'Data da cobrança',
                 'name'       => 'issue_date',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-6">
        @include('components.fields.date', [
                 'label'      => 'Data de vencimento',
                 'name'       => 'due_date',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => 'Valor',
                 'value'      => old('value', money($expense->amount)->formatByDecimal()),
                 'name'       => 'amount',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => 'Desconto',
                 'value'      => old('value', money($expense->discount)->formatByDecimal()),
                 'name'       => 'discount'])
    </div>
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => 'Multa',
                 'value'      => old('value', money($expense->fine)->formatByDecimal()),
                 'name'       => 'fine'])
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('components.fields.select', [
             'label' => 'Selecione uma ou mais tags',
             'name' => 'tags',
             'multiple' => true,
             'collection' => $tags->pluck('name', 'name'),
             'selected' => $expense->tags->pluck('name'),
             ])
    </div>
</div>
