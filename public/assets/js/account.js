/**
 * Created by Admin on 29.07.2018.
 */
//$(document).ready(function() {

    $(function () {
        $('#input-datebirth').datetimepicker({
                locale: 'uk',
                format: 'YYYY-MM-DD'
            }
        );


        function savePersonal(e) {
            if (('#user-modal').length > 0) {
                e.preventDefault();
                var obj = $(this);

                var formData = new FormData();
                $.each($(obj).find("input[type='file']"), function(i, tag) {
                    $.each($(tag)[0].files, function(i, file) {
                        formData.append(tag.name, file);
                    });
                });
                var params = $(obj).serializeArray();
                $.each(params, function (i, val) {
                    formData.append(val.name, val.value);
                });

                $.ajax({
                    url: '/account/savepersonal',
                    //dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'post',
                    contentType: false,//application/x-www-form-urlencoded',
                    data:  formData,//$(this).serialize(),
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                    success: function( data, textStatus, jQxhr ){
                        var json = $.parseJSON(data);
                        $('#span_sex').html(json.name + ' ' + json.lastname);
                        if (json.avatar_th) {
                            $('#span_img').attr('src',json.avatar_th);
                        }

                        $('#span_phone').html(json.phone);

                        $('#span_sex').html(json.sex);
                        $('#span_datebirth').html(json.datebirth);
                        $('#span_obl').html(json.obl);
                        $('#span_city').html(json.city);
                        $('#span_street').html(json.street);
                        $('#span_house').html(json.house);
                        $('#span_apartment').html(json.apartment);
                        $('#user-modal').modal('toggle');

                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });

                e.preventDefault();
            }
        }


        function savePasswords(e) {
            e.preventDefault();


            $.ajax({
                url: '/account/saveuserpassword',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data:  $('#changepassword').serialize(),
                type: 'POST',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function( data, textStatus, jQxhr ){
                    var json = $.parseJSON(data);
                    if (json.success) {
                        toastr.success(json.success);
                        $("#changepassword").trigger('reset');

                    }
                    if (json.error) {
                        toastr.error(json.error);
                    }

                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            e.preventDefault();
        }

        $('#savePersonalForm').submit( savePersonal );
        $('#savepasswordbtn').click( savePasswords );

        $("#inputImg").fileinput({
            showUpload: false,
            maxFileCount: 1,
            showRemove: false,
            previewFileType: 'image',
            initialPreviewCount: 1,
            autoReplace: true,
            allowedFileTypes: ['image'],
            previewTemplates: {
                image: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
                '   <img src="{data}" style="max-width: 100%;" class="" title="{caption}" alt="{caption}">\n' +
                '</div>\n',
                generic: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
                '   {content}\n' +
                '</div>\n'
            }
        });
    });



//});