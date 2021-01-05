function swal_confirm(title, successCallback)
{
    swal({
        title: title,
        text: '',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        confirmButtonText: 'Remove it!',
        cancelButtonText: 'Cancel'

    }).then(function () { 
        successCallback();
    });
}

function confirmed_alert()
{
    swal({
        title: 'Eliminado!',
        text: '',
        type: 'success',
        confirmButtonColor: '#ff9933'
    }).done();
}