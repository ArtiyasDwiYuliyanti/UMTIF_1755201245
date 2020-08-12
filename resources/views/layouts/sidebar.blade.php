<h4 class="text-center">Menu</h4>
<div class="list-group list-group-flush">
	<a href="/mhs" class="list-group-item list-group-item-action {{ (request()->is('mhs')) ? 'active' : '' }}">Mahasiswa</a>
	<a href="#" class="list-group-item list-group-item-action">Dosen</a>
	<a href="{{route('prodi.index')}}" class="list-group-item list-group-item-action">Program Studi</a>
	<a href="#" class="list-group-item list-group-item-action">Mata Kuliah</a>
	<a href="#" class="list-group-item list-group-item-action">Kerja Praktek</a>
	<a href="#" class="list-group-item list-group-item-action">Skripsi</a>
</div>