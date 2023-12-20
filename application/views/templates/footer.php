</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/proseslogout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<?php if ($role == 10 && $title == 'Dashboard') : ?>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
    <?php if ($this->input->get('bulan') && $this->input->get('tahun')) : ?>
        <script src="<?= base_url('assets/'); ?>js/pie.js"></script>
    <?php else : ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ($title == 'Listrik' || $title == 'Meteran Listrik' || $title == 'Meteran Air' || $title == 'Air' || $title == 'Resume' || $title == 'Manajemen') : ?>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    extend: 'excelHtml5',
                    title: 'Data Inventaris',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        // Mengekstrak gambar dari setiap baris dan menyertakannya dalam file Excel
                        $('row c', sheet).each(function(index, value) {
                            if (index === 9 || index === 10) { // Kolom indeks 9 (Foto) dan 10 (QR)
                                var imgSrc = $(value).find('v').text();
                                var imgTag = '<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' + imgSrc + '" width="80" height="80"></image>';
                                $(value).find('v').empty().append(imgTag);
                            }
                        });

                        // Mengubah tipe konten agar gambar dapat ditampilkan
                        var contentType = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,';
                        xlsx.base64 = function(s) {
                            return window.btoa(unescape(encodeURIComponent(s)));
                        };
                        xlsx.base64(formatXml(sheet)).then(function(base64) {
                            // Menambahkan tag img ke dokumen agar dapat ditampilkan di Excel
                            var imgTag = '<img width="80" height="80" src="data:image/png;base64,' + base64 + '" />';
                            $('body').append(imgTag);

                            var link = document.createElement("a");
                            link.href = contentType + base64;
                            link.download = 'DataInventaris.xlsx';
                            link.click();

                            // Menghapus tag img setelah proses selesai
                            $('body').find('img').remove();
                        });
                    }
                }, "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
<?php else : ?>
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<?php endif; ?>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.mask.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ddtf.js"></script>

<!-- <script src="js/jquery.mask.js"></script> -->
<!-- <script src="js/choices.min.js"></script> -->
<!-- <script src="js/choices.min.js"></script> -->
<!-- <script src="js/jquery-ui.js"></script> -->
<!-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> -->

<?php if ($title == 'Meteran Listrik') : ?>
    <script src="<?= base_url('assets/'); ?>js/listrik.js"></script>
<?php elseif ($title == 'Meteran Air') : ?>
    <script src="<?= base_url('assets/'); ?>js/air.js"></script>
<?php elseif ($title == 'Resume') : ?>
    <script src="<?= base_url('assets/'); ?>js/resume.js"></script>
<?php elseif ($title == 'Gabung') : ?>
    <script src="<?= base_url('assets/'); ?>js/gabung.js"></script>
<?php elseif ($title == 'Kontrak') : ?>
    <script src="<?= base_url('assets/'); ?>js/kontrak.js"></script>
<?php elseif ($title == 'Hptd') : ?>
    <script src="<?= base_url('assets/'); ?>js/hptd.js"></script>
<?php elseif ($title == 'Manajemen') : ?>

    <!-- script dan qr -->
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>qrcode2.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>qrcode.min.js"></script>

    <script>

    </script>

    <script src="<?= base_url('assets/'); ?>js/etc.js"></script>
    <script src="<?= base_url('assets/'); ?>js/inventaris.js"></script>



<?php endif; ?>

