$('#url-form').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/url',
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            url: $("#url").val()
        },
        success: function (response) {
            $('#error').hide();
            $('#link').attr("href", response.url);
            $('#text-link').text(response.url);
            $('#result').show();
        },
        error: function (error) {
            $('#error').text(error.responseJSON.message);
            $('#error').show();
        }
    })
})
