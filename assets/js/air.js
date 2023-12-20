$(document).ready(function () {

    // reset modal
    $('.modal').on('hidden.bs.modal', function () {
        $('#editDaya form')[0].reset()
    })

    $('#add').on('click', function () {

        $('#tahun').on('change', function () {
            let tahun = $('#tahun').val()

            const kios = $('#kid').val()

            const url = '/ptmsa/air/addbulan/'

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    'id': kios,
                    'tahun': tahun
                },
                dataType: 'json',
                success: function (data) {
                    $('#bulan').html(data.html);
                }
            })

        })

    })

    $('#tahun').on('change', function () {
        let tahun = $('#tahun').val()

        const kios = $('#kid').val()

        const url = '/ptmsa/air/editbulan/'

        $.ajax({
            type: 'post',
            url: url,
            data: {
                'id': kios,
                'tahun': tahun
            },
            dataType: 'json',
            success: function (data) {
                $('#bulan').html(data.html);
            }
        })

    })


    $('#bulan').on('change', function () {
        $('.sss').css('display', 'block')
        const kios = $('#kid').val()
        const bulan = parseInt($('#bulan').val() - 1)
        const tahun = parseInt($('#tahun').val() - 1)


        if (bulan == 0) {
            var bulantahun = 12 + tahun.toString()
        } else {
            var bulantahun = bulan + $('#tahun').val()
        }

        const url = '/ptmsa/air/getblalu/' + kios + '/' + bulantahun

        $.getJSON(url, function (data) {
            if (data == null) {
                $('#blalu').val(0)
            } else {
                $('#blalu').val(data.bini)
                $('#awal').val(data.akhir)
            }
        })

    })

    $('#bini').on('keyup', function () {

        const blalu = parseFloat($('#blalu').val())

        var bini = parseFloat($('#bini').val())


        if (bini < blalu) {
            var shasil = parseInt(99999 - blalu)
            var hasil = parseFloat(bini + shasil)
        } else {
            var hasil = parseFloat(bini - blalu)
        }

        $('#pemakaian').val(hasil.toFixed(2))

    })

    $('#add').on('click', function () {
        $('.start').css('display', 'none')
        $('.add').css('display', 'block')
    })

    $('#kbl').on('click', function () {
        $('.s1').css('display', 'inline')
        $('#kbl').css('display', 'none')
    })

    $('#kbbls').on('click', function () {
        $('.s2').css('display', 'inline')
        $('#kbbls').css('display', 'none')
    })

})

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}