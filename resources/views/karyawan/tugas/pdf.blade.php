<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Tugas</title>
    <style>
    body {
        font-family: 'Times New Roman', Times, serif;
        margin: 40px;
    }

    h1 {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    h3 {
        text-align: center;
        font-size: 16px;
        margin: 2px 0;
    }

    hr {
        border: 1px solid #000;
        margin: 15px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    td {
        padding: 6px 4px;
        font-size: 14px;
        vertical-align: top;
    }

    td:first-child {
        width: 160px;
        text-align: left;
    }

    td:nth-child(2) {
        width: 10px;
        text-align: center;
    }

    td:last-child {
        padding-left: 40px;
        /* versi pas di tengah, tapi tidak terlalu */
        text-align: left;
    }
    </style>
</head>

<body>
    <h1>Data Tugas</h1>
    <h3>Tanggal : {{ $tanggal }}</h3>
    <h3>Pukul : {{ $jam }}</h3>
    <hr>

    <table>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $tugas->user->nama }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $tugas->user->email }}</td>
            </tr>
            <tr>
                <td>Tugas</td>
                <td>:</td>
                <td>{{ $tugas->tugas }}</td>
            </tr>
            <tr>
                <td>Tanggal Mulai</td>
                <td>:</td>
                <td>{{ $tugas->tanggal_mulai }}</td>
            </tr>
            <tr>
                <td>Tanggal Selesai</td>
                <td>:</td>
                <td>{{ $tugas->tanggal_selesai }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
</body>

</html>