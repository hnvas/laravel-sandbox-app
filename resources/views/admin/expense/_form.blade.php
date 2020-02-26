@csrf
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Descrição</label>
            <input id="description"
                   type="text"
                   class="form-control"
                   name="description"
                   value="{{ old('description', $expense->description) }}"
                   required
                   autocomplete="description">
            @error('description')
            <small id="descriptionHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Data da cobrança</label>
            <input id="issue_date"
                   type="text"
                   class="form-control date-picker"
                   name="issue_date"
                   value="{{ old('issue_date', $expense->issue_date) }}"
                   required>
            @error('issue_date')
            <small id="issueDateHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Data de vencimento</label>
            <input id="due_date"
                   type="text"
                   class="form-control date-picker"
                   name="due_date"
                   value="{{ old('due_date', $expense->due_date) }}"
                   required
                   autocomplete="due_date">
            @error('due_date')
            <small id="dueDateHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Valor</label>
            <input id="amount"
                   type="number"
                   step=".01"
                   class="form-control"
                   name="amount"
                   value="{{ old('amount', $expense->amount) }}"
                   required
                   autocomplete="amount">
            @error('amount')
            <small id="amountHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Desconto</label>
            <input id="discount"
                   type="number"
                   step=".01"
                   class="form-control"
                   name="discount"
                   value="{{ old('discount', $expense->discount) }}"
                   autocomplete="discount">
            @error('discount')
            <small id="discountHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Multa</label>
            <input id="fine"
                   type="number"
                   step=".01"
                   class="form-control"
                   name="fine"
                   value="{{ old('fine', $expense->fine) }}"
                   autocomplete="fine">
            @error('fine')
            <small id="fineHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <select name="tags[]"
                    class="form-control custom-select"
                    multiple
                    title="Selecione uma ou mais tags"
                    data-selected="{{ $expense->tags->pluck('name') }}">
                @foreach($tags as $tag)
                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
            <small id="tagsHelp"
                   class="form-text text-muted text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
</div>
