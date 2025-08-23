<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan {{ $activeKategoriName }} - {{ $bulan }}-{{ $tahun }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            color: #000;
        }

        /* Header / Kop Surat */
        .kop-surat {
            text-align: center;
            margin-bottom: 15px;
        }

        .kop-surat h2 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-surat p {
            margin: 2px 0;
            font-size: 12px;
        }

        /* Garis Pembatas */
        .line {
            border-top: 2px solid #000;
            margin: 10px 0;
        }

        /* Judul */
        .judul-laporan {
            text-align: center;
            margin-bottom: 15px;
        }

        .judul-laporan h3 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        /* Info laporan */
        .info-laporan {
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Tabel Transaksi */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 13px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        table th {
            background-color: #f3f4f6;
            /* Warna ala Tailwind */
            text-align: center;
            font-weight: bold;
        }

        table td.jumlah {
            text-align: right;
        }

        /* Ringkasan Keuangan */
        .ringkasan {
            margin-top: 20px;
            width: 50%;
            float: right;
        }

        .ringkasan table {
            width: 100%;
            border: none;
            font-size: 13px;
        }

        .ringkasan td {
            padding: 4px 6px;
        }

        .ringkasan td.label {
            font-weight: bold;
        }

        /* Tanda Tangan */
        .signature-container {
            margin-top: 50px;
            text-align: center;
            justify-content: space-between;
            /* Center the text within each signature box */
        }

        .signature-box {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            /* Ensures boxes align at the top */
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            font-size: 11px;
            text-align: center;
            color: #555;
        }
    </style>
</head>

<body>

    {{-- Kop Surat --}}
    <div class="kop-surat">
        <h2>MASJID AL-FALAH</h2>
        <p>Jl.Melati No. 123, Pekanbaru Riau</p>
        <p>Telp: 021-123456 | Email: info@masjid.com</p>
    </div>

    <div class="line"></div>

    {{-- Judul Laporan --}}
    <div class="judul-laporan">
        <h3>Laporan Keuangan {{ $activeKategoriName }}<br>
            Bulan {{ $bulan }} Tahun {{ $tahun }}</h3>
    </div>

    {{-- Info Laporan --}}
    <div class="info-laporan">
        <strong>Kategori:</strong> {{ $activeKategoriName }} <br>
        <strong>Periode:</strong> {{ $bulan }} / {{ $tahun }}
    </div>

    {{-- Tabel Transaksi --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th class="jumlah">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keuangan as $index => $item)
                <tr>
                    <td style="text-align:center;">{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td style="text-transform: capitalize; text-align:center;">{{ $item->jenis }}</td>
                    <td class="jumlah">{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Ringkasan --}}
    <div class="ringkasan">
        <table>
            <tr>
                <td class="label">Total Pemasukan</td>
                <td>:</td>
                <td>Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Total Pengeluaran</td>
                <td>:</td>
                <td>Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Saldo Akhir</td>
                <td>:</td>
                <td><strong>Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</strong></td>
            </tr>
        </table>
    </div>

    <div style="clear: both;"></div>

    {{-- Tanda Tangan --}}
    <div class="signature-container">
        <!-- Kolom Bendahara -->
        <div class="signature-box">
            <p>Mengetahui,</p>
            <p><strong>Bendahara</strong></p>
            <br><br><br> <!-- Jarak untuk tanda tangan -->
            <p>(___________________)</p>
        </div>

        <!-- Kolom Ketua -->
        <div class="signature-box">
            <p>Pekanbaru, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p><strong>Ketua</strong></p>
            <br><br><br> <!-- Jarak untuk tanda tangan -->
            <p>(___________________)</p>
        </div>
    </div>


    {{-- Footer --}}
    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
    </div>

</body>

</html>
