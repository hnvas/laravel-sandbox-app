$(function () {
    callNotification($('.bs-notify'));
});

function callNotification(element) {

    if(element.length === 0){
        return false;
    }

    let icon    = $(element).data('icon');
    let message = $(element).text();
    let type    = $(element).data('type');

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