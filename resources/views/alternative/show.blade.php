@extends('layout')

@section('title','Data Alternatif')

@section('content')
	<div class="container">
		<div class="card">
			<form action="{{ route('alternative.update',$alternative->id) }}" method="post">
				@csrf
				@method('put')				
				<div class="card-header">
					<h1 class="card-title">Data Alternatif</h1>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $alternative->name }}" required>
						@if($errors->has('name'))
							<p class="alert alert-warning">{{ $errors->first('name') }}</p>
						@endif
					</div>
					<div class="form-group">
						<label>No HP</label>
						<input type="text" class="form-control" name="phone_number" placeholder="No HP" value="{{ $alternative->phone_number }}" required>
						@if($errors->has('phone_number'))
							<p class="alert alert-warning">{{ $errors->first('phone_number') }}</p>
						@endif
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="address" placeholder="Alamat" style="height: 150px" required>{{ $alternative->address }}</textarea>
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