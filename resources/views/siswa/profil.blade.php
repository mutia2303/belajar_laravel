@extends('layouts/master')

@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')

	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="panel panel-profile">
					<div class="clearfix">
						<!-- LEFT COLUMN -->
						<div class="profile-left">
							<!-- PROFILE HEADER -->
							<div class="profile-header">
								<div class="overlay"></div>
								<div class="profile-main">
									<img src="{{ $siswa->getAvatar() }}" class="img-circle" height="90" width="90" alt="Avatar">
									<h3 class="name">{{ $siswa->nama_depan }}</h3>
									<span class="online-status status-available">Available</span>
								</div>
								<div class="profile-stat">
									<div class="row">
										<div class="col-md-6 stat-item">
											{{ $siswa->mapel->count() }} <span>Mata Pelajaran</span>
										</div>
										<div class="col-md-6 stat-item">
											{{ $siswa->rata_rata() }} <span>Rata-Rata</span>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE HEADER -->
							<!-- PROFILE DETAIL -->
							<div class="profile-detail">
								<div class="profile-info">
									<h4 class="heading">Data Diri</h4>
									<ul class="list-unstyled list-justify">
										<li>Jenis Kelamin <span>{{ $siswa->jenis_kelamin }}</span></li>
										<li>Agama <span>{{ $siswa->agama }}</span></li>
										<li>Alamat <span>{{ $siswa->alamat }}</span></li>
									</ul>
								</div>
								<div class="text-center"><a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning">Edit Profil</a></div>
							</div>
							<!-- END PROFILE DETAIL -->
						</div>
						<!-- END LEFT COLUMN -->
						<!-- RIGHT COLUMN -->
						<div class="profile-right">
							<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#tambah-nilai">Tambah Nilai</button>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
												<th>GURU</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($siswa->mapel as $mapel)
												<tr>
													<td>{{ $mapel->kode }}</td>
													<td>{{ $mapel->nama }}</td>
													<td>{{ $mapel->semester }}</td>
													<td>
														<a href="#" class="nilai" data-type="number" max="100" data-pk="{{ $mapel->id }}" data-url="/api/siswa/{{ $siswa->id }}/edit_nilai" data-title="Masukkan Nilai">{{ $mapel->pivot->nilai }}</a>
													</td>
													<td><a href="/guru/{{ $mapel->guru_id }}/profil">{{ $mapel->guru->nama }}</a></td>
													<td>
														<a href="/siswa/{{ $siswa->id }}/{{ $mapel->id }}/hapus_nilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
															<i class="fa fa-trash fa-sm"></i>
														</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div id="chart_nilai"></div>
						</div>
						<!-- END RIGHT COLUMN -->
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>

<!-- Modal -->
<div class="modal fade" id="tambah-nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
	        <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	        <form action="/siswa/{{ $siswa->id }}/tambah_nilai" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	{{ csrf_field() }}
		        	<div class="form-group">
					    <label for="nama">Mata Pelajaran</label>
					    <select name="mapel" class="form-control" id="mapel">
					        @foreach ($mata_pelajaran as $mp)
					            <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
					        @endforeach
					    </select>
					</div>
					<div class="form-group">
					    <label for="nilai">Nilai</label>
					    <input name="nilai" type="number" class="form-control" id="nilai" placeholder="Nilai" required>
					</div>
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
		            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
		        </div>
	        </form>
	    </div>
    </div>
</div>

@stop

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
    	Highcharts.chart('chart_nilai', {
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Laporan Nilai Siswa'
		    },
		    // subtitle: {
		    //     text: 'Source: WorldClimate.com'
		    // },
		    xAxis: {
		        categories: {!! json_encode($categories) !!},
		        crosshair: true
		    },
		    yAxis: {
		        min: 0,
		        max: 100,
		        title: {
		            text: 'Nilai'
		        }
		    },
		    tooltip: {
		        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		            '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
		        footerFormat: '</table>',
		        shared: true,
		        useHTML: true
		    },
		    plotOptions: {
		        column: {
		            pointPadding: 0.2,
		            borderWidth: 0
		        }
		    },
		    series: [{
		        name: 'Nilai',
		        data: {!! json_encode($data) !!}

		    }]
		});
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
    	$(document).ready(function() {
            $('.nilai').editable();
        });
    </script>

@stop