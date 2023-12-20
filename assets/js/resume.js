$(document).ready(function () {

    $('#jenis').on('change', function () {
        const jenis = $('#jenis').val()

        $('.zzz').css('display', 'block')

        $.getJSON('resume/gettahun/' + jenis, function (data) {
            $('#tahun').html(data.html)
        })
    })

    $('#tahun').on('change', function () {
        const jenis = $('#jenis').val()
        const tahun = $('#tahun').val()

        const url = 'resume/getbulan/'

        $('.zzz2').css('display', 'block')

        $.getJSON(url + jenis + '/' + tahun, function (data) {
            $('#bulan').html(data.html)
        })

    })

})