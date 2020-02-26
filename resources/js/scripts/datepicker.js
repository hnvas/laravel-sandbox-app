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