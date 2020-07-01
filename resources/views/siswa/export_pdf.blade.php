<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		table tr td, 
		table tr th {
			font-size: 9pt;
		}, 
		table {
		    border-collapse: collapse;
		    width: 100%;
		},
		table, th, td {
		    border: 1px solid black;
		}
	</style>
	<center>
		<h3>LAPORAN DATA SISWA</h3><hr><br>
	</center>
	<div style="overflow-x:auto;">
		<table class="table">
			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA LENGKAP</th>
					<th>JENIS KELAMIN</th>
					<th>AGAMA</th>
					<th>ALAMAT</th>
				</tr>
			</thead>
			<tbody>
				@php 
				    $no = 1;
				@endphp
				@foreach($siswa as $s)
				    <tr>
				    	<td style="text-align: center;">{{ $no }}</td>
				    	<td>{{ $s->nama_lengkap() }}</td>
				    	<td>{{ $s->jenis_kelamin }}</td>
				    	<td>{{ $s->agama }}</td>
				    	<td>{{ $s->alamat }}</td>
				    </tr>
				    @php 
					    $no ++;
					@endphp
				@endforeach   
			</tbody>
		</table>
    </div>
</body>
</html>

