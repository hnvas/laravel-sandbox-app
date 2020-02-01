@if ($message = Session::get('success'))
    <div class="bs-notify d-none"
         data-type="success"
         data-icon="done">
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="bs-notify d-none"
         data-type="danger"
         data-icon="error">
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="bs-notify d-none"
         data-type="warning"
         data-icon="warning">
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="bs-notify d-none"
         data-type="info"
         data-icon="feedback">
        {{ $message }}
    </div>
@endif


@if ($errors->any())
    <div class="bs-notify d-none"
         data-type="danger"
         data-icon="block">
        Alguns campos foram preenchidos incorretamente, verifique e corrija-os.
    </div>
@endif
