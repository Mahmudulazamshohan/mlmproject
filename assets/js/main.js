$('#branch_id').click(function (val) {
    $.get(APP_URL+'/api/sr-list/' + $(this).val(), function (data) {
        $('#sr_id').removeAttr("disabled")
        $('#sr_id').html('')
        var options = ''
        for (var i = 0; i < data.length; i++) {
            options += '<option value="'+data[i].id+'">' + data[i].name + '</option>'
        }
        $('#sr_id').html(options)

    }
)
})
$('#sr_id').click(function () {
   // console.log($(this).val())
    $.get(APP_URL+'/api/market-place-list/' + $(this).val(), function (data) {
            $('#market_place_id').removeAttr("disabled")
            $('#market_place_id').html('')
            var options = ''
            for (var i = 0; i < data.length; i++) {
                options += '<option value="'+data[i].id+'">' + data[i].name + '</option>'
            }
            $('#market_place_id').html(options)

        }
    )
    $.get(APP_URL+'/api/client-list/' + $(this).val(), function (data) {
            $('#client_id').removeAttr("disabled")
            $('#client_id').html('')
            var options = ''
            for (var i = 0; i < data.length; i++) {
                options += '<option value="'+data[i].id+'">' + data[i].proprietor_name + '</option>'
            }
            $('#client_id').html(options)

        }
    )
});

$('[data-toggle="tooltip"]').tooltip();
