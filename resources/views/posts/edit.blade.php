@extends('layouts/master')

@section('content')

    <div class="main">
    	<div class="main-content">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
    					<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Edit Post</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<form action="/post/{{ $post->id }}/proses_edit" method="POST" enctype="multipart/form-data">
									    <div class="col-md-8">
										    {{ csrf_field() }}
											<div class="form-group">
											    <label for="title">Judul</label>
											    <input name="title" type="text" class="form-control" id="title" placeholder="Judul" value="{{ $post->title }}">
											</div>
											<div class="form-group">
											    <label for="content">Konten</label>
											    <textarea name="content" class="form-control" id="content">{!! $post->content !!}</textarea>
											</div>
									    </div>
										<div class="col-md-4">
											<div class="input-group">
												<input name="thumbnail" type="file" class="form-control" id="thumbnail" value="{{ $post->thumbnail }}">
											</div> <br>
											<div class="input-group">
									            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
											</div>
										</div>
									</form>
								</div>
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
	    ClassicEditor
	        .create( document.querySelector( '#content' ) )
	        .catch( error => {
	            console.error( error );
	        } );
	</script>
	
@stop