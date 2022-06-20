<?php

namespace Models;

use Lawana\Model\BaseModel;


class Penjualan extends BaseModel
{

    public static function store($data)
    {
        $query = "INSERT INTO penjualan(id_pelanggan, id_pegawai, no_antrian, total_harga, tanggal_penjualan) VALUES (:id_pelanggan, :id_pegawai, :no_antrian, :total_harga, :tanggal_penjualan)";

        $result = self::query($query)->execute($data);

        return self::query("SELECT LAST_INSERT_ID()")->execute()->fetch();
    }
    public static function detail($data)
    {
        $query = "INSERT INTO detail_penjualan(id_produk, id_penjualan, jumlah_barang, jumlah_harga) VALUES ";

        $values = '';
        $bind = [];

        for ($i = 0; $i < sizeof($data['id_produk']); $i++) {
            $values .= "(:id_produk_{$i}, :id_penjualan_{$i}, :jumlah_barang_{$i}, :jumlah_harga_{$i})";

            $bind[":id_produk_{$i}"] = $data['id_produk'][$i];
            $bind[":id_penjualan_{$i}"] = $data['id_penjualan'];
            $bind[":jumlah_barang_{$i}"] = $data['jumlah_barang'][$i];
            $bind[":jumlah_harga_{$i}"] = $data['jumlah_harga'][$data['id_produk'][$i]];

            if ($i != sizeof($data['id_produk']) - 1) {
                $values .= ', ';
            }
        }
        $query .= $values;

        $result = self::query($query)->execute($bind);
    }

    public static function detailWhere($id_penjualan)
    {
        $query = "SELECT * FROM detail_penjualan WHERE id_penjualan = {$id_penjualan}";

        return self::query($query)->execute()->fetch(FETCH_ALL);
    }

    public static function count()
    {
        $query = "SELECT COUNT(id_penjualan) total FROM penjualan";
        $result = self::query($query)->execute()->fetch();
        return $result;
    }


    private static function queryAll()
    {
        return "SELECT * FROM detail_penjualan
        JOIN penjualan p on detail_penjualan.id_penjualan = p.id_penjualan
        JOIN pelanggan p2 on p.id_pelanggan = p2.id_pelanggan
        JOIN produk p4 on detail_penjualan.id_produk = p4.id_produk
        JOIN merk m on p4.id_merk = m.id_merk
        JOIN kategori k on p4.id_kategori = k.id_kategori
        LEFT JOIN pegawai p3 on p.id_pegawai = p3.id_pegawai
        ";
    }

    private static function getAllDetailData($details)
    {
        $old_id_penjualan = 0;
        $data = [];

        foreach ($details as $detail) {
            // var_dump($detail);
            $barang = [
                'nama_produk' => $detail['nama_produk'],
                'harga_produk' => $detail['harga_produk'],
                'jumlah_barang' => $detail['jumlah_barang'],
                'jumlah_harga' => $detail['jumlah_harga'],
                'gambar_produk' => $detail['gambar_produk'],
            ];

            // var_dump($barang);

            if ($detail['id_penjualan'] != $old_id_penjualan) {
                $data[$detail['id_penjualan']] = [
                    'id_penjualan' => $detail['id_penjualan'],
                    'nama_pelanggan' => $detail['nama_pelanggan'],
                    'id_pegawai' => $detail['id_pegawai'],
                    'nama_pegawai' => $detail['nama_pegawai'],
                    'no_antrian' => $detail['no_antrian'],
                    'total_harga' => $detail['total_harga'],
                    'bayar' => $detail['bayar'],
                    'status' => $detail['status'],
                    'tanggal_penjualan' => $detail['tanggal_penjualan'],
                    'tanggal_proses' => $detail['tanggal_proses'],
                    'tanggal_selesai' => $detail['tanggal_selesai'],
                    'barang' => []
                ];
                array_push($data[$detail['id_penjualan']]['barang'], $barang);
            } else {
                array_push($data[$detail['id_penjualan']]['barang'], $barang);
            }

            $old_id_penjualan = $detail['id_penjualan'];
        }
        return $data;
    }

    public static function all($orderby = 'ASC')
    {
        $query = self::queryAll() . ' ORDER BY p.id_penjualan ' . $orderby;

        $details = self::query($query)->execute()->fetch(FETCH_ALL);

        $data = self::getAllDetailData($details);

        return $data;
    }

    public static function allWhere($key, $val, $sep = '=')
    {
        $query = self::queryAll() . " WHERE p.{$key} {$sep} {$val}";
             
        $details = self::query($query)->execute()->fetch(FETCH_ALL);

        $data = self::getAllDetailData($details);

        return $data;
    }

    public static function search_with_api($data) 
    {
        $query = self::queryAll() . " WHERE p.id_penjualan LIKE '%{$data}%' OR p3.nama_pegawai LIKE '%{$data}%' ORDER BY p.id_penjualan DESC";
        
        $details = self::query($query)->execute()->fetch(FETCH_ALL);

        $data = self::getAllDetailData($details);

        return $data;
    }

    public static function update_proses_pesanan($data)
    {
        $query = "UPDATE penjualan SET id_pegawai = :id_pegawai, status = 'diproses', tanggal_proses = :tanggal_proses, bayar = :bayar 
        WHERE id_penjualan = :id_penjualan";

        $result = self::query($query)->execute([
            ':id_pegawai' => $data['id_pegawai'],
            ':tanggal_proses' => $data['tanggal_proses'],
            ':id_penjualan' => $data['id_penjualan'],
            ':bayar' => $data['bayar']
        ]);

        return $result->result();
    }

    public static function update_status_pesanan_selesai($data)
    {
        $query = "UPDATE penjualan SET status = 'selesai', tanggal_selesai = :tanggal_selesai 
        WHERE id_penjualan = :id_penjualan";

        $result = self::query($query)->execute([
            ':id_penjualan' => $data['id_penjualan'],
            ':tanggal_selesai' => $data['tanggal_selesai']
        ]);

        return $result->result();
    }

    public static function update_status_pesanan_batal($data)
    {
        $query = "UPDATE penjualan SET status = 'dibatalkan'
        WHERE id_penjualan = :id_penjualan";

        $result = self::query($query)->execute([
            ':id_penjualan' => $data['id_penjualan']
        ]);

        return $result->result();
    }

    public static function get_penjualan_hari_ini()
    {
        $query = "SELECT * FROM penjualan 
                    LEFT JOIN pegawai p on penjualan.id_pegawai = p.id_pegawai
                    WHERE DATE(tanggal_penjualan) = CURRENT_DATE()
                    GROUP BY id_penjualan DESC";

        $result = self::query($query)->execute()->fetch(FETCH_ALL);

        return $result;
    }
}
