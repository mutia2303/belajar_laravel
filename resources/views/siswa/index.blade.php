@extends('layouts/master')

@section('content')

    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<!-- @if(session('sukses'))
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;
						</button>
						<i class="fa fa-check-circle"></i>
					    {{ session('sukses') }}
					</div>
				@endif -->
    			<div class="row">
    				<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Data Siswa</h3>
								<div class="right">
									<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah"> 
										Tambah
									</a> &nbsp;&nbsp;&nbsp;
									<!-- <button type="submit" class="btn btn-primary btn-sm">Tambah</button> -->
									<a href="/siswa/export_excel" class="btn btn-primary btn-sm">Export Excel</a>
									<a href="/siswa/export_pdf" class="btn btn-primary btn-sm">Export PDF</a> &nbsp;&nbsp;&nbsp;
									<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importsiswa">
									    Import Excel
									</a>
								</div>
							</div>
							<div class="panel-body">
								<table class="table table-hover" id="datatable">
									<thead>
										<tr>
											<th>NAMA LENGKAP</th>
											<!-- <th>NAMA BELAKANG</th> -->
											<th>JENIS KELAMIN</th>
											<th>AGAMA</th>
											<th>ALAMAT</th>
											<th>JUMLAH NILAI</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
	        <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	        <form action="/siswa/tambah" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	{{ csrf_field() }}
					<div class="form-group{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
					    <label for="nama_depan">Nama Depan</label>
					    <input name="nama_depan" type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" value="{{ old('nama_depan') }}" required>
					    @if ($errors->has('nama_depan'))
					        <span class="help-block">{{ $errors->first('nama_depan') }}</span>
					    @endif
					</div>
					<div class="form-group{{ $errors->has('nama_belakang') ? ' has-error' : '' }}">
					    <label for="nama_belakang">Nama Belakang</label>
					    <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="help" placeholder="Nama Belakang" value="{{ old('nama_belakang') }}" required>
					    <small id="help" class="form-text text-muted">Jika tidak memiliki, beri tanda (-)</small>
					    @if ($errors->has('nama_belakang'))
					        <span class="help-block">{{ $errors->first('nama_belakang') }}</span>
					    @endif
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					    <label for="email">Email</label>
					    <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
					    @if ($errors->has('email'))
					        <span class="help-block">{{ $errors->first('email') }}</span>
					    @endif
					</div>
					<div class="form-group">
					    <label for="jenis_kelamin">Jenis Kelamin</label>
					    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
					        <option value="L" {{ (old('jenis_kelamin') == 'L') ? ' selected' : '' }}>Laki-laki</option>
					        <option value="P" {{ (old('jenis_kelamin') == 'P') ? ' selected' : '' }}>Perempuan</option>
					    </select>
					</div>
					<div class="form-group">
					    <label for="agama">Agama</label>
					    <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama" value="{{ old('agama') }}" required>
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

<!-- Modal Import Siswa -->
<div class="modal fade" id="importsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="form-group{{ $errors->has('import') ? ' has-error' : '' }}">
                {!! Form::open(['route' => 'siswa.import.excel', 'class' => 'form-horizontal', 'id' => 'import', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::file('data_siswa') !!}
                @if ($errors->has('import'))
					<span class="help-block">{{ $errors->first('import') }}</span>
		        @endif
		        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary btn-sm">Import</button>
            </div>
        </form>
        </div>
    </div>
</div>

@stop

@section('footer') 
    <script>
    	$(document).ready(function() {
    		$('#datatable').DataTable({
    			processing:true,
    			serverside:true,
    			ajax:"{{ route('ajax.get.data.siswa') }}",
    			columns:[
    			    {data:'nama_lengkap', name:'nama_lengkap'},
    			    {data:'jenis_kelamin', name:'jenis_kelamin'},
    			    {data:'agama', name:'agama'},
    			    {data:'alamat', name:'alamat'},
    			    {data:'jumlah_nilai', 'name':'jumlah_nilai'},
    			    {data:'aksi', 'name':'aksi'}
    			]
    		});
    		$('body').on('click','.hapus',function() { //sweetalert
	    		var siswa_id = $(this).attr('siswa-id');
	    		swal({
				    title: "Yakin ?",
				    text: "Ingin menghapus data siswa ini ?",
				    icon: "warning",
				    buttons: true,
				    dangerMode: true,
				})
				.then((willDelete) => {
				    if (willDelete) {
					    window.location = "/siswa/"+siswa_id+"/hapus";
				    } 
				});
	    	});
    		
    	});
    </script>
@stop