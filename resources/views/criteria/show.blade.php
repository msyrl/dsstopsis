@extends('layout')

@section('title','Data Criteria')

@section('content')
	<div class="container">
		<div class="card">
			<form action="{{ route('criteria.update',$criteria->id) }}" method="post">
				@csrf
				@method('put')				
				<div class="card-header">
					<h1 class="card-title">Data Criteria</h1>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $criteria->name }}" required>
						@if($errors->has('name'))
							<p class="alert alert-warning">{{ $errors->first('name') }}</p>
						@endif
					</div>
					<div class="form-group">
						<label>Bobot</label>
						<input type="text" class="form-control" name="weight" placeholder="Nilai Bobot" value="{{ $criteria->weight }}" required>
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