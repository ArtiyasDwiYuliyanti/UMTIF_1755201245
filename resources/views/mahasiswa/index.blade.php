@extends('layouts.app')

@section('title', 'Halaman mahasiswa')
@section('bread1', 'Mahasiswa')
@section('bread2', 'Daftar')

@section('content')
	<h2>Daftar Mahasiswa</h2>
	<table class="table table-striped" id="mhs-table">
		<thread>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama Lengkap</th>
			</tr>
		</thread>
		<tbody></tbody>
	</table>

	<script>
		$(function () {
			var table = $('#mhs-table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ route('mhs_list')}}",
				columns: [
					{data: 'DT_RowIndex', name: 'DT_RowIndex'},
					{data: 'nim', name: 'nim'},
					{data: 'nama_lengkap', name: 'nama_lengkap'}
				]
			});
		});
	</script>
	@endsection