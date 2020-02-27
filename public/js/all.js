function initFlashes(element) {

    if(element.length === 0){
        return false;
    }

    let icon    = $(element).data('icon');
    let message = $(element).text();
    let type    = $(element).data('type');

    showMessage(icon, message, type);
}

function showMessage(icon, message, type) {

    $.notify({
        icon: icon,
        message: message
    },{
        type: type,
        timer: 4000,
        placement: {
            from: 'top',
            align: 'right'
        }
    });
}
function initDatePicker(element) {

    element.flatpickr({
        altInput: true,
        altFormat: "d/m/Y",
        dateFormat: "Y-m-d",
        locale: 'pt',
        disableMobile: "true"
    });

}

function initDateTimePicker(element) {

    element.flatpickr({
        altInput: true,
        altFormat: "d/m/Y H:i:s",
        dateFormat: "Y-m-d H:i:s",
        locale: 'pt',
        disableMobile: "true",
        enableTime: true
    });
}
function initSelectPicker(customSelector) {

    customSelector.selectpicker({
        style: "",
        styleBase: "form-control",
        liveSearch: true,
        liveSearchStyle: "contains"
    });

    customSelector.val($('select[class$="custom-select"]').data('selected'));
    customSelector.selectpicker('refresh');

}
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