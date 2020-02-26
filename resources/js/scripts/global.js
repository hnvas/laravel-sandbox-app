$(function () {
    initAjax();
    initDatePicker($('.date-picker'));
    initDateTimePicker($('.datetime-picker'));
    initSelectPicker($('.custom-select'));
    initFlashes($('.bs-notify'));

    $('.delete-resource').click(function (e) {
        e.preventDefault();

        swal.fire({
            title: 'Você tem certeza?',
            text: "Após excluir o registro não será possíve reverter.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f8bb86',
            cancelButtonColor: '#919191',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar'
        }).then((result) => {

            if (result.value) {

                $.ajax({
                    method: 'DELETE',
                    url: $(this).attr('href'),
                    success: function (response) {

                        showMessage('done', response.success, 'success');
                        $(this).closest('tr').fadeOut();

                    }, error: function (response) {

                        showMessage('error', response.responseJSON.error, 'danger');
                    }
                });
            }
        })
    });
});

function initAjax() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function logout() {
    event.preventDefault(); document.getElementById('logout-form').submit();
}