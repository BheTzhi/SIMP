$(document).ready(function () {
    $(document).on('click', '.editinven', function () {
        $('#editModalLabel').html('Edit Data');
        $('.modal-footer button[type=submit]').html('Simpan');

        // input rupiah
        $('#harga1').mask('000.000.000.000', {
            reverse: true
        })

        var ruang;
        var harga;
        var urut;
        var jenis; // Tambahkan deklarasi variabel jenis

        const kode = $(this).data('kode');
        const url = '/ptmsa/manajemen/getdata';

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: { kode: kode },
            success: function (data) {
                harga = data.results.harga.replace(/,/g, '.');
                $('#kode1').val(data.results.kode);
                $('#nama1').val(data.results.nama);
                $('div.kon select').val(data.results.kondisi_id);
                $('div.jen select').val(data.results.jenis);
                $('div.rug select').val(data.results.ruang);
                $('#tanggal_beli1').val(data.results.tanggal_beli);
                $('#fotos1').attr('src', '/ptmsa/assets/inventaris/' + data.results.foto);
                $('#harga1').val(harga);

                var uruts = data.results.urut;

                $(document).on('change', '#ruang1', function () {
                    $.ajax({
                        url: '/ptmsa/manajemen/coba',
                        type: 'post',
                        dataType: 'json',
                        data: { ruang: $('#ruang1').val(), urut: uruts },
                        success: function (res) {
                            console.log(res);
                            ruang = res.ruang;
                            var urt = res.res;
                            var urutt = (parseInt(res.res) + 1).toString().padStart(3, '0');
                            urut = (urt === '001') ? urt : urutt;
                            updateKode();
                        }
                    })
                });

                $('#jenis1').on('change', function () {
                    jenis = $('#jenis1').val();
                    updateKode();
                });

                function updateKode() {
                    var j = (jenis === undefined) ? data.results.jenis : jenis;
                    var r = (ruang === undefined) ? data.results.ruang : ruang;
                    var u = (urut === undefined) ? data.results.urut : urut;

                    if (r === data.results.ruang) {
                        r = data.results.ruang;
                        u = data.results.urut;
                    }

                    var kode = 'BRG' + j + r + u;

                    $('#kode1').val(kode);
                }

            }
        });

    });
});