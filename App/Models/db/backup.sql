INSERT INTO
    app (antrian)
VALUES
    (1);

INSERT INTO
    jabatan (jenis_jabatan)
VALUES
    ("Admin"),
    ("Kasir"),
    ("Staf Gudang");

INSERT INTO
    kategori (jenis_kategori)
VALUES
    ("Makanan"),
    ("Minuman"),
    ("Permen"),
    ("Lainnya");

INSERT INTO
    merk (nama_merk)
VALUES
    ("ABC"),
    ("Adem Sari"),
    ("AMH"),
    ("Anget Sari"),
    ("Aqua"),
    ("Astor"),
    ("Beng-Beng"),
    ("Bihunku"),
    ("Biskuat"),
    ("Burung Dara"),
    ("Caffino"),
    ("Champ"),
    ("Cheetos"),
    ("Chiki"),
    ("Chitato"),
    ("Choki Choki"),
    ("Coca-Cola"),
    ("Dua Kelinci"),
    ("Fanta"),
    ("Frisian Flag"),
    ("Garuda"),
    ("Good Day"),
    ("Good Time"),
    ("Hatari"),
    ("Ichitan"),
    ("Indocafe"),
    ("Indofood"),
    ("Indomie"),
    ("Indomilk"),
    ("Kinder"),
    ("Kopi Kenangan"),
    ("Kopi Luwak"),
    ("Kopiko"),
    ("Kratingdaeng"),
    ("L-Men"),
    ("Mie Sedaap"),
    ("Milo"),
    ("Mytea"),
    ("Nescafe"),
    ("Nestle"),
    ("NU Green Tea"),
    ("NutriSari"),
    ("Oreo"),
    ("Pepsi"),
    ("Pikopi"),
    ("Pocari Sweat"),
    ("Pop Ice"),
    ("Pop Mie"),
    ("Qtela"),
    ("Quaker"),
    ("Real Good"),
    ("Rebo"),
    ("Samyang"),
    ("Sari Roti"),
    ("Sarimi"),
    ("Sidomuncul"),
    ("Super Bubur"),
    ("SuperMi"),
    ("Teh Pucuk Harum"),
    ("Top Coffee"),
    ("Tora Bika"),
    ("Tora Cafe"),
    ("Ultra Milk"),
    ("Yakult"),
    ("You C1000"),
    ("Zee"),
    ("Lainnya");

INSERT INTO
    pegawai (
        id_jabatan,
        nama_pegawai,
        nik,
        notelp_pegawai,
        alamat_pegawai
    )
VALUES
    (
        1,
        "Wahyu Widyanto",
        "07266",
        "081909057418",
        "..."
    ),
    (
        2,
        "Wahyu Widyanto",
        "07266",
        "081909057419",
        "..."
    ),
    (
        3,
        "Wahyu Widyanto",
        "07266",
        "081909057420",
        "..."
    ),
    (
        1,
        "Candrakanta Wibisono S.E.I",
        "190509",
        "085805899826",
        "Jr. Gajah Mada No. 887, Administrasi Jakarta Pusat 63396, Kaltim"
    ),
    (
        1,
        "Jasmin Anggraini",
        "137285",
        "08054331736",
        "Dk. Wora Wari No. 306, Sorong 64700, Kaltara"
    ),
    (
        2,
        "Yance Rahmi Wastuti S.Kom",
        "630617",
        "087298880546",
        "Psr. Bambu No. 724, Batu 90312, Kaltara"
    ),
    (
        2,
        "Murti Hardiansyah S.Ked",
        "357749",
        "08753709258",
        "Jr. Pasir Koja No. 167, Cilegon 82034, Kepri"
    ),
    (
        3,
        "Laila Halima Wahyuni M.Farm",
        "920954",
        "0833396018",
        "Psr. Eka No. 123, Tanjung Pinang 47279, Kepri"
    ),
    (
        3,
        "Laksana Halim",
        "127291",
        "0838847601",
        "Jln. Madiun No. 573, Balikpapan 90421, Sumsel"
    ),
    (
        3,
        "Oni Nasyidah",
        "620991",
        "08319563412",
        "Kpg. Madrasah No. 486, Medan 41002, Sulteng"
    ),
    (
        1,
        "Dadap Sitorus",
        "911961",
        "088643048264",
        "Gg. Sutami No. 558, Gorontalo 60276, NTB"
    ),
    (
        3,
        "Hardana Dabukke",
        "110376",
        "085074078630",
        "Jln. Honggowongso No. 534, Kupang 99207, Kaltara"
    ),
    (
        1,
        "Sakura Intan Mayasari M.Kom.",
        "150602",
        "08948127134",
        "Jr. Halim No. 202, Tangerang Selatan 72990, Jatim"
    );

INSERT INTO
    pelanggan (nama_pelanggan)
VALUES
    ("Cawisadi"),
    ("Danuja"),
    ("Oni"),
    ("Mala"),
    ("Mitra"),
    ("Cawisono"),
    ("Kezia"),
    ("Umar"),
    ("Darmana"),
    ("Edison"),
    ("Unjani"),
    ("Ulva"),
    ("Danang"),
    ("Zamira"),
    ("Puput"),
    ("Ade"),
    ("Puti"),
    ("Hairyanto"),
    ("Zelda"),
    ("Indra");

INSERT INTO
    penjualan (
        id_pelanggan,
        id_pegawai,
        no_antrian,
        total_harga,
        bayar,
        status,
        tanggal_penjualan,
        tanggal_proses,
        tanggal_selesai
    )
