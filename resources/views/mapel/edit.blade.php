@extends('layouts/master')

@section('content')

    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
    					<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Edit Data Siswa</h3>
							</div>
							<div class="panel-body">
								<form action="/mapel/{{ $mapel->id }}/proses_edit" method="POST" enctype="multipart/form-data">
								    {{ csrf_field() }}
									<div class="form-group">
									    <label for="kode">Kode</label>
									    <input name="kode" type="text" class="form-control" id="kode" value="{{ $mapel->kode }}">
									</div>
									<div class="form-group">
									    <label for="nama">Nama</label>
									    <input name="nama" type="text" class="form-control" id="nama" value="{{ $mapel->nama }}">
									</div>
									<div class="form-group">
									    <label for="semester">Semester</label>
									    <select name="semester" class="form-control" id="semester">
									        <option value="Ganjil" @if ($mapel->semester == 'Ganjil') selected @endif>Ganjil</option>
									        <option value="Genap" @if ($mapel->semester == 'Genap') selected @endif>Genap</option>
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
