@extends('layout')

@section('title','Tambah Kriteria')

@section('content')
	<div class="container">
		<div class="card">
			<form action="{{ route('criteria.store') }}" method="post">
				@csrf
				<div class="card-header">
					<h1 class="card-title">Tambah Kriteria</h1>
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
						<label>Bobot</label>
						<input type="number" class="form-control" name="weight" placeholder="Nilai Bobot ( 1 - 5 )" required>
						@if($errors->has('weight'))
							<p class="alert alert-warning">{{ $errors->first('weight') }}</p>
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