VALUES
    (
        8,
        3,
        1,
        0,
        0,
        "selesai",
        "2022-05-28 18:35:18",
        "2022-05-28 18:45:22",
        "2022-05-28 19:13:56"
    ),
    (
        2,
        8,
        2,
        0,
        0,
        "selesai",
        "2022-05-28 18:33:45",
        "2022-05-28 18:42:10",
        "2022-05-28 18:42:10"
    ),
    (
        12,
        2,
        3,
        0,
        0,
        "selesai",
        "2022-05-28 18:38:16",
        "2022-05-28 18:43:08",
        "2022-05-28 18:35:57"
    ),
    (
        3,
        6,
        4,
        0,
        0,
        "selesai",
        "2022-05-29 18:34:33",
        "2022-05-29 18:34:13",
        "2022-05-29 18:58:09"
    ),
    (
        18,
        4,
        5,
        0,
        0,
        "selesai",
        "2022-05-29 18:39:08",
        "2022-05-29 18:50:05",
        "2022-05-29 18:43:13"
    ),
    (
        9,
        5,
        6,
        0,
        0,
        "selesai",
        "2022-05-29 18:34:12",
        "2022-05-29 18:40:38",
        "2022-05-29 19:16:27"
    ),
    (
        19,
        1,
        7,
        0,
        0,
        "selesai",
        "2022-05-30 18:33:45",
        "2022-05-30 18:42:11",
        "2022-05-30 19:00:00"
    ),
    (
        13,
        8,
        8,
        0,
        0,
        "selesai",
        "2022-05-30 18:40:43",
        "2022-05-30 18:49:51",
        "2022-05-30 19:05:45"
    ),
    (
        17,
        4,
        9,
        0,
        0,
        "selesai",
        "2022-05-30 18:33:45",
        "2022-05-30 18:35:31",
        "2022-05-30 18:41:04"
    ),
    (
        15,
        10,
        10,
        0,
        0,
        "selesai",
        "2022-05-31 18:35:54",
        "2022-05-31 18:49:14",
        "2022-05-31 19:08:41"
    ),
    (
        1,
        5,
        11,
        0,
        0,
        "selesai",
        "2022-05-31 18:38:12",
        "2022-05-31 18:48:14",
        "2022-05-31 19:00:33"
    ),
    (
        4,
        10,
        12,
        0,
        0,
        "selesai",
        "2022-05-31 18:42:30",
        "2022-05-31 18:42:53",
        "2022-05-31 18:47:35"
    ),
    (
        12,
        3,
        13,
        0,
        0,
        "selesai",
        "2022-06-01 18:36:07",
        "2022-06-01 18:44:59",
        "2022-06-01 19:12:36"
    ),
    (
        19,
        5,
        14,
        0,
        0,
        "selesai",
        "2022-06-01 18:34:27",
        "2022-06-01 18:50:42",
        "2022-06-01 19:18:08"
    ),
    (
        14,
        3,
        15,
        0,
        0,
        "selesai",
        "2022-06-01 18:38:19",
        "2022-06-01 18:34:57",
        "2022-06-01 18:54:41"
    ),
    (
        1,
        9,
        16,
        0,
        0,
        "selesai",
        "2022-06-02 18:36:15",
        "2022-06-02 18:45:18",
        "2022-06-02 18:49:58"
    ),
    (
        2,
        9,
        17,
        0,
        0,
        "selesai",
        "2022-06-02 18:34:34",
        "2022-06-02 18:34:48",
        "2022-06-02 19:06:44"
    ),
    (
        5,
        3,
        18,
        0,
        0,
        "selesai",
        "2022-06-02 18:33:45",
        "2022-06-02 18:45:00",
        "2022-06-02 18:39:17"
    ),
    (
        20,
        10,
        19,
        0,
        0,
        "selesai",
        "2022-06-03 18:34:55",
        "2022-06-03 18:51:30",
        "2022-06-03 18:53:00"
    ),
    (
        7,
        4,
        20,
        0,
        0,
        "selesai",
        "2022-06-03 18:35:51",
        "2022-06-03 18:41:09",
        "2022-06-03 19:01:21"
    );

INSERT INTO
    produk (
        id_merk,
        id_kategori,
        nama_produk,
        stok_produk,
        harga_produk,
        gambar_produk
    )
