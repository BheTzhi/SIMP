<?php
$config['cacheable'] = true; // Jika Anda ingin menyimpan hasil QR Code di cache
$config['cachedir'] = ''; // Lokasi direktori cache (sesuaikan jika Anda ingin menyimpan di tempat tertentu)
$config['errorlog'] = FCPATH . 'application/logs/'; // Lokasi file log error
$config['imagedir'] = FCPATH . 'assets/qr/'; // Lokasi direktori untuk menyimpan gambar QR Code
$config['quality'] = true; // Tingkat kualitas gambar QR Code
$config['size'] = '1024'; // Ukuran pixel QR Code
$config['black'] = array(224, 255, 255); // Warna hitam dalam RGB
$config['white'] = array(70, 130, 180); // Warna putih dalam RGB
