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