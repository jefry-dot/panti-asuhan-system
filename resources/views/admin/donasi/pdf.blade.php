<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header h2 {
            margin: 5px 0 0 0;
            font-size: 16px;
            color: #666;
            font-weight: normal;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .summary {
            background-color: #f0f9ff;
            border-left: 4px solid #3b82f6;
            padding: 15px;
            margin-bottom: 20px;
        }
        .summary p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #1e40af;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table thead {
            background-color: #f3f4f6;
        }
        table thead th {
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #d1d5db;
            color: #374151;
        }
        table tbody td {
            padding: 8px 10px;
            border: 1px solid #d1d5db;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
            padding-top: 10px;
            border-top: 1px solid #d1d5db;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN DONASI</h1>
        <h2>Panti Asuhan</h2>
    </div>

    <div class="info">
        @if($startDate && $endDate)
            <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>
        @else
            <p><strong>Periode:</strong> Semua Data</p>
        @endif
        <p><strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->format('d F Y H:i') }}</p>
    </div>

    <div class="summary">
        <p>Total Donasi Terkumpul: Rp {{ number_format($totalDonation, 0, ',', '.') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Donatur</th>
                <th width="25%">Email</th>
                <th width="15%">Jenis</th>
                <th width="15%" class="text-right">Jumlah</th>
                <th width="15%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($donations as $donation)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $donation->donor_name ?: 'Anonim' }}</td>
                    <td>{{ $donation->donor_email ?: '-' }}</td>
                    <td>{{ $donation->donation_type ?: '-' }}</td>
                    <td class="text-right">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                    <td>{{ $donation->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data donasi yang ditemukan untuk periode ini.</td>
                </tr>
            @endforelse
        </tbody>
        @if($donations->count() > 0)
        <tfoot>
            <tr style="background-color: #e5e7eb;">
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($totalDonation, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh sistem pada {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} Panti Asuhan. All rights reserved.</p>
    </div>
</body>
</html>
