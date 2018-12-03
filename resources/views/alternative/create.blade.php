@extends('layout')

@section('title','Tambah Alternatif')

@section('content')
	<div class="container">
		<div class="card">
			<form action="{{ route('alternative.store') }}" method="post">
				@csrf
				<div class="card-header">
					<h1 class="card-title">Tambah Alternatif</h1>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="name" placeholder="Nama" required>
						@if($errors->has('name'))
							<p class="alert alert-warning">{{ $errors->first('name') }}</p>
						@endif
					</div>
					<div class="form-group">
						<label>No HP</label>
						<input type="text" class="form-control" name="phone_number" placeholder="No HP" required>
						@if($errors->has('phone_number'))
							<p class="alert alert-warning">{{ $errors->first('phone_number') }}</p>
						@endif
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="address" placeholder="Alamat" style="height: 150px" required></textarea>
						@if($errors->has('address'))
							<p class="alert alert-warning">{{ $errors->first('address') }}</p>
						@endif
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-outline-primary pull-right">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection