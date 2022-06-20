<?php

namespace Models;

use Lawana\Model\BaseModel;

class Produk extends BaseModel
{

    private static function joinQuery()
    {
        return "SELECT * FROM produk 
        LEFT JOIN merk ON produk.id_merk = merk.id_merk
        LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori";
    }

    public static function all()
    {
        $query = "SELECT * FROM produk";

        return self::fetch($query);
    }

    public static function getBy($key, $val)
    {
        $query = self::joinQuery() . " WHERE {$key} = {$val}";

        return self::fetch($query);
    }

    public static function getProduks()
    {
        $query = self::joinQuery();

        return self::fetch($query);
    }

    public static function getProduksbyId($ids)
    {
        $query = self::joinQuery();

        $where = ' WHERE ';
        for ($i = 0; $i < sizeof($ids); $i++) {
            $id = $ids[$i];
            $where .= "id_produk = {$id}";
            if ($i != sizeof($ids) - 1) {
                $where .= " OR ";
            }
        }
        $query .= $where;

        return self::fetch($query);
    }

    private static function fetch($query, $option = FETCH_ALL)
    {

        $data = self::query($query)->execute()->fetch(FETCH_ALL);
        return $data;
    }

    public static function update_stock_produk_by_id_penjualan($id_penjualan)
    {
        $query = "UPDATE produk p
        JOIN (SELECT id_produk, jumlah_barang FROM detail_penjualan WHERE id_penjualan = :id_penjualan) AS detail
        ON p.id_produk = detail.id_produk
        SET stok_produk = stok_produk - detail.jumlah_barang";

        $bind = [
            ':id_penjualan' => $id_penjualan,
        ];

        $result = self::query($query)->execute($bind);

        return $result->result();
    }

    public static function update_stock_produk_by_id_pembelian($id_pembelian)
    {
        $query = "UPDATE produk p
        JOIN (SELECT id_produk, jumlah_pembelian FROM pembelian WHERE id_pembelian = :id_pembelian) AS beli
        ON p.id_produk = beli.id_produk
        SET stok_produk = stok_produk + beli.jumlah_pembelian";

        $bind = [
            ':id_pembelian' => $id_pembelian,
        ];

        $result = self::query($query)->execute($bind);

        return $result->result();
    }


    public static function count_stock()
    {
        $query = "SELECT SUM(stok_produk) jumlah_stok FROM produk";

        $result = self::query($query)->execute()->fetch();
        return $result;
    }

    public static function count_produk()
    {
        $query = "SELECT COUNT(id_produk) jumlah_produk FROM produk WHERE id_merk IS NOT NULL AND id_kategori IS NOT NULL";

        $result = self::query($query)->execute()->fetch();
        return $result;
    }



    public static function range($start, $end, $search)
    {
        $start -= 1;
        $query = "SELECT * FROM produk
        JOIN merk m on produk.id_merk = m.id_merk
        JOIN kategori k on produk.id_kategori = k.id_kategori
        WHERE nama_produk LIKE '%{$search}%' OR nama_merk LIKE '%{$search}%' OR
              stok_produk LIKE '%{$search}%' OR harga_produk LIKE '%{$search}%' OR
              m.nama_merk LIKE '%{$search}%' OR k.jenis_kategori LIKE '%{$search}%'
        GROUP BY id_produk ASC
        LIMIT {$start}, {$end}";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }


    public static function store($data)
    {
        if ($data['keterangan_produk'] != 'null') {
            $query = "INSERT INTO produk (id_merk, id_kategori, nama_produk, stok_produk, harga_produk, keterangan_produk) 
            VALUES (:id_merk, :id_kategori, :nama_produk, :stok_produk, :harga_produk, :keterangan_produk)";

            $result = self::query($query)->execute([
                ':nama_produk' => $data['nama_produk'],
                ':stok_produk' => $data['stok_produk'],
                ':harga_produk' => $data['harga_produk'],
                ':keterangan_produk' => $data['keterangan_produk'],
                ':id_merk' => $data['id_merk'],
                ':id_kategori' => $data['id_kategori']
            ]);
        } else {
            $query = "INSERT INTO produk (id_merk, id_kategori, nama_produk, stok_produk, harga_produk) 
            VALUES (:id_merk, :id_kategori, :nama_produk, :stok_produk, :harga_produk)";

            $result = self::query($query)->execute([
                ':nama_produk' => $data['nama_produk'],
                ':stok_produk' => $data['stok_produk'],
                ':harga_produk' => $data['harga_produk'],
                ':id_merk' => $data['id_merk'],
                ':id_kategori' => $data['id_kategori']
            ]);
        }

        return $result;
    }


    public static function update($key, $val, $data)
    {
        if ($data['keterangan_produk'] != 'null') {
            $query = "UPDATE produk SET nama_produk = :nama_produk, 
                        stok_produk = :stok_produk, 
                        harga_produk = :harga_produk, 
                        keterangan_produk = :keterangan_produk,
                        id_merk = :id_merk, 
                        id_kategori = :id_kategori
                        WHERE {$key} = {$val}";

            $result = self::query($query)->execute([
                ':nama_produk' => $data['nama_produk'],
                ':stok_produk' => $data['stok_produk'],
                ':harga_produk' => $data['harga_produk'],
                ':keterangan_produk' => $data['keterangan_produk'],
                ':id_merk' => $data['id_merk'],
                ':id_kategori' => $data['id_kategori']
            ]);
        } else {
            $query = "UPDATE produk SET nama_produk = :nama_produk, 
                        stok_produk = :stok_produk, 
                        harga_produk = :harga_produk, 
                        keterangan_produk = NULL,
                        id_merk = :id_merk, 
                        id_kategori = :id_kategori
                        WHERE {$key} = {$val}";

            $result = self::query($query)->execute([
                ':nama_produk' => $data['nama_produk'],
                ':stok_produk' => $data['stok_produk'],
                ':harga_produk' => $data['harga_produk'],
                ':id_merk' => $data['id_merk'],
                ':id_kategori' => $data['id_kategori']
            ]);
        }

        return $result;
    }

    public static function drop($key, $val)
    {
        $query = "DELETE FROM produk WHERE {$key} = {$val}";

        $result = self::query($query)->execute();

        return $result;
    }
}
