$('#reviews').DataTable({
    "order": [[ 8, "desc" ]],
    "columnDefs": [{
        "targets": [9],
        "orderable": false
    }]
});
$('.dataTables_length').addClass('bs-select');

// emulate filtering records by type
$('#type_filter button').click(function() {
    let e    = jQuery.Event("keyup"),
        type = $(this).data('type');

    e.which = 13;

    $('#reviews_filter input').val(type).trigger(e).val('');
});

$('#response').keyup(function() {
    if($(this).val().length > 0 ) {
        $('#response_published').removeClass('hidden');
    }else{
        $('#response_published').addClass('hidden');
    }
});

$('form#review_moderate').submit(function(e) {
    e.preventDefault();

    $("#voyager-loader").fadeIn(500);

    let id   = $(this).data('review-id'),
        data = $(this).serializeArray().map(function(item){
                    if(item.value.length > 0) return item;
                });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/admin/reviews/update/' + id,
        method: 'POST',
        data: data
    }).done(function () {
        window.location = '/admin/reviews';
    });
});