VALUES
    (
        1,
        2,
        "ABC Kopi Susu",
        53,
        5000,
        "abc-kopi-susu.jpg"
    ),
    (
        1,
        2,
        "ABC Minuman Sari Kacang Hijau",
        36,
        6000,
        "abc-minuman-sari-kacang-hijau.jpg"
    ),
    (
        1,
        2,
        "ABC Squash Delight Jeruk Florida",
        54,
        5000,
        "abc-florida.jpg"
    ),
    (
        1,
        1,
        "ABC Mie Instan Selera Pedas Rasa Gulai Ayam Pedas",
        10,
        5000,
        "abc-selesa-pedas.jpg"
    ),
    (1, 2, "ABC Kopi Plus Gula", 15, 4000, "abc-.jpg"),
    (
        2,
        2,
        "Ching Ku",
        35,
        2500,
        "adem-sari-chingku.jpg"
    ),
    (
        2,
        2,
        "Adem Sari Herbal Lemon",
        95,
        3000,
        "adem-sari-herbal-lemon.jpg"
    ),
    (
        3,
        2,
        "AMH Jahe Merah",
        61,
        2000,
        "adem-sari-chinku-herbal-tea.jpg"
    ),
    (
        4,
        2,
        "Anget Sari Wedang Jahe",
        46,
        1500,
        "anget-sari-wedang-jahe.jpg"
    ),
    (
        5,
        2,
        "Aqua Air Mineral",
        63,
        3000,
        "aqua-air-mineral.jpg"
    ),
    (
        6,
        1,
        "Astor Wafer Stick Chocolate",
        93,
        1500,
        "astor-wafer-stick-chocolate.jpg"
    ),
    (
        6,
        1,
        "Astor Astor Singles",
        84,
        1500,
        "astor-astor-singles.jpg"
    ),
    (
        7,
        1,
        "Beng-Beng",
        36,
        2000,
        "beng-beng-beng-beng.jpg"
    ),
    (
        7,
        1,
        "Beng-Beng Share It",
        36,
        10000,
        "beng-beng-share-it.jpg"
    ),
    (
        7,
        2,
        "Beng-Beng Drink",
        99,
        3500,
        "beng-beng-beng-beng-drink.jpg"
    ),
    (
        8,
        1,
        "Bihunku Rasa Soto",
        82,
        4000,
        "bihunku-rasa-soto.jpg"
    ),
    (
        8,
        1,
        "Bihunku Rasa Ayam Bawang",
        35,
        4000,
        "bihunku-rasa-ayam-bawang.jpg"
    ),
    (
        8,
        1,
        "Bihunku Goreng Special",
        41,
        4000,
        "bihunku-goreng-special.jpg"
    ),
    (
        9,
        1,
        "Biskuat Coklat",
        79,
        2500,
        "biskuat-coklat.jpg"
    ),
    (
        9,
        1,
        "Biskuat Original",
        87,
        2000,
        "biskuat-original.jpg"
    ),
    (
        9,
        1,
        "Biskuat Bolu",
        33,
        3350,
        "biskuat-bolu.jpg"
    ),
    (
        9,
        1,
        "Biskuat Bolu Coklat",
        45,
        2500,
        "biskuat-bolu-coklat.jpg"
    ),
    (
        10,
        1,
        "Burung-Dara Mie Urai",
        60,
        2750,
        "burung-dara-mie-urai.jpg"
    ),
    (
        11,
        2,
        "Caffino Kopi Latte Premium",
        19,
        2800,
        "caffino-kopi-latte-premium.jpg"
    ),
    (
        11,
        2,
        "Caffino Dark Cappucino",
        85,
        3499,
        "caffino-dark-cappucino.jpg"
    ),
    (
        12,
        1,
        "Champ Sosis Ayam",
        63,
        6500,
        "champ-sosis-ayam.jpg"
    ),
    (
        12,
        1,
        "Champ Chicken Nugget",
        10,
        18800,
        "champ-chicken-nugget.jpg"
    ),
    (
        12,
        1,
        "Champ Siomay",
        43,
        6500,
        "champ-siomay.jpg"
    ),
    (
        12,
        1,
        "Champ Sosis Sapi",
        18,
        12500,
        "champ-sosis-sapi.jpg"
    ),
    (
        12,
        1,
        "Champ Chicken Ball",
        32,
        7600,
        "champ-chicken-ball.jpg"
    ),
    (
        12,
        1,
        "Champ Sosis Ayam Kombinasi",
        47,
        6500,
        "champ-sosis-ayam-kombinasi.jpg"
    ),
    (
        12,
        1,
        "Champ Sosis Siap Santap",
        83,
        2500,
        "champ-sosis-siap-santap.jpg"
    ),
    (
        13,
        1,
        "Cheetos Ayam Bakar",
        32,
        2700,
        "cheetos-ayam-bakar.jpg"
    ),
    (
        13,
        1,
        "Cheetos Jagung Bakar",
        72,
        2450,
        "cheetos-jagung-bakar-(15g).jpg"
    ),
    (
        13,
        1,
        "Cheetos Cheetos",
        62,
        2500,
        "cheetos-cheetos.jpg"
    ),
    (
        13,
        1,
        "Cheetos Rasa Jagung Bakar",
        98,
        2450,
        "cheetos-rasa-jagung-bakar.jpg"
    ),
    (
        13,
        1,
        "Cheetos Rasa Ayam Panggang",
        94,
        2450,
        "cheetos-rasa-ayam-panggang.jpg"
    ),
    (
        13,
        1,
        "Cheetos Spicy BBQ Flavor",
        41,
        2500,
        "cheetos-spicy-bbq-flavor.jpg"
    ),
    (
        14,
        1,
        "Chiki Chiki Balls Rasa Keju",
        58,
        2470,
        "chiki-chiki-balls-rasa-keju.jpg"
    ),
    (
        14,
        1,
        "Chiki Twist Roasted Corn",
        14,
        2700,
        "chiki-twist-roasted-corn.jpg"
    ),
    (
        14,
        1,
        "Chiki Rasa Ayam Snack Balls",
        46,
        2460,
        "chiki-rasa-ayam-snack-balls.jpg"
    ),
    (
        15,
        1,
        "Chitato Rasa Sapi Panggang",
        85,
        3000,
        "chitato-rasa-sapi-panggang.jpg"
    ),
    (
        15,
        1,
        "Chitato Chitato Maxx",
        14,
        4500,
        "chitato-chitato-maxx.jpg"
    ),
    (
        16,
        1,
        "Choki-Choki Choki Stix",
        65,
        1000,
        "choki-choki-choki-stix.jpg"
    ),
    (
        16,
        1,
        "Choki-Choki Chocolate Paste",
        98,
        1000,
        "choki-choki-chocolate-paste.jpg"
    ),
    (
        17,
        2,
        "Coca-Cola",
        45,
        5000,
        "coca-cola-coca-cola.jpg"
    ),
    (
        17,
        2,
        "Coca-Cola Coca-Cola (Botol)",
        33,
        3500,
        "coca-cola-coca-cola-(botol).jpg"
    ),
    (
        17,
        2,
        "Coca-Cola Coca-Cola (Can)",
        23,
        3000,
        "coca-cola-coca-cola-(can).jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Sukro Original",
        10,
        2485,
        "dua-kelinci-sukro-original.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Tic Tac",
        48,
        2530,
        "dua-kelinci-tic-tac.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Tic Tac Rasa Sapi Panggang",
        89,
        2530,
        "dua-kelinci-tic-tac-rasa-sapi-panggang.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Kacang Koro Pedas",
        100,
        6500,
        "dua-kelinci-kacang-koro-pedas.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Sukro",
        74,
        2485,
        "dua-kelinci-sukro.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Kacang Garing",
        17,
        5500,
        "dua-kelinci-kacang-garing.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Tic Tac Mix",
        25,
        2499,
        "dua-kelinci-tic-tac-mix.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Kacang Rasa Bawang",
        67,
        2530,
        "dua-kelinci-kacang-rasa-bawang.jpg"
    ),
    (
        18,
        1,
        "Dua-Kelinci Pilus Mix",
        46,
        6400,
        "dua-kelinci-pilus-mix.jpg"
    ),
    (19, 2, "Fanta", 37, 4450, "fanta-fanta.jpg"),
    (
        19,
        2,
        "Fanta Stroberi",
        58,
        4455,
        "fanta-fanta-stroberi.jpg"
    ),
    (
        19,
        2,
        "Fanta Orange",
        39,
        6105,
        "fanta-fanta-orange.jpg"
    ),
    (
        19,
        2,
        "Fanta Anggur",
        76,
        4300,
        "fanta-fanta-anggur.jpg"
    ),
    (
        20,
        2,
        "Frisian-Flag Kental Manis",
        11,
        8799,
        "frisian-flag-kental-manis.jpg"
    ),
    (
        20,
        2,
        "Frisian-Flag Susu Kental Manis Cokelat",
        61,
        8500,
        "frisian-flag-susu-kental-manis-cokelat.jpg"
    ),
    (
        20,
        2,
        "Frisian-Flag Susu Kental Manis Vanila",
        97,
        3000,
        "frisian-flag-susu-kental-manis-vanila.jpg"
    ),
    (
        21,
        1,
        "Garuda Kacang Telur",
        82,
        2650,
        "garuda-kacang-telur.jpg"
    ),
    (
        21,
        1,
        "Garuda Pilus",
        42,
        2000,
        "garuda-pilus.jpg"
    ),
    (
        21,
        1,
        "Garuda Kacang Atom",
        58,
        2500,
        "garuda-kacang-atom.jpg"
    ),
    (
        21,
        1,
        "Garuda Pilus Sapi Panggang",
        48,
        2000,
        "garuda-pilus-sapi-panggang.jpg"
    ),
    (
        21,
        1,
        "Garuda Pilus Rasa Pedas",
        57,
        2000,
        "garuda-pilus-rasa-pedas.jpg"
    ),
    (
        21,
        1,
        "Garuda Kacang Atom Pedas",
        53,
        9275,
        "garuda-kacang-atom-pedas.jpg"
    ),
    (
        22,
        2,
        "Good-Day Cappuccino",
        98,
        3200,
        "good-day-cappuccino.jpg"
    ),
    (
        22,
        2,
        "Good-Day Mocacinno",
        71,
        2500,
        "good-day-mocacinno.jpg"
    ),
    (
        22,
        2,
        "Good-Day Coffee Freeze",
        28,
        3500,
        "good-day-coffee-freeze.jpg"
    ),
    (
        22,
        2,
        "Good-Day Originale Cappucino",
        51,
        3200,
        "good-day-originale-cappucino.jpg"
    ),
    (
        22,
        2,
        "Good-Day Mocca Latte Coffe",
        86,
        2500,
        "good-day-mocca-latte-coffe.jpg"
    ),
    (
        22,
        2,
        "Good-Day White Coffee",
        48,
        3000,
        "good-day-white-coffee.jpg"
    ),
    (
        23,
        1,
        "Good-Time Chocolate Chip Cookies",
        23,
        2500,
        "good-time-chocolate-chip-cookies.jpg"
    ),
    (
        23,
        1,
        "Good-Time Double Choc",
        14,
        2750,
        "good-time-double-choc.jpg"
    ),
    (
        23,
        1,
        "Good-Time Good Time Mini",
        86,
        12500,
        "good-time-good-time-mini.jpg"
    ),
    (
        24,
        1,
        "Hatari Biskuit",
        28,
        3000,
        "hatari-biskuit.jpg"
    ),
    (
        24,
        1,
        "Hatari Malkist",
        37,
        3000,
        "hatari-malkist.jpg"
    ),
    (
        24,
        1,
        "Hatari Malkist Original",
        61,
        3000,
        "hatari-malkist-original.jpg"
    ),
    (
        24,
        1,
        "Hatari Malkist Rasa Kelapa",
        31,
        3000,
        "hatari-malkist-rasa-kelapa.jpg"
    ),
    (
        25,
        2,
        "Ichitan Thai Milk Tea",
        46,
        3250,
        "ichitan-thai-milk-tea.jpg"
    ),
    (
        25,
        2,
        "Ichitan Thai Milk Green Tea",
        51,
        3250,
        "ichitan-thai-milk-green-tea.jpg"
    ),
    (
        25,
        2,
        "Ichitan Thai Milk Coffee",
        57,
        7000,
        "ichitan-thai-milk-coffee.jpg"
    ),
    (
        26,
        2,
        "Indocafe Coffeemix 3 in 1",
        97,
        2500,
        "indocafe-coffeemix-3-in-1.jpg"
    ),
    (
        26,
        2,
        "Indocafe Cappuccino",
        19,
        3499,
        "indocafe-cappuccino.jpg"
    ),
    (
        26,
        2,
        "Indocafe White Coffee",
        88,
        8400,
        "indocafe-white-coffee.jpg"
    ),
    (
        27,
        1,
        "Indofood Mie Goreng Rasa Rendang",
        81,
        4400,
        "indofood-mie-goreng-rasa-rendang.jpg"
    ),
    (
        27,
        1,
        "Indofood Mie Goreng Jumbo",
        62,
        4370,
        "indofood-mie-goreng-jumbo.jpg"
    ),
    (
        28,
        1,
        "Indomie Mi Goreng",
        17,
        4200,
        "indomie-mi-goreng.jpg"
    ),
    (
        28,
        1,
        "Indomie Rasa Soto Mie",
        99,
        4026,
        "indomie-rasa-soto-mie.jpg"
    ),
    (
        28,
        1,
        "Indomie Rasa Ayam Bawang",
        25,
        1929,
        "indomie-rasa-ayam-bawang.jpg"
    ),
    (
        28,
        1,
        "Indomie Kari Ayam",
        58,
        4250,
        "indomie-kari-ayam.jpg"
    ),
    (
        28,
        1,
        "Indomie Mi Goreng Jumbo",
        20,
        4975,
        "indomie-mi-goreng-jumbo.jpg"
    ),
    (
        28,
        1,
        "Indomie Mi Goreng Rendang",
        25,
        4199,
        "indomie-mi-goreng-rendang.jpg"
    ),
    (
        28,
        1,
        "Indomie Mi Goreng Aceh",
        10,
        3450,
        "indomie-mi-goreng-aceh.jpg"
    ),
    (
        28,
        1,
        "Indomie Mi Goreng Ayam Geprek",
        53,
        3999,
        "indomie-mi-goreng-ayam-geprek.jpg"
    ),
    (
        28,
        1,
        "Indomie Soto Spesial",
        100,
        4100,
        "indomie-soto-spesial.jpg"
    ),
    (
        28,
        1,
        "Indomie Mie Goreng Rasa Ayam Pop",
        10,
        4150,
        "indomie-mie-goreng-rasa-ayam-pop.jpg"
    ),
    (
        28,
        1,
        "Indomie Soto Banjar Limau Kuit",
        65,
        4400,
        "indomie-soto-banjar-limau-kuit.jpg"
    ),
    (
        28,
        1,
        "Indomie Mie Rasa Soto Lamongan",
        84,
        3000,
        "indomie-mie-rasa-soto-lamongan.jpg"
    ),
    (
        28,
        1,
        "Indomie Rasa Ayam Spesial",
        76,
        4050,
        "indomie-rasa-ayam-spesial.jpg"
    ),
    (
        29,
        2,
        "Indomilk Susu Kental Manis",
        80,
        8500,
        "indomilk-susu-kental-manis.jpg"
    ),
    (
        29,
        2,
        "Indomilk Susu Kental Manis Cokelat",
        79,
        8500,
        "indomilk-susu-kental-manis-cokelat.jpg"
    ),
    (
        30,
        1,
        "Kinder Kinder Joy",
        23,
        9000,
        "kinder-kinder-joy.jpg"
    ),
    (
        31,
        2,
        "Kopi-Kenangan Kopi",
        71,
        6500,
        "kopi-kenangan-kopi.jpg"
    ),
    (
        31,
        2,
        "Kopi-Kenangan Hanya Untukmu Black Aren",
        49,
        6500,
        "kopi-kenangan-hanya-untukmu-black-aren.jpg"
    ),
    (
        31,
        2,
        "Kopi-Kenangan Mantancino",
        67,
        4000,
        "kopi-kenangan-mantancino.jpg"
    ),
    (
        32,
        2,
        "Kopi-Luwak White Koffie Original",
        51,
        2500,
        "kopi-luwak-white-koffie-original.jpg"
    ),
    (
        32,
        2,
        "Kopi-Luwak Luwak White Coffee",
        11,
        2500,
        "kopi-luwak-luwak-white-coffee.jpg"
    ),
    (
        33,
        3,
        "Kopiko Permen",
        12,
        1643,
        "kopiko-permen.jpg"
    ),
    (
        33,
        3,
        "Kopiko Cappuccino Candy",
        17,
        1700,
        "kopiko-cappuccino-candy.jpg"
    ),
    (
        33,
        3,
        "Kopiko 78C Coffee Latte",
        10,
        6400,
        "kopiko-78c-coffee-latte.jpg"
    ),
    (
        33,
        3,
        "Kopiko Lucky Day",
        26,
        5700,
        "kopiko-lucky-day.jpg"
    ),
    (
        33,
        3,
        "Kopiko White Coffee",
        90,
        6563,
        "kopiko-white-coffee.jpg"
    ),
    (
        33,
        3,
        "Kopiko Permen Kopiko Sugar Free",
        38,
        1643,
        "kopiko-permen-kopiko-sugar-free.jpg"
    ),
    (
        33,
        3,
        "Kopiko Caramel Frappe",
        27,
        6100,
        "kopiko-caramel-frappe.jpg"
    ),
    (
        33,
        3,
        "Kopiko Brown Coffee",
        79,
        3550,
        "kopiko-brown-coffee.jpg"
    ),
    (
        34,
        2,
        "Kratingdaeng Energy Drink",
        85,
        5500,
        "kratingdaeng-energy-drink.jpg"
    ),
    (
        34,
        2,
        "Kratingdaeng Super",
        10,
        5910,
        "kratingdaeng-super.jpg"
    ),
    (
        35,
        2,
        "L-Men 2 Go Chocolate",
        56,
        11700,
        "l-men-2-go-chocolate.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Mie Goreng",
        100,
        4079,
        "mie-sedaap-mie-goreng.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Rasa Soto",
        34,
        4200,
        "mie-sedaap-rasa-soto.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Ayam Bawang",
        75,
        4000,
        "mie-sedaap-ayam-bawang.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Korean Spicy Chicken",
        42,
        4199,
        "mie-sedaap-korean-spicy-chicken.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Kari Spesial",
        45,
        4000,
        "mie-sedaap-kari-spesial.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Rasa Kari Ayam",
        18,
        3900,
        "mie-sedaap-rasa-kari-ayam.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Ayam Bakar Limau",
        31,
        3975,
        "mie-sedaap-ayam-bakar-limau.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Korean Spicy Soup",
        16,
        3900,
        "mie-sedaap-korean-spicy-soup.jpg"
    ),
    (
        36,
        1,
        "Mie-Sedaap Seblak Hot Jeletot",
        52,
        2100,
        "mie-sedaap-seblak-hot-jeletot.jpg"
    ),
    (37, 2, "Milo Susu", 77, 3000, "milo-susu.jpg"),
    (
        37,
        2,
        "Milo Susu Cokelat",
        12,
        3500,
        "milo-susu-cokelat.jpg"
    ),
    (37, 2, "Milo Botol", 81, 6000, "milo-botol.jpg"),
    (
        38,
        2,
        "Mytea Teh Oolong",
        93,
        5000,
        "mytea-teh-oolong.jpg"
    ),
    (
        39,
        2,
        "Nescafe Classic",
        48,
        2000,
        "nescafe-classic.jpg"
    ),
    (
        39,
        2,
        "Nescafe Kopi Bubuk",
        16,
        2099,
        "nescafe-kopi-bubuk.jpg"
    ),
    (
        39,
        2,
        "Nescafe Black Coffee",
        88,
        7300,
        "nescafe-black-coffee.jpg"
    ),
    (
        39,
        2,
        "Nescafe Cappuccino",
        99,
        7416,
        "nescafe-cappuccino.jpg"
    ),
    (
        39,
        2,
        "Nescafe Original",
        80,
        11400,
        "nescafe-original.jpg"
    ),
    (
        39,
        2,
        "Nescafe Mocha",
        51,
        6500,
        "nescafe-mocha.jpg"
    ),
    (
        40,
        2,
        "Nestle Susu Bear Brand",
        17,
        10500,
        "nestle-susu-bear-brand.jpg"
    ),
    (
        40,
        2,
        "Nestle Koko Krunch",
        100,
        5000,
        "nestle-koko-krunch.jpg"
    ),
    (
        40,
        2,
        "Nestle Kitkat",
        79,
        6000,
        "nestle-kitkat.jpg"
    ),
    (
        41,
        2,
        "Nu-Green-Tea Green Tea",
        25,
        4500,
        "nu-green-tea-green-tea.jpg"
    ),
    (
        41,
        2,
        "Nu-Green-Tea Milk Tea",
        90,
        4500,
        "nu-green-tea-milk-tea.jpg"
    ),
    (
        41,
        2,
        "Nu-Green-Tea Teh Tarik",
        99,
        4700,
        "nu-green-tea-teh-tarik.jpg"
    ),
    (
        41,
        2,
        "Nu-Green-Tea NU Green Tea Madu",
        72,
        4700,
        "nu-green-tea-nu-green-tea-madu.jpg"
    ),
    (
        41,
        2,
        "Nu-Green-Tea Nu Milk Tea",
        65,
        4500,
        "nu-green-tea-nu-milk-tea.jpg"
    ),
    (
        41,
        2,
        "Nu-Green-Tea NU Green Tea Less Sugar",
        31,
        4500,
        "nu-green-tea-nu-green-tea-less-sugar.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Jeruk Peras",
        62,
        2699,
        "nutrisari-jeruk-peras.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Jeruk Nipis",
        40,
        2655,
        "nutrisari-jeruk-nipis.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Lemon Tea",
        25,
        2975,
        "nutrisari-lemon-tea.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Leci",
        21,
        2775,
        "nutrisari-leci.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Lychee Tea",
        56,
        2850,
        "nutrisari-lychee-tea.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Nutrisari Anggur",
        50,
        2975,
        "nutrisari-nutrisari-anggur.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Florida Orange",
        12,
        2480,
        "nutrisari-florida-orange.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Markisa",
        57,
        2850,
        "nutrisari-markisa.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Sirsak",
        27,
        2750,
        "nutrisari-sirsak.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Wdank Bajigur",
        43,
        3099,
        "nutrisari-wdank-bajigur.jpg"
    ),
    (
        42,
        2,
        "Nutrisari Jeruk Extra Manis",
        14,
        2775,
        "nutrisari-jeruk-extra-manis.jpg"
    ),
    (
        43,
        1,
        "Oreo Original",
        91,
        3490,
        "oreo-oreo-original.jpg"
    ),
    (
        43,
        1,
        "Oreo Mini Oreo Chocolate",
        79,
        3500,
        "oreo-mini-oreo-chocolate.jpg"
    ),
    (44, 2, "Pepsi", 100, 11500, "pepsi-pepsi.jpg"),
    (
        44,
        2,
        "Pepsi Blue (Can)",
        59,
        4250,
        "pepsi-pepsi-blue.jpg"
    ),
    (
        45,
        2,
        "Pikopi 3In1 Kopi Mix",
        55,
        2090,
        "pikopi-3in1-kopi-mix.jpg"
    ),
    (
        45,
        2,
        "Pikopi Moccachino",
        63,
        1599,
        "pikopi-moccachino.jpg"
    ),
    (
        45,
        2,
        "Pikopi Gula Aren",
        72,
        2586,
        "pikopi-gula-aren.jpg"
    ),
    (
        46,
        2,
        "Pocari Sweat",
        55,
        6836,
        "pocari-sweat-pocari-sweat.jpg"
    ),
    (
        47,
        1,
        "Pop-Ice Coklat",
        35,
        2495,
        "pop-ice-pop-ice-coklat.jpg"
    ),
    (
        47,
        1,
        "Pop-Ice Vanila",
        88,
        2495,
        "pop-ice-pop-ice-vanila.jpg"
    ),
    (
        47,
        1,
        "Pop-Ice Mangga",
        32,
        2495,
        "pop-ice-pop-ice-mangga.jpg"
    ),
    (
        47,
        1,
        "Pop-Ice Taro",
        51,
        2495,
        "pop-ice-pop-ice-taro.jpg"
    ),
    (
        48,
        1,
        "Pop-Mie Goreng Pedes Gledek",
        80,
        6000,
        "pop-mie-goreng-pedes-gledek.jpg"
    ),
    (
        48,
        1,
        "Pop-Mie Rasa Kari Ayam",
        86,
        5700,
        "pop-mie-rasa-kari-ayam.jpg"
    ),
    (
        48,
        1,
        "Pop-Mie Rasa Soto Ayam",
        53,
        5000,
        "pop-mie-rasa-soto-ayam.jpg"
    ),
    (
        48,
        1,
        "Pop-Mie Rasa Ayam Bawang",
        20,
        4200,
        "pop-mie-rasa-ayam-bawang.jpg"
    ),
    (
        48,
        1,
        "Pop-Mie Mi Goreng Spesial",
        64,
        3000,
        "pop-mie-mi-goreng-spesial.jpg"
    ),
    (
        48,
        1,
        "Pop-Mie Mie Goreng Pedas",
        31,
        5600,
        "pop-mie-mie-goreng-pedas.jpg"
    ),
    (
        49,
        1,
        "Qtela Keripik Singkong BBQ",
        35,
        3499,
        "qtela-keripik-singkong-bbq.jpg"
    ),
    (
        49,
        1,
        "Qtela Keripik Singkong Balado",
        37,
        3500,
        "qtela-keripik-singkong-balado.jpg"
    ),
    (
        49,
        1,
        "Qtela Keripik Singkong Original",
        27,
        3520,
        "qtela-keripik-singkong-original.jpg"
    ),
    (
        50,
        1,
        "Quaker Instant Oatmeal",
        31,
        12500,
        "quaker-instant-oatmeal.jpg"
    ),
    (50, 1, "Quaker Oat", 55, 6500, "quaker-oat.jpg"),
    (
        51,
        2,
        "Real-Good Coklat Pisang",
        68,
        2500,
        "real-good-coklat-pisang.jpg"
    ),
    (
        51,
        2,
        "Real-Good Susu Rasa Sereal Stroberi",
        44,
        2450,
        "real-good-susu-rasa-sereal-stroberi.jpg"
    ),
    (
        51,
        2,
        "Real-Good Sereal Coklat",
        77,
        2600,
        "real-good-sereal-coklat.jpg"
    ),
    (
        51,
        2,
        "Real-Good Susu UHT Rasa Sweet Cheese",
        35,
        2488,
        "real-good-susu-uht-rasa-sweet-cheese.jpg"
    ),
    (
        51,
        2,
        "Real-Good Coklat Blueberry",
        18,
        2500,
        "real-good-coklat-blueberry.jpg"
    ),
    (
        52,
        1,
        "Rebo Kuaci Original",
        10,
        2495,
        "rebo-kuaci-original.jpg"
    ),
    (
        52,
        1,
        "Rebo Kuaci Milk Flavor",
        55,
        6500,
        "rebo-kuaci-milk-flavor.jpg"
    ),
    (
        52,
        1,
        "Rebo Kuaci Green Tea",
        56,
        3000,
        "rebo-kuaci-green-tea.jpg"
    ),
    (
        52,
        1,
        "Rebo Kuaci Salted Caramel",
        55,
        3000,
        "rebo-kuaci-salted-caramel.jpg"
    ),
    (
        52,
        1,
        "Rebo Kuaci Milk Flavour",
        12,
        6500,
        "rebo-kuaci-milk-flavour.jpg"
    ),
    (
        53,
        1,
        "Samyang Mie Instan",
        91,
        8450,
        "samyang-mie-instan.jpg"
    ),
    (
        53,
        1,
        "Samyang Curry",
        97,
        10410,
        "samyang-curry.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Roti Tawar",
        1,
        7500,
        "sari-roti-roti-tawar.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Roti Isi Coklat",
        0,
        4500,
        "sari-roti-roti-isi-coklat.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Roti Tawar",
        6,
        6500,
        "sari-roti-roti-tawar.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Roti Isi Coklat Keju",
        2,
        4500,
        "sari-roti-roti-isi-coklat-keju.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Roti Isi Krim Coklat",
        8,
        4500,
        "sari-roti-roti-isi-krim-coklat.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Roti Sobek Coklat Keju",
        8,
        7500,
        "sari-roti-roti-sobek-coklat-keju.jpg"
    ),
    (
        54,
        1,
        "Sari-Roti Dorayaki Custard Coklat",
        9,
        3000,
        "sari-roti-dorayaki-custard-coklat.jpg"
    ),
    (
        55,
        1,
        "Sarimi Mie Goreng",
        81,
        4350,
        "sarimi-mie-goreng.jpg"
    ),
    (
        55,
        1,
        "Sarimi Mie Goreng Rasa Ayam Kecap",
        69,
        4550,
        "sarimi-mie-goreng-rasa-ayam-kecap.jpg"
    ),
    (
        55,
        1,
        "Sarimi Mie Instan Rasa Baso Sapi",
        92,
        2500,
        "sarimi-mie-instan-rasa-baso-sapi.jpg"
    ),
    (
        55,
        1,
        "Sarimi Isi 2 Mi Goreng Rasa Ayam Kecap",
        54,
        2625,
        "sarimi-isi-2-mi-goreng-rasa-ayam-kecap.jpg"
    ),
    (
        55,
        1,
        "Sarimi Isi 2 Mi Goreng Rasa Ayam Kremes",
        50,
        4350,
        "sarimi-isi-2-mi-goreng-rasa-ayam-kremes.jpg"
    ),
    (
        55,
        1,
        "Sarimi Isi 2 Rasa Soto",
        48,
        2625,
        "sarimi-isi-2-rasa-soto.jpg"
    ),
    (
        56,
        2,
        "Sidomuncul Kunyit Asam",
        92,
        3019,
        "sidomuncul-kunyit-asam.jpg"
    ),
    (
        56,
        2,
        "Sidomuncul Susu Jahe",
        14,
        3000,
        "sidomuncul-susu-jahe.jpg"
    ),
    (
        56,
        2,
        "Sidomuncul Tolak Angin",
        29,
        3500,
        "sidomuncul-tolak-angin.jpg"
    ),
    (
        56,
        2,
        "Sidomuncul Kopi Jahe",
        68,
        2780,
        "sidomuncul-kopi-jahe.jpg"
    ),
    (
        56,
        2,
        "Sidomuncul Este Emje + Ginseng",
        27,
        3400,
        "sidomuncul-este-emje-+-ginseng.jpg"
    ),
    (
        56,
        2,
        "Sidomuncul Esteemje",
        97,
        4000,
        "sidomuncul-esteemje.jpg"
    ),
    (
        57,
        1,
        "Super-Bubur Buryam",
        19,
        2450,
        "super-bubur-buryam.jpg"
    ),
    (
        57,
        1,
        "Super-Bubur Rasa Ayam",
        72,
        2500,
        "super-bubur-rasa-ayam.jpg"
    ),
    (
        58,
        1,
        "Supermi Mie Goreng Sedaaap",
        27,
        3000,
        "supermi-mie-goreng-sedaaap.jpg"
    ),
    (
        58,
        1,
        "Supermi Mie Goreng Ayam Pangsit",
        84,
        3500,
        "supermi-mie-goreng-ayam-pangsit.jpg"
    ),
    (
        58,
        1,
        "Supermi Ayam Bawang",
        52,
        3700,
        "supermi-ayam-bawang.jpg"
    ),
    (
        59,
        2,
        "Teh-Pucuk-Harum Teh",
        96,
        4200,
        "teh-pucuk-harum-teh.jpg"
    ),
    (
        60,
        2,
        "Top-Coffee Gula Aren",
        48,
        2299,
        "top-coffee-gula-aren.jpg"
    ),
    (
        60,
        2,
        "Top-Coffee Cappuccino",
        36,
        3099,
        "top-coffee-cappuccino.jpg"
    ),
    (
        60,
        2,
        "Top-Coffee Kopi Susu",
        19,
        2500,
        "top-coffee-kopi-susu.jpg"
    ),
    (
        60,
        2,
        "Top-Coffee Kopi Mocca",
        19,
        2449,
        "top-coffee-kopi-mocca.jpg"
    ),
    (
        60,
        2,
        "Top-Coffee Barista Special Blend",
        73,
        2500,
        "top-coffee-barista-special-blend.jpg"
    ),
    (
        61,
        2,
        "Tora-Bika Cappuccino",
        54,
        2500,
        "tora-bika-cappuccino.jpg"
    ),
    (
        61,
        2,
        "Tora-Bika Creamy Latte",
        39,
        2500,
        "tora-bika-creamy-latte.jpg"
    ),
    (
        61,
        2,
        "Tora-Bika Tora Susu",
        44,
        2650,
        "tora-bika-tora-susu.jpg"
    ),
    (
        61,
        2,
        "Tora-Bika Gilus Mix Gula Aren",
        23,
        2420,
        "tora-bika-gilus-mix-gula-aren.jpg"
    ),
    (
        61,
        2,
        "Tora-Bika Kopi Aren",
        96,
        2420,
        "tora-bika-kopi-aren.jpg"
    ),
    (
        61,
        2,
        "Tora-Bika Cappuccino Toraccino",
        23,
        2999,
        "tora-bika-cappuccino-toraccino.jpg"
    ),
    (
        63,
        2,
        "Ultra-Milk Susu UHT Rasa Coklat",
        21,
        4150,
        "ultra-milk-susu-uht-rasa-coklat.jpg"
    ),
    (
        63,
        2,
        "Ultra-Milk Susu UHT Full Cream",
        59,
        5599,
        "ultra-milk-susu-uht-full-cream-.jpg"
    ),
    (
        63,
        2,
        "Ultra-Milk Susu UHT Rasa Stroberi",
        29,
        4470,
        "ultra-milk-susu-uht-rasa-stroberi.jpg"
    ),
    (
        63,
        2,
        "Ultra-Milk Susu UHT Full Cream",
        76,
        6500,
        "ultra-milk-susu-uht-full-cream.jpg"
    ),
    (
        63,
        2,
        "Ultra-Milk Susu UHT Stroberi",
        99,
        4470,
        "ultra-milk-susu-uht-stroberi.jpg"
    ),
    (64, 2, "Yakult", 97, 3500, "yakult-yakult.jpg"),
    (
        65,
        2,
        "You-C1000 Orange Water",
        96,
        7850,
        "you-c1000-orange-water.jpg"
    ),
    (
        65,
        2,
        "You-C1000 Lemon Water",
        100,
        7850,
        "you-c1000-lemon-water.jpg"
    ),
    (
        66,
        2,
        "Zee Swizz Chocolate Milk",
        28,
        6900,
        "zee-swizz-chocolate-milk.jpg"
    );

