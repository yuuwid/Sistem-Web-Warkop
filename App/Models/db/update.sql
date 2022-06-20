UPDATE detail_penjualan dp
JOIN produk p on dp.id_produk = p.id_produk
SET jumlah_harga = dp.jumlah_barang * p.harga_produk
WHERE dp.id_produk = p.id_produk;

UPDATE penjualan p
JOIN detail_penjualan dp on p.id_penjualan = dp.id_penjualan
SET total_harga = (SELECT SUM(jumlah_harga) FROM detail_penjualan dp WHERE dp.id_penjualan = p.id_penjualan)
WHERE p.id_penjualan = dp.id_penjualan;

UPDATE pembelian pb
JOIN produk p on pb.id_produk = p.id_produk
SET harga_beli = (SELECT CEIL(harga_produk - harga_produk * 15/100) FROM produk p WHERE p.id_produk = pb.id_produk)
WHERE p.id_produk = pb.id_produk
