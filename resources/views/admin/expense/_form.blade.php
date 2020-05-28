<div class="row">
    <div class="col-md-12">
        @include('components.fields.text', [
                 'label'      => trans('models.expense.attributes.description'),
                 'name'       => 'description',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @include('components.fields.date', [
                 'label'      => trans('models.expense.attributes.issue_date'),
                 'name'       => 'issue_date',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.date', [
                 'label'      => trans('models.expense.attributes.due_date'),
                 'name'       => 'due_date',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => trans('models.expense.attributes.amount'),
                 'value'      => old('value', money($expense->amount)->formatByDecimal()),
                 'name'       => 'amount',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('components.fields.select', [
             'label' => trans('models.expense.attributes.tags'),
             'name' => 'tags',
             'multiple' => true,
             'collection' => $tags->pluck('name', 'name'),
             'selected' => $expense->tags->pluck('name'),
             ])
    </div>
</div>