INSERT INTO
    detail_penjualan (
        id_produk,
        id_penjualan,
        jumlah_barang,
        jumlah_harga
    )
VALUES
    (50, 1, 1, 0),
    (167, 1, 8, 0),
    (4, 1, 1, 0),
    (204, 1, 9, 0),
    (127, 2, 3, 0),
    (129, 2, 8, 0),
    (127, 2, 5, 0),
    (75, 2, 10, 0),
    (160, 2, 7, 0),
    (219, 3, 3, 0),
    (124, 3, 8, 0),
    (79, 3, 2, 0),
    (24, 3, 1, 0),
    (131, 3, 5, 0),
    (158, 4, 7, 0),
    (75, 4, 3, 0),
    (124, 4, 1, 0),
    (176, 4, 2, 0),
    (1, 4, 6, 0),
    (160, 4, 10, 0),
    (11, 5, 4, 0),
    (105, 5, 6, 0),
    (182, 5, 10, 0),
    (168, 5, 3, 0),
    (62, 5, 8, 0),
    (37, 6, 10, 0),
    (242, 6, 3, 0),
    (217, 6, 6, 0),
    (149, 6, 9, 0),
    (187, 7, 2, 0),
    (83, 7, 2, 0),
    (22, 7, 10, 0),
    (240, 8, 6, 0),
    (53, 8, 9, 0),
    (80, 8, 4, 0),
    (29, 8, 5, 0),
    (222, 8, 7, 0),
    (180, 8, 7, 0),
    (153, 8, 5, 0),
    (8, 8, 10, 0),
    (154, 8, 2, 0),
    (119, 9, 1, 0),
    (173, 9, 2, 0),
    (33, 10, 3, 0),
    (172, 10, 10, 0),
    (240, 10, 2, 0),
    (65, 10, 10, 0),
    (137, 10, 4, 0),
    (166, 10, 4, 0),
    (80, 10, 3, 0),
    (90, 10, 2, 0),
    (125, 10, 7, 0),
    (204, 10, 9, 0),
    (223, 11, 6, 0),
    (124, 11, 4, 0),
    (200, 11, 8, 0),
    (136, 11, 10, 0),
    (96, 11, 6, 0),
    (52, 12, 5, 0),
    (206, 12, 9, 0),
    (235, 12, 9, 0),
    (197, 12, 1, 0),
    (59, 13, 8, 0),
    (124, 13, 9, 0),
    (114, 13, 8, 0),
    (4, 14, 6, 0),
    (16, 14, 5, 0),
    (77, 14, 5, 0),
    (77, 14, 9, 0),
    (60, 14, 3, 0),
    (138, 15, 2, 0),
    (87, 15, 7, 0),
    (240, 15, 3, 0),
    (124, 15, 1, 0),
    (122, 15, 4, 0),
    (203, 16, 3, 0),
    (61, 16, 3, 0),
    (12, 16, 5, 0),
    (62, 16, 5, 0),
    (74, 16, 4, 0),
    (83, 16, 3, 0),
    (201, 16, 1, 0),
    (224, 17, 9, 0),
    (195, 17, 1, 0),
    (164, 17, 1, 0),
    (10, 17, 1, 0),
    (66, 17, 10, 0);

