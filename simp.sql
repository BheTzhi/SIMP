-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2025 pada 06.27
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-p`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `masuk` int(2) NOT NULL,
  `izin` int(2) NOT NULL,
  `sakit` int(2) NOT NULL,
  `alpa` int(2) NOT NULL,
  `bulantahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `pegawai_id`, `masuk`, `izin`, `sakit`, `alpa`, `bulantahun`) VALUES
(5, 1, 21, 0, 0, 0, '32024'),
(6, 2, 20, 0, 1, 0, '32024'),
(7, 5, 21, 0, 0, 0, '32024'),
(8, 1, 22, 0, 0, 0, '82024'),
(9, 2, 22, 0, 0, 0, '82024'),
(10, 5, 20, 2, 0, 0, '82024'),
(11, 6, 22, 0, 0, 0, '82024'),
(12, 1, 21, 0, 0, 0, '92024'),
(13, 2, 21, 0, 0, 0, '92024'),
(14, 5, 18, 2, 0, 0, '92024'),
(15, 6, 21, 0, 0, 0, '92024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_kios`
--

CREATE TABLE `bayar_kios` (
  `id` int(11) NOT NULL,
  `kios_id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blok`
--

CREATE TABLE `blok` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `blok` varchar(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blok`
--

INSERT INTO `blok` (`id`, `kode`, `blok`, `type`, `ukuran`, `foto`) VALUES
(3, '001', 'A', 'Kios', '3 m X 3 m', '001A.jpeg'),
(4, '002', 'B', 'Kios', '3 m X 2 m', '002B.jpeg'),
(5, '003', 'C', 'Kios', '2 m X 2 m', '003C.jpeg'),
(6, '004', 'D', 'Los', '2 m X 2 m', '004D.jpeg'),
(7, '005', 'E', 'Kios', '2 m X 1.5 m', '005E.jpeg'),
(8, '006', 'F', 'Kios', '2 m X 2 m', '006F.jpeg'),
(9, '007', 'G', 'Kios', '3 m X 3 m', '007G.jpeg'),
(10, '008', 'Utility', 'Flex', 'Flex', '008Utility.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_anggaran`
--

CREATE TABLE `detail_anggaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `forign` int(3) NOT NULL,
  `metode` int(1) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `pemberi` int(3) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_proyek`
--

CREATE TABLE `detail_proyek` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `anggaran` varchar(255) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL,
  `kode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_proyek`
--

INSERT INTO `detail_proyek` (`id`, `proyek_id`, `nama`, `anggaran`, `persentase`, `status`, `kode`) VALUES
(16, 1, 'PT. Tiga Adi Rekabangun', '44574000000', '100', '1', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL,
  `tunjangan` varchar(255) NOT NULL,
  `sakit` varchar(25) NOT NULL,
  `izin` varchar(255) NOT NULL,
  `alpa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `kode`, `golongan`, `gaji`, `tunjangan`, `sakit`, `izin`, `alpa`) VALUES
(0, '0', '0', '0', '0', '0', '0', '0'),
(5, 'G1', 'Golongan 1', '5200000', '300000', '25000', '50000', '200000'),
(6, 'G2', 'Golongan 2', '3480000', '520000', '15000', '35000', '133847'),
(8, 'G3', 'Golongan 3', '3200000', '300000', '10000', '25000', '123077');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_surat`
--

CREATE TABLE `isi_surat` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) NOT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `alamat2` varchar(255) DEFAULT NULL,
  `up` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `isi` text NOT NULL,
  `tembusan` text DEFAULT NULL,
  `ttd` varchar(225) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tgl` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `isi_surat`
--

INSERT INTO `isi_surat` (`id`, `nomor`, `lampiran`, `perihal`, `tujuan`, `alamat`, `alamat2`, `up`, `tempat`, `isi`, `tembusan`, `ttd`, `jabatan`, `tgl`, `status`, `kode`) VALUES
(16, ' 025/037/PT.MSA-DKI/PPD/VI/2024', '1 Berkas.', 'Permohonan Peminjaman Dana', 'PT. Bank DKI', 'Cabang Pembantu Bendungan Hilir', 'Jakarta Pusat', 'Ibu Indri', 'Jakarta', '<p style=\"text-align: justify; \">Dengan Hormat,</p><p style=\"text-align: justify; \">Bersamaan dengan ini, kami PT. Mukti Sarana Abadi Perusahaan Pengelola Pasar Jatiasih - Kota Bekasi mengajukan permohonan pinjaman dana kepada PT. Bank Dki - Cabang Pembantu Bendungan Hilir, Jakarta Pusat sebesar Rp.4.000.000.000,- (Empat Milyar Rupiah).</p><p style=\"text-align: justify; \">Sebagai Bahan Pertimbangan Bersama ini kami lampirkan data Perusahaan kami sebagai berikut:</p><ol><li style=\"text-align: justify;\"><i>Company Profile</i> PT.Mukti Sarana Abadi;</li><li style=\"text-align: justify;\">Copy Rekening Koran;</li><li style=\"text-align: justify;\">PKS / Perjanjian Kerjasama PT. Mukti Sarana Abadi dengan Pemerintah Kota Bekasi;</li><li style=\"text-align: justify;\">Surat Penetapan Pengelola Pasar Jatiasih dari Pemerintah Kota Bekasi (BAST Pengelolaan);</li><li style=\"text-align: justify;\">Hitungan estimasi pendapatan pengelolaan Pasar Jatiasih;</li><li style=\"text-align: justify;\">Daftar Kios Jaminan.</li></ol><p style=\"text-align: justify;\">Demikian Surat Permohonan ini kami ajukan, besar harapan kami untuk dikabulkan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1718316000', 1, 2),
(18, ' 025/038/PT.MSA-KASABA/REK/VI/2024', '-', 'R E K', 'PT. Kasaba Sraddha Indonesia', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:italic\">Yang\r\nbertanda tangan dibawah ini:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:italic\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:italic\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>DELFRANCISCHO BOY<o:p></o:p></b></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:italic\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HUMAS PT.MSA<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:italic\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:italic\">Dengan\r\nini memberikan rekomendasi pada PT. Kasaba Sraddha Indonesia untuk memasang Reklame/Banner/Poster\r\nProduk di Pasar Baru Jatiasih yang beralat di Jl. Raya Jatiasih No.26 Rt.004\r\nRw.004, Jatirasa, Jatiasih – Kota Bekasi. Yang Dimana PT. Mukti Sarana Abadi\r\nhanya memberikan rekomendasi berupa hak penggunaan Lahan/Tempat. Selama masa\r\nkontrak<b>.</b><o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA;mso-bidi-font-style:italic\">Demikian surat\r\nrekomendasi ini dibuat, agar dapat digunakan sebagaimana mestinya.</span><br></p>', NULL, 'DELFRANCOSCHO BOY', 'HUMAS', '1718834400', 1, 4),
(19, ' 025/039/PT.MSA-PED/U/VI/2024', NULL, 'Undangan', 'Sdr/Sdri Elita', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sehubung dengan disampaikannya\r\nsurat ini kami mengundang sdr/i untuk menghadiri undangan yang bertepatan pada:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari\r\n/ Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kamis, 20 Juni 2024<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pukul <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>&nbsp;s.d <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <o:p></o:p></u></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kantor Pengelola<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Demikian undangan ini kami\r\nsampaikan, atas perhatian dan kehadirannya kami sampaikan terima kasih.<o:p></o:p></span></p>', NULL, 'AGUS MULIATAMA', NULL, '1718834400', 1, 3),
(21, ' 025/040/PT.MSA-PED/U/VI/2024', NULL, 'Undangan', 'Sdr/Sdri H.Yahya/Sri Wahyuni', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sehubung dengan disampaikannya\r\nsurat ini kami mengundang sdr/i untuk menghadiri undangan yang bertepatan pada:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari\r\n/ Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kamis, 20 Juni 2024<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pukul <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>&nbsp;s.d <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <o:p></o:p></u></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kantor Pengelola<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian undangan ini kami sampaikan, atas\r\nperhatian dan kehadirannya kami sampaikan terima kasih.</span><br></p>', NULL, 'AGUS MULIATAMA', NULL, '1718834400', 1, 3),
(22, ' 015/041/PT.MSA-PEMKOT/VI/2024', '-', 'Pemberitahuan', 'Pj. Wali Kota Bekasi', NULL, NULL, NULL, 'Bekasi', '<p style=\"text-align: justify; \">Assalamualaikum Wr Wb. Dengan hormat,</p><p style=\"text-align: justify; \">Berkenaan dengan surat Wali Kota Bekasi <b>Nomor : 500.2.2/3486/Disdagperin.Pasar</b>, hal undangan tertanggal 25 Juni 2024, bahwa perselisihan antara PT. Mukti Sarana Abadi dengan Para Vendor sudah masuk kerana Pengadilan Negri Bale Endah Bangung, dengan Perkara <b>Nomor : 169/Pdt.G/2023/PB/Blb</b>. Dengan agenda Kesimpulan, atas dasar tersebut diatas dan tidak mengurangi rasa hormat saya, melalui surat ini diberitahukan bahwa saya tidak bisa hadir untuk memenuhi undangan tersebut.</p><p style=\"text-align: justify;><span style=\"font-size: 1rem;\">Demikianlah pemberitahuan ini disampaikan atas kerja samanya saya ucapkan terima kasih.</span></p>', '<ol><li>Kepala Dinas Perdagangan dan Perindustrian Kota Bekasi;</li><li>Ketua DPRD Kota Bekasi;</li><li>Sekretaris Daerah Kota Bekasi;</li><li>Asisten Administrasi Umum dan Perekonomian Setda Kota Bekasi</li></ol>', 'RUDI ROSADI', 'Direktur Utama', '1719784800', 1, 1),
(23, ' 025/045/PT.MSA-PED/SP/VII/2024', '-', 'PERINGATAN', 'Sdr/Sdri Mutakin', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan\r\nditerbitkannya surat ini, menerangkan bahwa nama di bawah ini:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>MUTAKIN</b><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : F.25 &amp; F.26<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Jenis Usaha&nbsp;&nbsp;&nbsp;&nbsp; : GILINGAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Mendapat peringatan agar segera\r\nmemperbaiki/membuka/menjalankan kembali <i>Box Control</i> / Bak Kontrol air.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat peringatan ini kami sampaikan\r\natas kerjasamanya disampaikan terima kasih.</span><br></p>', NULL, 'AGUS MULIATAMA', NULL, '1719784800', 1, 3),
(24, ' 025/046/PT.MSA-PED/SP/VII/2024', '-', 'PERINGATAN', 'Sdr/Sdri Sagimin', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan\r\nditerbitkannya surat ini, menerangkan bahwa nama di bawah ini:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>SAGIMIN</b><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : F.28, F.29 &amp; F.30<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Jenis Usaha&nbsp;&nbsp;&nbsp;&nbsp; : GILINGAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Mendapat peringatan agar segera\r\nmemperbaiki/membuka/menjalankan kembali <i>Box Control</i> / Bak Kontrol air.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat peringatan ini kami sampaikan\r\natas kerjasamanya disampaikan terima kasih.</span><br></p>', NULL, 'AGUS MULIATAMA', NULL, '1719784800', 1, 3),
(25, ' 025/042/PT.MSA/PERM/VI/2024', '-', 'Surat Permohonan SLO TD', 'Direktur Utama PT. MOSADEWA ENERGI KONSULINDO', 'Bukit Cimanggu City, Taman Mediteania', 'Blok A8 No.10 Kota Bogor.', NULL, 'Tempat', '<p style=\"text-align: justify;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Dengan Hormat,</span></p><p style=\"text-align: justify;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Bersamaan ini kami mengajukan permohonan untuk dapat dilakukan pengujian instalasi Pembangkit Listrik Tenaga Disel dalam rangka penerbitan Sertifikat Laik Operasi untuk :</span></p><ul><p style=\"margin: 0cm 0cm 5pt 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Pemilik Instalasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : PT. MUKTI SARANA ABADI</span><o:p></o:p></span></p><p style=\"margin-top: 0cm; margin-right: 0cm; margin-left: 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Komplek Sentra Bisnis Harapan Indah Blok SS I No.12,</span><o:p></o:p></span></p><p style=\"margin: 0cm 0cm 5pt 144pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify; text-indent: 36pt;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">&nbsp; Kel.Pejuang Kec.Medan Satria - Kota Bekasi.</span><o:p></o:p></span></p><p style=\"margin-top: 0cm; margin-right: 0cm; margin-left: 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Lokasi Instalasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Jl. Raya Jati Asih No.26 Rt.004 Rw.004 Pasar Baru</span><o:p></o:p></span></p><p style=\"margin: 0cm 0cm 5pt 144pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify; text-indent: 36pt;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">&nbsp; Jatiasih, Kel.Jatirasa Kec.Jatiasih - Kota Bekasi.</span><o:p></o:p></span></p><p style=\"margin-top: 0cm; margin-right: 0cm; margin-left: 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Jenis Instalasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pembangkit Listrik Tenaga Disel</span><o:p></o:p></span></p><p style=\"margin-top: 0cm; margin-right: 0cm; margin-left: 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Sifat Penggunaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : DARURAT</span><o:p></o:p></span></p><p style=\"margin-top: 0cm; margin-right: 0cm; margin-left: 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Tahun Pembangunan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 2024</span><o:p></o:p></span></p><p style=\"margin-top: 0cm; margin-right: 0cm; margin-left: 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Izin Pelaporan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Nomor :</span><o:p></o:p></span></p><p style=\"margin: 0cm 0cm 5pt 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><o:p></o:p></span></p><p style=\"margin: 0cm 0cm 5pt 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Pemasang Instalasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><o:p></o:p></span></p><p style=\"text-align: justify;\"></p><p style=\"margin: 0cm 0cm 5pt 36pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span></span></p></ul><p style=\"text-align: justify;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Data Mesin Penggerak</span></p><table class=\"table table-bordered\" style=\"width: 791.667px; color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\"><tbody><tr><td style=\"text-align: center;\">Data Mesin</td><td style=\"text-align: center;\">Mesin No. 1</td></tr><tr><td style=\"text-align: left;\">Jenis</td><td>MOTOR DISEL</td></tr><tr><td>Merk/Tipe</td><td>WEIFANG / R6108ZLD</td></tr><tr><td>Tahun Pembuatan</td><td>2023</td></tr><tr><td>No. Seri</td><td>23087108</td></tr><tr><td>Daya (HP)</td><td>170 kW</td></tr><tr><td>Speed (RPM)</td><td>1500</td></tr></tbody></table><p style=\"text-align: justify;\">Data Generator</p><table class=\"table table-bordered\" style=\"width: 791.667px; color: rgb(33, 37, 41); background-color: rgb(255, 255, 255);\"><tbody><tr><td style=\"text-align: center; \">Data Generator</td><td style=\"text-align: center; \">Generator No.1</td></tr><tr><td>Jenis</td><td>GENERATOR</td></tr><tr><td>Merk/Tipe</td><td>WINSTON</td></tr><tr><td>Tahun Pembuatan</td><td>-</td></tr><tr><td>No. Seri</td><td>UCI.274H</td></tr><tr><td>Daya (KVA/KW)</td><td>200/250</td></tr><tr><td>Spped (RPM)</td><td>1500</td></tr></tbody></table><p style=\"text-align: justify;\">Demikian permohonan ini kami sampaikan dan atas perhatiannya kamu ucapkan terima kasih.</p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1719871200', 1, 2),
(26, ' 025/043/PT.MSA/PERN/VI/2024', '-', 'Surat Pernyataan Bertanggung Jawab Terhadap Aspek Keselamatan Ketenaga Kerjaan', NULL, NULL, NULL, NULL, NULL, '<p>Yang bertanda tangan dibawah ini :</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family: &quot;Segoe UI&quot;; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Nama (</span><i><span style=\"font-family: &quot;Segoe UI&quot;;\">Badan Usaha\r\n(BU)/Non-BU/Perseorangan)</span></i><span style=\"font-family: &quot;Segoe UI&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :\r\nPT. MUKTI SARANA ABADI</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :\r\nKomplek Sentra Bisnis Harapan Indah Blok</span><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:9.0cm;text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">SS\r\nI No.12, Kel.Pejuanga Kec.Medan Satria – &nbsp;Kota Bekasi</span><o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 11pt; line-height: 107%; font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Nomor Induk Berusaha\r\n(</span><i><span style=\"font-family: &quot;Segoe UI&quot;;\">untuk usaha</span></i><span style=\"font-family: &quot;Segoe UI&quot;;\">)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :\r\n1266000112185</span></span></p><p>Menyatakan bertanggung jawab atas pemenuhan aspek keselamatan ketenagalistrikan pada instalasi :</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Nama Instalasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : PLTD</span><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Lokasi\r\nInstalasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :\r\nJl.Raya Jati Asih No.26 Rt.04 Rw.04 Pasar</span> <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:9.0cm;text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Baru\r\nJatiasih, Kel.Jatirasa, Kec.Jatiasih – Kota Bekasi</span><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Nomor Seri Mesin/Generator&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :\r\n23087108 / UCI.274H</span><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Kapasitas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :\r\n200 kVA</span><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Dokumen\r\nPendukung&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; &nbsp;a.\r\nGaransi pabrikan yang masih berlaku;</span><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-top:0cm;margin-right:0cm;margin-bottom:0cm;\r\nmargin-left:262.25pt;text-align:justify\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">b. Hasil commissioning test dari teknisi</span><o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 11pt; line-height: 107%; font-family: &quot;Segoe UI&quot;; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;&nbsp;&nbsp; distributor;</span></p><p><span style=\"font-size: 11pt; line-height: 107%; font-family: &quot;Segoe UI&quot;; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Demikian surat pernyataan ini dibuat dengan sebenar-benarnya dengan penuh kesadaran dan tapa ada paksaan dari pihak manapun. Apabila di kemudian hari terjadi sesuatu yang menimbulkan bahaya akibat tidak melaksanakan ketentuan keselamatan ketenagalistrikan pada instalasi tersebut, saya atau Badan Usaha/non-Badan Usaha yang saya wakili bersedia menanggung kerugian yang ditimbulkan dan dikenai sanksi sesuai dengan ketentuan peraturan perundang-undangan.<br></span><br></p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1719871200', 1, 2),
(27, ' 025/044/PT.MSA/PERN/VI/2024', '-', 'Suret Pernyataan', NULL, NULL, NULL, NULL, NULL, '<p style=\"text-align: justify; \">Saya yang bertanda tangan di bawah ini :</p><ul><p style=\"text-align: justify; \">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: RUDI ROSADI</p><p style=\"text-align: justify; \">Jabatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Direktur Utama</p><p style=\"text-align: justify; \">Alamat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Komplek Sentra Bisnis Harapan Indah Blok SS I No.12, Kel.Pejuang, Kec.Medan Satria - Kota Bekasi</p></ul><p style=\"text-align: justify; \">Dengan ini menyatakan bahwa :</p><ul><p style=\"text-align: justify; \">Jenis Instalasi&nbsp; &nbsp; &nbsp; &nbsp;:</p><p style=\"text-align: justify; \">Lokasi Instalasi&nbsp;&nbsp; &nbsp;:</p><p style=\"text-align: justify; \">Kapasitas&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 200 kVA</p><p style=\"text-align: justify; \">Sifat Penggunaan : Darurat</p></ul><p style=\"text-align: justify; \">Bahwa dengan ini menyatakan bahwa Pembangkit Listrik Tenaga Disel sudah dibangun pada tahun 2024 dengan demikian apabila di kemudian hari timbul permasalahan menjadi tanggungjawab kami.</p><p style=\"text-align: justify; \">Demikian surat pernyataan ini dibuat dengan sebenarnya untuk digunakan sebagaimana mestinya.</p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1719871200', 1, 2),
(28, ' 025/047/PT.MSA-PED/SP-1/VII/2024', '-', 'Surat Peringatan Ke - 1', 'Sdr/Sdri David Sihombing', NULL, NULL, NULL, '-', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Melalui surat ini kami\r\nmenyampaikan bahwa sdr/i David Sihombing belum memenuhi kewajibannya berupa sisa\r\npembayaran Kios di Pasar Baru Jatiasih sebesar <b>Rp.90.000.000,-</b> (Sembilan\r\nPuluh Juta Rupiah) yang telah tertuang dalam Perjanjian Jual Beli kios dengan <b>Nomor\r\n: 037/MSA-PJB/XII/2023</b> pada tanggal 27 Desember 2023 yang dimana PT. Mukti\r\nSarana Abadi selaku Penjual dan sdr/i David Sihombing selaku Pembeli yang\r\nmembeli kios blok G nomor 8. Mengingat <b>Pasal 3</b> poin (b) yang berbunyi <b>Apabila\r\nsisa pembayaran kios G.8 tidak dilunasi pada waktu yang sudah ditentukan, maka\r\ndana yang sudah masuk <u>Hangus</u>.</b><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan terbitnya Surat Peringatan\r\nKe-1 ini, maka sdr/i Wajib memenuhi kewajibannya.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian Surat Peringatan ke-1 ini kami\r\nsampaikan atas kerjasamanya disampaikan terima kasih.</span><br></p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1719957600', 1, 3),
(29, ' 025/049/PT.MSA-PED/STS/VII/2024', '-', 'SURAT TEGURAN dan SANGSI', 'Sdr/Sdri H.NA\'IM', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan\r\nditerbitkannya surat ini, menerangkan bahwa nama di bawah ini:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>H.NA\'IM</b></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : B.118</span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Jenis Usaha&nbsp;&nbsp;&nbsp;&nbsp; : PAKAIAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Mendapat teguran atas\r\nketidakpatuhannya terhadap ketentuan Manajemen PT. Mukti Sarana Abadi selaku\r\nPengelola Pasar Baru Jatiasih.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Segala bentuk ketidakpatuhan, tidak\r\ndisiplin dan lalai dalam hal pembayaran retribusi, dan dapat dikenakan sangsi\r\nberupa terhutangnya tunggakan yang belum dibayarkan dan pemutusan arus Listrik\r\nsementara.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Dengan terbitnya Surat teguran ini, maka Sdr/Sdri H.Na\'im wajib melakukan kewajiban-nya dan mematuhi segala peraturan pengelola.</span><br></p>', NULL, 'YULIANSYAH', NULL, '1720389600', 1, 3),
(30, ' 025/050/PT.MSA-PED/STS/VII/2024', '-', 'SURAT TEGURAN dan SANGSI', 'Sdr/Sdri H.SAHRIL', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan\r\nditerbitkannya surat ini, menerangkan bahwa nama di bawah ini:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>H.SAHRIL</b><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : B.184 &amp; B.193<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Jenis Usaha&nbsp;&nbsp;&nbsp;&nbsp; : PAKAIAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Mendapat teguran atas\r\nketidakpatuhannya terhadap ketentuan Manajemen PT. Mukti Sarana Abadi selaku\r\nPengelola Pasar Baru Jatiasih.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Segala bentuk ketidakpatuhan, tidak\r\ndisiplin dan lalai dalam hal pembayaran retribusi, dan dapat dikenakan sangsi\r\nberupa terhutangnya tunggakan yang belum dibayarkan dan pemutusan arus Listrik\r\nsementara.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan terbitnya Surat teguran ini,\r\nmaka Sdr/Sdri H.Sahril wajib melakukan kewajiban-nya dan mematuhi segala\r\nperaturan pengelola.<o:p></o:p></span></p>', NULL, 'YULIANSYAH', NULL, '1720389600', 1, 3),
(31, ' 025/048/PT.MSA-PED/Peng/VII/2024', '-', 'Penyesuaian Tarif Retribusi', 'Bapak/Ibu Pedagang Pasar Jatiasih', NULL, NULL, NULL, 'Tempat', '<p style=\"text-align: justify; \">Assalamu\'alaikum Wr. Wb. Salam sejahterah bagi kita semua,</p><p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp;Sehubung besarnya kontribusi yang harus dibayarkan kepada Pemerintah Kota Bekasi dan semakin tingginya biaya-biaya operasional yang harus di keluarkan agar terciptanya pasar bersih, aman, nyaman dan asri, bagi seluruh pedagang dan pengunjung pasar Jatiasih. Untuk tercapainya hal-hal tersebut diatas maka PT. Mukti Sarana Abadi akan menyesuaikan tarif retribusi bagi pedagang Logam mulia (emas)/permata, Perak dan sejenisnya. Terhitung mulai tanggal 10 Juli 2024 tarif retribusi yang semula Rp. 10.000,00 (Sepuluh ribu rupiah) menjadi Rp. 20.000,00 (dua puluh ribu rupiah).</p><p style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">&nbsp; &nbsp; &nbsp; &nbsp;Demikian yang dapat kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</span></p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1720389600', 1, 3),
(32, ' 025/051/PT.MSA-PED/SP/VII/2024', '-', 'Surat Panggilan', 'Sdr/Sdri H.Sahril', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sehubung dengan disampaikannya\r\nsurat meminta kehadiran sdr/i :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>H.SAHRIL<o:p></o:p></b></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : B.184 B.193<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jenis\r\nUsaha&nbsp;&nbsp;&nbsp;&nbsp; : PAKAIAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Pada :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rabu <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10 Juli 2024<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pukul\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10.00 s/d 12.00 Wib<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kantor Pengelola Pasar Baru\r\nJatiasih<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat panggilan ini kami sampaikan,\r\natas perhatian serta kerjasamanya kami sampaikan terima kasih.</span><br></p>', NULL, 'AGUS MULIATAMA', NULL, '1721167200', 1, 3),
(33, ' 025/052/PT.MSA-PED/STS/VII/2024', '-', 'SURAT TEGURAN dan SANGSI', 'Sdr/Sdri RIYADININGSIH, SE, MSI', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan\r\nditerbitkannya surat ini, menerangkan bahwa nama di bawah ini:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>RIYADININGSIH, SE, MSI</b><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : B.229, B.230 &amp; B.231<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Jenis Usaha&nbsp;&nbsp;&nbsp;&nbsp; : PAKAIAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:35.45pt\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Mendapat teguran atas\r\nketidakpatuhannya terhadap ketentuan Manajemen PT. Mukti Sarana Abadi selaku\r\nPengelola Pasar Baru Jatiasih.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Segala bentuk ketidakpatuhan, tidak\r\ndisiplin dan lalai dalam hal pembayaran retribusi, dan dapat dikenakan sangsi\r\nberupa terhutangnya tunggakan yang belum dibayarkan dan pemutusan arus Listrik\r\nsementara.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Dengan terbitnya Surat teguran ini, maka Sdr/Sdri\r\nRiyadiningsih, SE, MSI wajib melakukan kewajiban-nya dan mematuhi segala\r\nperaturan pengelola.</span><br></p>', NULL, 'YULIANSYAH', NULL, '1721167200', 1, 3);
INSERT INTO `isi_surat` (`id`, `nomor`, `lampiran`, `perihal`, `tujuan`, `alamat`, `alamat2`, `up`, `tempat`, `isi`, `tembusan`, `ttd`, `jabatan`, `tgl`, `status`, `kode`) VALUES
(34, ' 025/053/PT.MSA-PED/SP/VII/2024', '-', 'Surat Panggilan', 'Sdr/Sdri Triyanto', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sehubung dengan disampaikannya\r\nsurat meminta kehadiran sdr/i :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>TRIYANTO<o:p></o:p></b></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : C.135<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jenis\r\nUsaha&nbsp;&nbsp;&nbsp;&nbsp; : SEMBAKO<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Pada :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kamis<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 11 Juli 2024<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pukul\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10.00 s/d 14.00 Wib<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kantor Pengelola Pasar Baru\r\nJatiasih<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat panggilan ini kami sampaikan,\r\natas perhatian serta kerjasamanya kami sampaikan terima kasih.</span><br></p>', NULL, 'AGUS MULIATAMA', NULL, '1721167200', 1, 3),
(35, ' 025/054/PT.MSA-PED/SP/VII/2024', '-', 'Surat Panggilan', 'Sdr/i Adolf Supriyanto', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sehubung dengan disampaikannya\r\nsurat meminta kehadiran sdr/i :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>ADOLF SUPRIYANTO<o:p></o:p></b></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Blok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : D.54<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jenis\r\nUsaha&nbsp;&nbsp;&nbsp;&nbsp; : SEMBAKO<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Pada :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kamis <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 11 Juli 2024<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pukul\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10.00 s/d 14.00 Wib<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kantor Pengelola Pasar Baru\r\nJatiasih<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat panggilan ini kami sampaikan,\r\natas perhatian serta kerjasamanya kami sampaikan terima kasih.</span><br></p>', NULL, 'AGUS MULIATAMA', NULL, '1721167200', 1, 3),
(36, ' 025/055/PT.MSA-PSTAP/PEM/VII/2024', '-', 'PERMOHONAN PEMBAYARAN', 'PT. SANJAYATAMA ADHI PERDANA', NULL, NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sehubungan dengan akan dilakukan\r\npembayaran PAD kepada pemerintah Kota Bekasi, maka kami memohon agar pembayaran\r\nsewa lahan pemasangan reklame/banner/poster produk <b><i>uniliver</i> </b>yang\r\nada di pasar baru jatiasih agar di bayarkan dimuka pada Bulan Juli 2024 sebesar\r\nRp.25.000.000,- (Dua puluh lima juta rupiah).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Sebagaimana sewa awal tetap\r\nterhitung mulai tanggal 10 September 2024 s/d 10 September 2025.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat permohonan ini dibuat atas\r\npengertian kerjasamanya kami ucapkan terima kasih.</span><br></p>', NULL, 'DELFRANCISCHO BOY', 'HUMAS', '1721167200', 1, 2),
(37, ' 025/056/PT.MSA/VII/2024', '-', 'Pergantian Nomor Telepon', 'Kepala Cabang Bank BTN', 'Jakarta Kuningan', 'Jakarta Selatan', NULL, NULL, '<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Saya\r\nyang bertanda tangan di bawah ini :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Nama\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rudi Rosadi<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Direktur Utama<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">No.\r\nIdentitas &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 3275 0606 0668 0018<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">No.\r\nTelepon Lama &nbsp;&nbsp;&nbsp;&nbsp; : 0812-8821-5662<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">No.\r\nTelepon Batu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 0812-1113-8293<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <a href=\"mailto:rudirosadi06081968@gmail.com\"><span style=\"color: windowtext;\">rudirosadi06081968@gmail.com</span></a><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dalam\r\nhal ini bertindak untuk atas nama ( PT. Mukti Sarana Abadi ) selaku pemegang\r\nrekening pada Bank BTN KC Jakarta Kuningan dengan nomor rekening <b>00001-01-30-001254-5</b>\r\ndan selanjutnya untuk melakukan perubahan No Telepon yang sebelumnya <b>0812-8821-5662</b>\r\nmenjadi <b>0812-1113-8293</b>.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-family:&quot;Palatino Linotype&quot;,serif\">&nbsp;</span><span style=\"font-family: &quot;Palatino Linotype&quot;, serif; font-size: 11pt; text-align: left;\">Dengan ini pengajuan perubahan No Telepon ini\r\nsaya buat, atas perhatiannya saya ucapkan terimakasih.</span></p>', NULL, 'RUDI ROSADI', 'Direktur Utama', '1721167200', 1, 2),
(39, ' 015/057/PT.MSA-DISDAGPERIN/Perm/VII/2024', '-', 'PERMOHONAN', 'Kepala Dinas Perdagangan dan Perindustrian', 'Kota Bekasi', NULL, NULL, 'Tempat', '<p class=\"MsoNormal\"><i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Dengan Hormat</span></i><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif;mso-bidi-font-style:\r\nitalic\">,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:&quot;Palatino Linotype&quot;,serif\">Menindak lanjuti Surat <b>Nomor 500.2.2.5/829/Disdagperin.Pasar</b>\r\nyang membahas tindaklanjut hasil Pemeriksaan Badan Pemeriksa Keuangan\r\nPerwakilan Provinsi Jawa Barat atas system Pengendalian Intern dan Kepatuhan\r\nTerhadap Ketentuan Perathuran Perundan-Undangan Pemerintah Daerah Kota Bekasi\r\nTahun 2023 <b>Nomor 25B/LHP/XVII.BDG/05/2024</b> dan Instruksi Wali Kota Bekasi\r\n<b>Nomor 700.1.2/37/ITKO.Set</b> tentang tindak lanjut hasil Pemeriksaan Badan\r\nPemeriksa Keuangan Republik Indonesia atas Laporan Keuangan Pemerintah Daerah\r\nKota Bekasi tahun Anggaran 2023 tanggal 21 Mei 2024 tentang piutang Kompensasi\r\ntahun 2023 sebesar Rp.180.000.000,- (seratus delapan puluh juta rupiah).<br>\r\nDengan ini kami memohon agar diberikan Dispensasi waktu pembayaran sampai\r\ndengan bulan <b>September 2024</b>.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:11.0pt;line-height:107%;font-family:&quot;Palatino Linotype&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nArial;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Demikian surat permohonan ini kami sampaikan\r\natas kerjasamanya disampaikan terima kasih.</span><br></p>', '<ol><li>Pj. Wali Kota Bekasi;</li><li>Plh. Sekertaris Daerah Kota Bekasi;</li><li>Asisten Administrasi Umum dan Perekonomian Setda Kota Bekasi;</li><li>Pengawas Pasar Jatiasih Kota Bekasi;</li><li><i>Arsip</i>.</li></ol>', 'RUDI ROSADI', 'Direktur Utama', '1721167200', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kios`
--

CREATE TABLE `kios` (
  `id` int(11) NOT NULL,
  `blok_id` int(11) NOT NULL,
  `nomor` varchar(4) NOT NULL,
  `lantai` varchar(1) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `pedagang_id` int(11) NOT NULL,
  `link` int(11) NOT NULL,
  `listrik` int(11) NOT NULL,
  `air` int(1) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kios`
--

INSERT INTO `kios` (`id`, `blok_id`, `nomor`, `lantai`, `harga`, `status`, `pedagang_id`, `link`, `listrik`, `air`, `foto`) VALUES
(37, 3, '001', '0', '270000000', 1, 1, 37, 7, 0, 'A001.jpeg'),
(40, 3, '002', '0', '270000000', 1, 1, 37, 1, 0, 'A002.jpeg'),
(41, 3, '003', '0', '270000000', 1, 2, 41, 1, 0, 'A003.jpeg'),
(43, 3, '004', '0', '270000000', 1, 5, 43, 1, 0, 'A004.jpeg'),
(44, 3, '005', '0', '270000000', 1, 6, 44, 3, 0, 'A005.jpeg'),
(45, 3, '006', '0', '270000000', 1, 617, 45, 3, 0, 'A006.jpeg'),
(46, 3, '007', '0', '270000000', 1, 657, 46, 1, 0, 'default.jpg'),
(47, 6, '001', '0', '68000000', 1, 435, 47, 1, 0, 'D001.jpeg'),
(48, 3, '008', '0', '270000000', 0, 0, 48, 2, 0, 'default.jpg'),
(49, 3, '009', '0', '270000000', 0, 0, 48, 1, 0, 'default.jpg'),
(50, 3, '010', '0', '270000000', 1, 383, 50, 1, 0, 'default.jpg'),
(51, 3, '011', '0', '270000000', 1, 320, 51, 9, 0, 'default.jpg'),
(52, 3, '012', '0', '270000000', 1, 320, 51, 1, 0, 'default.jpg'),
(53, 3, '013', '0', '270000000', 1, 236, 53, 2, 0, 'default.jpg'),
(54, 3, '014', '0', '270000000', 1, 236, 53, 1, 0, 'default.jpg'),
(55, 3, '015', '0', '270000000', 1, 45, 55, 5, 0, 'default.jpg'),
(56, 3, '016', '0', '270000000', 1, 377, 56, 1, 0, 'default.jpg'),
(57, 3, '017', '0', '270000000', 1, 100, 57, 2, 0, 'default.jpg'),
(58, 3, '018', '0', '270000000', 1, 100, 57, 1, 0, 'default.jpg'),
(59, 3, '019', '0', '270000000', 1, 33, 59, 2, 0, 'default.jpg'),
(60, 3, '020', '0', '270000000', 1, 33, 59, 1, 0, 'default.jpg'),
(61, 3, '021', '0', '270000000', 1, 664, 61, 1, 0, 'default.jpg'),
(62, 3, '022', '0', '270000000', 1, 132, 62, 3, 0, 'default.jpg'),
(63, 3, '023', '0', '270000000', 1, 355, 63, 1, 0, 'default.jpg'),
(64, 3, '024', '0', '270000000', 1, 98, 64, 2, 0, 'default.jpg'),
(65, 3, '025', '0', '270000000', 1, 98, 64, 1, 0, 'default.jpg'),
(66, 3, '026', '0', '270000000', 1, 363, 66, 1, 0, 'default.jpg'),
(67, 3, '027', '0', '270000000', 1, 100, 67, 2, 0, 'default.jpg'),
(68, 3, '028', '0', '270000000', 1, 643, 68, 2, 0, 'default.jpg'),
(69, 3, '029', '0', '270000000', 1, 317, 69, 3, 0, 'default.jpg'),
(70, 3, '030', '0', '270000000', 1, 534, 70, 1, 0, 'default.jpg'),
(71, 3, '031', '0', '270000000', 1, 144, 71, 1, 0, 'default.jpg'),
(72, 3, '032', '0', '270000000', 0, 0, 72, 1, 0, 'default.jpg'),
(73, 3, '033', '0', '270000000', 1, 646, 73, 1, 0, 'default.jpg'),
(74, 3, '034', '0', '270000000', 1, 646, 74, 1, 0, 'default.jpg'),
(75, 3, '035', '0', '270000000', 1, 646, 75, 1, 0, 'default.jpg'),
(76, 3, '036', '0', '270000000', 1, 168, 76, 1, 0, 'default.jpg'),
(77, 3, '037', '0', '270000000', 1, 636, 77, 1, 0, 'default.jpg'),
(78, 3, '038', '0', '270000000', 1, 365, 78, 2, 0, 'default.jpg'),
(79, 3, '039', '0', '270000000', 1, 365, 78, 1, 0, 'default.jpg'),
(80, 3, '040', '0', '270000000', 1, 481, 80, 3, 0, 'default.jpg'),
(81, 3, '041', '0', '270000000', 1, 481, 80, 1, 0, 'default.jpg'),
(82, 3, '042', '0', '270000000', 1, 45, 55, 1, 0, 'default.jpg'),
(83, 3, '043', '0', '270000000', 1, 655, 83, 5, 0, 'default.jpg'),
(84, 3, '044', '0', '270000000', 1, 655, 83, 1, 0, 'default.jpg'),
(85, 3, '045', '0', '270000000', 1, 657, 51, 1, 0, 'default.jpg'),
(86, 3, '046', '0', '270000000', 1, 657, 51, 1, 0, 'default.jpg'),
(87, 3, '047', '0', '270000000', 1, 398, 87, 2, 0, 'default.jpg'),
(88, 3, '048', '0', '270000000', 1, 398, 87, 1, 0, 'default.jpg'),
(89, 3, '049', '0', '270000000', 0, 0, 89, 1, 0, 'default.jpg'),
(90, 3, '050', '0', '270000000', 1, 320, 90, 1, 0, 'default.jpg'),
(91, 3, '051', '0', '270000000', 1, 617, 45, 1, 0, 'default.jpg'),
(92, 3, '052', '0', '270000000', 1, 462, 92, 1, 0, 'default.jpg'),
(93, 3, '053', '0', '324000000', 1, 283, 93, 1, 0, 'default.jpg'),
(94, 3, '054', '0', '324000000', 1, 283, 94, 1, 0, 'default.jpg'),
(95, 3, '055', '1', '270000000', 0, 0, 95, 1, 0, 'default.jpg'),
(96, 3, '056', '1', '270000000', 1, 615, 96, 1, 0, 'default.jpg'),
(97, 3, '057', '1', '270000000', 1, 163, 97, 1, 0, 'default.jpg'),
(98, 3, '058', '1', '270000000', 1, 676, 98, 1, 0, 'default.jpg'),
(99, 3, '059', '1', '324000000', 1, 283, 99, 1, 0, 'default.jpg'),
(100, 3, '060', '1', '324000000', 1, 283, 100, 1, 0, 'default.jpg'),
(101, 3, '061', '1', '324000000', 1, 283, 101, 1, 0, 'default.jpg'),
(102, 3, '062', '1', '270000000', 1, 657, 102, 1, 0, 'default.jpg'),
(103, 3, '063', '1', '270000000', 1, 212, 103, 1, 0, 'default.jpg'),
(104, 3, '064', '1', '270000000', 0, 0, 104, 1, 0, 'default.jpg'),
(105, 3, '065', '1', '270000000', 0, 0, 105, 1, 0, 'default.jpg'),
(106, 3, '066', '1', '270000000', 0, 0, 106, 1, 0, 'default.jpg'),
(107, 3, '067', '1', '270000000', 1, 320, 107, 1, 0, 'default.jpg'),
(108, 3, '068', '1', '270000000', 1, 104, 108, 1, 0, 'default.jpg'),
(109, 3, '069', '1', '270000000', 0, 0, 109, 1, 0, 'default.jpg'),
(110, 3, '070', '1', '270000000', 0, 0, 110, 1, 0, 'default.jpg'),
(111, 3, '071', '1', '270000000', 1, 45, 111, 1, 0, 'default.jpg'),
(112, 3, '072', '1', '270000000', 1, 45, 111, 1, 0, 'default.jpg'),
(113, 3, '073', '1', '270000000', 1, 45, 113, 2, 0, 'default.jpg'),
(114, 3, '074', '1', '270000000', 1, 45, 113, 1, 0, 'default.jpg'),
(115, 3, '075', '1', '270000000', 0, 0, 115, 1, 0, 'default.jpg'),
(116, 3, '076', '1', '270000000', 0, 0, 116, 1, 0, 'default.jpg'),
(117, 3, '077', '1', '270000000', 1, 678, 117, 1, 0, 'default.jpg'),
(118, 3, '078', '1', '270000000', 0, 0, 118, 1, 0, 'default.jpg'),
(119, 3, '079', '1', '270000000', 1, 679, 119, 1, 0, 'default.jpg'),
(120, 3, '080', '1', '270000000', 0, 0, 120, 1, 0, 'default.jpg'),
(121, 3, '081', '1', '270000000', 0, 0, 121, 1, 0, 'default.jpg'),
(122, 3, '082', '1', '270000000', 1, 264, 122, 1, 0, 'default.jpg'),
(123, 3, '083', '1', '270000000', 0, 0, 123, 1, 0, 'default.jpg'),
(124, 3, '084', '1', '270000000', 0, 0, 124, 1, 0, 'default.jpg'),
(125, 3, '085', '1', '270000000', 0, 0, 125, 1, 0, 'default.jpg'),
(126, 3, '086', '1', '270000000', 0, 0, 126, 1, 0, 'default.jpg'),
(127, 3, '087', '1', '270000000', 1, 368, 127, 2, 0, 'default.jpg'),
(128, 3, '088', '1', '270000000', 1, 398, 127, 1, 0, 'default.jpg'),
(129, 3, '089', '1', '270000000', 1, 45, 111, 1, 0, 'default.jpg'),
(130, 3, '090', '1', '270000000', 0, 0, 130, 1, 0, 'default.jpg'),
(131, 3, '091', '1', '270000000', 0, 0, 131, 1, 0, 'default.jpg'),
(132, 3, '092', '1', '270000000', 0, 0, 132, 1, 0, 'default.jpg'),
(133, 3, '093', '1', '270000000', 1, 684, 133, 1, 0, 'default.jpg'),
(134, 3, '094', '1', '270000000', 1, 320, 134, 1, 0, 'default.jpg'),
(135, 3, '095', '1', '270000000', 0, 0, 135, 1, 0, 'default.jpg'),
(136, 3, '096', '1', '270000000', 0, 0, 136, 1, 0, 'default.jpg'),
(137, 3, '097', '1', '270000000', 0, 0, 137, 1, 0, 'default.jpg'),
(138, 3, '098', '1', '270000000', 1, 368, 138, 1, 0, 'default.jpg'),
(139, 3, '099', '1', '270000000', 1, 657, 139, 1, 0, 'default.jpg'),
(140, 3, '100', '1', '270000000', 0, 0, 140, 1, 0, 'default.jpg'),
(141, 3, '101', '1', '270000000', 0, 0, 141, 1, 0, 'default.jpg'),
(142, 3, '102', '1', '270000000', 0, 0, 142, 1, 0, 'default.jpg'),
(143, 3, '103', '1', '270000000', 0, 0, 143, 1, 0, 'default.jpg'),
(144, 3, '104', '1', '270000000', 1, 677, 144, 1, 0, 'default.jpg'),
(181, 4, '001', '0', '168000000', 1, 151, 181, 1, 0, 'default.jpg'),
(182, 4, '002', '0', '168000000', 1, 450, 182, 1, 0, 'default.jpg'),
(183, 4, '003', '0', '168000000', 1, 646, 183, 1, 0, 'default.jpg'),
(184, 4, '004', '0', '168000000', 1, 548, 184, 1, 0, 'default.jpg'),
(185, 4, '005', '0', '168000000', 1, 490, 185, 1, 0, 'default.jpg'),
(186, 4, '006', '0', '168000000', 1, 522, 186, 2, 0, 'default.jpg'),
(187, 4, '007', '0', '168000000', 1, 522, 186, 1, 0, 'default.jpg'),
(188, 4, '008', '0', '168000000', 1, 152, 188, 1, 0, 'default.jpg'),
(189, 4, '009', '0', '168000000', 1, 205, 189, 2, 0, 'default.jpg'),
(190, 4, '010', '0', '168000000', 1, 205, 189, 1, 0, 'default.jpg'),
(191, 4, '011', '0', '168000000', 1, 33, 191, 2, 0, 'default.jpg'),
(192, 4, '012', '0', '168000000', 1, 338, 192, 1, 0, 'default.jpg'),
(193, 4, '013', '0', '168000000', 1, 467, 193, 1, 0, 'default.jpg'),
(194, 4, '014', '0', '168000000', 1, 176, 194, 2, 0, 'default.jpg'),
(195, 4, '015', '0', '168000000', 1, 176, 194, 1, 0, 'default.jpg'),
(196, 4, '016', '0', '168000000', 1, 265, 196, 2, 0, 'default.jpg'),
(197, 4, '017', '0', '168000000', 1, 265, 196, 1, 0, 'default.jpg'),
(198, 4, '018', '0', '168000000', 1, 221, 198, 1, 0, 'default.jpg'),
(199, 4, '019', '0', '168000000', 1, 246, 199, 1, 0, 'default.jpg'),
(200, 4, '020', '0', '168000000', 1, 461, 200, 1, 0, 'default.jpg'),
(201, 4, '021', '0', '168000000', 1, 142, 201, 1, 0, 'default.jpg'),
(202, 4, '022', '0', '168000000', 1, 188, 202, 1, 0, 'default.jpg'),
(203, 4, '023', '0', '168000000', 1, 533, 203, 1, 0, 'default.jpg'),
(204, 4, '024', '0', '168000000', 0, 0, 204, 1, 0, 'default.jpg'),
(205, 4, '025', '0', '168000000', 1, 472, 205, 1, 0, 'default.jpg'),
(206, 4, '026', '0', '168000000', 1, 65, 206, 1, 0, 'default.jpg'),
(207, 4, '027', '0', '168000000', 0, 0, 207, 1, 0, 'default.jpg'),
(208, 4, '028', '0', '168000000', 1, 154, 208, 1, 0, 'default.jpg'),
(209, 4, '029', '0', '168000000', 1, 112, 209, 1, 0, 'default.jpg'),
(210, 4, '030', '0', '168000000', 1, 33, 191, 1, 0, 'default.jpg'),
(211, 4, '031', '0', '168000000', 0, 0, 211, 1, 0, 'default.jpg'),
(212, 4, '032', '0', '168000000', 0, 0, 212, 1, 0, 'default.jpg'),
(213, 4, '033', '0', '168000000', 1, 622, 213, 1, 0, 'default.jpg'),
(214, 4, '034', '0', '168000000', 1, 622, 214, 1, 0, 'default.jpg'),
(215, 4, '035', '0', '168000000', 0, 0, 215, 1, 0, 'default.jpg'),
(216, 4, '036', '0', '168000000', 1, 455, 216, 1, 0, 'default.jpg'),
(217, 4, '037', '0', '168000000', 1, 455, 217, 1, 0, 'default.jpg'),
(218, 4, '038', '0', '168000000', 0, 0, 218, 1, 0, 'default.jpg'),
(219, 4, '039', '0', '168000000', 0, 0, 219, 1, 0, 'default.jpg'),
(220, 4, '040', '0', '168000000', 1, 14, 220, 1, 0, 'default.jpg'),
(221, 4, '041', '0', '168000000', 1, 196, 221, 1, 0, 'default.jpg'),
(222, 4, '042', '0', '168000000', 1, 503, 222, 1, 0, 'default.jpg'),
(223, 4, '043', '0', '168000000', 1, 7, 223, 2, 0, 'default.jpg'),
(224, 4, '044', '0', '168000000', 1, 140, 224, 2, 0, 'default.jpg'),
(225, 4, '045', '0', '168000000', 1, 33, 225, 2, 0, 'default.jpg'),
(226, 4, '046', '0', '168000000', 1, 33, 225, 1, 0, 'default.jpg'),
(227, 4, '047', '0', '168000000', 1, 271, 227, 2, 0, 'default.jpg'),
(228, 4, '048', '0', '168000000', 1, 271, 227, 1, 0, 'default.jpg'),
(229, 4, '049', '1', '150000000', 1, 499, 229, 1, 0, 'default.jpg'),
(230, 4, '050', '1', '150000000', 0, 0, 230, 1, 0, 'default.jpg'),
(231, 4, '051', '1', '150000000', 0, 0, 231, 1, 0, 'default.jpg'),
(232, 4, '052', '1', '150000000', 1, 118, 232, 2, 0, 'default.jpg'),
(233, 4, '053', '1', '150000000', 1, 118, 232, 1, 0, 'default.jpg'),
(234, 4, '054', '1', '150000000', 1, 133, 234, 1, 0, 'default.jpg'),
(235, 4, '055', '1', '150000000', 0, 0, 235, 1, 0, 'default.jpg'),
(236, 4, '056', '1', '150000000', 0, 0, 236, 1, 0, 'default.jpg'),
(237, 4, '057', '1', '150000000', 1, 564, 237, 2, 0, 'default.jpg'),
(238, 4, '058', '1', '150000000', 1, 564, 237, 1, 0, 'default.jpg'),
(239, 4, '059', '1', '150000000', 1, 133, 239, 2, 0, 'default.jpg'),
(240, 4, '060', '1', '150000000', 1, 473, 240, 1, 0, 'default.jpg'),
(241, 4, '061', '1', '150000000', 0, 0, 241, 1, 0, 'default.jpg'),
(242, 4, '062', '1', '150000000', 0, 0, 242, 1, 0, 'default.jpg'),
(243, 4, '063', '1', '150000000', 1, 104, 243, 1, 0, 'default.jpg'),
(244, 4, '064', '1', '150000000', 1, 27, 244, 1, 0, 'default.jpg'),
(245, 4, '065', '1', '150000000', 1, 27, 244, 1, 0, 'default.jpg'),
(246, 4, '066', '1', '150000000', 0, 0, 246, 1, 0, 'default.jpg'),
(247, 4, '067', '1', '150000000', 0, 0, 247, 1, 0, 'default.jpg'),
(248, 4, '068', '1', '150000000', 0, 0, 248, 1, 0, 'default.jpg'),
(249, 4, '069', '1', '150000000', 0, 0, 249, 1, 0, 'default.jpg'),
(250, 4, '070', '1', '150000000', 0, 0, 250, 1, 0, 'default.jpg'),
(251, 4, '071', '1', '150000000', 0, 0, 251, 1, 0, 'default.jpg'),
(252, 4, '072', '1', '150000000', 1, 431, 252, 2, 0, 'default.jpg'),
(253, 4, '073', '1', '150000000', 1, 480, 252, 1, 0, 'default.jpg'),
(254, 4, '074', '1', '150000000', 1, 138, 254, 1, 0, 'default.jpg'),
(255, 4, '075', '1', '150000000', 0, 0, 255, 1, 0, 'default.jpg'),
(256, 4, '076', '1', '150000000', 0, 0, 256, 1, 0, 'default.jpg'),
(257, 4, '077', '1', '150000000', 0, 0, 257, 1, 0, 'default.jpg'),
(258, 4, '078', '1', '150000000', 1, 133, 239, 1, 0, 'default.jpg'),
(259, 4, '079', '1', '150000000', 1, 133, 259, 1, 0, 'default.jpg'),
(260, 4, '080', '1', '150000000', 0, 0, 260, 1, 0, 'default.jpg'),
(261, 4, '081', '1', '150000000', 0, 0, 261, 1, 0, 'default.jpg'),
(262, 4, '082', '1', '150000000', 0, 0, 262, 1, 0, 'default.jpg'),
(263, 4, '083', '1', '150000000', 1, 574, 263, 1, 0, 'default.jpg'),
(264, 4, '084', '1', '150000000', 0, 0, 264, 1, 0, 'default.jpg'),
(265, 4, '085', '1', '150000000', 0, 0, 265, 1, 0, 'default.jpg'),
(266, 4, '086', '1', '150000000', 0, 0, 266, 1, 0, 'default.jpg'),
(267, 4, '087', '1', '150000000', 0, 0, 267, 1, 0, 'default.jpg'),
(268, 4, '088', '1', '150000000', 0, 0, 268, 1, 0, 'default.jpg'),
(269, 4, '089', '1', '150000000', 0, 0, 269, 1, 0, 'default.jpg'),
(270, 4, '090', '1', '150000000', 0, 0, 270, 1, 0, 'default.jpg'),
(271, 4, '091', '1', '150000000', 0, 0, 271, 1, 0, 'default.jpg'),
(272, 4, '092', '1', '150000000', 0, 0, 272, 1, 0, 'default.jpg'),
(273, 4, '093', '1', '150000000', 1, 353, 273, 1, 0, 'default.jpg'),
(274, 4, '094', '1', '150000000', 1, 354, 274, 1, 0, 'default.jpg'),
(275, 4, '095', '1', '150000000', 0, 0, 275, 1, 0, 'default.jpg'),
(276, 4, '096', '1', '150000000', 0, 0, 276, 1, 0, 'default.jpg'),
(277, 4, '097', '1', '150000000', 1, 246, 277, 1, 0, 'default.jpg'),
(278, 4, '098', '1', '150000000', 1, 442, 278, 1, 0, 'default.jpg'),
(279, 4, '099', '1', '150000000', 1, 442, 279, 1, 0, 'default.jpg'),
(280, 4, '100', '1', '150000000', 1, 118, 280, 2, 0, 'default.jpg'),
(281, 4, '101', '1', '150000000', 1, 118, 280, 1, 0, 'default.jpg'),
(282, 4, '102', '1', '150000000', 0, 0, 282, 1, 0, 'default.jpg'),
(283, 4, '103', '1', '150000000', 1, 342, 283, 1, 0, 'default.jpg'),
(284, 4, '104', '1', '150000000', 1, 593, 284, 1, 0, 'default.jpg'),
(285, 4, '105', '1', '150000000', 0, 0, 285, 1, 0, 'default.jpg'),
(286, 4, '106', '1', '150000000', 0, 0, 286, 1, 0, 'default.jpg'),
(287, 4, '107', '1', '150000000', 0, 0, 287, 1, 0, 'default.jpg'),
(288, 4, '108', '1', '150000000', 0, 0, 288, 1, 0, 'default.jpg'),
(289, 4, '109', '1', '150000000', 0, 0, 289, 1, 0, 'default.jpg'),
(290, 4, '110', '1', '150000000', 0, 0, 290, 1, 0, 'default.jpg'),
(291, 4, '111', '1', '150000000', 0, 0, 291, 1, 0, 'default.jpg'),
(292, 4, '112', '1', '150000000', 0, 0, 292, 1, 0, 'default.jpg'),
(293, 4, '113', '1', '150000000', 0, 0, 293, 1, 0, 'default.jpg'),
(294, 4, '114', '1', '150000000', 1, 604, 294, 1, 0, 'default.jpg'),
(295, 4, '115', '1', '150000000', 0, 0, 295, 1, 0, 'default.jpg'),
(296, 4, '116', '1', '150000000', 0, 0, 296, 1, 0, 'default.jpg'),
(297, 4, '117', '1', '150000000', 0, 0, 297, 1, 0, 'default.jpg'),
(298, 4, '118', '1', '150000000', 1, 377, 298, 1, 0, 'default.jpg'),
(299, 4, '119', '1', '150000000', 1, 69, 299, 1, 0, 'default.jpg'),
(300, 4, '120', '1', '150000000', 1, 246, 300, 1, 0, 'default.jpg'),
(301, 4, '121', '1', '150000000', 0, 0, 301, 1, 0, 'default.jpg'),
(302, 4, '122', '1', '150000000', 0, 0, 302, 1, 0, 'default.jpg'),
(304, 4, '124', '1', '150000000', 0, 0, 304, 1, 0, 'default.jpg'),
(305, 4, '125', '1', '150000000', 0, 0, 305, 1, 0, 'default.jpg'),
(306, 4, '126', '1', '150000000', 0, 0, 306, 1, 0, 'default.jpg'),
(307, 4, '127', '1', '150000000', 0, 0, 307, 1, 0, 'default.jpg'),
(308, 4, '128', '1', '150000000', 0, 0, 308, 1, 0, 'default.jpg'),
(309, 4, '129', '1', '150000000', 0, 0, 309, 1, 0, 'default.jpg'),
(310, 4, '130', '1', '150000000', 0, 0, 310, 1, 0, 'default.jpg'),
(311, 4, '131', '1', '150000000', 0, 0, 311, 1, 0, 'default.jpg'),
(312, 4, '132', '1', '150000000', 0, 0, 312, 1, 0, 'default.jpg'),
(313, 4, '133', '1', '150000000', 0, 0, 313, 1, 0, 'default.jpg'),
(314, 4, '134', '1', '150000000', 1, 681, 314, 1, 0, 'default.jpg'),
(315, 4, '135', '1', '150000000', 1, 149, 315, 1, 0, 'default.jpg'),
(316, 4, '136', '1', '150000000', 0, 0, 316, 1, 0, 'default.jpg'),
(317, 4, '137', '1', '150000000', 0, 0, 317, 1, 0, 'default.jpg'),
(318, 4, '138', '1', '150000000', 1, 619, 318, 2, 0, 'default.jpg'),
(319, 4, '139', '1', '150000000', 1, 494, 319, 1, 0, 'default.jpg'),
(320, 4, '140', '1', '150000000', 1, 202, 320, 2, 0, 'default.jpg'),
(321, 4, '141', '1', '150000000', 1, 381, 321, 1, 0, 'default.jpg'),
(322, 4, '142', '1', '150000000', 0, 0, 322, 1, 0, 'default.jpg'),
(323, 4, '143', '1', '150000000', 1, 665, 323, 1, 0, 'default.jpg'),
(324, 4, '144', '1', '150000000', 1, 116, 324, 1, 0, 'default.jpg'),
(325, 4, '145', '1', '150000000', 1, 564, 325, 2, 0, 'default.jpg'),
(326, 4, '146', '1', '150000000', 1, 564, 326, 1, 0, 'default.jpg'),
(327, 4, '147', '1', '150000000', 0, 0, 327, 1, 0, 'default.jpg'),
(328, 4, '148', '1', '150000000', 0, 0, 328, 1, 0, 'default.jpg'),
(329, 4, '149', '1', '150000000', 0, 0, 329, 1, 0, 'default.jpg'),
(330, 4, '150', '1', '150000000', 0, 0, 330, 1, 0, 'default.jpg'),
(331, 4, '151', '1', '150000000', 0, 0, 331, 1, 0, 'default.jpg'),
(332, 4, '152', '1', '150000000', 0, 0, 332, 1, 0, 'default.jpg'),
(333, 4, '153', '1', '150000000', 0, 0, 333, 1, 0, 'default.jpg'),
(334, 4, '154', '1', '150000000', 1, 491, 325, 1, 0, 'default.jpg'),
(335, 4, '155', '1', '150000000', 1, 52, 335, 1, 0, 'default.jpg'),
(336, 4, '156', '1', '150000000', 0, 0, 336, 1, 0, 'default.jpg'),
(337, 4, '157', '1', '150000000', 0, 0, 337, 1, 0, 'default.jpg'),
(338, 4, '158', '1', '150000000', 1, 616, 338, 1, 0, 'default.jpg'),
(339, 4, '159', '1', '150000000', 1, 202, 320, 1, 0, 'default.jpg'),
(340, 4, '160', '1', '150000000', 1, 205, 340, 1, 0, 'default.jpg'),
(341, 4, '161', '1', '150000000', 1, 449, 341, 1, 0, 'default.jpg'),
(342, 4, '162', '1', '150000000', 0, 0, 342, 1, 0, 'default.jpg'),
(343, 4, '163', '1', '150000000', 0, 0, 343, 1, 0, 'default.jpg'),
(345, 4, '165', '1', '150000000', 0, 0, 345, 1, 0, 'default.jpg'),
(346, 4, '166', '1', '150000000', 0, 0, 346, 1, 0, 'default.jpg'),
(347, 4, '167', '1', '150000000', 0, 0, 347, 1, 0, 'default.jpg'),
(348, 4, '168', '1', '150000000', 0, 0, 348, 1, 0, 'default.jpg'),
(349, 4, '169', '1', '150000000', 0, 0, 349, 1, 0, 'default.jpg'),
(350, 4, '170', '1', '150000000', 0, 0, 350, 1, 0, 'default.jpg'),
(351, 4, '171', '1', '150000000', 0, 0, 351, 1, 0, 'default.jpg'),
(352, 4, '172', '1', '150000000', 0, 0, 352, 1, 0, 'default.jpg'),
(353, 4, '173', '1', '150000000', 0, 0, 353, 1, 0, 'default.jpg'),
(354, 4, '174', '1', '150000000', 0, 0, 354, 1, 0, 'default.jpg'),
(355, 4, '175', '1', '150000000', 1, 497, 355, 1, 0, 'default.jpg'),
(356, 4, '176', '1', '150000000', 0, 0, 356, 1, 0, 'default.jpg'),
(357, 4, '177', '1', '150000000', 0, 0, 357, 1, 0, 'default.jpg'),
(358, 4, '178', '1', '150000000', 0, 0, 358, 1, 0, 'default.jpg'),
(359, 4, '179', '1', '150000000', 1, 209, 359, 2, 0, 'default.jpg'),
(360, 4, '180', '1', '150000000', 1, 176, 360, 1, 0, 'default.jpg'),
(361, 4, '181', '1', '150000000', 1, 682, 361, 1, 0, 'default.jpg'),
(362, 4, '182', '1', '150000000', 1, 98, 362, 2, 0, 'default.jpg'),
(363, 4, '183', '1', '150000000', 1, 44, 363, 1, 0, 'default.jpg'),
(364, 4, '184', '1', '150000000', 1, 213, 364, 2, 0, 'default.jpg'),
(365, 4, '185', '1', '150000000', 0, 0, 365, 1, 0, 'default.jpg'),
(366, 4, '186', '1', '150000000', 0, 0, 366, 1, 0, 'default.jpg'),
(367, 4, '187', '1', '150000000', 0, 0, 367, 1, 0, 'default.jpg'),
(368, 4, '188', '1', '150000000', 0, 0, 368, 1, 0, 'default.jpg'),
(369, 4, '189', '1', '150000000', 0, 0, 369, 1, 0, 'default.jpg'),
(370, 4, '190', '1', '150000000', 0, 0, 370, 1, 0, 'default.jpg'),
(371, 4, '191', '1', '150000000', 0, 0, 371, 1, 0, 'default.jpg'),
(372, 4, '192', '1', '150000000', 0, 0, 372, 1, 0, 'default.jpg'),
(373, 4, '193', '1', '150000000', 1, 213, 364, 1, 0, 'default.jpg'),
(374, 4, '194', '1', '150000000', 1, 165, 362, 2, 0, 'default.jpg'),
(375, 4, '195', '1', '150000000', 1, 165, 362, 1, 0, 'default.jpg'),
(376, 4, '196', '1', '150000000', 1, 683, 376, 1, 0, 'default.jpg'),
(377, 4, '197', '1', '150000000', 1, 437, 376, 1, 0, 'default.jpg'),
(378, 4, '198', '1', '150000000', 1, 444, 378, 1, 0, 'default.jpg'),
(379, 4, '199', '1', '150000000', 0, 0, 379, 1, 0, 'default.jpg'),
(380, 4, '200', '1', '150000000', 0, 0, 380, 1, 0, 'default.jpg'),
(381, 4, '201', '1', '150000000', 0, 0, 381, 1, 0, 'default.jpg'),
(382, 4, '202', '1', '150000000', 0, 0, 382, 1, 0, 'default.jpg'),
(383, 4, '203', '1', '150000000', 0, 0, 383, 1, 0, 'default.jpg'),
(384, 4, '204', '1', '150000000', 0, 0, 384, 1, 0, 'default.jpg'),
(385, 4, '205', '1', '150000000', 0, 0, 385, 1, 0, 'default.jpg'),
(386, 4, '206', '1', '150000000', 0, 0, 386, 1, 0, 'default.jpg'),
(387, 4, '207', '1', '150000000', 0, 0, 387, 1, 0, 'default.jpg'),
(388, 4, '208', '1', '150000000', 0, 0, 388, 1, 0, 'default.jpg'),
(389, 4, '209', '1', '150000000', 0, 0, 389, 1, 0, 'default.jpg'),
(390, 4, '210', '1', '150000000', 0, 0, 390, 1, 0, 'default.jpg'),
(391, 4, '211', '1', '150000000', 0, 0, 391, 1, 0, 'default.jpg'),
(392, 4, '212', '1', '150000000', 0, 0, 392, 1, 0, 'default.jpg'),
(393, 4, '213', '1', '150000000', 0, 0, 393, 1, 0, 'default.jpg'),
(394, 4, '214', '1', '150000000', 0, 0, 394, 1, 0, 'default.jpg'),
(395, 4, '215', '1', '150000000', 0, 0, 395, 1, 0, 'default.jpg'),
(396, 4, '216', '1', '150000000', 0, 0, 396, 1, 0, 'default.jpg'),
(397, 4, '217', '1', '150000000', 0, 0, 397, 1, 0, 'default.jpg'),
(398, 4, '218', '1', '150000000', 0, 0, 398, 1, 0, 'default.jpg'),
(399, 4, '219', '1', '150000000', 0, 0, 399, 1, 0, 'default.jpg'),
(400, 4, '220', '1', '150000000', 0, 0, 400, 1, 0, 'default.jpg'),
(401, 4, '221', '1', '150000000', 0, 0, 401, 1, 0, 'default.jpg'),
(402, 4, '222', '1', '150000000', 0, 0, 402, 1, 0, 'default.jpg'),
(403, 4, '223', '1', '150000000', 0, 0, 403, 1, 0, 'default.jpg'),
(404, 4, '224', '1', '150000000', 0, 0, 404, 1, 0, 'default.jpg'),
(405, 4, '225', '1', '150000000', 0, 0, 405, 1, 0, 'default.jpg'),
(406, 4, '226', '1', '150000000', 1, 666, 406, 1, 0, 'default.jpg'),
(407, 4, '227', '1', '150000000', 1, 504, 407, 1, 0, 'default.jpg'),
(408, 4, '228', '1', '150000000', 1, 176, 408, 2, 0, 'default.jpg'),
(409, 4, '229', '1', '150000000', 1, 495, 409, 1, 0, 'default.jpg'),
(410, 4, '230', '1', '150000000', 1, 561, 410, 1, 0, 'default.jpg'),
(411, 4, '231', '1', '150000000', 0, 0, 410, 1, 0, 'default.jpg'),
(412, 4, '232', '1', '150000000', 0, 0, 412, 1, 0, 'default.jpg'),
(413, 4, '233', '1', '150000000', 1, 479, 413, 1, 0, 'default.jpg'),
(414, 4, '234', '1', '150000000', 1, 24, 414, 2, 0, 'default.jpg'),
(415, 4, '235', '1', '150000000', 0, 0, 415, 1, 0, 'default.jpg'),
(416, 4, '236', '1', '150000000', 0, 0, 416, 1, 0, 'default.jpg'),
(417, 4, '237', '1', '150000000', 0, 0, 417, 1, 0, 'default.jpg'),
(418, 4, '238', '1', '150000000', 0, 0, 418, 1, 0, 'default.jpg'),
(419, 4, '239', '1', '150000000', 0, 0, 419, 1, 0, 'default.jpg'),
(420, 4, '240', '1', '150000000', 0, 0, 420, 1, 0, 'default.jpg'),
(421, 4, '241', '1', '150000000', 0, 0, 421, 1, 0, 'default.jpg'),
(422, 4, '242', '1', '150000000', 0, 0, 422, 1, 0, 'default.jpg'),
(423, 4, '243', '1', '150000000', 1, 24, 414, 1, 0, 'default.jpg'),
(424, 4, '244', '1', '150000000', 0, 0, 424, 1, 0, 'default.jpg'),
(425, 4, '245', '1', '150000000', 0, 0, 425, 1, 0, 'default.jpg'),
(426, 4, '246', '1', '150000000', 0, 0, 426, 1, 0, 'default.jpg'),
(427, 4, '247', '1', '150000000', 1, 200, 427, 2, 0, 'default.jpg'),
(428, 4, '248', '1', '150000000', 1, 200, 427, 1, 0, 'default.jpg'),
(429, 4, '249', '1', '150000000', 1, 176, 408, 1, 0, 'default.jpg'),
(430, 4, '250', '1', '150000000', 0, 0, 430, 1, 0, 'default.jpg'),
(431, 4, '251', '1', '150000000', 0, 0, 431, 1, 0, 'default.jpg'),
(432, 4, '252', '1', '150000000', 0, 0, 432, 1, 0, 'default.jpg'),
(433, 4, '253', '1', '150000000', 0, 0, 433, 1, 0, 'default.jpg'),
(434, 4, '254', '1', '150000000', 0, 0, 434, 1, 0, 'default.jpg'),
(435, 4, '255', '1', '150000000', 0, 0, 435, 1, 0, 'default.jpg'),
(436, 4, '256', '1', '150000000', 0, 0, 436, 1, 0, 'default.jpg'),
(437, 4, '257', '1', '150000000', 0, 0, 437, 1, 0, 'default.jpg'),
(438, 4, '258', '1', '150000000', 1, 364, 438, 1, 0, 'default.jpg'),
(439, 4, '259', '1', '150000000', 0, 0, 439, 1, 0, 'default.jpg'),
(440, 4, '260', '1', '150000000', 0, 0, 440, 1, 0, 'default.jpg'),
(441, 4, '261', '1', '150000000', 0, 0, 441, 1, 0, 'default.jpg'),
(442, 4, '262', '1', '150000000', 0, 0, 442, 1, 0, 'default.jpg'),
(443, 4, '263', '1', '150000000', 0, 0, 443, 1, 0, 'default.jpg'),
(444, 4, '264', '1', '150000000', 0, 0, 444, 1, 0, 'default.jpg'),
(445, 4, '265', '1', '150000000', 0, 0, 445, 1, 0, 'default.jpg'),
(446, 4, '266', '1', '150000000', 0, 0, 446, 1, 0, 'default.jpg'),
(447, 4, '267', '1', '150000000', 0, 0, 447, 1, 0, 'default.jpg'),
(448, 4, '268', '1', '150000000', 0, 0, 448, 1, 0, 'default.jpg'),
(449, 4, '269', '1', '150000000', 1, 674, 449, 1, 0, 'default.jpg'),
(450, 4, '270', '1', '150000000', 1, 21, 450, 1, 0, 'default.jpg'),
(451, 4, '271', '1', '150000000', 0, 0, 451, 1, 0, 'default.jpg'),
(452, 4, '272', '1', '150000000', 0, 0, 452, 1, 0, 'default.jpg'),
(453, 4, '273', '1', '150000000', 0, 0, 453, 1, 0, 'default.jpg'),
(454, 4, '274', '1', '150000000', 0, 0, 454, 1, 0, 'default.jpg'),
(455, 4, '275', '1', '150000000', 0, 0, 455, 1, 0, 'default.jpg'),
(456, 4, '276', '1', '150000000', 0, 0, 456, 1, 0, 'default.jpg'),
(457, 4, '277', '1', '150000000', 0, 0, 457, 1, 0, 'default.jpg'),
(458, 4, '278', '1', '150000000', 0, 0, 458, 1, 0, 'default.jpg'),
(459, 4, '279', '1', '150000000', 0, 0, 459, 1, 0, 'default.jpg'),
(460, 4, '280', '1', '150000000', 0, 0, 460, 1, 0, 'default.jpg'),
(461, 4, '281', '1', '150000000', 0, 0, 461, 1, 0, 'default.jpg'),
(462, 4, '282', '1', '150000000', 1, 89, 462, 1, 0, 'default.jpg'),
(463, 4, '283', '1', '150000000', 1, 558, 463, 1, 0, 'default.jpg'),
(464, 4, '284', '1', '150000000', 0, 0, 464, 1, 0, 'default.jpg'),
(465, 4, '285', '1', '150000000', 0, 0, 465, 1, 0, 'default.jpg'),
(466, 4, '286', '1', '150000000', 0, 0, 466, 1, 0, 'default.jpg'),
(467, 4, '287', '1', '150000000', 1, 6, 467, 2, 0, 'default.jpg'),
(468, 4, '288', '1', '150000000', 1, 662, 468, 1, 0, 'default.jpg'),
(469, 4, '289', '1', '150000000', 0, 0, 469, 1, 0, 'default.jpg'),
(470, 4, '290', '1', '150000000', 0, 0, 470, 1, 0, 'default.jpg'),
(471, 4, '291', '1', '150000000', 0, 0, 471, 1, 0, 'default.jpg'),
(472, 4, '292', '1', '150000000', 0, 0, 472, 1, 0, 'default.jpg'),
(473, 4, '293', '1', '150000000', 1, 458, 473, 1, 0, 'default.jpg'),
(474, 4, '294', '1', '150000000', 1, 197, 474, 1, 0, 'default.jpg'),
(475, 4, '295', '1', '150000000', 0, 0, 475, 1, 0, 'default.jpg'),
(476, 4, '296', '1', '150000000', 0, 0, 476, 1, 0, 'default.jpg'),
(477, 4, '297', '1', '150000000', 0, 0, 477, 1, 0, 'default.jpg'),
(478, 4, '298', '1', '150000000', 0, 0, 478, 1, 0, 'default.jpg'),
(479, 4, '299', '1', '150000000', 0, 0, 479, 1, 0, 'default.jpg'),
(480, 4, '300', '1', '150000000', 0, 0, 480, 1, 0, 'default.jpg'),
(481, 4, '301', '1', '150000000', 0, 0, 481, 1, 0, 'default.jpg'),
(482, 4, '302', '1', '150000000', 0, 0, 482, 1, 0, 'default.jpg'),
(483, 4, '303', '1', '150000000', 0, 0, 483, 1, 0, 'default.jpg'),
(484, 4, '304', '1', '150000000', 0, 0, 484, 1, 0, 'default.jpg'),
(485, 4, '305', '1', '150000000', 0, 0, 485, 1, 0, 'default.jpg'),
(486, 4, '306', '1', '150000000', 0, 0, 486, 1, 0, 'default.jpg'),
(487, 4, '307', '1', '150000000', 0, 0, 487, 1, 0, 'default.jpg'),
(488, 4, '308', '1', '150000000', 0, 0, 488, 1, 0, 'default.jpg'),
(489, 4, '309', '1', '150000000', 0, 0, 489, 1, 0, 'default.jpg'),
(490, 4, '310', '1', '150000000', 0, 0, 490, 1, 0, 'default.jpg'),
(1204, 5, '001', '0', '100000000', 1, 408, 1204, 1, 0, 'default.jpg'),
(1205, 5, '002', '0', '100000000', 1, 72, 1205, 1, 0, 'default.jpg'),
(1206, 5, '003', '0', '100000000', 1, 245, 1206, 1, 0, 'default.jpg'),
(1207, 5, '004', '0', '100000000', 1, 624, 1207, 1, 0, 'default.jpg'),
(1208, 5, '005', '0', '100000000', 1, 117, 1208, 1, 0, 'default.jpg'),
(1209, 5, '006', '0', '100000000', 1, 255, 1209, 2, 0, 'default.jpg'),
(1210, 5, '007', '0', '100000000', 1, 339, 1209, 1, 0, 'default.jpg'),
(1211, 5, '008', '0', '100000000', 1, 171, 1211, 2, 0, 'default.jpg'),
(1212, 5, '009', '0', '100000000', 1, 171, 1211, 1, 0, 'default.jpg'),
(1213, 5, '010', '0', '100000000', 1, 270, 1213, 1, 0, 'default.jpg'),
(1214, 5, '011', '0', '100000000', 0, 0, 1214, 1, 0, 'default.jpg'),
(1215, 5, '012', '0', '100000000', 1, 81, 1215, 1, 0, 'default.jpg'),
(1216, 5, '013', '0', '100000000', 1, 81, 1216, 1, 0, 'default.jpg'),
(1217, 5, '014', '0', '100000000', 1, 7, 1217, 1, 0, 'default.jpg'),
(1218, 5, '015', '0', '100000000', 1, 140, 224, 1, 0, 'default.jpg'),
(1219, 5, '016', '0', '100000000', 1, 652, 1219, 1, 0, 'default.jpg'),
(1220, 5, '017', '0', '100000000', 1, 54, 1220, 1, 0, 'default.jpg'),
(1221, 5, '018', '0', '100000000', 1, 474, 1221, 1, 0, 'default.jpg'),
(1222, 5, '019', '0', '100000000', 1, 142, 1222, 1, 0, 'default.jpg'),
(1223, 5, '020', '0', '100000000', 0, 0, 1223, 1, 0, 'default.jpg'),
(1224, 5, '021', '0', '100000000', 1, 171, 1211, 1, 0, 'default.jpg'),
(1225, 5, '022', '0', '100000000', 1, 367, 1225, 1, 0, 'default.jpg'),
(1226, 5, '023', '0', '100000000', 1, 281, 1226, 1, 0, 'default.jpg'),
(1227, 5, '024', '0', '100000000', 1, 281, 1227, 1, 0, 'default.jpg'),
(1228, 5, '025', '0', '100000000', 1, 624, 1228, 1, 0, 'default.jpg'),
(1229, 5, '026', '0', '100000000', 0, 0, 1229, 1, 0, 'default.jpg'),
(1230, 5, '027', '0', '100000000', 1, 631, 1230, 2, 0, 'default.jpg'),
(1231, 5, '028', '0', '100000000', 1, 631, 1230, 1, 0, 'default.jpg'),
(1232, 5, '029', '0', '100000000', 0, 0, 1232, 1, 0, 'default.jpg'),
(1233, 5, '030', '0', '100000000', 0, 0, 1233, 1, 0, 'default.jpg'),
(1234, 5, '031', '0', '100000000', 1, 19, 1234, 1, 0, 'default.jpg'),
(1235, 5, '032', '0', '100000000', 1, 19, 1235, 1, 0, 'default.jpg'),
(1236, 5, '033', '0', '100000000', 1, 279, 1236, 1, 0, 'default.jpg'),
(1237, 5, '034', '0', '100000000', 1, 445, 1237, 1, 0, 'default.jpg'),
(1238, 5, '035', '0', '100000000', 1, 539, 1238, 1, 0, 'default.jpg'),
(1239, 5, '036', '0', '100000000', 1, 113, 1239, 2, 0, 'default.jpg'),
(1240, 5, '037', '0', '100000000', 1, 113, 1239, 1, 0, 'default.jpg'),
(1241, 5, '038', '0', '100000000', 1, 17, 1241, 2, 0, 'default.jpg'),
(1242, 5, '039', '0', '100000000', 1, 17, 1241, 1, 0, 'default.jpg'),
(1243, 5, '040', '0', '100000000', 1, 611, 1243, 1, 0, 'default.jpg'),
(1244, 5, '041', '0', '100000000', 1, 432, 1244, 2, 0, 'default.jpg'),
(1245, 5, '042', '0', '100000000', 1, 432, 1244, 1, 0, 'default.jpg'),
(1246, 5, '043', '0', '100000000', 1, 432, 1244, 1, 0, 'default.jpg'),
(1247, 5, '044', '0', '100000000', 1, 106, 1247, 2, 0, 'default.jpg'),
(1248, 5, '045', '0', '100000000', 1, 106, 1247, 1, 0, 'default.jpg'),
(1249, 5, '046', '0', '100000000', 1, 106, 1247, 1, 0, 'default.jpg'),
(1250, 5, '047', '0', '100000000', 1, 362, 1250, 1, 0, 'default.jpg'),
(1251, 5, '048', '0', '100000000', 1, 227, 1251, 2, 0, 'default.jpg'),
(1252, 5, '049', '0', '100000000', 1, 227, 1251, 1, 0, 'default.jpg'),
(1253, 5, '050', '0', '100000000', 1, 227, 1251, 1, 0, 'default.jpg'),
(1254, 5, '051', '0', '100000000', 1, 113, 1239, 1, 0, 'default.jpg'),
(1255, 5, '052', '0', '100000000', 1, 139, 1255, 1, 0, 'default.jpg'),
(1256, 5, '053', '0', '100000000', 1, 498, 1256, 1, 0, 'default.jpg'),
(1257, 5, '054', '0', '100000000', 1, 531, 1257, 1, 0, 'default.jpg'),
(1258, 5, '055', '0', '100000000', 1, 585, 1258, 1, 0, 'default.jpg'),
(1259, 5, '056', '0', '100000000', 1, 192, 1259, 1, 0, 'default.jpg'),
(1260, 5, '057', '0', '100000000', 1, 517, 1260, 2, 0, 'default.jpg'),
(1261, 5, '058', '0', '100000000', 1, 517, 1260, 1, 0, 'default.jpg'),
(1262, 5, '059', '0', '100000000', 1, 667, 1262, 1, 0, 'default.jpg'),
(1263, 5, '060', '0', '100000000', 1, 230, 1263, 2, 0, 'default.jpg'),
(1264, 5, '061', '0', '100000000', 1, 230, 1263, 1, 0, 'default.jpg'),
(1265, 5, '062', '0', '100000000', 1, 493, 1265, 1, 0, 'default.jpg'),
(1266, 5, '063', '0', '100000000', 1, 230, 1263, 1, 0, 'default.jpg'),
(1267, 5, '064', '0', '100000000', 1, 230, 1263, 1, 0, 'default.jpg'),
(1268, 5, '065', '0', '100000000', 1, 137, 1268, 1, 0, 'default.jpg'),
(1269, 5, '066', '0', '100000000', 1, 495, 1269, 1, 0, 'default.jpg'),
(1270, 5, '067', '0', '100000000', 1, 592, 1270, 2, 0, 'default.jpg'),
(1271, 5, '068', '0', '100000000', 0, 0, 1271, 1, 0, 'default.jpg'),
(1272, 5, '069', '0', '100000000', 1, 401, 1272, 1, 0, 'default.jpg'),
(1273, 5, '070', '0', '100000000', 1, 401, 1272, 1, 0, 'default.jpg'),
(1274, 5, '071', '0', '100000000', 1, 439, 1274, 1, 0, 'default.jpg'),
(1275, 5, '072', '0', '100000000', 0, 0, 1275, 1, 0, 'default.jpg'),
(1276, 5, '073', '0', '100000000', 0, 0, 1276, 1, 0, 'default.jpg'),
(1277, 5, '074', '0', '100000000', 0, 0, 1277, 1, 0, 'default.jpg'),
(1278, 5, '075', '0', '100000000', 1, 640, 1278, 1, 0, 'default.jpg'),
(1279, 5, '076', '0', '100000000', 1, 639, 1279, 1, 0, 'default.jpg'),
(1280, 5, '077', '0', '100000000', 1, 467, 1280, 1, 0, 'default.jpg'),
(1281, 5, '078', '0', '100000000', 1, 198, 1281, 1, 0, 'default.jpg'),
(1282, 5, '079', '0', '100000000', 1, 438, 1282, 1, 0, 'default.jpg'),
(1283, 5, '080', '0', '100000000', 1, 520, 1283, 1, 0, 'default.jpg'),
(1284, 5, '081', '0', '100000000', 1, 455, 1284, 1, 0, 'default.jpg'),
(1285, 5, '082', '0', '100000000', 1, 257, 1285, 1, 0, 'default.jpg'),
(1286, 5, '083', '0', '100000000', 1, 22, 1286, 1, 0, 'default.jpg'),
(1287, 5, '084', '0', '100000000', 1, 249, 1287, 1, 0, 'default.jpg'),
(1288, 5, '085', '0', '100000000', 1, 249, 1288, 1, 0, 'default.jpg'),
(1289, 5, '086', '0', '100000000', 1, 249, 1289, 1, 0, 'default.jpg'),
(1290, 5, '087', '0', '100000000', 1, 394, 1290, 1, 0, 'default.jpg'),
(1291, 5, '088', '0', '100000000', 1, 256, 1291, 1, 0, 'default.jpg'),
(1292, 5, '089', '0', '100000000', 1, 39, 1292, 2, 0, 'default.jpg'),
(1293, 5, '090', '0', '100000000', 1, 39, 1292, 1, 0, 'default.jpg'),
(1294, 5, '091', '0', '100000000', 0, 0, 1294, 1, 0, 'default.jpg'),
(1295, 5, '092', '0', '100000000', 0, 0, 1295, 1, 0, 'default.jpg'),
(1296, 5, '093', '0', '100000000', 1, 549, 1296, 1, 0, 'default.jpg'),
(1297, 5, '094', '0', '100000000', 1, 29, 1297, 2, 0, 'default.jpg'),
(1298, 5, '095', '0', '100000000', 1, 29, 1297, 1, 0, 'default.jpg'),
(1299, 5, '096', '0', '100000000', 1, 669, 1299, 1, 0, 'default.jpg'),
(1300, 5, '097', '0', '100000000', 1, 103, 1300, 1, 0, 'default.jpg'),
(1301, 5, '098', '0', '100000000', 1, 90, 1301, 1, 0, 'default.jpg'),
(1302, 5, '099', '0', '100000000', 0, 0, 1302, 1, 0, 'default.jpg'),
(1303, 5, '100', '0', '100000000', 1, 75, 1303, 1, 0, 'default.jpg'),
(1304, 5, '101', '0', '100000000', 1, 397, 1304, 1, 0, 'default.jpg'),
(1305, 5, '102', '0', '100000000', 1, 185, 1305, 1, 0, 'default.jpg'),
(1306, 5, '103', '0', '100000000', 1, 672, 1306, 2, 0, 'default.jpg'),
(1307, 5, '104', '0', '100000000', 1, 672, 1306, 1, 0, 'default.jpg'),
(1308, 5, '105', '0', '100000000', 1, 109, 1308, 1, 0, 'default.jpg'),
(1309, 5, '106', '0', '100000000', 1, 538, 1309, 1, 0, 'default.jpg'),
(1310, 5, '107', '0', '100000000', 1, 217, 1310, 2, 0, 'default.jpg'),
(1311, 5, '108', '0', '100000000', 1, 217, 1310, 1, 0, 'default.jpg'),
(1312, 5, '109', '0', '100000000', 1, 63, 1312, 2, 0, 'default.jpg'),
(1313, 5, '110', '0', '100000000', 1, 63, 1312, 1, 0, 'default.jpg'),
(1314, 5, '111', '0', '100000000', 1, 93, 1314, 1, 0, 'default.jpg'),
(1315, 5, '112', '0', '100000000', 1, 93, 1315, 1, 0, 'default.jpg'),
(1316, 5, '113', '0', '100000000', 1, 408, 1316, 1, 0, 'default.jpg'),
(1317, 5, '114', '0', '100000000', 1, 518, 1317, 1, 0, 'default.jpg'),
(1318, 5, '115', '0', '100000000', 1, 466, 1318, 1, 0, 'default.jpg'),
(1319, 5, '116', '0', '100000000', 1, 271, 1319, 2, 0, 'default.jpg'),
(1320, 5, '117', '0', '100000000', 1, 271, 1319, 1, 0, 'default.jpg'),
(1321, 5, '118', '0', '100000000', 1, 403, 1321, 2, 0, 'default.jpg'),
(1322, 5, '119', '0', '100000000', 1, 403, 1321, 1, 0, 'default.jpg'),
(1323, 5, '120', '0', '100000000', 1, 403, 1321, 1, 0, 'default.jpg'),
(1324, 5, '121', '0', '100000000', 1, 403, 1321, 1, 0, 'default.jpg'),
(1325, 5, '122', '0', '100000000', 1, 58, 1325, 1, 0, 'default.jpg'),
(1326, 5, '123', '0', '100000000', 1, 628, 1326, 2, 0, 'default.jpg'),
(1327, 5, '124', '0', '100000000', 1, 628, 1326, 1, 0, 'default.jpg'),
(1328, 5, '125', '0', '100000000', 1, 277, 1328, 2, 0, 'default.jpg'),
(1329, 5, '126', '0', '100000000', 1, 277, 1328, 1, 0, 'default.jpg'),
(1330, 5, '127', '0', '100000000', 1, 125, 1330, 1, 0, 'default.jpg'),
(1331, 5, '128', '0', '100000000', 1, 59, 1331, 1, 0, 'default.jpg'),
(1332, 5, '129', '0', '100000000', 1, 506, 1332, 2, 0, 'default.jpg'),
(1333, 5, '130', '0', '100000000', 1, 506, 1332, 1, 0, 'default.jpg'),
(1334, 5, '131', '0', '100000000', 1, 530, 1334, 1, 0, 'default.jpg'),
(1335, 5, '132', '0', '100000000', 1, 524, 1334, 1, 0, 'default.jpg'),
(1336, 5, '133', '0', '100000000', 1, 181, 1336, 2, 0, 'default.jpg'),
(1337, 5, '134', '0', '100000000', 1, 124, 1337, 1, 0, 'default.jpg'),
(1338, 5, '135', '0', '100000000', 1, 621, 1338, 1, 0, 'default.jpg'),
(1339, 5, '136', '0', '100000000', 1, 5, 1336, 1, 0, 'default.jpg'),
(1340, 5, '137', '0', '100000000', 1, 327, 1340, 2, 0, 'default.jpg'),
(1341, 5, '138', '0', '100000000', 1, 327, 1340, 1, 0, 'default.jpg'),
(1342, 5, '139', '0', '100000000', 1, 86, 1342, 2, 0, 'default.jpg'),
(1343, 5, '140', '0', '100000000', 1, 86, 1342, 1, 0, 'default.jpg'),
(1344, 5, '141', '0', '100000000', 1, 620, 1344, 1, 0, 'default.jpg'),
(1345, 5, '142', '0', '100000000', 1, 609, 1345, 2, 0, 'default.jpg'),
(1346, 5, '143', '0', '100000000', 1, 609, 1345, 1, 0, 'default.jpg'),
(1347, 5, '144', '0', '100000000', 1, 440, 1347, 1, 0, 'default.jpg'),
(1348, 5, '145', '0', '100000000', 1, 446, 1348, 1, 0, 'default.jpg'),
(1349, 5, '146', '0', '100000000', 1, 192, 1349, 1, 0, 'default.jpg'),
(1350, 5, '147', '0', '100000000', 1, 186, 1350, 4, 0, 'default.jpg'),
(1351, 5, '148', '0', '100000000', 1, 186, 1350, 1, 0, 'default.jpg'),
(1352, 5, '149', '0', '100000000', 1, 174, 1352, 1, 0, 'default.jpg'),
(1353, 5, '150', '0', '100000000', 1, 591, 1353, 1, 0, 'default.jpg'),
(1354, 5, '151', '0', '100000000', 1, 15, 1354, 1, 0, 'default.jpg'),
(1355, 5, '152', '0', '100000000', 1, 550, 1355, 1, 0, 'default.jpg'),
(1356, 5, '153', '0', '100000000', 1, 258, 1356, 2, 0, 'default.jpg'),
(1357, 5, '154', '0', '100000000', 1, 258, 1356, 1, 0, 'default.jpg'),
(1358, 5, '155', '0', '100000000', 1, 451, 1358, 1, 0, 'default.jpg'),
(1359, 5, '156', '0', '100000000', 1, 318, 1359, 1, 0, 'default.jpg'),
(1360, 5, '157', '0', '100000000', 1, 88, 1360, 1, 0, 'default.jpg'),
(1361, 5, '158', '0', '100000000', 1, 461, 1361, 1, 0, 'default.jpg'),
(1362, 5, '159', '0', '100000000', 1, 594, 1362, 1, 0, 'default.jpg'),
(1363, 5, '160', '0', '100000000', 1, 594, 1362, 1, 0, 'default.jpg'),
(1364, 5, '161', '0', '100000000', 1, 384, 1364, 1, 0, 'default.jpg'),
(1365, 5, '162', '0', '100000000', 1, 391, 1365, 1, 0, 'default.jpg'),
(1366, 5, '163', '0', '100000000', 1, 508, 1366, 2, 0, 'default.jpg'),
(1367, 5, '164', '0', '100000000', 1, 508, 1366, 1, 0, 'default.jpg'),
(1368, 5, '165', '0', '100000000', 1, 43, 1368, 1, 0, 'default.jpg'),
(1369, 5, '166', '0', '100000000', 1, 76, 1369, 3, 0, 'default.jpg'),
(1370, 5, '167', '0', '100000000', 1, 475, 1370, 1, 0, 'default.jpg'),
(1371, 5, '168', '0', '100000000', 1, 475, 1370, 1, 0, 'default.jpg'),
(1372, 5, '169', '0', '100000000', 1, 588, 1372, 2, 0, 'default.jpg'),
(1373, 5, '170', '0', '100000000', 1, 588, 1372, 1, 0, 'default.jpg'),
(1374, 5, '171', '0', '100000000', 1, 594, 1374, 2, 0, 'default.jpg'),
(1375, 5, '172', '0', '100000000', 1, 594, 1374, 1, 0, 'default.jpg'),
(1376, 5, '173', '0', '100000000', 1, 594, 1374, 1, 0, 'default.jpg'),
(1377, 5, '174', '0', '100000000', 1, 594, 1374, 1, 0, 'default.jpg'),
(1378, 5, '175', '0', '100000000', 1, 461, 1378, 1, 0, 'default.jpg'),
(1379, 5, '176', '0', '100000000', 1, 471, 1379, 1, 0, 'default.jpg'),
(1380, 5, '177', '0', '100000000', 1, 387, 1380, 2, 0, 'default.jpg'),
(1381, 5, '178', '0', '100000000', 1, 387, 1380, 1, 0, 'default.jpg'),
(1382, 5, '179', '0', '100000000', 1, 521, 1382, 1, 0, 'default.jpg'),
(1383, 5, '180', '0', '100000000', 1, 670, 1383, 2, 0, 'default.jpg'),
(1384, 5, '181', '1', '100000000', 0, 0, 1384, 1, 0, 'default.jpg'),
(1385, 5, '182', '1', '100000000', 0, 0, 1385, 1, 0, 'default.jpg'),
(1386, 5, '183', '1', '100000000', 0, 0, 1386, 1, 0, 'default.jpg'),
(1387, 5, '184', '1', '100000000', 0, 0, 1387, 1, 0, 'default.jpg'),
(1388, 5, '185', '1', '100000000', 0, 0, 1388, 1, 0, 'default.jpg'),
(1389, 5, '186', '1', '100000000', 0, 0, 1389, 1, 0, 'default.jpg'),
(1390, 5, '187', '1', '100000000', 1, 52, 1390, 1, 0, 'default.jpg'),
(1391, 5, '188', '1', '100000000', 0, 0, 1391, 1, 0, 'default.jpg'),
(1392, 5, '189', '1', '100000000', 1, 182, 1392, 2, 0, 'default.jpg'),
(1393, 5, '190', '1', '100000000', 1, 462, 1393, 1, 0, 'default.jpg'),
(1394, 5, '191', '1', '100000000', 0, 0, 1394, 1, 0, 'default.jpg'),
(1395, 5, '192', '1', '100000000', 0, 0, 1394, 1, 0, 'default.jpg'),
(1396, 5, '193', '1', '100000000', 0, 0, 1394, 1, 0, 'default.jpg'),
(1397, 5, '194', '1', '100000000', 0, 0, 1394, 1, 0, 'default.jpg'),
(1398, 5, '195', '1', '100000000', 0, 0, 1394, 1, 0, 'default.jpg'),
(1399, 5, '196', '1', '100000000', 0, 0, 1399, 1, 0, 'default.jpg'),
(1400, 5, '197', '1', '100000000', 0, 0, 1399, 1, 0, 'default.jpg'),
(1401, 5, '198', '1', '100000000', 0, 0, 1399, 1, 0, 'default.jpg'),
(1402, 5, '199', '1', '100000000', 0, 0, 1399, 1, 0, 'default.jpg'),
(1403, 5, '200', '1', '100000000', 0, 0, 1399, 1, 0, 'default.jpg'),
(1404, 5, '201', '1', '100000000', 1, 651, 1404, 1, 0, 'default.jpg'),
(1405, 5, '202', '1', '100000000', 0, 0, 1405, 1, 0, 'default.jpg'),
(1406, 5, '203', '1', '100000000', 0, 0, 1406, 1, 0, 'default.jpg'),
(1407, 5, '204', '1', '100000000', 0, 0, 1407, 1, 0, 'default.jpg'),
(1408, 5, '205', '1', '100000000', 0, 0, 1408, 1, 0, 'default.jpg'),
(1409, 5, '206', '1', '100000000', 0, 0, 1409, 1, 0, 'default.jpg'),
(1410, 5, '207', '1', '100000000', 0, 0, 1410, 1, 0, 'default.jpg'),
(1411, 5, '208', '1', '100000000', 0, 0, 1411, 1, 0, 'default.jpg'),
(1412, 5, '209', '1', '100000000', 0, 0, 1412, 1, 0, 'default.jpg'),
(1413, 5, '210', '1', '100000000', 0, 0, 1413, 1, 0, 'default.jpg'),
(1459, 5, '073A', '0', '112000000', 0, 0, 1459, 1, 0, 'default.jpg'),
(1460, 5, '074A', '0', '112000000', 0, 0, 1460, 1, 0, 'default.jpg'),
(1462, 6, '002', '0', '68000000', 1, 435, 47, 1, 0, 'default.jpg'),
(1463, 6, '003', '0', '68000000', 1, 653, 1463, 1, 0, 'default.jpg'),
(1464, 6, '004', '0', '68000000', 1, 488, 1464, 1, 0, 'default.jpg'),
(1465, 6, '005', '0', '68000000', 1, 635, 1465, 1, 0, 'default.jpg'),
(1466, 6, '006', '0', '68000000', 1, 11, 1466, 1, 0, 'default.jpg'),
(1467, 6, '007', '0', '68000000', 1, 442, 1467, 1, 0, 'default.jpg'),
(1468, 6, '008', '0', '68000000', 1, 395, 1468, 1, 0, 'default.jpg'),
(1469, 6, '009', '0', '68000000', 1, 395, 1469, 1, 0, 'default.jpg'),
(1470, 6, '010', '0', '68000000', 1, 412, 1470, 1, 0, 'default.jpg'),
(1471, 6, '011', '0', '68000000', 1, 360, 1471, 1, 0, 'default.jpg'),
(1472, 6, '012', '0', '68000000', 1, 360, 1472, 1, 0, 'default.jpg'),
(1473, 6, '013', '0', '68000000', 1, 125, 1473, 1, 0, 'default.jpg'),
(1474, 6, '014', '0', '68000000', 1, 125, 1473, 1, 0, 'default.jpg'),
(1475, 6, '015', '0', '68000000', 1, 214, 1475, 1, 0, 'default.jpg'),
(1476, 6, '016', '0', '68000000', 1, 262, 1476, 1, 0, 'default.jpg'),
(1477, 6, '017', '0', '68000000', 1, 111, 1477, 1, 0, 'default.jpg'),
(1478, 6, '018', '0', '68000000', 1, 31, 1478, 1, 0, 'default.jpg'),
(1479, 6, '019', '0', '68000000', 1, 430, 1479, 1, 0, 'default.jpg'),
(1480, 6, '020', '0', '68000000', 1, 391, 1480, 1, 0, 'default.jpg'),
(1481, 6, '021', '0', '68000000', 1, 581, 1481, 1, 0, 'default.jpg'),
(1482, 6, '022', '0', '68000000', 1, 167, 1482, 1, 0, 'default.jpg'),
(1483, 6, '023', '0', '68000000', 1, 668, 1483, 1, 0, 'default.jpg'),
(1484, 6, '024', '0', '68000000', 1, 427, 1484, 1, 0, 'default.jpg'),
(1485, 6, '025', '0', '68000000', 1, 263, 1485, 1, 0, 'default.jpg'),
(1486, 6, '026', '0', '68000000', 1, 219, 1486, 1, 0, 'default.jpg'),
(1487, 6, '027', '0', '68000000', 1, 413, 1487, 1, 0, 'default.jpg'),
(1488, 6, '028', '0', '68000000', 1, 357, 1488, 1, 0, 'default.jpg'),
(1489, 6, '029', '0', '68000000', 1, 190, 1489, 1, 0, 'default.jpg'),
(1490, 6, '030', '0', '68000000', 1, 190, 1490, 1, 0, 'default.jpg'),
(1491, 6, '031', '0', '68000000', 1, 42, 1491, 1, 0, 'default.jpg'),
(1492, 6, '032', '0', '68000000', 1, 380, 1492, 1, 0, 'default.jpg'),
(1493, 6, '033', '0', '68000000', 1, 340, 1493, 1, 0, 'default.jpg'),
(1494, 6, '034', '0', '68000000', 1, 602, 1494, 1, 0, 'default.jpg'),
(1495, 6, '035', '0', '68000000', 1, 602, 1494, 1, 0, 'default.jpg'),
(1496, 6, '036', '0', '68000000', 1, 76, 1496, 1, 0, 'default.jpg'),
(1497, 6, '037', '0', '68000000', 1, 607, 1497, 1, 0, 'default.jpg'),
(1498, 6, '038', '0', '68000000', 1, 607, 1498, 1, 0, 'default.jpg'),
(1499, 6, '039', '0', '68000000', 1, 551, 1499, 1, 0, 'default.jpg'),
(1500, 6, '040', '0', '68000000', 1, 492, 1500, 1, 0, 'default.jpg'),
(1501, 6, '041', '0', '68000000', 1, 210, 1501, 1, 0, 'default.jpg'),
(1502, 6, '042', '0', '68000000', 1, 210, 1502, 1, 0, 'default.jpg'),
(1503, 6, '043', '0', '68000000', 1, 76, 1503, 1, 0, 'default.jpg'),
(1504, 6, '044', '0', '68000000', 1, 408, 1504, 1, 0, 'default.jpg'),
(1505, 6, '045', '0', '68000000', 1, 613, 1505, 1, 0, 'default.jpg'),
(1506, 6, '046', '0', '68000000', 1, 214, 1506, 1, 0, 'default.jpg'),
(1507, 6, '047', '0', '68000000', 1, 346, 1507, 1, 0, 'default.jpg'),
(1508, 6, '048', '0', '68000000', 1, 475, 1508, 1, 0, 'default.jpg'),
(1509, 6, '049', '0', '68000000', 1, 475, 1509, 1, 0, 'default.jpg'),
(1510, 6, '050', '0', '68000000', 1, 551, 1510, 1, 0, 'default.jpg'),
(1511, 6, '051', '0', '68000000', 1, 551, 1511, 1, 0, 'default.jpg'),
(1512, 6, '052', '0', '68000000', 1, 540, 1512, 1, 0, 'default.jpg'),
(1513, 6, '053', '0', '68000000', 1, 540, 1513, 1, 0, 'default.jpg'),
(1514, 6, '054', '0', '68000000', 1, 23, 1514, 1, 0, 'default.jpg'),
(1515, 6, '055', '0', '68000000', 1, 602, 1515, 1, 0, 'default.jpg'),
(1516, 6, '056', '0', '68000000', 1, 70, 1516, 1, 0, 'default.jpg'),
(1517, 6, '057', '0', '68000000', 1, 426, 1517, 1, 0, 'default.jpg'),
(1518, 6, '058', '0', '68000000', 1, 489, 1518, 1, 0, 'default.jpg'),
(1519, 6, '059', '0', '68000000', 1, 90, 1519, 1, 0, 'default.jpg'),
(1520, 6, '060', '0', '68000000', 1, 267, 1520, 1, 0, 'default.jpg'),
(1521, 6, '061', '0', '68000000', 1, 90, 1521, 3, 0, 'default.jpg'),
(1522, 6, '062', '0', '68000000', 1, 276, 1522, 1, 0, 'default.jpg'),
(1523, 6, '063', '0', '68000000', 1, 175, 1523, 1, 0, 'default.jpg'),
(1524, 6, '064', '0', '68000000', 1, 594, 1524, 1, 0, 'default.jpg'),
(1525, 6, '065', '0', '68000000', 1, 76, 1525, 1, 0, 'default.jpg'),
(1526, 6, '066', '0', '68000000', 1, 345, 1526, 1, 0, 'default.jpg'),
(1527, 6, '067', '0', '68000000', 1, 348, 1527, 1, 0, 'default.jpg'),
(1528, 6, '068', '0', '68000000', 1, 551, 1528, 1, 0, 'default.jpg'),
(1529, 6, '069', '0', '68000000', 1, 563, 1529, 1, 0, 'default.jpg'),
(1530, 6, '070', '0', '68000000', 1, 67, 1530, 1, 0, 'default.jpg'),
(1531, 6, '071', '0', '68000000', 1, 67, 1531, 1, 0, 'default.jpg'),
(1532, 6, '072', '0', '68000000', 1, 537, 1532, 1, 0, 'default.jpg'),
(1533, 6, '073', '0', '68000000', 1, 76, 1533, 1, 0, 'default.jpg'),
(1534, 6, '074', '0', '68000000', 1, 515, 1534, 1, 0, 'default.jpg'),
(1535, 6, '075', '0', '68000000', 1, 268, 1535, 1, 0, 'default.jpg'),
(1536, 6, '076', '0', '68000000', 1, 14, 1536, 1, 0, 'default.jpg'),
(1537, 6, '077', '0', '68000000', 1, 551, 1537, 1, 0, 'default.jpg'),
(1538, 6, '078', '0', '68000000', 1, 634, 1538, 1, 0, 'default.jpg'),
(1539, 6, '079', '0', '68000000', 1, 157, 1539, 1, 0, 'default.jpg'),
(1540, 6, '080', '0', '68000000', 1, 157, 1540, 1, 0, 'default.jpg'),
(1541, 6, '081', '0', '68000000', 1, 562, 1541, 1, 0, 'default.jpg'),
(1542, 6, '082', '0', '68000000', 1, 578, 1542, 2, 0, 'default.jpg'),
(1543, 6, '083', '0', '68000000', 1, 578, 1542, 1, 0, 'default.jpg'),
(1544, 6, '084', '0', '68000000', 1, 70, 1544, 1, 0, 'default.jpg'),
(1545, 6, '085', '0', '68000000', 1, 55, 1545, 1, 0, 'default.jpg'),
(1546, 6, '086', '0', '68000000', 1, 544, 1546, 1, 0, 'default.jpg'),
(1547, 6, '087', '0', '68000000', 1, 524, 1547, 1, 0, 'default.jpg'),
(1548, 6, '088', '0', '68000000', 1, 524, 1548, 1, 0, 'default.jpg'),
(1549, 6, '089', '0', '68000000', 1, 271, 1549, 1, 0, 'default.jpg'),
(1550, 6, '090', '0', '68000000', 1, 130, 1550, 1, 0, 'default.jpg'),
(1551, 6, '091', '0', '68000000', 1, 26, 1551, 2, 0, 'default.jpg'),
(1552, 6, '092', '0', '68000000', 1, 125, 1552, 1, 0, 'default.jpg'),
(1553, 6, '093', '0', '68000000', 1, 125, 1552, 1, 0, 'default.jpg'),
(1554, 6, '094', '0', '68000000', 1, 41, 1554, 1, 0, 'default.jpg'),
(1555, 6, '095', '0', '68000000', 1, 361, 1555, 1, 0, 'default.jpg'),
(1556, 6, '096', '0', '68000000', 1, 413, 1556, 1, 0, 'default.jpg'),
(1557, 6, '097', '0', '68000000', 1, 122, 1557, 1, 0, 'default.jpg'),
(1558, 6, '098', '0', '68000000', 1, 122, 1558, 1, 0, 'default.jpg'),
(1559, 6, '099', '0', '68000000', 1, 327, 1559, 1, 0, 'default.jpg'),
(1560, 6, '100', '0', '68000000', 1, 327, 1560, 1, 0, 'default.jpg'),
(1561, 6, '101', '0', '68000000', 1, 357, 1561, 1, 0, 'default.jpg'),
(1562, 6, '102', '0', '68000000', 1, 347, 1562, 1, 0, 'default.jpg'),
(1563, 6, '103', '0', '68000000', 1, 513, 1563, 1, 0, 'default.jpg'),
(1564, 6, '104', '0', '68000000', 1, 513, 1564, 1, 0, 'default.jpg'),
(1565, 6, '105', '0', '68000000', 1, 343, 1565, 1, 0, 'default.jpg'),
(1566, 6, '106', '0', '68000000', 1, 343, 1566, 1, 0, 'default.jpg'),
(1567, 6, '107', '0', '68000000', 1, 633, 1567, 1, 0, 'default.jpg'),
(1568, 6, '108', '0', '68000000', 1, 214, 1568, 1, 0, 'default.jpg'),
(1569, 6, '109', '0', '68000000', 1, 605, 1569, 1, 0, 'default.jpg'),
(1570, 6, '110', '0', '68000000', 1, 510, 1570, 2, 0, 'default.jpg'),
(1571, 6, '111', '0', '68000000', 1, 510, 1570, 1, 0, 'default.jpg'),
(1572, 6, '112', '0', '68000000', 1, 357, 1572, 1, 0, 'default.jpg'),
(1573, 6, '113', '0', '68000000', 1, 192, 1573, 1, 0, 'default.jpg'),
(1574, 6, '114', '0', '68000000', 1, 192, 1574, 1, 0, 'default.jpg'),
(1575, 6, '115', '0', '68000000', 1, 95, 1575, 2, 0, 'default.jpg'),
(1576, 6, '116', '0', '68000000', 1, 334, 1576, 1, 0, 'default.jpg'),
(1577, 6, '117', '0', '68000000', 1, 535, 1577, 1, 0, 'default.jpg'),
(1578, 6, '118', '0', '68000000', 1, 337, 1578, 1, 0, 'default.jpg'),
(1579, 6, '119', '0', '68000000', 1, 66, 1579, 1, 0, 'default.jpg'),
(1580, 6, '120', '0', '68000000', 1, 370, 1580, 1, 0, 'default.jpg'),
(1581, 6, '121', '0', '68000000', 1, 315, 1581, 1, 0, 'default.jpg'),
(1582, 6, '122', '0', '68000000', 1, 315, 1582, 1, 0, 'default.jpg'),
(1583, 6, '123', '0', '68000000', 1, 637, 1583, 2, 0, 'default.jpg');
INSERT INTO `kios` (`id`, `blok_id`, `nomor`, `lantai`, `harga`, `status`, `pedagang_id`, `link`, `listrik`, `air`, `foto`) VALUES
(1584, 6, '124', '0', '68000000', 1, 637, 1583, 1, 0, 'default.jpg'),
(1585, 6, '125', '0', '68000000', 1, 559, 1585, 1, 0, 'default.jpg'),
(1586, 6, '126', '0', '68000000', 1, 559, 1586, 1, 0, 'default.jpg'),
(1587, 6, '127', '0', '68000000', 1, 238, 1587, 1, 0, 'default.jpg'),
(1588, 6, '128', '0', '68000000', 1, 238, 1588, 1, 0, 'default.jpg'),
(1589, 6, '129', '0', '68000000', 1, 238, 1589, 1, 0, 'default.jpg'),
(1590, 6, '130', '0', '68000000', 1, 241, 1590, 1, 0, 'default.jpg'),
(1591, 6, '131', '0', '68000000', 1, 241, 1591, 1, 0, 'default.jpg'),
(1592, 6, '132', '0', '68000000', 1, 393, 1592, 1, 0, 'default.jpg'),
(1593, 6, '133', '0', '68000000', 1, 73, 1593, 1, 0, 'default.jpg'),
(1594, 6, '134', '0', '68000000', 1, 73, 1594, 1, 0, 'default.jpg'),
(1595, 6, '135', '0', '68000000', 1, 269, 1595, 1, 0, 'default.jpg'),
(1596, 6, '136', '0', '68000000', 1, 411, 1595, 1, 0, 'default.jpg'),
(1597, 6, '137', '0', '68000000', 1, 519, 1597, 1, 0, 'default.jpg'),
(1598, 6, '138', '0', '68000000', 1, 61, 1598, 1, 0, 'default.jpg'),
(1599, 6, '139', '0', '68000000', 1, 502, 1599, 1, 0, 'default.jpg'),
(1600, 6, '140', '0', '68000000', 1, 61, 1600, 1, 0, 'default.jpg'),
(1601, 6, '141', '0', '68000000', 1, 612, 1601, 1, 0, 'default.jpg'),
(1602, 6, '142', '0', '68000000', 1, 223, 1602, 1, 0, 'default.jpg'),
(1603, 6, '143', '0', '68000000', 1, 95, 1575, 1, 0, 'default.jpg'),
(1604, 6, '144', '0', '68000000', 1, 95, 1575, 1, 0, 'default.jpg'),
(1605, 6, '145', '0', '68000000', 1, 545, 1605, 3, 0, 'default.jpg'),
(1606, 6, '146', '0', '68000000', 1, 8, 1606, 1, 0, 'default.jpg'),
(1607, 6, '147', '0', '68000000', 1, 8, 1606, 1, 0, 'default.jpg'),
(1608, 6, '148', '0', '68000000', 1, 56, 1608, 1, 0, 'default.jpg'),
(1609, 6, '149', '0', '68000000', 1, 56, 1609, 1, 0, 'default.jpg'),
(1610, 6, '150', '0', '68000000', 1, 325, 1610, 1, 0, 'default.jpg'),
(1611, 6, '151', '0', '68000000', 1, 325, 1611, 1, 0, 'default.jpg'),
(1612, 6, '152', '0', '68000000', 1, 189, 1612, 1, 0, 'default.jpg'),
(1613, 6, '153', '0', '68000000', 1, 249, 1613, 1, 0, 'default.jpg'),
(1614, 6, '154', '0', '68000000', 1, 249, 1614, 1, 0, 'default.jpg'),
(1615, 6, '155', '0', '68000000', 1, 249, 1615, 1, 0, 'default.jpg'),
(1616, 6, '156', '0', '68000000', 1, 529, 1616, 1, 0, 'default.jpg'),
(1617, 6, '157', '0', '68000000', 1, 241, 1617, 1, 0, 'default.jpg'),
(1618, 6, '158', '0', '68000000', 1, 241, 1618, 1, 0, 'default.jpg'),
(1619, 6, '159', '0', '68000000', 1, 670, 1619, 1, 0, 'default.jpg'),
(1620, 6, '160', '0', '68000000', 1, 222, 1620, 1, 0, 'default.jpg'),
(1621, 6, '161', '0', '68000000', 1, 258, 1621, 2, 0, 'default.jpg'),
(1622, 6, '162', '0', '68000000', 1, 258, 1621, 1, 0, 'default.jpg'),
(1623, 6, '163', '0', '68000000', 1, 385, 1623, 1, 0, 'default.jpg'),
(1624, 6, '164', '0', '68000000', 1, 385, 1624, 1, 0, 'default.jpg'),
(1625, 6, '165', '0', '68000000', 1, 626, 1625, 1, 0, 'default.jpg'),
(1626, 6, '166', '0', '68000000', 1, 12, 1626, 1, 0, 'default.jpg'),
(1627, 6, '167', '0', '68000000', 1, 12, 1627, 1, 0, 'default.jpg'),
(1628, 6, '168', '0', '68000000', 1, 535, 1628, 1, 0, 'default.jpg'),
(1629, 6, '169', '0', '68000000', 1, 478, 1629, 1, 0, 'default.jpg'),
(1630, 6, '170', '0', '68000000', 1, 630, 1630, 1, 0, 'default.jpg'),
(1631, 6, '171', '0', '68000000', 1, 626, 1631, 1, 0, 'default.jpg'),
(1632, 6, '172', '0', '68000000', 1, 545, 1632, 1, 0, 'default.jpg'),
(1633, 6, '173', '0', '68000000', 1, 1, 1633, 4, 0, 'default.jpg'),
(1716, 7, '001', '0', '74000000', 1, 572, 1716, 2, 0, 'default.jpg'),
(1717, 7, '002', '0', '74000000', 1, 572, 1716, 1, 0, 'default.jpg'),
(1718, 7, '003', '0', '74000000', 0, 0, 1718, 2, 0, 'default.jpg'),
(1719, 7, '004', '0', '74000000', 1, 83, 1718, 1, 0, 'default.jpg'),
(1720, 7, '005', '1', '74000000', 0, 0, 1720, 1, 0, 'default.jpg'),
(1721, 7, '006', '1', '74000000', 0, 0, 1721, 1, 0, 'default.jpg'),
(1722, 7, '007', '1', '74000000', 0, 0, 1722, 1, 0, 'default.jpg'),
(1723, 7, '008', '1', '74000000', 0, 0, 1723, 1, 0, 'default.jpg'),
(1731, 8, '001', '0', '120000000', 1, 583, 1731, 11, 0, 'default.jpg'),
(1732, 8, '002', '0', '120000000', 1, 583, 1731, 1, 0, 'default.jpg'),
(1733, 8, '003', '0', '120000000', 1, 144, 1733, 1, 0, 'default.jpg'),
(1734, 8, '004', '0', '120000000', 1, 613, 1734, 1, 0, 'default.jpg'),
(1735, 8, '005', '0', '120000000', 1, 327, 1735, 1, 0, 'default.jpg'),
(1736, 8, '006', '0', '120000000', 1, 327, 1736, 1, 0, 'default.jpg'),
(1737, 8, '007', '0', '120000000', 1, 327, 1737, 1, 0, 'default.jpg'),
(1738, 8, '008', '0', '120000000', 1, 576, 1738, 10, 0, 'default.jpg'),
(1739, 8, '009', '0', '120000000', 1, 576, 1738, 1, 0, 'default.jpg'),
(1740, 8, '010', '0', '120000000', 1, 199, 1740, 1, 0, 'default.jpg'),
(1741, 8, '011', '0', '120000000', 1, 148, 1741, 1, 0, 'default.jpg'),
(1742, 8, '012', '0', '120000000', 1, 204, 1742, 1, 0, 'default.jpg'),
(1743, 8, '013', '0', '120000000', 1, 568, 1743, 1, 0, 'default.jpg'),
(1744, 8, '014', '0', '120000000', 1, 568, 1743, 1, 0, 'default.jpg'),
(1745, 8, '015', '0', '120000000', 1, 568, 1745, 11, 0, 'default.jpg'),
(1746, 8, '016', '0', '120000000', 1, 1, 1746, 3, 0, 'default.jpg'),
(1747, 8, '017', '0', '120000000', 1, 1, 1747, 1, 0, 'default.jpg'),
(1748, 8, '018', '0', '120000000', 1, 540, 1748, 1, 0, 'default.jpg'),
(1749, 8, '019', '0', '120000000', 1, 540, 1748, 1, 0, 'default.jpg'),
(1750, 8, '020', '0', '120000000', 1, 130, 1750, 1, 0, 'default.jpg'),
(1751, 8, '021', '0', '120000000', 1, 512, 1751, 1, 0, 'default.jpg'),
(1752, 8, '022', '0', '120000000', 1, 349, 1752, 1, 0, 'default.jpg'),
(1753, 8, '023', '0', '120000000', 1, 349, 1753, 1, 0, 'default.jpg'),
(1754, 8, '024', '0', '120000000', 1, 349, 1754, 1, 0, 'default.jpg'),
(1755, 8, '025', '0', '120000000', 1, 428, 1755, 10, 0, 'default.jpg'),
(1756, 8, '026', '0', '120000000', 1, 428, 1755, 1, 0, 'default.jpg'),
(1757, 8, '027', '0', '120000000', 1, 500, 1757, 1, 0, 'default.jpg'),
(1758, 8, '028', '0', '120000000', 1, 500, 1758, 1, 0, 'default.jpg'),
(1759, 8, '029', '0', '120000000', 1, 527, 1759, 11, 0, 'default.jpg'),
(1760, 8, '030', '0', '120000000', 1, 527, 1759, 1, 0, 'default.jpg'),
(1761, 8, '031', '0', '120000000', 0, 0, 1761, 1, 0, 'default.jpg'),
(1762, 8, '032', '0', '120000000', 1, 1, 1762, 3, 0, 'default.jpg'),
(1763, 8, '033', '0', '120000000', 0, 0, 1763, 1, 0, 'default.jpg'),
(1764, 8, '034', '0', '120000000', 1, 183, 1764, 1, 0, 'default.jpg'),
(1765, 8, '035', '0', '120000000', 1, 504, 1765, 1, 0, 'default.jpg'),
(1766, 8, '036', '0', '120000000', 0, 0, 1766, 1, 0, 'default.jpg'),
(1767, 8, '037', '0', '120000000', 1, 462, 1767, 1, 0, 'default.jpg'),
(1768, 8, '038', '0', '120000000', 1, 462, 1768, 1, 0, 'default.jpg'),
(1769, 8, '039', '0', '120000000', 1, 447, 1769, 1, 0, 'default.jpg'),
(1770, 8, '040', '0', '120000000', 1, 144, 1770, 1, 0, 'default.jpg'),
(1771, 8, '041', '0', '120000000', 1, 144, 1771, 1, 0, 'default.jpg'),
(1794, 9, '001', '0', '120000000', 0, 0, 1794, 1, 0, 'default.jpg'),
(1795, 9, '002', '0', '120000000', 0, 0, 1795, 11, 0, 'default.jpg'),
(1796, 9, '003', '0', '120000000', 0, 0, 1796, 1, 0, 'default.jpg'),
(1797, 9, '004', '0', '120000000', 0, 0, 1797, 3, 0, 'default.jpg'),
(1798, 9, '005', '0', '120000000', 0, 0, 1798, 1, 0, 'default.jpg'),
(1799, 9, '006', '0', '120000000', 0, 0, 1799, 1, 0, 'default.jpg'),
(1800, 9, '007', '0', '120000000', 0, 0, 1800, 1, 0, 'default.jpg'),
(1801, 9, '008', '0', '120000000', 0, 0, 1801, 1, 0, 'default.jpg'),
(1803, 9, '010', '0', '120000000', 0, 0, 1803, 3, 0, 'default.jpg'),
(1804, 9, '011', '0', '120000000', 0, 0, 1803, 1, 0, 'default.jpg'),
(1807, 10, '001', '0', '0', 0, 0, 1807, 6, 0, 'default.jpg'),
(1808, 10, '002', '0', '0', 0, 0, 1808, 4, 0, 'default.jpg'),
(1809, 10, '003', '0', '0', 0, 0, 1809, 1, 0, 'default.jpg'),
(1810, 10, '004', '0', '0', 0, 0, 1810, 6, 0, 'default.jpg'),
(1811, 10, '005', '0', '0', 0, 0, 1811, 6, 0, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwhlistrik`
--

CREATE TABLE `kwhlistrik` (
  `id` int(11) NOT NULL,
  `kios_id` int(11) NOT NULL,
  `blalu` varchar(15) NOT NULL,
  `bini` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pembayaran` varchar(30) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `bulantahun` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kwhlistrik`
--

INSERT INTO `kwhlistrik` (`id`, `kios_id`, `blalu`, `bini`, `foto`, `pembayaran`, `keterangan`, `status`, `bulantahun`) VALUES
(14, 37, '0', '18723', 'default.jpg', NULL, NULL, 0, '82024'),
(15, 41, '0', '9', 'default.jpg', NULL, NULL, 0, '82024'),
(16, 43, '0', '106.7', 'default.jpg', NULL, NULL, 0, '82024'),
(17, 44, '0', '81.7', 'default.jpg', NULL, NULL, 0, '82024'),
(18, 45, '0', '2983.8', 'default.jpg', NULL, NULL, 0, '82024'),
(19, 46, '0', '400', 'default.jpg', NULL, NULL, 0, '82024'),
(20, 48, '0', '5381.9', 'default.jpg', NULL, NULL, 0, '82024'),
(21, 50, '0', '624.5', 'default.jpg', NULL, NULL, 0, '82024'),
(22, 51, '0', '29836.4', 'default.jpg', NULL, NULL, 0, '82024'),
(23, 53, '0', '821.8', 'default.jpg', NULL, NULL, 0, '92024'),
(24, 55, '0', '16805.2', 'default.jpg', NULL, NULL, 0, '82024'),
(25, 56, '0', '234', 'default.jpg', NULL, NULL, 0, '82024'),
(26, 57, '0', '1836.8', 'default.jpg', NULL, NULL, 0, '82024'),
(27, 59, '0', '642', 'default.jpg', NULL, NULL, 0, '82024'),
(28, 61, '0', '1202.4', 'default.jpg', NULL, NULL, 0, '82024'),
(29, 62, '0', '817.6', 'default.jpg', NULL, NULL, 0, '82024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `date_join` date NOT NULL,
  `plat` varchar(11) NOT NULL,
  `jenis_kendaraan` varchar(100) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `qr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `date_join`, `plat`, `jenis_kendaraan`, `masa_berlaku`, `qr`) VALUES
(4, '2025-01-23', 'B 4314 KLH', 'Yamaha N-Max', '2026-01-23', 'qr_4.png'),
(5, '2025-01-23', 'D 7512 FG', 'Toyota HiAce', '2026-01-23', 'qr_5.png'),
(6, '2025-01-23', 'D 7683 AL', 'Toyota HiAce', '2026-01-23', 'qr_6.png'),
(7, '2025-01-23', 'D 7025 AS', 'Toyota HiAce', '2026-01-23', 'qr_7.png'),
(8, '2025-01-23', 'D 7680 AL', 'Toyota HiAce', '2026-01-23', 'qr_8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pedagang`
--

CREATE TABLE `pedagang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `role_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pedagang`
--

INSERT INTO `pedagang` (`id`, `nama`, `alamat`, `nik`, `jenis_usaha`, `username`, `password`, `foto`, `ktp`, `kk`, `npwp`, `role_id`) VALUES
(0, 'Kosong', 'Kosong', '0000000000000000', 'Kosong', 'Kosong', 'Kosong', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(1, 'Ria Ilham', 'Taman Wisma Asri Aa 10/58 Rt.009 Rw.002 Kel.Teluk Pucung Kec.Bekasi Utara - Kota Bekasi', '3275035208840039', 'Frozen Food', 'riailham', '$2y$10$j6TKexLMFGm0G6yprUmIjeuELxcNxOKgoNKK5qz6X5VuWICUJFkni', 'foto_Ria_Ilham.jpg', 'ktp_Ria_Ilham.jpg', 'kk_Ria_Ilham.jpg', 'npwp_Ria_Ilham.jpg', 9),
(2, 'Ir Asdi Susanto', 'Pondok Mitra Lestari 12/4 Rt.012 Rw.013 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090203670020', 'Perdagangan Umum (Sesuai Zona)', 'asdisusanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'foto_Ir_Asdi_Susanto.png', 'ktp_Ir_Asdi_Susanto.png', 'kk_Ir_Asdi_Susanto.png', 'npwp_Ir_Asdi_Susanto.png', 9),
(4, 'Sadri', 'Jl.Bunga Rampai IX/2/No 21 Rt.007 Rw.006 Malaka Jaya, Duren Sawit - Jakarta Timur', '3175070109660002', 'Perdagangan Umum (Sesuai Zona)', 'sadri', '$2y$10$LiB2NeRPv5pkUXA8L1oP0OBOgMCBW3Wb5AGPjwyVMfCnp8v29gmFK', 'foto_Sadri.jpg', 'ktp_Sadri.jpg', 'kk_Sadri.jpg', 'npwp_Sadri.jpeg', 9),
(5, 'Nursahid', 'Kramat Jati Rt.012 Rw.009 Kel.Kramatjati Kec.Kramatjati - Jakarta Timur', '3175040105650008', 'Perabot', 'nursahid', '$2y$10$4g3ChgBgdP6qGEUH0XvxBOik0hvPXw34pm70MqstspGOGcF2ZrD5.', 'foto_Nursahid.jpg', 'ktp_Nursahid.jpg', 'kk_Nursahid.jpeg', 'npwp_Nursahid.png', 9),
(6, 'Heru Widiyatmoko', 'Pondok Pekayon Indah Bb21/14 Rt.006 Rw.012 Kel.Pekayon Jaya Kec.Bekasi Selatan - Kota Bekasi', '3275040105680010', 'Perdagangan Umum (Sesuai Zona)', 'heru', '$2y$10$jW3AuJlLJ89yzDp93ab7meBjBqSsFTq9sHljkv7JOcuPdJM1sHbkm', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(7, 'Hendri', 'Kemang Ifi Graha Jl. Saron Vii Blok E3 No.10-11 Rt.014 Rw.007 Kel.Jatirasa Kec.Jatiasih - Kota Bekasi', '3275092803710003', 'Plastik', 'hendri', '$2y$10$tiG9Zus4cEu7QHW4Gy1r.eVo7FS6F47lN6vySKrXoiYzn3Y9Ttylu', 'foto_Hendri.jpg', 'ktp_Hendri.jpg', 'kk_Hendri.jpg', 'npwp_Hendri.jpg', 9),
(8, 'Aan', 'Kp.Pondok Benda Rt.001 Rw.001 Kel.Jatirasa Kec.Jatiasih - Kota Bekasi', '3275091002820025', 'Daging', 'aan', '$2y$10$xRzi3giLT466vIarhh8mZues62dF1LMd5PqA6V7DUin7OiBb/vnHa', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(11, 'Abdul Tihamid', 'Kp.Pondok Benda Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090209910006', 'Singkong', 'abdul tihamid', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(12, 'Abdurohman', 'Kp.Pondok Benda Rt.008 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092512940010', 'Daging', 'abdurohman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(14, 'Achmad Baehaki', 'Jl.Puskesmas No.20 Rt.011 Rw.010 Kel.Kebon Pala Kec.Makasar Jakarta Timur', '3175081204810003', 'Ayam', 'achmad baehaki', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(15, 'Acin Aryanto', 'Kp.Pedurenan Rt.001 Rw.007 Kel.Jatiluhur Kec.Jatiasih Kota Bekasi', '3275090809810011', 'Ikan Tawar', 'acin aryanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(16, 'Ade Herawan', 'Griya Intan Asri A.2 Jl.Raya Samarang Rt.003 Rw.015 Kel.Sukagalih Kec.Tarogong Kidul Kabupaten Garut', '3205042306670001', 'Perdagangan Umum (Sesuai Zona)', 'ade herawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(17, 'Ade Nurachmat', 'Jl.O Kavling No.36 Rt.009 Rw.014 Kel.Kebon Baru Kec.Tebet Jakarta Selatan', '3174011209700005', 'Frozen Food', 'ade nurachmat', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(19, 'Adhy Lusmana', 'Jl.G.Kalimutu XIX Kav.12 Denpasar, BT/LINK.SAMPIN Rt.000 / Rw.000 Pemecutan Kelod, Denpasar Barat Kota Denpasar', '5171042508770001', 'Perdagangan Umum (Sesuai Zona)', 'adhy lusmana', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(21, 'Adi Chandra', 'Gg Sari Asih Rt.001 Rw.005  Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092106780005', 'Sepatu', 'adi chandra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(22, 'Adi Sunanto', 'Kp.Pondok Benda Rt.004 Rw.001 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092911900005', 'Ikan Asin', 'adi sunanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(23, 'Adolf Supriyanto Pasaribu', 'Kp.Pondok Benda Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091904890012', 'Sayur', 'adolf supriyanto pasaribu', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(24, 'Afrizal', 'Kp Pondok Benda No.81 Rt/Rw 003/004 Kel.Jatirasa Kec. Jatiasih Kota Bekasi', '3275090110660009', 'Kerudung', 'afrizal', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(26, 'Agus Susilo', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092808810012', 'Tahu/Tempe', 'agus susilo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(27, 'Agusman Riandi', 'Jl. Gg Melati No.37 Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '1305151308940001', 'Pakaian', 'agusman riandi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(29, 'Ahmad Abdul Gani', 'Perum Jatiasih Indah No.373 Jl.Irian Jaya 4/373 Rt.006 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090504010018', 'Bumbu', 'ahmad abdul gani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(31, 'Ahmad Sodikin', 'Kp.Bulak Rt.001 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091204670010', 'Sayur', 'ahmad sodikin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(32, 'Al Munawaroh', 'Kampung Rawa Roko Rt/Rw 004/005 Kel.Bojong Rawalumbu Kec.Rawalumbu Kota Bekasi', '3275057008900002', 'Telor', 'al munawaroh', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(33, 'Alex Sander', 'Kp Pondok Benda Rt.009 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275093101770008', 'Elektronik', 'alex sander', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(39, 'Ali Alamsyah Harjawinata', 'Sakura Regency I Jl.Bunga Sakura XII S/34 Rt.005 Rw.017 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3201021802890001', 'Perdagangan Umum (Sesuai Zona)', 'ali alamsyah harjawinata', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(41, 'Amin Maizun', 'Kp. Kebantenan Bekasi Rt.003 Rw.009 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090601770005', 'Campuran', 'amin maizun', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(42, 'Amin Sutrisno', 'Somawangi Rt.001 Rw.001 Kel.Somawangi Kec.Mandiraja Kabupaten Banjarnegara', '3304030902650001', 'Ketupat/Lontong', 'amin sutrisno', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(43, 'Andre Yosua', 'Jl.Nusa Indah 2 Blok B 16 No 5 Rt.008 Rw.008 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090910980010', 'Bumbu', 'andre yosua', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(44, 'Andrias Putra', 'Kp. Kebantenan Rt.001 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092812810007', 'Pakaian', 'andrias putra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(45, 'Andrywati', 'Bojong Menteng Rt.001 Rw.003 Kel.Bojong Menteng Kec.Rawalumbu Kota Bekasi', '3275056412860001', 'Emas', 'andrywati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(52, 'Andy Pawana Destiara', 'Villa Jaka Setia Jl Jaka Setia 7 Blok B-21 Rt/Rw 005/016 Kel. Jaka Setia Kec. Bekasi Selatan', '3275022012800027', 'Perdagangan Umum (Sesuai Zona)', 'andy pawana destiara', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(54, 'Annisa Gita Putri Malik', 'Jatibening Estate D1/35 Rt.007 Rw.013 Kel.Jatibening Kec.Pondokgede Kota Bekasi', '3275084303930026', 'Kue Kering', 'annisa gita putri malik', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(55, 'Ardi', 'Kp.Bulak Rt.005 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091508730019', 'Sayur', 'ardi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(56, 'Arif Firdaus Akhla', 'Kp. Pedurenan Rt.003 Rw.003 Kel.Jatiluhur Kec.Jatiasih Kota Bekasi', '3275091307920007', 'Daging', 'arif firdaus akhla', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(58, 'Arih Eka Putra', 'Kp.Pondok Benda Rt.007 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092504960016', 'Ayam', 'arih eka putra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(59, 'Arip Basuki', 'Kp.Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091712780010', 'Kelapa', 'arip basuki', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(60, 'Aris Susanto', 'Pondok Pekayon Indah Blok BB 18 A/5 Rt.006 Rw.012 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3316072702710001', 'Perdagangan Umum (Sesuai Zona)', 'aris susanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(61, 'Arman', 'Jl.Kamp Cikunir Bulak Rt.004 Rw.003 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275043003750004', 'Daging', 'arman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(63, 'Asih Charismawati', 'Jl. Rasamala I Blok C No 918 Rt.010 Rw.016 Kel.Margahayu Kec.Bekasi Timur Kota Bekasi', '3275015406930006', 'Sembako', 'asih charismawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(65, 'Asrul', 'Jl. Swatantra II Rt.002 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090308720010', 'Mainan', 'asrul', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(66, 'Athun', 'Kp.Pondok Benda Rt.004 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275082409770014', 'Daging', 'athun', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(67, 'Atik Haryanti S.S', 'Perum Griya Satria Mandalatama Blok 27 No.7 Rt.002 Rw.005 Kel.Karanglewas Lor Kec.Purwokerto Barat Kabupaten Banyumas', '3314075106790010', 'Ayam', 'atik haryanti s.s', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(69, 'Atik Mulyantika Sh', 'Graha Indah B.8 No.4 A Rt.006 Rw.013 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275094812740005', 'Pakaian', 'atik mulyantika sh', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(70, 'Auviana Listiyani', 'Kp.Kebantenan Rt.005 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094106010005', 'Tahu/Tempe', 'auviana listiyani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(72, 'Avi Nursari', 'Jl.Lotus Tengah Blok E-1 No.14A Rt.004 Rw.019 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275045701740006', 'Perdagangan Umum (Sesuai Zona)', 'avi nursari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(73, 'Bakir', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090209730008', 'Ikan', 'bakir', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(75, 'Bakti Suryono', 'Perumahan Pemda Jl. Kresna No.14 Blok B Rt.002 Rw.001 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3171031406750007', 'Sembako', 'bakti suryono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(76, 'Bambang Sutomo', 'Kp.Kebantenan Rt.005 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090907780024', 'Bumbu', 'bambang sutomo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(81, 'Bassam Amin', 'Perumahan Pemda Blok C3 No.56 D Rt.008 Rw.011 Kel. Jatiasih Kec. Jatiasih Kota Bekasi', '3327122406880002', 'Perdagangan Umum (Sesuai Zona)', 'bassam amin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(83, 'Benny Lahardo', 'Kp.Lembur Rt.001 Rw.006 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201021003660016', 'B2', 'benny lahardo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(86, 'Bertha Olivia Lusero', 'Komp Jaka Kencana D-33 Rt.005 Rw.004 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275045810890014', 'Bumbu', 'bertha olivia lusero', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(88, 'Betty Br Tobing', 'Jl.Gresik Blok B6 No.2 Rt.004 Rw.014 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095909690005', 'Sayur', 'betty br tobing', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(89, 'Billie Ramadhan', 'Pondok Surya Mandala Blok B2 No.21-22 Rt/Rw 009/013 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3175060701980013', 'Foodcourt', 'billie ramadhan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(90, 'Binna Ria Saragi', 'Kp.Pondok Benda Rt.008 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095010660024', 'Gilingan Kopi', 'binna ria saragi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(93, 'Bong Soei Tjoeng', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090610570003', 'Sembako', 'bong soei tjoeng', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(95, 'Buih Bin H Arifin', 'Kp.Pondok Benda Rt.002 Rw.001 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092304700009', 'Daging', 'buih bin h arifin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(98, 'Buyung', 'Jl Lebak Asih Kp Kebantenan Rt/Rw 006/004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092707680015', 'Kasur', 'buyung', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(100, 'Casina', 'Kp Bulak Rt/Rw 004/003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3209232802750004', 'Aksesoris', 'casina', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(103, 'Chanifa Chania Azhari', 'Vila Nusa Indah Blok I.5/24 Rt.003 Rw.017 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201025111000003', 'Perdagangan Umum (Sesuai Zona)', 'chanifa chania azhari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(104, 'Citra Dwiansyah', 'Pondok Benda Rt/Rw 005/004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095711980009', 'Emas', 'citra dwiansyah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(106, 'Cucu', 'Kp.Bulak No 12 Rt.003 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092708680004', 'Sembako', 'cucu', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(109, 'Dame Magdalena Sitio', 'Jl.Borneo Utara V Blok C No.212 Rt.002 Rw.010 Kel.Bojong Menteng Kec.Tawalumbu Kota Bekasi', '3275055710730014', 'Bumbu', 'dame magdalena sitio', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(110, 'Dana Arista Hanri Pratama', 'Jl. Pisang No.5 Angkasa Puri Rt.013/Rw.010 Jatimekar, Jatiasih  Kota Bekasi', '3275092403930006', 'Foodcourt', 'dana arista hanri pratama', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(111, 'Daris Manto', 'Jl. Rawa Ajan Rt.004 Rw.001 Kel.Bantargebang Kec.Bantargebang Kota Bekasi', '3275070511920012', 'Campuran', 'daris manto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(112, 'Darlistati', 'Jl. Swantantra I Kv 3/24 Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096806710015', 'Sembako', 'darlistati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(113, 'Darmo Sitanggang', 'Kp.Poncol Bulak Jl.Manggis I No.46 Rt.003 Rw.017 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275041806870014', 'Sayur', 'darmo sitanggang', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(116, 'Darnilis', 'Kp. Kebantenan Rt.001 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091012650023', 'Pakaian', 'darnilis', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(117, 'Darul Ilmi', 'Jl.Swatantra Kp Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec. Jatiasih Kota Bekasi', '3275091302700011', 'Perabot', 'darul ilmi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(118, 'David Marten', 'Kp.Jembatan Rt.010 Rw.012 Kel.Penggilingan Kec.Cakung Jakarta Timur', '3175061303820001', 'Pakaian', 'david marten', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(122, 'David Tampubolon', 'Jl. Jepara Kp Pondok Benda Rt.008 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091502920014', 'Ikan Asin', 'david tampubolon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(124, 'Dea Aulia Lukman', 'Kp.Pondok Benda Rt.005 Rw.001 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '1871065504940006', 'Beras', 'dea aulia lukman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(125, 'Deden Hidayat', 'Bojong Menteng Rt.007 Rw.002 Kel.Bojong Menteng Kec.Rawalumbu Kota Bekasi', '3275053006860017', 'Sayur', 'deden hidayat', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(130, 'Dedeng Sobandi', 'Kp.Babakan Alpani Rt.003 Rw.003 Kel.Mekarsari Kec.Cibatu Kabupaten Garut', '3205120401690001', 'Tahu', 'dedeng sobandi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(132, 'Dedi Andrees', 'Grand Galaxi City Victoria Garden I No.31 Rt/Rw 003/020 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275091510620009', 'Dist. Kurma', 'dedi andrees', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(133, 'Delfrancischo Boy', 'Gg Karya No.2 Rt.002 Rw.006 Kel.Lubang Buaya Kec.Cipayung Jakarta Timur', '3175100903750008', 'Pakaian', 'delfrancischo boy', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(137, 'Deni Rivanti', 'Komp AURI Jl. Mustang I Blok DD I No 10 Rt.004 Rw.014 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095703680011', 'Kue', 'deni rivanti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(138, 'Derisman', 'Jl. Lebak Asih Rt.001 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091708680042', 'Pakaian', 'derisman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(139, 'Deswita', 'Blok C No.134 Rt.10 Rw.12 Kel.Harapan Jaya Kec.Bekasi Utara Kota Bekasi', '3275035505750056', 'Perdagangan Umum (Sesuai Zona)', 'deswita', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(140, 'Detrizal M Permana', 'Jl. Irian Jaya Iv Blok C/372 Rt.005 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091512760010', 'Bumbu', 'detrizal m permana', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(142, 'Dewi Sitowati', 'Jl. Hercules B.1/2 Tni Au Rt/Rw 002/014 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096205720007', 'Perdagangan Umum (Sesuai Zona)', 'dewi sitowati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(144, 'Diki Hermawan', 'Kp.Mariuk Rt.004/Rw.001 Gandamekar, Cikarang Barat Kabupaten Bekasi', '3216082706990007', 'Perdagangan Umum (Sesuai Zona)', 'diki hermawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(148, 'Dina Savitri', 'Jl. Rambutan Indah Rt.001 Rw.011 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3274037107810006', 'Perdagangan Umum (Sesuai Zona)', 'dina savitri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(149, 'Dinaria Rambe,Se', 'Jl. Merapi Timur Ix No.42 Rt.010 Rw.010 Kel.Kebon Bawang Kec.Tanjung Priok Jakarta Utara', '3172024904630003', 'Pakaian', 'dinaria rambe,se', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(150, 'Dipa Mulia', 'Jl. Expres 3 Blok Tt 17 Rt.002 Rw.24 Kel.Bojong Rawalumbu Kec.Rawalumbu Kota Bekasi', '3275050606640031', 'Foodcourt', 'dipa mulia', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(151, 'Donald Suhendra', 'Jl. Masjid 2 No.11 Rt.006 Rw.011 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275082609790015', 'Aksesoris', 'donald suhendra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(152, 'Drg.Hj.Arini Wiwik S', 'Jl Gambang II No.182 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096211640005', 'Perdagangan Umum (Sesuai Zona)', 'drg.hj.arini wiwik s', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(153, 'Drs. Ahmad Baihaqi, Mpd.', 'Kp Bulak Rt.002 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091012590009', 'Sembako', 'drs. ahmad baihaqi, mpd.', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(154, 'Drs. H. Lili Sumarna', 'Perum Pemda Blok A9/26 Jl.Cemara V Rt.003 Rw.002 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090702490004', 'Sembako', 'drs. h. lili sumarna', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(155, 'Drs.R.Martono Sindhu.M.Si', 'Perum Asabri Indah Blok L-3/38 Rt.001 Rw.010 Kel.Jatiluhur Kec.Jatiasih Kota Bekasi', '3275090808650016', 'Telur', 'drs.r.martono sindhu.m.si', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(156, 'Eben Haezer Tampubolon', 'Perum Taman Kota Permai.I. Blok A. 03-34 Rt.002 Rw.006 Kelkaret Kec.Sepatan Kabupaten Tangerang', '3603161811670001', 'Perdagangan Umum (Sesuai Zona)', 'eben haezer tampubolon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(157, 'Edison Silaban', 'Jl.Nusa Indah 2 Blok B16/5  Rt.008/Rw.008 Jaritasa, Jatiasih – Kota Bekasi', '3275091508640009', 'Perdagangan Umum (Sesuai Zona)', 'edison silaban', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(162, 'Eko Budi Siswanto', 'Jl. Delima III Blok F 2/24 Rt.002 Rw.013 Kel.Duren Jaya Kec.Bekasi Timur Kota Bekasi', '3275011005670023', 'Pakaian', 'eko budi siswanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(163, 'Eko Pujianto', 'Jl. H. Kayar Rt.008 Rw.006 Kel.Ciganjur Kec.Jagakarsa Jakarta Selatan', '3216112312860005', 'Perdagangan Umum (Sesuai Zona)', 'eko pujianto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(165, 'Elita', 'Kp Pondok Benda Rt/Rw 002/004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095512650015', 'Pakaian', 'elita', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(167, 'Emit', 'Jl.Musolah Al Falah Rt.001 Rw.006 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091003610012', 'Sayur', 'emit', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(168, 'Endang Listyaningsih', 'Komp. Pemda Blok C3/56 G Rt.008 Rw.011 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094504650012', 'Kue Kering', 'endang listyaningsih', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(169, 'Endro Mulyanto', 'Perum Darmaga Pratama Rt.001 Rw.005 Kel.Cibadak Kec.Ciampea Kabupaten Bogor', '3201150702670007', 'Perdagangan Umum (Sesuai Zona)', 'endro mulyanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(170, 'Eni Lestari', 'Tebet Barat Trijaya IV/15 Rt.011 Rw.007 Kel. Tebet Barat Kec. Tebet Jakarta Selatan', '3174015501790003', 'Sembako', 'eni lestari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(171, 'Enriza', 'Jl.Irian Jaya Iv Blok C/372 Rt.006 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095210720032', 'Sembako', 'enriza', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(174, 'Ependi Gamin', 'Kp.Cigorowong Rt.001 Rw.011 Kel.Cileungsi Kec.Cileungsi Kabupaten Bogor', '3201070310820006', 'Kelapa', 'ependi gamin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(175, 'Erlinda Siahaan', 'Kp.Kebantenan No.56 Rt.002 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095112670011', 'Sayur', 'erlinda siahaan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(176, 'Ervidawati', 'Kp Kebantenan Rt/Rw 001/005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096109780011', 'Kasur', 'ervidawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(181, 'Erwanto', 'Kp.Jaha Rt.001 Rw.011 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275092207780022', 'Perabot', 'erwanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(182, 'Estiningtyas Utami', 'Cikunir Raya Jl H Madrais No.3 Rt/Rw 003/003 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3175076600682001', 'Foodcourt', 'estiningtyas utami', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(183, 'Evie Nurul Hikmah', 'Pondok Pekayon Indah DD 26/8 Rt.007 Rw.001 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3275044312700028', 'Perdagangan Umum (Sesuai Zona)', 'evie nurul hikmah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(185, 'Fandika Okdiba', 'Apartment Mira Oasis Tower A/703 Rt.003 Rw.002 Kel.Senen Kec.Senen Jakarta Pusat', '3671012110960002', 'Perdagangan Umum (Sesuai Zona)', 'fandika okdiba', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(186, 'Farida Depa', 'Dukuh Timur Rt.005 Rw.002 Kel.Dukuhkarya Kec.Rengasdengklok Kabupaten Karawang', '3215065405920004', 'Kelapa', 'farida depa', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(188, 'Fariz Hadi Hilman', 'Jl. Mayor Blok H No.15 Rt.001 Rw.002 Kel. Jaka Setia Kec. Bekasi Selatan Kota Bekasi', '3275021303930020', 'Kue', 'fariz hadi hilman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(189, 'Febri Muhammad Muklis', 'Asrama Pemadam Rt.003 Rw.017 Kel.Semper Barat Kec.Cilincing Jakarta Utara', '3172042002820013', 'Daging', 'febri muhammad muklis', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(190, 'Fernando', 'Kp. Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090808930016', 'Sayur', 'fernando', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(192, 'Fita Sari', 'Kp.Bulak Rt.004 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096410810009', 'Bumbu', 'fita sari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(196, 'Fransiska Anik Susilowati', 'Jl Pulo Sirih Selatan 4 No.165 Rt.011 Rw.013 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3275046708790019', 'Sembako', 'fransiska anik susilowati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(197, 'Galih Adi Satya', 'Jl Kalibata Tengah No.75 Rt/Rw 010/007 Kel.Kalibata Kec.Pancoran Jakarta Selatan', '3175021901970008', 'Foodcourt', 'galih adi satya', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(198, 'Ginanjar Lukmantoro', 'Citra Swarna Residence No.B-15 Komp Pemda Blok A Rt.004 Rw.002 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275041808790033', 'Campuran', 'ginanjar lukmantoro', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(199, 'Gladys T.M.Makainas', 'Apt Gading Mediterania Residences Unit CA/08A/R Rt.001/Rw.018 Kelapa Gading Barat, Kelapa Gading – Jakarta Utara', '3175024809760008', 'Perdagangan Umum (Sesuai Zona)', 'gladys t.m.makainas', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(200, 'H Ali Arman', 'Jl Lebak Asih I No.12 Rt/Rw 001/004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091011610021', 'Pakaian', 'h ali arman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(202, 'H Busro', 'Kebon Mangga Rt.008 Rw.003 Kel.Cipulir Kec.Kebayoran Lama', '3174050204480008', 'Sepatu', 'h busro', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(204, 'H Daliman', 'Tebet Barat Rt.011 Rw.007 Kel.Tebet Barat Kec.Tebet Jakarta Selatan', '3174013112510027', 'Gilingan Bakso', 'h daliman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(205, 'H Edi Maison', 'Pondok Kelapa Rt/Rw 002/001 Kel.Pondok Kelapa Kec.Duren Sawit Jakarta Timur', '3175070105630009', 'Kosmetik', 'h edi maison', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(208, 'H Sahril', 'Kp Kebantenan Rt.001 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091504700012', 'Pakaian', 'h sahril', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(209, 'H Thibrani', 'Jl. Cempaka 2 No.64 Rt.003 Rw.002 Kel.Jatibening Kec.Pondokgede Kota Bekasi', '3275083012500015', 'Jahit', 'h thibrani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(210, 'H Tumar', 'Kp.Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090810620005', 'Ayam', 'h tumar', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(212, 'H. Junaidi Abdillah', 'Kp Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090406670004', 'Sendal & Sepatu', 'h. junaidi abdillah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(213, 'H. Sahril', 'Kp Kebantenan Rt.001 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091504700012', 'Pakaian', 'h. sahril', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(214, 'H.Moh Munir', 'Kp.Bulak Rt.001 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090512820013', 'Kelapa', 'h.moh munir', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(217, 'Hanna Sofyana', 'Perum Graha Indah A16/16 Rt.005 Rw.014 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275094505930014', 'Sembako', 'hanna sofyana', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(219, 'Hannan', 'Ngaglik Kuburan 11-E Rt.002 Rw.007 Kel.Kapasari Kec.Genteng Kota Surabaya', '3275091702840019', 'Gilingan Kacang', 'hannan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(220, 'Hanny Sin Lan', 'Komp Bea Cukai Blok A7 No 2 Rt.011 Rw.007 Kel.Sukapura Kec.Cilincing – Jakarta Utara', '1050085003785003', 'Sembako', 'hanny sin lan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(221, 'Hari Hanila Prasetya,St', 'Jl. Pulo Sirih Timur 8 Blok Ca No.236 Rt.001 Rw.013 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3275040508660009', 'Perdagangan Umum (Sesuai Zona)', 'hari hanila prasetya,st', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(222, 'Hasanuddin Rahman', 'Dsn.Janglor Rt.003 Rw.001 Kel.Lajing Kec.Arosbaya Kabupaten Bangkalan', '3526051102990001', 'Ikan Laut', 'hasanuddin rahman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(223, 'Hasbi Allah', 'Kp.Jatikramat Rt.004 Rw.003 Kel.Jatikramat Kec.Jatiasih Kota Bekasi', '3275091506790072', 'Daging', 'hasbi allah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(224, 'Helena Surya', 'Jl. Pulo Asem Iv No.34 Rt.002 Rw.001 Kel.Jati Kec.Pulo Gadung Jakarta Timur', '3273024208870001', 'Perdagangan Umum (Sesuai Zona)', 'helena surya', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(227, 'Hendrianto', 'Kp.Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091211730009', 'Bumbu', 'hendrianto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(230, 'Hendro Arrad Pulungan', 'Jl.Taman Wijaya Kusuma 3/54 Rt.004 Rw.002 Kel.Cilandak Barat Kec.Cilandak Jakarta Selatan', '3275090706790018', 'Buah', 'hendro arrad pulungan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(236, 'Hj Asniati', 'Jl Lebak Asih I No.12 Rt/Rw 001/004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094706680019', 'Kosmetik', 'hj asniati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(238, 'Hj Masirah', 'Jl. Kebon Bawang III No.29 Rt.004 Rw.008 Kel.Kebon Bawang Kec.Tanjung Priok Jakarta Utara', '3172025511680008', 'Ikan Basah', 'hj masirah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(241, 'Hj Munawaroh', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095604740017', 'Ikan Laut', 'hj munawaroh', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(245, 'Hj. Euis Dewi Fartina', 'Perum Pemda Blok C13/7 Rt.007 Rw.011 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095308600012', 'Atk', 'hj. euis dewi fartina', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(246, 'Hj. Rochyati Susanti', 'Jl.Damar 11 Blok D No.87 Rt.004 Rw.005 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3275044208550008', 'Klontong', 'hj. rochyati susanti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(249, 'Hj. Siti Moyah', 'Dsn.Janglor I Rt.003 Rw.001 Kel.Lajing Kec.Arosbaya Kabupaten Bangkalan', '3526057112770016', 'Perdagangan Umum (Sesuai Zona)', 'hj. siti moyah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(255, 'Hotep', 'Kp.Pondok Benda Rt.001 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091408760012', 'Bumbu', 'hotep', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(256, 'Hotijah', 'Kp.Pondok Benda Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095709770012', 'Sembako', 'hotijah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(257, 'Hotimah,Sh', 'Jl.Dahlia Blok D 98 No 1 Rt.007 Rw.022 Kel.Pengasinan Kec.Rawalumbu Kota Bekasi', '3275055701640006', 'Sembako', 'hotimah,sh', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(258, 'Hotlan Tampubolon', 'Kp.Pondok Benda Rt.001 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091710750014', 'Sembako', 'hotlan tampubolon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(262, 'Hotmatiar Malau', 'Kp.Pondok Bendna Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094809690008', 'Ikan Asin', 'hotmatiar malau', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(263, 'Hurdiyanti', 'Jl. Gunung Salak No.3A Rt.002 Rw.018 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275094902620005', 'Ikan Asin', 'hurdiyanti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(264, 'Ibnu Sahal', 'Kemang Pratama 2 Jl Kemang Anggrek 6 Blok AQ No.9 Rt/Rw 002/012 Kel.Bojong Menteng Kec.Rawalumbu Kota Bekasi', '3374062212850003', 'Pakaian', 'ibnu sahal', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(265, 'Iffah Shabrina', 'Jl. Bintara Jaya Ii Rt/Rw 005/008 Kel.Bintara Jaya Kec.Bekasi Barat Kota Bekasi', '3275026006940016', 'Perdagangan Umum (Sesuai Zona)', 'iffah shabrina', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(267, 'Iin Adiyaningsih', 'Kp.Pondok Benda Jl.Swadaya I Rt.007 Rw.002 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094605850015', 'Ayam', 'iin adiyaningsih', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(268, 'Ilham Anggit Andiarto', 'Kp.Pondok Benda Rt.004 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091712790019', 'Ayam', 'ilham anggit andiarto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(269, 'Imamah', 'Jl.Taruna Rt.005 Rw.002 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275086105870011', 'Ikan', 'imamah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(270, 'Imania Herlanty', 'Kp.Pamahan Rt.002 Rw.009 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3175076705960008', 'Perdagangan Umum (Sesuai Zona)', 'imania herlanty', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(271, 'Imran Tanjung', 'Kp. Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090506740040', 'Plastik', 'imran tanjung', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(276, 'Ina Rolina Sitepu', 'Wijaya Kusuma Ii/9/168 Rt.013 Rw.007 Kel.Malaka Sari Kec.Duren Sawit Jakarta Timur', '3175075506770007', 'Bumbu', 'ina rolina sitepu', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(277, 'Inardi', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091703680011', 'Sembako', 'inardi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(279, 'Ineke Darmawati', 'Zam Residence Jl. Anugrah No.11 Rt.005 Rw.006 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095212720021', 'Kue', 'ineke darmawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(281, 'Ir Firta Aviani', 'Jl Durian II C-7 RT.005 / RW.010 Jatiasih, Jatiasih – Kota Bekasi', '3275094804710005', 'Perdagangan Umum (Sesuai Zona)', 'ir firta aviani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(283, 'Ir. D. Sahardono Amiarso', 'Jl Kalibata Tengah No.75 Rt/Rw 010/007 Kel.Kalibata Kec.Pancoran Jakarta Selatan', '3175020205590001', 'Perdagangan Umum (Sesuai Zona)', 'ir. d. sahardono amiarso', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(315, 'Irah Rohayati', 'Kp.Pondok Benda Rt.010 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095708750005', 'Daging', 'irah rohayati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(317, 'Irnanta Ferina S', 'Kp. Kebantenan Rt.006 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096802680009', 'Salon', 'irnanta ferina s', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(318, 'Ismail', 'Kp.Bulak Rt.004 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '1203040206890008', 'Bumbu', 'ismail', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(319, 'Isrinaldi', 'Gg Sawo Rt.003 Rw.003 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275083112870024', 'Pakaian', 'isrinaldi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(320, 'Ivan Kurniawan', 'Grand Galaxy City Lotus Garden 2 No.9 Rt/Rw 007/017 Kel. Jaka Setia Kec. Bekasi Selatan', '3275092210880004', 'Emas', 'ivan kurniawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(325, 'Iyus Suhandi', 'Jl.Swatantra III Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3301250109820001', 'Daging', 'iyus suhandi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(327, 'Izal Bahri', 'Jl.Bintan Ii No.112 Jai Rt.002 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091506780077', 'Sayur', 'izal bahri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(334, 'Jaenudin', 'Pondok Benda Rt.004 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092005930012', 'Daging', 'jaenudin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(335, 'Jainudin', 'Tanjung Barat Rt.005 Rw.005 Kel.Tanjung Barat Kec.Jagakarsa Jakarta Selatan', '3174090302630002', 'Foodcourt', 'jainudin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(337, 'Jamaludin', 'Jl.Jatikramat No 33 Rt.003 Rw.011 Kel.Jatikramat Kec.Jatiasih Kota Bekasi', '3275091801710014', 'Daging Kambing', 'jamaludin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(338, 'Jasman B', 'Villa Nusa Indah Blok V.25/2 Rt.001 Rw.040 Bojong Kulur, Gunung Putri – Kabupaten Bogor', '3201021901700009', 'Alat Mancing', 'jasman b', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(339, 'Joko Suprapto', 'Kp. Pondok Benda Rt.004 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092003870016', 'Bumbu', 'joko suprapto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(340, 'Jubaidah', 'Jl.Hm.Idrus Kp.Cakung Rt.006 Rw.009 Kel.Jatikramat Kec.Jatiasih Kota Bekasi', '3275095307700015', 'Kembang', 'jubaidah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(341, 'Judi Yono', 'Kp.Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090204760025', 'Ayam', 'judi yono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(342, 'Junaidi', 'Kp.Cibening Rt.006 Rw.003 Kel.Bintara Jaya Kec.Bekasi Barat Kota Bekasi', '3275091708680042', 'Pakaian', 'junaidi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(343, 'Jupri', 'Dusun Pahing Rt.005 Rw.001 Kel.Kertawana Kec.Kalimanggis Kabupaten Kuningan', '3208270304790005', 'Campuran', 'jupri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(345, 'Kabul Widodo', 'Kp Kebantenan Rt.005 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091707690010', 'Ayam Potong', 'kabul widodo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(346, 'Kami Suyamti Bt Darmo', 'Kp.Kebantenan Rt.004 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094806690005', 'Ayam', 'kami suyamti bt darmo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(347, 'Kandi Irawan', 'Kp. Cimuning Rt.001 Rw.004 Kel. Cimuning Kec. Mustika Jaya Kota Bekasi', '3275112604810001', 'Sayuran', 'kandi irawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9);
INSERT INTO `pedagang` (`id`, `nama`, `alamat`, `nik`, `jenis_usaha`, `username`, `password`, `foto`, `ktp`, `kk`, `npwp`, `role_id`) VALUES
(348, 'Karyo', 'Jl.Pengairan I Kp.Utan Rt.006 Rw.002 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275041510830018', 'Ayam', 'karyo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(349, 'Kasim Akhmad Fauzi', 'Perumahan Jatinegara Indah Jl Semeru B.38 Rt.002 Rw.009 Kel.Jatinegara Kec.Cakung Jakarta Timur', '3301061203780006', 'Ayam Fillet', 'kasim akhmad fauzi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(352, 'Kevin Van Damme Simarmata', 'Perum Bj Menteng Blk A/181 Rt.004 Rw.008 Kel.Bojong Menteng Kec.Rawalumbu - Kota Bekasi', '3275053004950007', 'B2', 'kevin van damme simarmata', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(353, 'Khalimah', 'Jl. Palem I Blok G-VI No.1 Rt/Rw 009/015 Kel.Jati Makmur Kec.Pondok Gede Kota Bekasi', '3275084806650028', 'Sepatu', 'khalimah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(354, 'Kismizon', 'Kebon Mangga Rt.007 Rw.007 Kel.Cipulir Kec.Kebayoran Lama Jakarta Selatan', '3174052010590005', 'Sepatu', 'kismizon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(355, 'Kristin', 'Kp Kebantenan Rt/Rw 007/006 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095101800009', 'Perdagangan Umum (Sesuai Zona)', 'kristin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(356, 'Kristina Utami', 'Pondok Pekayon Indah Blok BB 18 A/5 Rt.006 Rw.012 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3316075906770001', 'Perdagangan Umum (Sesuai Zona)', 'kristina utami', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(357, 'Kuriah', 'Kp.Pondok Benda Rt.005 Rw.002 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095210690017', 'Tahu/Tempe', 'kuriah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(360, 'Kusnul Khotimah', 'Kp.Kebantenan Rt.002 Rw.016 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3329094911810002', 'Jengkol Kikil', 'kusnul khotimah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(361, 'Lambok Lubis', 'Kp.Pondok Benda Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092808780016', 'Sayur', 'lambok lubis', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(362, 'Lemazeni', 'Pondok Mandala 2 Blok M No.10-11 Rt.001 Rw.017 Kel.Tugu Kec.Cimanggis Kota Depok', '3276056512710016', 'Sembako', 'lemazeni', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(363, 'Leonardo Otto', 'Taman Wisma Asri Blok L No.43 Rt.001 Rw.008 Kel.Teluk Pucung Kec.Bekasi Utara Kota Bekasi', '3275030203050005', 'Emas', 'leonardo otto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(364, 'Lia Fauzia', 'Ciracas Rt.014 Rw.001 Kel.Ciracas Kec.Ciracas Jakarta Timur', '3175094404810002', 'Toko Boneka', 'lia fauzia', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(365, 'Lila Adriaty', 'Jl Lebak Asih I No.12 Rt/Rw 001/004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096504870009', 'Kosmetik', 'lila adriaty', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(367, 'Lilis Istianah, S.Pd', 'Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095406610008', 'Perabot', 'lilis istianah, s.pd', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(368, 'Lismawati', 'Kp Kebantenan Rt/Rw 001/005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275097112600025', 'Pakaian', 'lismawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(370, 'Maman Suherman', 'Kp.Pedaengan Rt.013 Rw.008 Kel.Penggilingan Kec.Cakung Jakarta Timur', '3175060808760038', 'Daging', 'maman suherman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(371, 'Manase Ginting', 'Perum Lacasan II NO.110 RT.002 RW.003 Kel.Jatiluhur Kec.Jatiasih Kota Bekasi', '3275041107720018', 'Foodcourt', 'manase ginting', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(377, 'Mardiani Fudiyah Dra', 'Graha Indah Blok C9 No. 13 Rt.006 Rw.013 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275096503710015', 'Bahan Kue', 'mardiani fudiyah dra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(379, 'Margono', 'Kp. Kayuringin Rt.007 Rw.001 Kel.Kayuringin Jaya Kec.Bekasi Selatan Kota Bekasi', '3604030204890261', 'Perdagangan Umum (Sesuai Zona)', 'margono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(380, 'Marisi Gultom', 'Jl.Swatantra Iv Jatirasa Rt.009 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096601730006', 'Ikan Asin', 'marisi gultom', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(381, 'Marjoni Se', 'Gg Sari Asih Rt.004 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090505630009', 'Tas', 'marjoni se', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(382, 'Marsin Munandar', 'Cibitung Rt,003 Rw.005 Kel.Pedurenan Kec.Mustika Jaya Kota Bekasi', '3275111008770001', 'Foodcourt', 'marsin munandar', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(383, 'Martin Raka Shiwi', 'Jl. Pattimura Rt.004 Rw.000 Kel.Mangkupalas Kec.Samarinda Seberang Kota Samarinda', '6472020306930003', 'Perdagangan Umum (Sesuai Zona)', 'martin raka shiwi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(384, 'Masdiana Sinaga', 'Kp.Pondok Benda Rt.007 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094103680012', 'Bumbu', 'masdiana sinaga', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(385, 'Masdor', 'Dsn.Janglor I Rt.003 Rw.001 Kel.Lajing Kec.Arosbaya Kabupaten Bangkalan', '3526051908840004', 'Ikan Laut', 'masdor', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(387, 'Mashadi', 'Blok Karang Dalem Rt.017 Rw.006 Kel.Jemaras Lor Kec.Klangenan Kabupaten Cirebon', '3209230502880005', 'Buah', 'mashadi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(391, 'Maslan Sagala', 'Kp.Pondok Benda No.27 Rt.008 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096407650011', 'Ikan Asin', 'maslan sagala', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(393, 'Matjuri', 'Jl.Kebon Bawang V No.14 A Rt.011 Rw.008 Kel.Kebon Bawang Kec.Tanjung Priok Jakarta Utara', '3172020902600004', 'Ikan Basah', 'matjuri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(394, 'Mega Dwita Fitri', 'Taman Cikunir Indah E2/13 Rt.010 Rw.011 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275046103650017', 'Sembako', 'mega dwita fitri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(395, 'Moh. Masuri', 'Jl.H.Nawin 1 Rt.008 Rw.003 Kel.Jaticempaka Kec.Pondok Gede Kota Bekasi', '3275080911780013', 'Kelapa', 'moh. masuri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(397, 'Mohamat Jamal', 'Pondok Ungu Rt.009 Rw.011 Kel.Medan Satria Kec.Medan Satria Kota Bekasi', '3275060202750015', 'Telor', 'mohamat jamal', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(398, 'Mohammad Khausyar', 'Kp Kebantenan Rt/Rw 001/005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090410920005', 'Kasur', 'mohammad khausyar', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(401, 'Mugiyono', 'Desa Mejasem Rt.003 Rw.001 Kel.Mejasem Kec.Siwalan Kabupaten Pekalongan', '3326171110910002', 'Sembako', 'mugiyono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(403, 'Muhamad Isnin', 'Perum Kig Jl.Cirebon Blok A 1 No.14 Rt.008 Rw.014 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091708650022', 'Bumbu', 'muhamad isnin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(407, 'Muhammad Firdaus, SH', 'Jl. Pisangan Baru Rt.001 Rw.006 Kel.Pisangan Baru Kec.Matraman Jakarta Timur', '3175011905700001', 'Perdagangan Umum (Sesuai Zona)', 'muhammad firdaus, sh', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(408, 'Muhammad Slamet Daroini', 'Kp.Pondok Benda Rt.007 Rw.002 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092905790018', 'Perdagangan Umum (Sesuai Zona)', 'muhammad slamet daroini', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(411, 'Mujaroh', 'Jl.Taruna III Rt.005 Rw.002 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275085704830042', 'Ikan', 'mujaroh', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(412, 'Mula Lio Hapri Manik', 'Kp. Kebantenan Rt.002 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090510260013', 'Bumbu', 'mula lio hapri manik', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(413, 'Murdini', 'Kp.Kebantenan Rt.004 Rw.009 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091608770007', 'Campuran', 'murdini', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(417, 'Mursal Azis', 'Perum Karawang Jaya Blok L3 No.20 Rt.040 Rw.016 Kel.Gintungkerta Kec.Klari Kabupaten Karawang', '3275051809690007', 'Pakaian', 'mursal azis', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(426, 'Mustakim', 'Kp.Kebantenan Rt.003 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090601830007', 'Tahu/Tempe', 'mustakim', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(427, 'Mustofiah', 'Kp.Kebantenan Bekasi Rt.003 Rw.009 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095505790023', 'Ayam', 'mustofiah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(428, 'Mutakin', 'Dusun Wage Rt.011 Rw.004 Kel.Jambar Kec.Nusaherang Kabupaten Kuningan', '3171070406840009', 'Gilingan Somay', 'mutakin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(430, 'Nadia Karolina', 'Kp.Bulak Rt.001 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094401980010', 'Sayur', 'nadia karolina', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(431, 'Nadya Fahmi', 'Jl. Kalimantan Blok B.6 No.76 Rt.001 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '327509624970013', 'Pakaian', 'nadya fahmi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(432, 'Naf\'An Sigalingging', 'Perum Graha Jejalen Jaya Blok B No.4', '3275091207800038', 'Perabot', 'naf\'an sigalingging', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(435, 'Nalim', 'Kp.Pondok Benda Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090906790006', 'Kelapa', 'nalim', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(437, 'Nasril', 'Jl. Swadaya Kamp Pondok Benda Rt.005 Rw.004 Kel.Jati Rasa Kec.Jatiasih Kota Bekasi', '3175070102680014', 'Pakaian Dalam', 'nasril', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(438, 'Nefertiti Arsaqe D', 'Jl.Sasak II NO.3 Rt.003 Rw.002 Kel.Kelapa Dua Kec.Kebon Jeruk Jakarta Barat', '3173054308950001', 'Perdagangan Umum (Sesuai Zona)', 'nefertiti arsaqe d', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(439, 'Niken Sari', 'Kp.Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094109920004', 'Perdagangan Umum (Sesuai Zona)', 'niken sari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(440, 'Nila Sari', 'Jl.Kb Nanas Selatan II Rt.005 Rw.005 Kel.Cipinang Cempedak Kec.Jatinegara Jakarta Timur', '3175035306720006', 'Perdagangan Umum (Sesuai Zona)', 'nila sari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(441, 'Ninuk Fitri Handayani', 'Jl.Wibawa II Rt.002 Rw.006 Kel.Cilandak Timur Kec.Pasar Minggu Jakarta Selatan', '3174046711700002', 'Pakaian', 'ninuk fitri handayani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(442, 'Ninuk Fitri Handayani', 'Jl.Wibawa II Rt.002 Rw.006 Kel.Cilandak Timur Kec.Pasar Minggu Jakarta Selatan', '3275092403930006', 'Pakaian', 'ninuk fitri handayani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(444, 'Nofiyanto', 'Gg Sawo Rt.003 Rw.003 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275081102790021', 'Pakaian', 'nofiyanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(445, 'Noneng', 'Kp.Cikunir Rt.005 Rw.003 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275044110820017', 'Sembako', 'noneng', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(446, 'Nova Simatupang', 'Jl. Dermaga No.22 Rt.006 / Rw.003, Balekembang, Kramatjati - Jakarta Timur', '3175046911810005', 'Sembako', 'nova simatupang', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(447, 'Novita Fitri', 'Pondok Kelapa Rt.007/Rw.012 Kel. Pondok Kelapa Kec. Duren Sawit Jakarta Timur', '3175076411820010', 'B2', 'novita fitri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(448, 'Nur Annisa Kusumawaty', 'Jl. Nusantara Blok A 3 No 11 Rt.001 Rw.010 Kel.Aren Jaya Kec.Bekasi Timur Kota Bekasi', '3275015410970016', 'Perdagangan Umum (Sesuai Zona)', 'nur annisa kusumawaty', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(449, 'Nur Khasanah', 'Jl. Rembang No.33 Kp.Pondok Benda Rt.005 / Rw.005, Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275036402830017', 'Pakaian', 'nur khasanah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(450, 'Nurachmi Suryani', 'Jl Lantana 2 Blok D1/40 Kp 3 Rt/Rw 003/013 Kel.Sepanjang Jaya Kec.Rawalumbu Kota Bekasi', '3275055512640010', 'Obat-Obatan', 'nurachmi suryani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(451, 'Nurcahyono', 'Jl.Swatantra I Kav Bni 7 B Rt.005 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090603860007', 'Perdagangan Umum (Sesuai Zona)', 'nurcahyono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(454, 'Nursedy Mahdalena Sinaga', 'Jl. Utama I BG 16 Kemang Pratama RT.006/RW.011 Sepanjang Jaya, Rawalumbu – Kota Bekasi', '3275056810590007', 'Pakaian', 'nursedy mahdalena sinaga', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(455, 'Pambudi Rahardjo', 'Pondok Surya Mandala L2/28 Rt/Rw 012/013 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275041811560006', 'Perabotan', 'pambudi rahardjo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(458, 'Panji Adi Sakti', 'Jl Kalibata Tengah No.75 Rt/Rw 010/007 Kel.Kalibata Kec.Pancoran Jakarta Selatan', '3216061406910027', 'Foodcourt', 'panji adi sakti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(459, 'Parlan Tumenggung', 'Jl. Lebak Asih Rt.006 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3175060701980013', 'Sembako', 'parlan tumenggung', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(461, 'Parlan Tumenggung', 'Jl. Lebak Asih Rt.006 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090601700014', 'Tempe', 'parlan tumenggung', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(462, 'Paskah Ria Dame Pakpahan', 'Jl. Perc Negara II/23 A RT.001/RW.004 Johar Baru, Johar Baru Jakarta Pusat', '3171085204740005', 'Perdagangan Umum (Sesuai Zona)', 'paskah ria dame pakpahan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(466, 'Prabowo Irawan', 'Jl. Lumbu Tengah VII/120 Rt.003 Rw.028 Kel.Bojong Rawalumbu Kec.Rawalumbu Kota Bekasi', '3275090502920011', 'Sembako', 'prabowo irawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(467, 'Pristiwati Utami', 'Taman Permata Cikunir D1/11 Rt.002 Rw.014 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275045505620023', 'Perdagangan Umum (Sesuai Zona)', 'pristiwati utami', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(469, 'Putra Surya', 'Jl. Cisitu No.190-A Rt.005 Rw.011 Kel.Dago Kec.Coblong Kota Bandung', '3273020103950015', 'Perdagangan Umum (Sesuai Zona)', 'putra surya', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(471, 'Putri Kembang M', 'Jl.Lebak Asih Rt.006 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095206700013', 'Ayam', 'putri kembang m', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(472, 'Raharjo', 'Bekasi Bulak Rt.005 Rw.001 Kec.Duren Jaya Kec.Bekasi Timur Kota Bekasi', '3275010301670018', 'Sembako', 'raharjo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(473, 'Rahmi Wulansari', 'Komp. Pemda C 1 No.10 Rt.001 Rw.011 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094511800015', 'Pakaian', 'rahmi wulansari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(474, 'Randika Putra', 'Jatibening Estate D1/35 Rt.007 Rw.013 Kel.Jatibening Kec.Pondokgede Kota Bekasi', '3275081704950021', 'Kue Kering', 'randika putra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(475, 'Randy Bagus Nurrizkianto', 'Kp. Sawah No 67 Rt.004 Rw.001 Kel.Jatiwarna Kec.Pondok Melati Kota Bekasi', '3275122211940010', 'Ayam Potong', 'randy bagus nurrizkianto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(478, 'Rapita Ani', 'Kp.Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275097008970019', 'Daging', 'rapita ani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(479, 'Ratinah', 'Kp Pondok Benda Rt.001 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096812810010', 'Pakaian', 'ratinah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(480, 'Raziah Hanum', 'Jl. Kalimantan Blok B.6 No.76 Rt.001 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275097004640007', 'Pakaian', 'raziah hanum', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(481, 'Rediansyah', 'Pondok Benda Rt/Rw 005/004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090401940010', 'Emas', 'rediansyah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(488, 'Ria Irawati', 'Jl.Musolah Al Falah Kp Kebantenan Rt.001 Rw.006 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095901960007', 'Sayur', 'ria irawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(489, 'Riama Purba', 'Kp.Bulak Rt.005 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275097004810015', 'Bumbu', 'riama purba', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(490, 'Rientje Masita', 'Satwika Permai Blok C 2/9Rt.006 Rw.009 Kel.Jatiluhur Kec.Jatiasih Kota Bekasi', '3275096705660012', 'Aksesoris', 'rientje masita', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(491, 'Rika Rahmawati', 'Jl.Masjid II NO.40 RT.002 RW.011 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275085302950009', 'Pakaian', 'rika rahmawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(492, 'Rike Noviana', 'Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094311990007', 'Ayam', 'rike noviana', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(493, 'Rini Erliyanah', 'Pondok Surya Mandala Blok E1 No 8 Rt.004 Rw.013 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275044404690021', 'Frozen Food', 'rini erliyanah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(494, 'Ririn Fitriana', 'Jl. Swatantra II Rt.002 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095901990009', 'Sepatu', 'ririn fitriana', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(495, 'Riyadiningsih, Se,Msi', 'Perum Jati Asih Indah Rt.005 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096112600006', 'Baju Batik', 'riyadiningsih, se,msi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(497, 'Riyo Dahono', 'Kp. Pondok Benda Rt.005 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090905680005', 'Pakaian', 'riyo dahono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(498, 'Rizki Febrian', 'Kaumpandak Rt.002 Rw.011 Kel.Karadenan Kec.Cibinong Kabupaten Bogor', '3201012802960001', 'Bumbu', 'rizki febrian', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(499, 'Rizky Marshelly Fazriyanti', 'Jl. Dahlia V No.49 Rt.002 Rw.008 Kel.Jaka Sampurna Kec.Bekasi Barat Kota Bekasi', '3275095505850017', 'Pakaian', 'rizky marshelly fazriyanti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(500, 'Rohadih N', 'Kp Pamahan Rt.002 Rw.009 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275091008640011', 'Buah', 'rohadih n', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(502, 'Rohidi Bin Satra', 'Kp.Pondok Benda Rt.004 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090705700010', 'Daging', 'rohidi bin satra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(503, 'Rohmat', 'Kp. Cikupa Kidul Rt.002 Rw.009 Kel.Cijujung Kec.Cibungbulang Kabupaten Bogor', '3201160910870002', 'Sayur', 'rohmat', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(504, 'Romawati Silalahi', 'Graha Indah Jl. Apel Raya Blok A22 No.1 Rt.001 Rw.010 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275044109690013', 'Perdagangan Umum (Sesuai Zona)', 'romawati silalahi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(506, 'Romi Z', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091703820011', 'Sembako', 'romi z', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(508, 'Rona Tampubolon', 'Kp.Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095810273000', 'Sembako', 'rona tampubolon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(510, 'Roni Iskandar', 'Pekayon Jaya No. 124 A Rt.002 Rw.026 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3314111407880004', 'Ikan Air Tawar', 'roni iskandar', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(512, 'Rosadih', 'Kp Bulak Rt.002 Rw.013 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090707870017', 'Buah', 'rosadih', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(513, 'Rosid', 'Kp.Kebantenan Rt.003 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092408800012', 'Sayur', 'rosid', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(515, 'Rosidin', 'Kp Cikaret Rt.003 Rw.007 Kel.Cikalong Kec.Cikalong Kabupaten Tasikmalaya', '3206030405900002', 'Ayam', 'rosidin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(516, 'Rosline Tampubolon', 'Masyeba Indah.Blk.La/07 Rt.005 Rw.004 Kel.Bukit Tempayan Kec.Batu Aji Kota Batam', '3206030405900002', 'Sembako', 'rosline tampubolon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(517, 'Rosline Tampubolon', 'Masyeba Indah.Blk.La/07 Rt.005 Rw.004 Kel.Bukit Tempayan Kec.Batu Aji Kota Batam', '2171125710710001', 'Sembako', 'rosline tampubolon', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(518, 'Rr Harjanti Ratna Dumila', 'Komp Pemda Jatiasih, Jl. Arjuna BI NO 36 Rt.001 Rw.001 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '327509612830006', 'Perdagangan Umum (Sesuai Zona)', 'rr harjanti ratna dumila', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(519, 'Rudi Hermawan', 'Jl.Masjid Baitussalam No 12 Rt.002 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091604900015', 'Daging', 'rudi hermawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(520, 'Rukmani', 'Vila Nusa Indah Blok I.3/6 Rt.003 Rw.017 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201022402600004', 'Sembako', 'rukmani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(521, 'Rusidi, Ir', 'Vila Mahkota Pesona Bllok If 2/31 Rt.003 Rw.025 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201021302620004', 'Perdagangan Umum (Sesuai Zona)', 'rusidi, ir', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(522, 'Sadri', 'Jl Bunga Rampai 9/2 No.21 Rt/Rw 007/006 Kel.Malaka Jaya Kec.Duren Sawit Jakarta Timur', '3175070309660002', 'Kosmetik', 'sadri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(524, 'Saeful Hajat', 'Jl.Swatantra I Kav Vii No.99 Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090102700014', 'Klontong', 'saeful hajat', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(527, 'Sagimin', 'Kp Kebantenan Rt.002 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091607630014', 'Gilingan Bakso', 'sagimin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(529, 'Samar Supendi', 'Jln Gardu Kp Pondok Benda Rt.004 Rw.002 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090101730026', 'Ikan Laut', 'samar supendi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(530, 'Samsuar', 'Kp.Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090101760021', 'Sembako', 'samsuar', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(531, 'Samsuri', 'Jati Padang Rt.006 Rw.002 Kel.Jati Padang Kec.Pasar Minggu Jakarta Selatan', '3526160303840001', 'Sayur', 'samsuri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(532, 'Sayadi', 'Bojong Menteng Rt.002 Rw.002 Kel.Bojong Menteng Kec.Rawalumbu Kota Bekasi', '3275050808770028', 'Ayam', 'sayadi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(533, 'Selamet', 'Jl. Asem No.3 Rt.003 Rw.003 Kel.Bidara Cina Kec.Jatinegara Jakarta Timur', '3175032503650010', 'Plastik', 'selamet', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(534, 'Siat Sian', 'Clauster Sultan Residence Jl.Swatantra 3 Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094504740030', 'Perdagangan Umum (Sesuai Zona)', 'siat sian', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(535, 'Sigit Nugroho', 'Kp.Pondok Benda Rt.007 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091001850021', 'Daging', 'sigit nugroho', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(537, 'Singgih Wibowo', 'Kp.Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092503860005', 'Ayam', 'singgih wibowo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(538, 'Siti Fatimah', 'Kp.Pondok Benda Rt.004 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094302840010', 'Sembako', 'siti fatimah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(539, 'Siti Komariah', 'Jl.Irian Jaya Iii C8/369 Perum Jatiasih Indah Rt.006 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096403760017', 'Sembako', 'siti komariah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(540, 'Siti Murnayasih', 'Kp.Kebantenan Rt.001 Rw.016 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095411880007', 'Sayur', 'siti murnayasih', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(544, 'Siti Nurjanah', 'Cikunir Bulat Rt.004 Rw.012 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3327135501900005', 'Tahu/Tempe', 'siti nurjanah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(545, 'Siti Rakhmah Awaliyah', 'Kp.Kebantenan Rt.002 Rw.010 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094309020013', 'Daging', 'siti rakhmah awaliyah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(547, 'Siti Rofidah', 'Jl.Dr.Ratna No.40 Jatikramat Kel.Jatikramat Kec.Jatiasih Kota Bekasi', '3275096510860019', 'Ayam Kampung', 'siti rofidah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(548, 'Siti Wahyuni, Dra', 'Vila Mahkota Pesona Blok If 2/31 Rt/Rw 003/025 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201024201660005', 'Perdagangan Umum (Sesuai Zona)', 'siti wahyuni, dra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(549, 'Siwi Handriyani', 'Graha Indah Blok A5/6 Rt.002 Rw.014 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275095506750194', 'Perabot', 'siwi handriyani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(550, 'Slamet', 'Pendem Rt.009 Rw.003 Kel.Pendem Kec.Ngariboyo Kabupaten Magetan', '3275095411880007', 'Filet Ayam', 'slamet', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(551, 'Sobijah', 'Kp.Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '327509471069001', 'Ayam Potong', 'sobijah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(558, 'Sofia Lape', 'Perum Lacasan II NO.110 RT.002 RW.003 Kel.Jatiluhur Kec.Jatiasih Kota Bekasi', '7171026109730001', 'Foodcourt', 'sofia lape', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(559, 'Solihin', 'Jl.F Gg H No.33 Rt.005 Rw.002 Kel.Rawa Badak Utara Kec.Koja Jakarta Utara', '3172030803560002', 'Ikan Basah', 'solihin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(561, 'Sopiah', 'Kampung Utan Jaka Setia Rt.006 Rw.002 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275046110860006', 'Perdagangan Umum (Sesuai Zona)', 'sopiah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(562, 'Sri Lestari', 'Kp.Cikunir Bulak Rt.004 Rw.012 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275045303860018', 'Tahu/Tempe', 'sri lestari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(563, 'Sri Nuryani', 'Bojong Menteng No.47 Rt.002 Rw.002 Kel.Bojong Menteng Kec.Rawalumbu Kota Bekasi', '3275055610650007', 'Ayam', 'sri nuryani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(564, 'Sri Wahyuni', 'Jl Masjid Baitusalam Rt.002 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '327504708790026', 'Pakaian', 'sri wahyuni', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(568, 'Sriyono', 'Kp. Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090904660009', 'Gilingan Bakso', 'sriyono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(571, 'Suarningsih', 'Jl. Kakatua Blok B I/9 Rt.009 Rw.012 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096404680012', 'Perdagangan Umum (Sesuai Zona)', 'suarningsih', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(572, 'Suci Melita', 'Kp Pondok Benda Rt.003 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096001960010', 'Sembako', 'suci melita', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(574, 'Sudarisman', 'Jl.Pisangan Lama Rt.013 Rw.004 Kel.Pisangan Timur Kec.Pulogadung Jakarta Timur', '3175023011630005', 'Pakaian', 'sudarisman', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(575, 'Sudarmadi', 'Pondok Surya Mandala. Jaka Mulya Rt.004 Rw.013 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275040505570019', 'Perdagangan Umum (Sesuai Zona)', 'sudarmadi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(576, 'Suhendi', 'Jl Jatikramat No.22 Rt.001 Rw.011 Kel.Jatikramat Kec.Jatiasih Kota Bekasi', '3275091506680081', 'Gilingan Somay', 'suhendi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(578, 'Suhendri', 'Jatikramat Rt.005 Rw.001 Kel.Jatikramat Kec.Jatiasih Kota Bekasi', '3275091506830107', 'Kelapa', 'suhendri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(580, 'Sujasno', 'Kp Sawah No.7 Rt.001 Rw.004 Kel.Jatimelati Kec.Pondokmelati Kota Bekasi', '3275122106820005', 'Gilingan Bakso', 'sujasno', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(581, 'Sukendar', 'Pangkah Rt.002 Rw.001 Kel.Samong Kec.Ulujami Kabupaten Pemalang', '3327130111770004', 'Tahu/Tempe', 'sukendar', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(582, 'Sukri', 'Jl. Lebak Asih Rt.006 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092208740014', 'Pakaian', 'sukri', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(583, 'Sularmin', 'Kp Tengah Rt.001 Rw.005 Kel.Cileungsi Kec.Cileungsi Kabupaten Bogor', '3201072601850006', 'Gilingan Bakso', 'sularmin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(585, 'Suparno', 'Kp.Pondok Benda Rt.008 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091503670006', 'Sayur', 'suparno', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(586, 'Supiyandi', 'Kp. Pondok Benda Rt.007 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090409700021', 'Foodcourt', 'supiyandi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(588, 'Supriyadi', 'Jl.Gender I No.236 B Rt.005 Rw.007 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090711660006', 'Frozen Food', 'supriyadi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(590, 'Supriyanto', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090712750007', 'Campuran', 'supriyanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(591, 'Suryadi', 'Kp.Utan Rt.006 Rw.002 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275040203670020', 'Tahu/Tempe', 'suryadi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(592, 'Suryani Nilawati', 'Kp.Bulak Rt.001 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095303920009', 'Sembako', 'suryani nilawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(593, 'Susilawati', 'Kp. Kebantenan Rt.001 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096412760006', 'Sepatu', 'susilawati', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(594, 'Sutrisno', 'Kp.Kebantenan Rt.001 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092911720005', 'Perabot', 'sutrisno', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(601, 'Suyatno', 'Jl.Lebak Asih Rt.006 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275092512730014', 'Sayur', 'suyatno', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(602, 'Suyuno', 'Kp Pondok Benda Rt.003 Rw.002 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092903690006', 'Campuran', 'suyuno', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(604, 'Syafrial', 'Jl.Wijaya Kusuma 2 Gg.10 No.7 Rt.005 Rw.007 Kel.Malaka Sari Kec.Duren Sawit Jakarta Timur', '3275090404820021', 'Pakaian', 'syafrial', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(605, 'Syaiful Tabi', 'Jl.H.Nawin No 17 Rt.008 Rw.003 Kel.Jaticempaka Kec.Pondokgede Kota Bekasi', '3275082409770014', 'Langsam', 'syaiful tabi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(606, 'Syarifudin', 'Jl Lebak Asih Kp Kebantenan Rt.006 Rw.004 Kel.Jatiasih Kec.Jatiasih', '3275092202510001', 'Kosmetik', 'syarifudin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(607, 'Syawal', 'Kp Poncol Rt.002 Rw.001 Kel. Jaka Setia Kec. Bekasi Selatan Kota Bekasi', '3275040805650023', 'Ayam Potong', 'syawal', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(609, 'Tamsiyah', 'Kp.Pondok Benda Rt.002 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095503750019', 'Sembako', 'tamsiyah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(611, 'Tarsono', 'Kp.Pondok Benda Rt.004 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090602800025', 'Sembako', 'tarsono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(612, 'Tedi Jaelani', 'Jl.Masjid Baitussalam Rt.002 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091605910004', 'Daging', 'tedi jaelani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(613, 'Teguh Sunaryo', 'Bantargebang Utara Rt.003 Rw.003 Kel.Bantargebang Kec.Bantargebang Kota Bekasi', '3275070708750030', 'Ayam', 'teguh sunaryo', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(615, 'Tetty H Siahaan', 'Bumi Mutiara 2 Blok Jh.3/13 Rt.005 Rw.035 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201025009670006', 'Pakaian', 'tetty h siahaan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(616, 'Thifal Alwanis', 'Pekayon Indah Blok BB25 No.5 RT.005 / RW.012 Pekayon Jaya, Bekasi Selatan – Kota Bekasi', '3275044511980013', 'Perlengkapan Muslim', 'thifal alwanis', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(617, 'Tjhang Tji Fen', 'Jl Yasmin Iii Blok C3/21 Rt/Rw 008/013 Kel.Sepanjang Jaya Kec.Rawalumbu Kota Bekasi', '3275051811710006', 'Emas', 'tjhang tji fen', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(619, 'Tommy Naga Saputra', 'Kp.Pondok Benda Rt.007 Rw.003 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3202060211890002', 'Sepatu', 'tommy naga saputra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(620, 'Tovik Hidayat', 'Jl.Kesatrian V Rt.026 Rw.003 Kel.Kebon Manggis Kec.Matraman Jakarta Timur', '3175011506710011', 'Perdagangan Umum (Sesuai Zona)', 'tovik hidayat', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(621, 'Triyanto', 'Kp.Pondok Benda Rt.005 Rw.001 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3175102105780001', 'Sembako', 'triyanto', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(622, 'Tuser Haikaku Gracia', 'Kp Rawa Panjang Rt.002 Rw.003 Kel.Sepanjang Jaya Kec.Rawalumbu Kota Bekasi', '3275094610930006', 'Perdagangan Umum (Sesuai Zona)', 'tuser haikaku gracia', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(624, 'Tussy Maharani', 'Raffles Hills Blok S.3 No.3 Rt.005 Rw.012 Kel.Jatikarya Kec.Jatisampurna Kota Bekasi', '3275107103770003', 'Frozen', 'tussy maharani', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(626, 'Ubaidillah', 'Jl.H.Rijin Jatimakmur Rt.001 Rw.009 Kel.Jatimakmur Kec.Pondokgede Kota Bekasi', '3275080711680011', 'Daging', 'ubaidillah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(628, 'Udin Baharudin', 'Kp.Pondok Benda Rt.007 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090608770020', 'Sembako', 'udin baharudin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(630, 'Ulung Haerudin', 'Kp. Pedaengan Rt.004 Rw.008 Kel.Penggilingan Kec.Cakung Jakarta Timur', '3601150708740003', 'Daging', 'ulung haerudin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(631, 'Wahyudin Shi', 'Kp.Bubulak Rt.003 Rw.005 Kel.Bojong Kulur Kec.Gunung Putri Kabupaten Bogor', '3201021111840013', 'Beras', 'wahyudin shi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(633, 'Wardiyan', 'Jatiwaringin Rt.007 Rw.003 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275080709480011', 'Tahu', 'wardiyan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(634, 'Warsito Bin Pujiyono', 'Pekayon Jaya Rt.001 Rw.020 Kel.Pekayon Jaya Kec.Bekasi Selatan Kota Bekasi', '3275040505840035', 'Ayam', 'warsito bin pujiyono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(635, 'Wasim', 'Jl. Penghulu Ii Rt.002 Rw.009 Kel.Jatiwaringin Kec.Pondokgede Kota Bekasi', '3275052005660014', 'Sayur', 'wasim', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(636, 'Wawan Saputra', 'Kp Kebantenan Rt/Rw 003/012 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275090105840009', 'Peralatan Elektronik', 'wawan saputra', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(637, 'Wawan Suherwan', 'Kp Cipalegor Rt.001 Rw.006 Kel.Kiarajangkung Kec.Sukahening Kabupaten Tasikmalaya', '3206331708700002', 'Ikan Tawar', 'wawan suherwan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9);
INSERT INTO `pedagang` (`id`, `nama`, `alamat`, `nik`, `jenis_usaha`, `username`, `password`, `foto`, `ktp`, `kk`, `npwp`, `role_id`) VALUES
(639, 'Wida Yulianti', 'Kp.Bulak Rt.004 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275095611860014', 'Aksesoris', 'wida yulianti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(640, 'Widia Lestari', 'Jl.Wijaya Ii Rt.002 Rw.006 Kel.Jatirahayu Kec.Pondok Melati Kota Bekasi', '1306145311890001', 'Kue Kering', 'widia lestari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(641, 'Wing Dharmawan, St', 'Pondok Mitra Lestari Jl Camar Blok A 17/20 Rt.009 Rw.013 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3273272909680002', 'Sembako', 'wing dharmawan, st', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(643, 'Wulandari', 'Jl. H. Madrais Cikunir Rt.005 Rw.003 Kel.Jaka Mulya Kec.Bekasi Selatan Kota Bekasi', '3275046109870008', 'Perabot', 'wulandari', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(644, 'Yadi Hidayat', 'Jl. Pulo Minas Raya Rt.005 Rw.017 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275040710710012', 'Pakaian', 'yadi hidayat', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(646, 'Yanti Liana Darma', 'Kp. Perumpung Rt.002 / Rw.002, Gunungsindur, Gunung Sindur - Kabupaten Bogor', '3201115504820001', 'Perdagangan Umum (Sesuai Zona)', 'yanti liana darma', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(650, 'Yasin', 'Kp.Pondok Benda Rt.005 Rw.004 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275092006730011', 'Ayam', 'yasin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(651, 'Yasir Hartono', 'Jl.Beringin Jaya No.8 Rt.005 Rw.004 Kel.Ceger Kec.Cipayung Jakarta Timur', '3175102006700010', 'Foodcourt', 'yasir hartono', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(652, 'Yati Haryati Hj S.Pd', 'Jl.Kemakmuran Rt.004 Rw.005 Kel.Marga Jaya Kec.Bekasi Selatan Kota Bekasi', '3275045605630011', 'Sembako', 'yati haryati hj s.pd', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(653, 'Yayi Rahayu Sunarti', 'Kp.Pondok Benda Rt.002 Rw.001 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275096405910008', 'Jajanan Pasar', 'yayi rahayu sunarti', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(654, 'Yeni Amalia', 'Kp Bulak Rt.002 Rw.003 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275096604570002', 'Sembako', 'yeni amalia', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(655, 'Yenny Kurniawan', 'Cluster Acacia No.Bb 30 Rt.002 Rw.012 Kel.Harapan Mulya Kec.Mudan Satria Kota Bekasi', '3275094106860016', 'Emas', 'yenny kurniawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(657, 'Yogie Kurniawan', 'Perum Jatiasih Indah Jl. Aru Ii Blok D8/60-61 Rt.001 Rw.006 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275090510930007', 'Perdagangan Umum (Sesuai Zona)', 'yogie kurniawan', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(662, 'Yudhi Ariyani L', 'Perumahan Angkasa Puri Jl.Pisang No.4 Rt.013 Rw.010 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3275094602720017', 'Pakaian', 'yudhi ariyani l', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(664, 'Yuliyah', 'Kp Pondok Benda Rt.009 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275094101767008', 'Perabotan Rumah Tangga', 'yuliyah', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(665, 'Yuliyana', 'Jl Cemara Kp Cakung No.55 Rt/Rw 004/012 Kel.Jatimekar Kec.Jatiasih Kota Bekasi', '3175036506840004', 'Pakaian', 'yuliyana', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(666, 'Yuristianingsih', 'Sakura Regency Blok N/17 Rt.004 Rw.017 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275094606740029', 'Tas', 'yuristianingsih', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(667, 'Zaenab B Smith', 'Kemang Ifi Graha Blok D 3/10 Jl.Klaten Rt.009 Rw.014 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275095507690017', 'Obat-Obatan', 'zaenab b smith', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(668, 'Zaenal Sofarudin', 'Kp. Kebantenan Rt.004 Rw.005 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3275091504970008', 'Buah', 'zaenal sofarudin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(669, 'Zahrul Hadi', 'Ko.Pondok Benda Rt.006 Rw.002 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275091207760015', 'Perabot', 'zahrul hadi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(670, 'Zainal Arifin', 'Kp Utan Rt.006 Rw.002 Kel.Jaka Setia Kec.Bekasi Selatan Kota Bekasi', '3275041207740013', 'Tahu/Tempe', 'zainal arifin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(671, 'Zainul Arifin', 'Dsn.Janglor Rt.003 Rw.001 Kel.Lajing Kec.Arosbaya Kabupaten Bangkalan', '3526051110930001', 'Ikan Laut', 'zainul arifin', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(672, 'Zulkifli M', 'Kp.Kebantenan Rt.004 Rw.004 Kel.Jatiasih Kec.Jatiasih Kota Bekasi', '3175070102680014', 'Sembako', 'zulkifli m', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(674, 'Zurahmi', 'Jl. Swantantra I Kvl 3/135 Rt.004 Rw.005 Kel.Jatirasa Kec.Jatiasih Kota Bekasi', '3275025607820029', 'Kerudung', 'zurahmi', '$2y$10$d3IiLZKEInpsWCzxYpoXt.gaf4vOa3Tn.P3j7MPzNmJGlp99alq1O', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(675, 'Imas', 'Jl. Hegarmanah Cikendi Rt.005 Rw.009, Hegarmanah, Cidadap – Kota Bandung', '1671066304710009', NULL, 'imas', '$2y$10$J1T1iWiMevoxM6hAJvSfCuyd.dAEk1zRW1h2z6ZjIKOa.OLWN1l.G', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(676, 'Dra. Antje Sartika', 'Jl. Samiaji Raya No.09 Rt.003 Rw.014, Bantarjati, Bogor Utara – Kota Bogor', '3271054904630001', NULL, 'antje', '$2y$10$zC4D/SeVqaOO.BUSg.SZO.h.JEe3zA0.1fqtbCt2m16AGtYXsTr7S', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(677, 'Oce Darmawan', 'Jl. Benus Timur V No.11 Rt.002 Rw.001, Manjahlega, Rancasari – Kota Bandung', '3273233010620006', NULL, 'oced', '$2y$10$8f/Izn5nbWX12eIp5at3IuKsH7nhoJggP4F.Ale8vqu2dIx5XzaTy', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(678, 'Soemantoro', 'Jl. Hijau Lestari X / 1 Perum. Pondok Hijau Rt.005 Rw.009, Pisangan, Ciputat Timur – Kota Tangerang Selatan', '3674051409590002', NULL, 'somantoro', '$2y$10$HrWlZzXimiOj8.QGRTh7iu3FCJq5/KMSRwiGF/F7HpLsqObvUQ04y', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(679, 'Ita Puspasari', 'Jl. Kelapa Gading I No.26 Rt.005 Rw.001, Kramatjati, Kramatjati – Jakarta Timur', '3175045306860003', NULL, 'itapuspasari', '$2y$10$2Evzjjj7Hh5NLOOe9fcDlenjMK9PfLmkKBESrpJNrsK6r0zXpzboq', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(680, 'Widi Hartono', 'Puri Lestari Blok G3/05 Rt.003 Rw.007 Kel.Jurumudi Kec.Benda - Kota Tangerang', '3671042605710001', NULL, 'widi', '$2y$10$Qh2DI3Og7avjzyTsJ37eSuTMVs32kbOFPns5ohmp4vHPoD9gG64e2', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(681, 'Abdul Aziz Bari', 'Kp. Pondok Benda Rt.009 Rw.005 Jatirasa, Jatiasih - Kota Bekasi', '3275090704640014', NULL, 'aabari', '$2y$10$fiTx0uKrGsZnpdXOyJpxwOPkNQjNXx3/e2wudfKI7DU.axrQZUddq', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(682, 'Marjohan', 'Kp. Kebantenan Jl. Swatantra II GG H Ibrahim Rt.004 Rw.004 Jatiasih, Jatiasih - Kota Bekasi', '3275090202780024', NULL, 'marjohan', '$2y$10$4IfnNV3oai7X14LNcyxk5u/uATB7gS90hcuRJ3INKUlxl1J1ULEoi', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(683, 'Dania Febriati', 'Kp. Pondok Benda Rt.005 Rw.004 Jatirasa, Jatiasih - Kota Bekasi', '3275094602040002', NULL, 'dianafebriati', '$2y$10$YlwwScoi9TUT.LtIMi.Z/eJhqaxe08h.ZfenPcZJHrj9cNLmEhFsW', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9),
(684, 'Yully Darmayanti', 'Gg. Karya No.2 Rt.002 Rw.006 Lubang Buaya, Cipayung - Jakarta Timur', '3171076207810004', NULL, 'yully', '$2y$10$OTWWt7dff4qFGi5c2BR8ruTqxyPCtD4ol5kXIOQjYtmR5QFwSemWO', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_join` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gol_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `npwp`, `foto`, `username`, `password`, `role_id`, `date_join`, `email`, `gol_id`, `status`) VALUES
(1, 'Nur Alamsyah', '1266000112185-013', '428678379427000', 'fotoalam.jpeg', 'alam', '$2y$10$5dl2zCTmjsY9YQEOrzXMRuOqXb96YnU96eoWRv1eoJdhPhhVOi..q', 1, '1715292000', 'nur.tekno44@gmail.com', 5, 1),
(2, 'Siti Hasinah Maryam', '1266000112185-002', '428678379427000', 'fotomaryam.jpg', 'maryam', '$2y$10$5H/icftOPxaPxhT1jFKOqeGTN3oTjaRvpZ91lgq/5uh7WUjwHao4e', 8, '1715292000', 'smaryamh@gmail.com', 6, 1),
(3, 'Septiany Ferdiansyah', '1266000112185-008', '428678379427009', 'default.jpg', 'septi', '$2y$10$qKxGSA69c9n5d9gbgbBgBuaV766ImTP8BgWmyUqMxZSHmVC0Y.NTq', 2, '1715292000', 'odiagixaiqudxuv@manen1.com', 5, 0),
(5, 'Yuliansyah', '1266000112185-003', '428678379427012', 'default.jpg', 'jaka', '$2y$10$Td6Ec37IJd/ncqkN4nzERO/nn4mIT7zF3fAbO1Hwyr5S/5vAvw/He', 6, '1715551200', 'yuliansyah@gmail.com', 5, 1),
(6, 'Vera', '1266000112185-009', '428678379427118', 'default.jpg', 'vera', '$2y$10$JENzj0Yc0yrM5jbbtwyBAeYcFxE65ApF7zIpSQO2dBLG.XiVBMiwG', 2, '1717711200', 'vera@gmail.com', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nilai_proyek` varchar(255) NOT NULL,
  `persentase` varchar(10) NOT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id`, `kode`, `nama`, `lokasi`, `nilai_proyek`, `persentase`, `start`, `end`, `status`) VALUES
(1, 'PP-01.A.001', 'Pembangunan Pasar Jatiasih', 'Jl. Raya Jati Asih Jatirasa, Jatiasih - Kota Bekasi', '44574000000', '100.00', '1612134000', '1672268400', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `scan_surat`
--

CREATE TABLE `scan_surat` (
  `id` int(11) NOT NULL,
  `isi_id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `scan_surat`
--

INSERT INTO `scan_surat` (`id`, `isi_id`, `file`) VALUES
(2, 16, '037.pdf'),
(3, 18, '038.pdf'),
(4, 19, '039.pdf'),
(8, 21, '040.pdf'),
(9, 22, '041.pdf'),
(10, 23, '041.jpg'),
(11, 24, '046.jpg'),
(12, 25, '042.pdf'),
(13, 26, '043.pdf'),
(14, 27, '044.pdf'),
(15, 28, '047.pdf'),
(16, 29, '049.jpg'),
(17, 30, '050.jpg'),
(18, 31, '048.jpg'),
(19, 32, '051.jpg'),
(20, 33, '052.jpg'),
(21, 34, '053.jpg'),
(22, 35, '054.jpg'),
(23, 36, '055.pdf'),
(24, 37, '056.pdf'),
(25, 38, NULL),
(26, 39, '057.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_manajemen`
--

CREATE TABLE `surat_manajemen` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_manajemen`
--

INSERT INTO `surat_manajemen` (`id`, `kode`, `type`) VALUES
(1, '015', 'Surat Dinas'),
(2, '025', 'Surat Intern'),
(3, '025', 'Surat Pedagang'),
(4, '025', 'Surat Rekomendasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(10, 1, 4),
(15, 6, 4),
(16, 6, 8),
(17, 1, 8),
(18, 1, 9),
(19, 7, 4),
(20, 7, 9),
(21, 1, 10),
(22, 1, 11),
(23, 8, 4),
(24, 8, 11),
(25, 2, 4),
(26, 10, 4),
(27, 10, 10),
(28, 9, 4),
(29, 9, 12),
(31, 1, 13),
(32, 1, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(4, 'Profile'),
(8, 'HRD'),
(9, 'Keuangan'),
(10, 'Manager'),
(11, 'Marketing'),
(12, 'Pasar'),
(13, 'ME'),
(14, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin Super'),
(2, 'Admin'),
(6, 'HRD'),
(7, 'Keuangan'),
(8, 'Marketing'),
(9, 'Pedagang'),
(10, 'Manager'),
(11, 'ME');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Menu Manajemen', 'menu', 'nav-icon fas fa-th'),
(2, 1, 'Sub Menu', 'submenu', 'nav-icon fas fa-tree'),
(4, 1, 'Role Manajemen', 'role', 'nav-icon fas fa-user-tie'),
(7, 1, 'Pegawai Manajemen', 'pegawai', 'nav-icon fas fa-users'),
(8, 4, 'Profile', 'profile', 'nav-icon fas fa-user'),
(9, 4, 'Edit Password', 'profile/chpass', 'nav-icon fas fa-lock'),
(11, 8, 'Absensi', 'absensi', 'nav-icon fas fa-calendar'),
(12, 9, 'Golongan', 'golongan', 'nav-icon fas fa-user-tie'),
(13, 9, 'Pegawai', 'pegawais', 'nav-icon fas fa-users'),
(14, 9, 'Gaji Pegawai', 'gaji', 'nav-icon fas fa-dollar-sign'),
(15, 10, 'Proyek Manajemen', 'proyek', 'nav-icon fas fa-clock'),
(16, 11, 'Pasar', 'pasar', 'nav-icon far fa-building'),
(17, 11, 'Pedagang Manajemen', 'pedagang', 'nav-icon fas fa-users'),
(18, 12, 'Kios', 'kios', 'nav-icon far fa-building'),
(19, 1, 'Surat Manajemen', 'surat', 'nav-icon fas fa-envelope-open'),
(20, 13, 'Daya Listrik', 'me', 'nav-icon fas fa-bolt'),
(21, 11, 'Gabung Kios', 'gabung', 'nav-icon fas fa-link'),
(22, 13, 'Pencatatan Listrik', 'me/write', 'nav-icon fas fa-sticky-note'),
(23, 14, 'Kasir Manajemen', 'kasir', 'nav-icon fas fa-cash-register'),
(24, 11, 'Member Parkir', 'member', 'nav-icon fas fa-address-card');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bayar_kios`
--
ALTER TABLE `bayar_kios`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_anggaran`
--
ALTER TABLE `detail_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `isi_surat`
--
ALTER TABLE `isi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kios`
--
ALTER TABLE `kios`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwhlistrik`
--
ALTER TABLE `kwhlistrik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pedagang`
--
ALTER TABLE `pedagang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `scan_surat`
--
ALTER TABLE `scan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_manajemen`
--
ALTER TABLE `surat_manajemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bayar_kios`
--
ALTER TABLE `bayar_kios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `blok`
--
ALTER TABLE `blok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_anggaran`
--
ALTER TABLE `detail_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `isi_surat`
--
ALTER TABLE `isi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `kios`
--
ALTER TABLE `kios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1812;

--
-- AUTO_INCREMENT untuk tabel `kwhlistrik`
--
ALTER TABLE `kwhlistrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pedagang`
--
ALTER TABLE `pedagang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=685;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `scan_surat`
--
ALTER TABLE `scan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `surat_manajemen`
--
ALTER TABLE `surat_manajemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
