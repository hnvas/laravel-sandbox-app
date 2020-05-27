<div class="row">
    <div class="col-md-12">
        @include('components.fields.text', [
                 'label'      => $expense::translate()->description,
                 'name'       => 'description',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @include('components.fields.date', [
                 'label'      => $expense::translate()->issue_date,
                 'name'       => 'issue_date',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.date', [
                 'label'      => $expense::translate()->due_date,
                 'name'       => 'due_date',
                 'attributes' => ['required' => true]])
    </div>
    <div class="col-md-4">
        @include('components.fields.number', [
                 'label'      => $expense::translate()->amount,
                 'value'      => old('value', money($expense->amount)->formatByDecimal()),
                 'name'       => 'amount',
                 'attributes' => ['required' => true]])
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('components.fields.select', [
             'label' => $expense::translate()->tags,
             'name' => 'tags',
             'multiple' => true,
             'collection' => $tags->pluck('name', 'name'),
             'selected' => $expense->tags->pluck('name'),
             ])
    </div>
</div>