<script>
    function formatRupiah(int) {

        var number_string = int.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        // Cetak hasil
        return 'Rp. ' + rupiah
    }

    function persen(int) {
        int = int / 100
        return int
    }

    // diskon
    $('.dis').on('click', function() {
        $('#diskonKiosLabel').html('Diskon Kios');
        $('.modal-footer button[type=submit]').html('Diskon');

        const awal = $(this).data('sisa')
        $('#diskon').on('change', function() {
            const nilai = $(this).val()

            const diskon = persen(nilai) * awal
            const sisa = awal - diskon

            $('#n_diskon').val(formatRupiah(diskon))
            $('#yhl').val(formatRupiah(sisa))

        })


    })

    // input rupiah
    $('#bayarss').mask('000.000.000.000', {
        reverse: true
    })

    // input rupiah
    $('#hargass').mask('000.000.000.000', {
        reverse: true
    })

    // input rupiah
    $('#nominal').mask('000.000.000.000', {
        reverse: true
    })

    // Angka saja
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    // role akses
    $('.form-check-input').on('click', function() {
        const roleId = $(this).data('role')
        const menuId = $(this).data('menu')

        $.ajax({
            url: '<?= base_url('role/changeakses') ?>',
            type: 'post',
            data: {
                roleId: roleId,
                menuId: menuId
            },
            success: function(data) {

            }
        })

    })
    // end role akses

    // get bulan tahun absesn
    $(document).ready(function() {
        $('#bulan').on('change', function() {
            // $('#isi').empty()
            $('#tahun').on('change', function() {
                const bulan = $('#bulan').val()
                const tahun = $('#tahun').val()
                $.getJSON('<?= base_url('absensi/cari/') ?>' + bulan + tahun, function(data) {
                    for (let i = 0; i < data.length; i++) {
                        $('#isi').append('<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td><img style="height: 3cm; weight:2cm;" src="<?= base_url('assets/img/') ?>' + data[i].foto + '" class="img-thumbnail"></td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].role + '</td>' +
                            '<td>' + data[i].masuk + ' hari</td>' +
                            '<td>' + data[i].izin + ' hari</td>' +
                            '<td>' + data[i].sakit + ' hari</td>' +
                            '<td>' + data[i].alpa + ' hari</td>' +
                            '</tr>')
                    }
                })
            })
        })
    })
    // end get bulan tahun absesn

    // pop up input absen
    $(document).ready(function() {
        $('.inp-pop').on('click', function() {
            $('.smpn-pop').css('display', 'inline-block')
            $('.tbl').css('display', 'inline-block')
            $('.inp-pop').css('display', 'none')
        })
    })
    // end pop up input absen

    // pop up cari absen
    $(document).ready(function() {
        $('.caris').on('click', function() {
            $('.search').css('display', 'inline-block')
            $('.tbl').css('display', 'none')
        })
    })
    // end pop up cari absen

    $('#generate').on('click', function() {
        const nip = $('#nip').val()
        $('#res').val(nip)
    })

    // get kios dari detail pedagang
    function block(int) {
        $('.ddd').css('display', 'inline-block')
        $.getJSON('<?= base_url('pedagang/getkios/') ?>' + int, function(data) {
            for (let i = 0; i < data.length; i++) {
                $('#kioz').append('<option value="' + data[i].id + '">' + data[i].blok + '.' + data[i].nomor + '</option>')
            }
        })
    }

    $(document).ready(function() {
        $('tables').ddTableFilter(options);

        var options = {
            // A function that provides the hidden value of the cell.
            valueCallback: function() {
                return encodeURIComponent($.trim($(this).text()));
            },
            // A function that provides the value of the cell that is displayed in the dropdown.
            textCallback: function() {
                return $.trim($(this).text());
            },

            // A function to sort the options as they are added to the list.
            sortOptCallback: function(a, b) {
                return a.text.toLowerCase() > b.text.toLowerCase();
            },
            // Callback functions
            afterFilter: null,
            afterBuild: null,
            transition: {
                // remove rows from view.
                hide: $.fn.hide,
                // bring rows back into view.
                show: $.fn.show,
                // An array of options to pass to the above two functions.
                options: []
            },
            // Text to display for empty rows.
            emptyText: '--Empty--',
            // This must be true for sortOptCallback to work.
            sortOpt: true,
            // Debug mode
            debug: false,
            // Number of options required to show a select filter.
            minOptions: 2
        }
    })

    function romawi(value) {

        switch (value) {
            case 1:
                bulan = "I"
                break
            case 2:
                bulan = "II"
                break
            case 3:
                bulan = "III"
                break
            case 4:
                bulan = "IV"
                break
            case 5:
                bulan = "V"
                break
            case 6:
                bulan = "VI"
                break
            case 7:
                bulan = "VII"
                break
            case 8:
                bulan = "VIII"
                break
            case 9:
                bulan = "IX"
                break
            case 10:
                bulan = "X"
                break
            case 11:
                bulan = "XI"
                break
            case 12:
                bulan = "XII"
        }

        return bulan

    }

    // Nomor Kwitansi Kontrak
    $('.byr').on('click', function() {
        $('#tambahModalLabel').html('Bayar');
        $('.modal-footer button[type=submit]').html('Simpan');

        const url = "<?= base_url('kontrak/getnomkwt') ?>"

        const kode = $(this).data('kode')

        var x = new Date()
        var a = romawi(x.getMonth() + 1)

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                test: 1
            },
            success: function(data) {
                if (data.kwt) {
                    var z = data.kwt
                } else {
                    var z = 0
                }
                const kw = parseInt(z) + 1

                const nom = String(kw).padStart(2, 0)

                const kwt = nom + '/' + kode + '-SEWA/' + a + '/' + x.getFullYear()

                $('#kwt').val(kwt)
            }
        })

    })
</script>

</body>

</html>