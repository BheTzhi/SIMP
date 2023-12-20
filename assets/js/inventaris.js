$(document).ready(function () {

    var hsl
    var jenis
    var ruang

    $(document).on('click', '.addinven', function () {
        $('#tambahModalLabel').html('Tambah Data')
        $('.modal-footer button[type=submit]').html('Simpan')

        // input rupiah
        $('#harga').mask('000.000.000.000', {
            reverse: true
        })

        $('#jenis').on('change', function () {
            jenis = $('#jenis').val()
            urut()
        })

        $('#ruang').on('change', function () {
            ruang = $('#ruang').val()
            urut()
        })

        function urut() {
            $.ajax({
                url: "/ptmsa/manajemen/geturut/",
                type: "POST",
                dataType: "JSON",
                data: { ruang: ruang },
                success: function (data) {
                    var nourut = data.results
                    if (nourut) {
                        var nomor = parseInt(nourut.res) + 1
                        hsl = (nourut === null) ? '001' : nomor.toString().padStart(3, '0')
                    } else {
                        hsl = '001'
                    }
                    updateKode()
                }
            })
        }

        function updateKode() {
            var j = (jenis === undefined) ? '000' : jenis
            var r = (ruang === undefined) ? '000' : ruang
            var kode = 'BRG' + j + r + hsl

            $('#kode').val(kode)
        }


    })

    $(document).on('click', '.editinven', function () {
        $('#editModalLabel').html('Edit Data')
        $('.modal-footer button[type=submit]').html('Simpan')

        // input rupiah
        $('#harga1').mask('000.000.000.000', {
            reverse: true
        })

        var ruang
        var harga
        var urut
        var jenis // Tambahkan deklarasi variabel jenis

        const kode = $(this).data('kode')
        const url = '/ptmsa/manajemen/getdata'

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { kode: kode },
            success: function (data) {
                harga = data.results.harga.replace(/,/g, '.')
                $('#id').val(data.results.id)
                $('#kode1').val(data.results.kode)
                $('#nama1').val(data.results.nama)
                $('div.kon select').val(data.results.kondisi_id)
                $('div.jen select').val(data.results.jenis)
                $('div.rug select').val(data.results.ruang)
                $('#tanggal_beli1').val(data.results.tanggal_beli)
                $('#fotos1').attr('src', '/ptmsa/assets/inventaris/' + data.results.foto)
                $('#harga1').val(harga)

                var uruts = data.results.urut

                $(document).on('change', '#ruang1', function () {
                    $.ajax({
                        url: '/ptmsa/manajemen/getk',
                        type: 'post',
                        dataType: 'json',
                        data: { ruang: $('#ruang1').val(), urut: uruts },
                        success: function (res) {
                            if (res != null) {
                                ruang = res.ruang
                                var urt = res.res
                                var urutt = (parseInt(res.res) + 1).toString().padStart(3, '0')
                                urut = (urt === '001') ? urt : urutt
                            } else {
                                ruang = $('#ruang1').val()
                                urut = '001'
                            }
                            updateKode()
                        }
                    })
                })

                $('#jenis1').on('change', function () {
                    jenis = $('#jenis1').val()
                    updateKode()
                })

                function updateKode() {
                    var j = (jenis === undefined) ? data.results.jenis : jenis
                    var r = (ruang === undefined) ? data.results.ruang : ruang
                    var u = (urut === undefined) ? data.results.urut : urut

                    if (r === data.results.ruang) {
                        r = data.results.ruang
                        u = data.results.urut
                    }

                    var kode = 'BRG' + j + r + u

                    $('#kode1').val(kode)
                }

            }
        })

    })

    $(document).on('click', '.generate', function () {
        const id = $(this).data('id');
        const kode = $(this).data('kode');
        console.log(kode)
        generateAndSaveQRCode(id, kode);
    });

    function generateAndSaveQRCode(id, text) {
        new QRCode(document.getElementById("gmb" + id), text)

        // Simpan QR Code sebagai gambar PNG
        const canvas = document.getElementById("gmb" + id).getElementsByTagName('canvas')[0]

        const imageUrl = canvas.toDataURL("assets/qr/");

        $.ajax({
            url: '/ptmsa/manajemen/save_qr',
            type: 'post',
            dataType: 'json',
            data: { id: id, text: text, image: imageUrl },
            success: function (response) {
                (response === 200) ? location.reload() : location.reload()
            }
        })

    }

    $(document).on('click', '#qr', function () {
        const url = $(this).data('url')

        const imgWindow = window.open('', '_blank')

        imgWindow.document.write('<html><head><title>Print</title></head><body>')
        imgWindow.document.write('<img src="' + url + '" style="height: 2cm; weight:2cm;" onload="window.print();window,onafterprint=function(){window.close();}">')
        imgWindow.document.write('</body></html>')
        imgWindow.document.close()

    })

})