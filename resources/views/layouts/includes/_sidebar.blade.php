<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				<li><a href="/forum"><i class="lnr lnr-bubble"></i> <span>Forum</span></a></li>
				@if (auth()->user()->role == 'admin')
				    <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
				    <li><a href="/guru" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
				    <li><a href="/mapel" class=""><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>
				    <li><a href="/nilai" class=""><i class="lnr lnr-pencil"></i> <span>Jumlah Nilai</span></a></li>
				    <li><a href="/post" class=""><i class="lnr lnr-pencil"></i> <span>Post</span></a></li>
				@endif
			</ul>
		</nav>
	</div>
</div>