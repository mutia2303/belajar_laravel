@extends('layouts.master_frontend')

@section('content') 
    <!-- start banner Area -->
	<section class="banner-area relative" id="home" style="background: url('{{ config('sekolah.image_banner_background_url') }}');">	
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Blog Details Page				
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="/">Blog </a></p>
				</div>	
			</div>
		</div>
	</section>
	<!-- End banner Area -->					  
	
	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-12">
							<div class="feature-img">
								<img class="img-fluid" src="{{ $post->thumbnail() }}" alt="" style="height: 350px;">
							</div>									
						</div>
						<div class="col-lg-3  col-md-3 meta-details">
							<!-- <ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul> -->
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{ $post->user->name }}</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $post->created_at->diffForHumans() }}</a> <span class="lnr lnr-calendar-full"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<h3 class="mt-20 mb-20">{{ $post->title }}</h3>
							{!! $post->content !!}
						</div>
					</div>
					
				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
	                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
	                            <button type="submit"><i class="fa fa-search"></i></button>
	                        </form>
						</div>
						<div class="single-sidebar-widget user-info-widget">
							<img src="{{ $post->user->getAvatar() }}" alt="" height="100" width="100">
							<a href="#"><h4>{{ $post->user->name }}</h4></a>
							<p>
								{{ $post->user->role }}
							</p>
						</div>
												
					</div>
				</div>
			</div>
		</div>	
	</section>
	<!-- End post-content Area -->
@stop