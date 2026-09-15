<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Data Survey</title>
<style>
table{border-collapse:collapse}
th,td{border:1px solid #000;padding:6px 10px;font-size:12px}
th{background:#e5eeff;font-weight:600}
</style>
</head>
<body>
<table>
<thead>
<tr>
<th>ID</th>
<th>Nama Subjek</th>
<th>Jenis Survey</th>
<th>Tanggal Survey</th>
<th>RW</th>
<th>Kelurahan</th>
<th>Alamat Lengkap</th>
<th>Nomor HP</th>
<th>Status Kelayakan</th>
<th>Skor Kelayakan</th>
<th>Catatan</th>
</tr>
</thead>
<tbody>
@forelse($surveys as $survey)
<tr>
<td>{{ $survey->id_survey }}</td>
<td>{{ $survey->nama_subjek }}</td>
<td>{{ $survey->jenis_survey }}</td>
<td>{{ $survey->tanggal_survey }}</td>
<td>{{ $survey->lokasi_rw }}</td>
<td>{{ $survey->kelurahan }}</td>
<td>{{ $survey->alamat_lengkap }}</td>
<td>{{ $survey->nomor_telepon }}</td>
<td>{{ $survey->status_kelayakan }}</td>
<td>{{ $survey->skor_kelayakan }}</td>
<td>{{ $survey->catatan_survey }}</td>
</tr>
@empty
<tr><td colspan="11">Belum ada data survey.</td></tr>
@endforelse
</tbody>
</table>
</body>
</html>