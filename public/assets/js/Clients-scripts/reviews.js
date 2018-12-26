$('form#review_sent').submit(function(e) {
    e.preventDefault();

    let approved = $(this).data('approved');
    let expected = ['name', 'review'];

    let review_data = $(this).serializeArray().map(function(field) {
        if(field.value) {
            return field;
        }else{
            if(expected.indexOf(field.name) > -1) {
                $('#' + field.name).parent().addClass('has-error');
            }
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accepted-Autofill': approved
        }
    });

    $.ajax({
        url: '/review/add',
        method: 'post',
        data: review_data
    }).done(function() {
        console.log('review added');
    });
});