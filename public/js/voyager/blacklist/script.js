$('#blacklist').DataTable({
    "order": [[ 5, "desc" ]],
    "columnDefs": [{
            "targets": [6],
            "orderable": false
        }]
    });
$('.dataTables_length').addClass('bs-select');

// Update blacklist record

$('form#blacklist_update, form#blacklist_add').submit( function(e) {

    e.preventDefault();

    let data = $(this).serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});

    let pattern = {
            ip: '^(?!0)(?!.*\\.$)((1?\\d?\\d|25[0-5]|2[0-4]\\d)(\\.|$)){4}$',
            phone: '\\d{10}|(?:\\d{3}-){2}\\d{4}|\\(\\d{3}\\)\\d{3}-?\\d{4}',
            email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
        },
        type = $('#type').val();

    if(data.value.match(pattern[type]) == null) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr.error('Введенное не верное значение');

        $('#value').parent(2).addClass('has-error');
    } else {
        $.ajax({
            method: 'POST',
            data: JSON.stringify(data),
            contentType: "json",
            processData: false
        }).done(function(response){
            if(!response.original) {
                $("#voyager-loader").fadeIn(500);

                toastr.success(response.message);
                setTimeout(function(){ window.location = '/admin/blacklist'; }, 500);
            } else {
                $('#restoreItemId').data('id', response.original);
                $('#restoreModal').modal('show');
            }
        });
    }

});

// start show|hide ip block checkbox
$('select#type').change(function() {
    let type = $(this).val();

    if(type == 'ip') {
        $('.blocked').removeClass('hidden');
    }else{
        $('.blocked').addClass('hidden');
    }
});

if($('#type').val() == 'ip') {
    $('.blocked').removeClass('hidden');
}else{
    $('.blocked').addClass('hidden');
}
// end show|hide ip block checkbox

// delete item
$('a.delete').click(function() {
    let id      = $(this).data('id'),
        _token  = $('meta[name="csrf-token"]').attr('content');

    $("#voyager-loader").fadeIn(500);

    $.ajax({
        url: '/admin/blacklist/delete',
        method: 'DELETE',
        data: {_token: _token, id: id}
    }).done(function(response) {
        toastr.success(response.message);
        setTimeout(function(){ window.location = '/admin/blacklist'; }, 500);
    })
});

// restore deleted item
$('a.restore').click(function() {
    let id      = $(this).data('id'),
        _token  = $('meta[name="csrf-token"]').attr('content');

    $("#voyager-loader").fadeIn(500);

    $.ajax({
        url: '/admin/blacklist/restore',
        method: 'PUT',
        data: {_token: _token, id: id}
    }).done(function(response) {
        toastr.success(response.message);
        setTimeout(function(){ window.location = '/admin/blacklist'; }, 500);
    })
});

// emulate filtering records by type
$('#type_filter button').click(function() {
    let e    = jQuery.Event("keyup"),
        type = $(this).data('type');

    e.which = 13;

    $('#blacklist_filter input').val(type).trigger(e).val('');
});

// show|hide trashed records
$('#withTrashed').change(function() {
    if($(this).prop('checked')) {
        $('.trashed').show();
    } else {
        $('.trashed').hide();
    }
});