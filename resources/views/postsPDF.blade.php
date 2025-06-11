<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Postingan Perusahaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top; /* Agar konten body tidak terlalu tinggi */
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .body-content {
            max-height: 100px; /* Batasi tinggi body agar tidak terlalu panjang */
            overflow: hidden; /* Sembunyikan jika melebihi batas */
            text-overflow: ellipsis; /* Tampilkan ... jika terpotong */
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Batasi hingga 3 baris */
            -webkit-box-orient: vertical;
        }
        .image-thumbnail {
            width: 80px; /* Ukuran thumbnail gambar */
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 4px;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Daftar Postingan Perusahaan</h1>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    
                    <th>Penulis</th>
                    <th>Tanggal Publikasi</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
            @php
            $no = 1;
            @endphp
            @forelse ($records as $post)
                <tr>
                    <td>
                        {{ $no++ }}
                    </td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->title }}</td>
                    <!-- <td class="px-6 py-4">{!! Str::limit($post->body, 100) !!}</td> -->
                    
                    <td >{{ $post->user->name }}</td>
                    <td>{{ Carbon\Carbon::parse($post->published_at)->toFormattedDateString()}}</td>
                    <td>
                        <img src="{{ asset('storage/posts' . $post->image) }}" alt="Image"
                            style="max-width: 100px; max-height: 100px;">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>