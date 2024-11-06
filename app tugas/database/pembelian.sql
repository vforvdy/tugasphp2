CREATE TABLE pembelian (
    id_pembelian INT PRIMARY KEY AUTO_INCREMENT,
    jumlah_pembelian INT,
    harga_beli DECIMAL(10,2),
    id_pengguna INT,
    id_barang INT,
    tanggal_pembelian DATE,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna),
    FOREIGN KEY (id_barang) REFERENCES barang(id_barang)
);

INSERT INTO pembelian (jumlah_pembelian, harga_beli, id_pengguna, id_barang, tanggal_pembelian) 
(5, 9000000.00, 1, 1, '2024-01-05'),   -- Laptop Asus
(8, 2500000.00, 2, 2, '2024-01-06'),   -- Monitor Dell
(10, 800000.00, 3, 3, '2024-01-07'),   -- Keyboard Logitech
(15, 350000.00, 1, 4, '2024-01-08'),   -- Mouse Gaming
(3, 4500000.00, 2, 5, '2024-01-09'),   -- Printer Canon
(20, 600000.00, 3, 6, '2024-01-10'),   -- SSD Samsung
(25, 450000.00, 1, 7, '2024-01-11'),   -- RAM Kingston
(12, 750000.00, 2, 8, '2024-01-12'),   -- Power Supply
(30, 250000.00, 3, 9, '2024-01-13'),   -- Webcam Logitech
(6, 1200000.00, 1, 10, '2024-01-14'),  -- Router TP-Link
(40, 100000.00, 2, 11, '2024-01-15'),  -- Mouse Pad
(50, 50000.00, 3, 12, '2024-01-16'),   -- USB Cable
(35, 75000.00, 1, 13, '2024-01-17'),   -- HDMI Cable
(4, 3500000.00, 2, 14, '2024-01-18'),  -- UPS APC
(7, 1500000.00, 3, 15, '2024-01-19');  -- Headset Gaming

