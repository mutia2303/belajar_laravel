@extends('layouts/master')

@section('content')

<div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">POST</h3>
								<div class="right">
									<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahforum"> 
										Tambah
									</a>
								</div>
							</div>
							<div class="panel-body">
								<ul class="list-unstyled activity-list">
									@foreach ($data_forum as $forum)
										<li>
											@if ($forum->user->role == 'admin')
											    <img src="{{ $forum->user->getAvatar() }}" alt="Avatar" class="img-circle pull-left avatar">
												<p>{{ $forum->user->name }} : <a href="/forum/{{$forum->id}}/detail">{{ $forum->judul }}</a> <span class="timestamp">{{ $forum->created_at->diffForHumans() }}</span></p>
											@endif
											@if ($forum->user->role == 'siswa')
											    <img src="{{ $forum->user->siswa->getAvatar() }}" alt="Avatar" class="img-circle pull-left avatar">
												<p>{{ $forum->user->siswa->nama_lengkap() }} : <a href="/forum/{{$forum->id}}/detail">{{ $forum->judul }}</a> <span class="timestamp">{{ $forum->created_at->diffForHumans() }}</span></p>
											@endif
											@if ($forum->user->role == 'guru')
											    <img src="{{ $forum->user->guru->getAvatar() }}" alt="Avatar" class="img-circle pull-left avatar">
												<p>{{ $forum->user->guru->nama }} : <a href="/forum/{{$forum->id}}/detail">{{ $forum->judul }}</a> <span class="timestamp">{{ $forum->created_at->diffForHumans() }}</span></p>
											@endif
											
											
										</li>
									@endforeach
								</ul>
								{{ $data_forum->links() }}
							</div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

<!-- Modal Tambah Forum -->
<div class="modal fade" id="tambahforum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
	        <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Tambah Forum</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	        <form action="/forum/tambah" method="POST">
		        <div class="modal-body">
		        	{{ csrf_field() }}
					<div class="form-group">
					    <label for="judul">Judul</label>
					    <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul" value="{{ old('judul') }}" required>
					</div>
					<div class="form-group">
					    <label for="konten">Konten</label>
					    <textarea name="konten" class="form-control" id="konten" required>{{ old('konten') }}</textarea>
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