let pattern = {
        ip: '^(?!0)(?!.*\\.$)((1?\\d?\\d|25[0-5]|2[0-4]\\d)(\\.|$)){4}$',
        phone: '\\d{10}|(?:\\d{3}-){2}\\d{4}|\\(\\d{3}\\)\\d{3}-?\\d{4}',
        email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    },
    fields = [
        'phone',
        'ip',
        'email'
    ];

$('#blacklist').DataTable({
    "order": [[ 10, "desc" ]],
    "columnDefs": [{
            "targets": [11],
            "orderable": false
        }]
    });
$('.dataTables_length').addClass('bs-select');

// Update blacklist record

$('form#blacklist_update, form#blacklist_add').submit( function(e) {

    e.preventDefault();

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

    let data = $(this).serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});

    let fieldError = 0,
        fieldEmpty = 0;

    fields.map(function(field) {
        let check = $('#' + field).val();

        if( check && check.length > 0 ) {
            if(check.match(pattern[field]) == null) {
                fieldError++;
                toastr.error('Введенное не верное значение');
                $('#' + field).parent(2).addClass('has-error');
            }
        } else {
            fieldEmpty++;
        }
    });

    if(fieldEmpty == 3) {
        toastr.error('Укажите минимум 1 параметр: <b>"Телефон"</b>> / <b>"IP Адресс"</b> / <b>"E-Mail"</b>');
    }

    if(fieldError == 0 && fieldEmpty < 3) {
        $.ajax({
            method: 'POST',
            data: JSON.stringify(data),
            contentType: "json",
            processData: false
        }).done(function(response){

            if(!response.duplicate) {
                $("#voyager-loader").fadeIn(500);

                toastr.success(response.message);
                setTimeout(function(){ window.location = '/admin/blacklist'; }, 500);
            } else {
                let target = response.duplicate.deleted_at ? 'restore' : 'redirect',
                    id     = response.duplicate.id;

                console.log(target, id);

                $('#' + target + 'ItemId').data('id', id);
                $('#' + target + 'Modal').modal('show');
            }
        });
    }

});

$('#redirectItemId').click(function(e) {

    e.preventDefault();

    let id  = $(this).data('id'),
        url = $(this).attr('href');

    window.location = url + '/' + id;
});

// start show|hide ip block checkbox
let ip = $('input#ip');

if(ip.val() && ip.val().length > 0) {
    $('.blocked').removeClass('hidden');
}

ip.keyup(function() {
    let ip = $(this).val();
    if(ip && ip.length > 0) {
        if(ip.match(pattern.ip) !== null) {
            $('.blocked').removeClass('hidden');
        }
    } else {
        $('.blocked').addClass('hidden');
    }
});
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
        // toastr.success(response.message);
        // setTimeout(function(){ window.location = '/admin/blacklist'; }, 500);
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