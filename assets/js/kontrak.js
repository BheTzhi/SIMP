$(document).ready(function () {
    $('.add').on('click', function () {
        $('#blok').on('change', function () {
            const blok = $(this).val()

            const url = 'kontrak/getKios'

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: { blok: blok },
                success: function (data) {
                    $('#kios').html(data.html)
                }
            })

        })
    })


})