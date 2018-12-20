try {
    window.$ = window.jQuery = require('jquery');

    $(document).ready(function(){
        console.log('Success!');
    });

    $(function()
    {
        $( "#q" ).autocomplete({
            source: "search/autocomplete",
            minLength: 3,
            select: function(event, ui) {
                $('#q').val(ui.item.value);
            }
        });
    })
} catch (e) {}