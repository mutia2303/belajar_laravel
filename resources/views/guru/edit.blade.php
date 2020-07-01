@extends('layouts/master')

@section('content')

    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
    					<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Edit Data Guru</h3>
							</div>
							<div class="panel-body">
								<form action="/guru/{{ $guru->id }}/proses_edit" method="POST" enctype="multipart/form-data">
								    {{ csrf_field() }}
									<div class="form-group">
									    <label for="nama">Nama</label>
									    <input name="nama" type="text" class="form-control" id="nama" value="{{ $guru->nama }}">
									</div>
									<div class="form-group">
									    <label for="telepon">Telepon</label>
									    <input name="telepon" type="text" class="form-control" id="telepon" value="{{ $guru->telepon }}">
									</div>
									<div class="form-group">
									    <label for="alamat">Alamat</label>
									    <textarea name="alamat" class="form-control" id="alamat">{{ $guru->alamat }}</textarea>
									</div>	
									<div class="form-group">
									    <label for="avatar">Avatar</label>
									    <input name="avatar" type="file" class="form-control" id="avatar"  value="{{ $guru->avatar }}">
									</div>	

								    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
							    </form>
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

@stop
