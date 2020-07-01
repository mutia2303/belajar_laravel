@extends('layouts/master')

@section('content')

    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Data Guru</h3>
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
											<th>Nama</th>
											<th>Telepon</th>
											<th>Alamat</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_guru as $guru)
										    <tr>
										    	<td><a href="/guru/{{ $guru->id }}/profil">{{ $guru->nama }}</a></td>
										    	<td>{{ $guru->telepon }}</td>
										    	<td>{{ $guru->alamat }}</td>
										    	<td>
										    		<a href="/guru/{{ $guru->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
										    		<a href="#" class="btn btn-danger btn-sm hapus" guru-id="{{ $guru->id }}">Hapus</a>
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
	        <form action="/guru/tambah" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	{{ csrf_field() }}
					<div class="form-group">
					    <label for="nama">Nama</label>
					    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" value="{{ old('nama') }}" required>
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					    <label for="email">Email</label>
					    <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
					    @if ($errors->has('email'))
					        <span class="help-block">{{ $errors->first('email') }}</span>
					    @endif
					</div>
					<div class="form-group">
					    <label for="telepon">Telepon</label>
					    <input name="telepon" type="text" class="form-control" id="telepon" placeholder="Telepon" value="{{ old('telepon') }}" required>
					</div>
					<div class="form-group">
					    <label for="alamat">Alamat</label>
					    <textarea name="alamat" class="form-control" id="alamat" required>{{ old('alamat') }}</textarea>
					</div>
					<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
					    <label for="avatar">Avatar</label>
					    <input name="avatar" type="file" class="form-control" id="avatar">
					    @if ($errors->has('avatar'))
					        <span class="help-block">{{ $errors->first('avatar') }}</span>
					    @endif
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
	    		var guru_id = $(this).attr('guru-id');
	    		swal({
				    title: "Yakin ?",
				    text: "Ingin menghapus data guru ini ?",
				    icon: "warning",
				    buttons: true,
				    dangerMode: true,
				})
				.then((willDelete) => {
				    if (willDelete) {
					    window.location = "/guru/"+guru_id+"/hapus";
				    } 
				});
	    	});
    	});
    </script>
@stop