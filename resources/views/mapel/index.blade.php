@extends('layouts/master')

@section('content')

    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Data Mata Pelajaran</h3>
								<div class="right">
									<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah"> 
										Tambah
									</a>
								</div>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>KODE</th>
											<th>NAMA</th>
											<th>SEMESTER</th>
											<th>GURU</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_mapel as $mapel)
										    <tr>
										    	<td>{{ $mapel->kode }}</td>
										    	<td>{{ $mapel->nama }}</td>
										    	<td>{{ $mapel->semester }}</td>
										    	<td>{{ $mapel->guru->nama }}</td>
										    	<td>
										    		<a href="/mapel/{{ $mapel->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
										    		<a href="#" class="btn btn-danger btn-sm hapus" mapel-id="{{ $mapel->id }}">Hapus</a>
										    	</td>
										    </tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
	        <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	        <form action="/mapel/tambah" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	{{ csrf_field() }}
		        	<div class="form-group">
					    <label for="kode">Kode</label>
					    <input name="kode" type="text" class="form-control" id="kode" placeholder="Kode" value="{{ old('kode') }}" required>
					</div>
					<div class="form-group">
					    <label for="nama">Nama</label>
					    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" value="{{ old('nama') }}" required>
					</div>
					<div class="form-group">
					    <label for="semester">Semester</label>
					    <select name="semester" class="form-control" id="semester">
					        <option value="Ganjil" {{ (old('semester') == 'Ganjil') ? ' selected' : '' }}>Ganjil</option>
					        <option value="Genap" {{ (old('semester') == 'Genap') ? ' selected' : '' }}>Genap</option>
					    </select>
					</div>
					<div class="form-group">
					    <label for="nama">Guru</label>
					    <select name="guru_id" class="form-control" id="guru">
					        @foreach ($nama_guru as $guru)
					            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
					        @endforeach
					    </select>
					</div>
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
		            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
		        </div>
	        </form>
	    </div>
    </div>
</div>

@stop

@section('footer')
    <script>
    	$(document).ready(function() {
    		$('.hapus').click(function() { //sweetalert
	    		var mapel_id = $(this).attr('mapel-id');
	    		swal({
				    title: "Yakin ?",
				    text: "Ingin menghapus data mata pelajaran ini ?",
				    icon: "warning",
				    buttons: true,
				    dangerMode: true,
				})
				.then((willDelete) => {
				    if (willDelete) {
					    window.location = "/mapel/"+mapel_id+"/hapus";
				    } 
				});
	    	});
    	});
    </script>
@stop