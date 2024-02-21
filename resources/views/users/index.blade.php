@extends('layouts.index', ['title' => 'Halaman Data Pengguna', 'page_heading' => 'Daftar Pengguna'])

@section('content')
<div class="card">
	<div class="card-body">
		@include('utilities.alert')
		<div class="d-flex justify-content-end mb-3">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_create_modal">
				<i class="fas fa-fw fa-plus"></i>
				Tambah Data
			</button>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="datatable">

						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Lengkap</th>
								<th scope="col">Alamat Email</th>
								<th scope="col">Tanggal Ditambahkan</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<th scope="row">{{ $loop->iteration }}</th>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ date('m/d/Y H:i A', strtotime($user->created_at)) }}</td>
								<td class="text-center">
									<div class="btn-group">
										<a data-id="{{ $user->id }}" class="btn btn-sm btn-info text-white show-modal mr-2"
											data-toggle="modal" data-target="#show_user">
											<i class="fa fa-eye" aria-hidden="true"></i>
										</a>
										
										<!-- button edit -->
										<a data-id="{{ $user->id }}" class="btn btn-sm btn-success text-white edit-modal mr-2"
											data-toggle="modal" data-target="#user_edit_modal">
											<i class="fas fa-fw fa-edit"></i>
										</a>
										

										<!-- Tambahkan tombol untuk penghapusan -->
										<form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" class="d-inline">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
												<i class="fas fa-fw fa-trash"></i>
											</button>
										</form>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('modal')
@include('users.modal.create')
@include('users.modal.show')
@endpush

@push('js')
@include('users._script')
@endpush