INSERT INTO
    supplier (nama_supplier, alamat_supplier, notelp_supplier)
VALUES
    (
        "Perum Padmasari Mustofa",
        "Dk. Honggowongso No. 571, Kotamobagu 88893, Kalsel",
        "081237652036"
    ),
    (
        "Perum Puspita Tbk",
        "Jln. Abang No. 956, Bima 88377, NTT",
        "08980026618"
    ),
    (
        "CV Mustofa Waluyo Tbk",
        "Gg. Basudewo No. 546, Payakumbuh 67354, Babel",
        "0828002216"
    ),
    (
        "PT Habibi Sitompul",
        "Psr. Abdul No. 352, Langsa 67810, Kalteng",
        "0807890757"
    ),
    (
        "CV Marpaung Widiastuti Tbk",
        "Jln. Babadak No. 389, Palopo 43435, Papua",
        "088536935407"
    ),
    (
        "PT Salahudin",
        "Ki. Gremet No. 854, Padangsidempuan 28331, Kalteng",
        "085682497100"
    ),
    (
        "UD Mayasari Saptono",
        "Dk. Kalimantan No. 89, Ambon 97097, Kepri",
        "0850038624"
    ),
    (
        "UD Nashiruddin",
        "Ds. Bagonwoto No. 629, Banjar 89974, Jabar",
        "084550657415"
    ),
    (
        "Perum Megantara Tbk",
        "Ki. Gading No. 263, Banjarbaru 69204, Kalsel",
        "0858154004"
    ),
    (
        "CV Wulandari (Persero) Tbk",
        "Jr. Rajiman No. 648, Pangkal Pinang 48157, DKI",
        "087470211413"
    );

