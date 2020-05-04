function initSelectPicker(customSelector) {

    customSelector.selectpicker({
        style: "",
        styleBase: "form-control",
        liveSearch: true,
        liveSearchStyle: "contains"
    });

    customSelector.each(function () {
        $(this).val($(this).data('selected'));
        $(this).selectpicker('refresh');
    })


}