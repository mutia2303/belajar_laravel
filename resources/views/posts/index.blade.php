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
									<a href="{{ route('post.tambah') }}" class="btn btn-primary btn-sm">Tambah</a>
								</div>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>NO</th>
											<th>JUDUL</th>
											<th>USER</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@php
										    $no=1;
										@endphp
										@foreach($data_post as $post)
										    <tr>
										    	<td>{!! $no !!}</td>
										    	<td>{{ $post->title }}</td>
										    	<td>{{ $post->user->name }}</td>
										    	<td>
										    		<a target="_blank" href="{{ route ('front.single.post', $post->slug)}}" class="btn btn-info btn-sm">Lihat</a>
										    		<a href="/post/{{$post->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
										    		<a href="#" class="btn btn-danger btn-sm hapus" post-id="{{ $post->id }}">Hapus</a>
										    	</td>
										    </tr>
										    @php 
										        $no++;
										    @endphp    
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

@stop

@section('footer') 
    <script>
    	$(document).ready(function() {
    		$('.hapus').click(function() { //sweetalert
	    		var post_id = $(this).attr('post-id');
	    		swal({
				    title: "Yakin ?",
				    text: "Ingin menghapus post ini ?",
				    icon: "warning",
				    buttons: true,
				    dangerMode: true,
				})
				.then((willDelete) => {
				    if (willDelete) {
					    window.location = "/post/"+post_id+"/hapus";
				    } 
				});
	    	});
    	});
    </script>
@stop