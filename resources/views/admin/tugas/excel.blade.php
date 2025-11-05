<table>
    <thead>
        <tr>
            <th colspan="6" align="center">Data Tugas</th>
        </tr>
        <tr>
            <th colspan="6" align="center">
                Tanggal : {{ $tanggal }}
            </th>
        </tr>
        <tr>
            <th colspan="6" align="center">
                Pukul : {{ $jam }}
            </th>
        </tr>
        <tr>
            <th width='20' align="center">No</th>
            <th width='25' align="center">Nama</th>
            <th width='25' align="center">Email</th>
            <th width='30' align="center">Tugas</th>
            <th width='30' align="center">Tanggal_Mulai</th>
            <th width='30' align="center">Tanggal_Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tugas as $item)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $item->user->nama }}</td>
            <td align="center">{{ $item->user->email }}</td>
            <td align="center">{{ $item->tugas }}</td>
            <td align="center">{{ $item->tanggal_mulai }}</td>
            <td align="center">{{ $item->tanggal_selesai }}</td>
        </tr>
        @endforeach
    </tbody>
</table>