INSERT INTO
    pembelian (
        id_supplier,
        id_produk,
        id_pegawai,
        jumlah_pembelian,
        harga_beli,
        tanggal_pembelian
    )
VALUES
    (4, 115, 5, 22, 0, "2022-05-24 04:24:18"),
    (1, 63, 7, 4, 0, "2022-05-24 05:49:17"),
    (7, 241, 4, 84, 0, "2022-05-24 13:37:13"),
    (2, 37, 8, 56, 0, "2022-05-23 06:04:32"),
    (3, 80, 6, 51, 0, "2022-05-21 02:05:32"),
    (2, 238, 3, 45, 0, "2022-05-20 22:23:10"),
    (6, 188, 8, 22, 0, "2022-05-20 20:21:56"),
    (8, 77, 7, 86, 0, "2022-05-23 00:16:00"),
    (2, 162, 3, 78, 0, "2022-05-20 18:33:45"),
    (3, 206, 5, 1, 0, "2022-05-25 04:38:09"),
    (8, 85, 5, 62, 0, "2022-05-25 06:14:36"),
    (3, 14, 5, 42, 0, "2022-05-26 07:55:11"),
    (6, 50, 7, 92, 0, "2022-05-21 12:37:07"),
    (8, 153, 5, 39, 0, "2022-05-23 07:43:24"),
    (6, 204, 1, 33, 0, "2022-05-22 13:47:14"),
    (1, 197, 9, 44, 0, "2022-05-22 01:09:06"),
    (2, 76, 5, 73, 0, "2022-05-24 06:04:18"),
    (9, 159, 9, 35, 0, "2022-05-22 23:33:01"),
    (10, 97, 4, 26, 0, "2022-05-21 06:12:48"),
    (5, 191, 10, 58, 0, "2022-05-24 06:53:55"),
    (10, 225, 8, 1, 0, "2022-05-24 23:46:11"),
    (5, 186, 1, 8, 0, "2022-05-22 02:07:24"),
    (8, 148, 2, 41, 0, "2022-05-22 02:15:34"),
    (2, 219, 10, 47, 0, "2022-05-20 18:33:45"),
    (4, 173, 5, 2, 0, "2022-05-21 06:37:20"),
    (7, 145, 6, 48, 0, "2022-05-21 12:22:21"),
    (1, 72, 4, 81, 0, "2022-05-21 02:27:24"),
    (2, 105, 8, 59, 0, "2022-05-21 19:04:23"),
    (4, 224, 10, 89, 0, "2022-05-26 17:12:43"),
    (9, 125, 8, 12, 0, "2022-05-25 09:55:06"),
    (2, 25, 10, 36, 0, "2022-05-21 08:02:53"),
    (8, 138, 1, 52, 0, "2022-05-26 05:14:03"),
    (4, 160, 1, 2, 0, "2022-05-23 02:56:05"),
    (6, 165, 2, 99, 0, "2022-05-23 15:47:47"),
    (3, 35, 7, 78, 0, "2022-05-20 18:40:28"),
    (7, 89, 10, 65, 0, "2022-05-24 03:23:48"),
    (1, 165, 10, 3, 0, "2022-05-22 18:15:07"),
    (6, 52, 3, 16, 0, "2022-05-24 18:03:03"),
    (9, 47, 7, 94, 0, "2022-05-27 14:10:11"),
    (10, 137, 5, 44, 0, "2022-05-22 18:19:52"),
    (1, 116, 10, 54, 0, "2022-05-24 11:19:26"),
    (2, 36, 2, 77, 0, "2022-05-20 21:24:49"),
    (10, 22, 7, 89, 0, "2022-05-21 20:19:03"),
    (1, 201, 8, 52, 0, "2022-05-21 15:50:11"),
    (1, 198, 1, 81, 0, "2022-05-22 19:39:33"),
    (7, 13, 4, 97, 0, "2022-05-23 15:34:37"),
    (4, 70, 10, 62, 0, "2022-05-24 15:57:39"),
    (7, 78, 9, 33, 0, "2022-05-20 19:50:21"),
    (3, 158, 5, 22, 0, "2022-05-28 09:21:40"),
    (2, 197, 10, 5, 0, "2022-05-22 19:17:12");