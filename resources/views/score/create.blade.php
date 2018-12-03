@extends('layout')

@section('title','Tambah Penilaian')

@section('content')
	<div class="container">
		<div class="card">
			<form action="{{ route('score.store') }}" method="post">
				@csrf
				<div class="card-header">
					<h1 class="card-title">Tambah Penilaian</h1>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama Alternatif</label>
						<select name="alternative_id" class="form-control">
							<option hidden>Nama Alternatif</option>
							@foreach($alternatives as $alternative)
							<option value="{{ $alternative->id }}">{{ $alternative->name }}</option>
							@endforeach
						</select>
					</div>
					@foreach($criterias as $key => $criteria)
						<div class="form-group">
							<label>{{ $criteria->name }}</label>
							<input type="hidden" name="criteria_{{ $criteria->id }}" value="{{ $criteria->id }}">
							<input type="number" class="form-control" name="score_{{ $key }}" placeholder="Nilai (1-5)" required>
							@if($errors->has("score_$key"))
								<p class="alert alert-warning">{{ $errors->first("score_$key") }}</p>
							@endif
						</div>
					@endforeach
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-outline-primary pull-right">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection