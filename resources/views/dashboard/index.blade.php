@extends('layouts/master')

@section('content')
    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-6">
    					@if (auth()->user()->role == 'admin')
    					<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Ranking 5 Besar</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>RANKING</th>
											<th>NAMA</th>
											<th>NILAI</th>
										</tr>
									</thead>
									<tbody>
										@php 
										    $ranking = 1;
										@endphp
										@foreach (ranking_5_besar() as $s)
											<tr>
												<td>{{ $ranking }}</td>
												<td>{{ $s->nama_lengkap() }}</td>
												<td>{{ $s->rata_rata }}</td>
											</tr>
											@php 
											    $ranking ++;
											@endphp
										@endforeach	
									</tbody>
								</table>
							</div>
						</div>
						@endif
						@if (auth()->user()->role == 'guru')
    					<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Ranking 5 Besar</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>RANKING</th>
											<th>NAMA</th>
											<th>NILAI</th>
										</tr>
									</thead>
									<tbody>
										@php 
										    $ranking = 1;
										@endphp
										@foreach (ranking_5_besar() as $s)
											<tr>
												<td>{{ $ranking }}</td>
												<td>{{ $s->nama_lengkap() }}</td>
												<td>{{ $s->rata_rata }}</td>
											</tr>
											@php 
											    $ranking ++;
											@endphp
										@endforeach	
									</tbody>
								</table>
							</div>
						</div>
						@endif
    				</div>
    				<div class="col-md-3">
    					<div class="metric">
    						<span class="icon"><i class="fa fa-user"></i></span>
    						<p>
    							<span class="number">{{ total_siswa() }}</span>
    							<span class="title">Total Siswa</span>
    						</p>
    					</div>
    				</div>
    			
    			    <div class="col-md-3">
    					<div class="metric">
    						<span class="icon"><i class="fa fa-user"></i></span>
    						<p>
    							<span class="number">{{ total_guru() }}</span>
    							<span class="title">Total Guru</span>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

@stop