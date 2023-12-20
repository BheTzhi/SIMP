$(document).ready(function () {
    $(document).on('click', '.editkondisi', function () {
        const id = $(this).data('id')
        const kondisi = $(this).data('kondisi')
        $('#id').val(id)
        $('#kondisi').val(kondisi)
    })

    $(document).on('click', '.addjenis', function () {
        $.getJSON('/ptmsa/manajemen/getkj', function (data) {
            if (data.results == null) {
                var kode = 1
                $('#kode').val(kode.toString().padStart(3, '0'))
            } else {
                var kode = parseInt(data.results.kode) + 1
                $('#kode').val(kode.toString().padStart(3, '0'))
            }
        })
    })

    $(document).on('click', '.editjenis', function () {
        const kode = $(this).data('kode')
        const jenis = $(this).data('jenis')

        $('#kode1').val(kode)
        $('#jenis1').val(jenis)
    })

    $(document).on('click', '.addruang', function () {
        $.getJSON('/ptmsa/manajemen/getkr', function (data) {
            if (data.results == null) {
                var kode = 1
                $('#kode').val(kode.toString().padStart(3, '0'))
            } else {
                var kode = parseInt(data.results.kode) + 1
                $('#kode').val(kode.toString().padStart(3, '0'))
            }
        })
    })


    $(document).on('click', '.editruang', function () {
        const kode = $(this).data('kode')
        const ruang = $(this).data('ruang')

        $('#kode1').val(kode)
        $('#ruang1').val(ruang)
    })
})