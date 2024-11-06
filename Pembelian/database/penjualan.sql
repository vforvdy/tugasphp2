CREATE TABLE penjualan (
    id_penjualan INT PRIMARY KEY AUTO_INCREMENT,
    jumlah_penjualan INT,
    harga_jual DECIMAL(10,2),
    id_pengguna INT,
    id_barang INT,
    tanggal_penjualan DATE,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna),
    FOREIGN KEY (id_barang) REFERENCES barang(id_barang)
);



INSERT INTO penjualan (jumlah_penjualan, harga_jual, id_pengguna, id_barang, tanggal_penjualan) 
(2, 10500000.00, 1, 1, '2024-01-06'),    -- Laptop Asus
(3, 3000000.00, 2, 2, '2024-01-07'),     -- Monitor Dell
(5, 950000.00, 3, 3, '2024-01-08'),      -- Keyboard Logitech
(8, 450000.00, 1, 4, '2024-01-09'),      -- Mouse Gaming
(1, 5000000.00, 2, 5, '2024-01-10'),     -- Printer Canon
(10, 750000.00, 3, 6, '2024-01-11'),     -- SSD Samsung
(15, 550000.00, 1, 7, '2024-01-12'),     -- RAM Kingston
(5, 900000.00, 2, 8, '2024-01-13'),      -- Power Supply
(12, 350000.00, 3, 9, '2024-01-14'),     -- Webcam Logitech
(2, 1500000.00, 1, 10, '2024-01-15'),    -- Router TP-Link
(20, 150000.00, 2, 11, '2024-01-16'),    -- Mouse Pad
(25, 75000.00, 3, 12, '2024-01-17'),     -- USB Cable
(15, 100000.00, 1, 13, '2024-01-18'),    -- HDMI Cable
(2, 4000000.00, 2, 14, '2024-01-19'),    -- UPS APC
(3, 1800000.00, 3, 15, '2024-01-20');    -- Headset Gaming

