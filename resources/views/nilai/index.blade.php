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
								<h3 class="panel-title">Data Nilai Siswa</h3>
								<div class="right">
								</div>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>NAMA</th>
											<th>TOTAL</th>
											<th>RATA-RATA</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_siswa as $siswa)
										    <tr>
										    	<td><a href="/siswa/{{ $siswa->id }}/profil">{{ $siswa->nama_lengkap() }}</a></td>
										    	<td>{{ $siswa->total() }}</td>
										    	<td>{{ $siswa->rata_rata() }}</td>
										    </tr>
										@endforeach
									</tbody>
								</table>
								{{ $data_siswa->links() }}
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

@stop
