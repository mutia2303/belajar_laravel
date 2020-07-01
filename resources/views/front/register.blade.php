@extends('layouts.master_frontend')

@section('content')

    <section class="banner-area relative" id="home" style="background: url('{{ config('sekolah.image_banner_background_url') }}');">
		<div class="overlay overlay-bg"></div>	
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
			    <div class="about-content col-lg-12">
					<h1 class="text-white">
						Pendaftaran				
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/register"> Pendaftaran</a></p>
				</div>	
			</div>
		</div>					
	</section>

    <section class="search-course-area relative" style="background: unset;">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6 col-md-6 search-course-left">
					<h1>
						Pendaftaran Online <br>
						Bergabunglah Bersama Kami!
					</h1>
					<p>
						Dengan kurikulum yang update dan fasilitas yang lengkap, kami menjamin lulusan akan mudah masuk ke perguruan tinggi terbaik di Indonesia.
					</p>
				</div>
				<div class="col-lg-4 col-md-6 search-course-right section-gap">
					{!! Form::open(['url' => '/proses_register', 'class' => 'form-wrap']) !!}
						<h4 class="pb-20 text-center mb-30">Search for Available Course</h4>	
						{!! Form::text('nama_depan', '', ['class' => 'form-control', 'placeholder' => 'Nama Depan', 'required' => 'required']) !!}	
						{!! Form::text('nama_belakang', '', ['class' => 'form-control', 'placeholder' => 'Nama Belakang *', 'required' => 'required']) !!}
						<small id="help" class="form-text text-muted"> * Jika tidak memiliki, beri tanda (-)</small>
						{!! Form::text('agama', '', ['class' => 'form-control', 'placeholder' => 'Agama', 'required' => 'required']) !!}
						{!! Form::textarea('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat', 'required' => 'required']) !!}
						<div class="form-select" id="service-select">
						     {!! Form::select('jenis_kelamin', ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki-laki', 'P' => 'Perempuan']) !!}
						</div>
						{!! Form::file('avatar', ['class' => 'form-control']) !!}
						{!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) !!}
						<button type="submit" class="primary-btn text-uppercase">Daftar</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	
	</section>

@stop