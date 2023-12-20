$(document).ready(function () {
    $('#blok').on('change', function () {

        $('.zzz').css('display', 'block')

        const blok = $('#blok').val()
        const url = 'getnomorbyblok/' + blok + '/0'

        $.getJSON(url, function (data) {
            $('#nomor').html(data.html)
        })

    })


    $('#blok2').on('change', function () {
        const blok = $('#blok2').val()
        const url = 'getnomorbyblok/' + blok + '/1'
        $.getJSON(url, function (data) {
            $('#nomor2').html(data.html)
        })
    })

    $(document).on('change', '#pblok', function () {
        $('.xxx').css('display', 'block')

        const url = '/ptmsa/admin/getgabungbyblok'

        const blok = $('#pblok').val()

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { blok: blok, kode: 1 },
            success: function (response) { $('#pnomor').html(response.html) }
        })
    })

    $(document).on('change', '#pblok2', function () {
        const url = '/ptmsa/admin/getgabungbyblok'

        const blok = $('#pblok').val()

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { blok: blok, kode: 0 },
            success: function (response) { $('#pnomor2').html(response.html) }
        })
    })

})