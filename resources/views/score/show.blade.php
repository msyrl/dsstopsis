@extends('layout')

@section('title','Data Penilaian')

@section('content')
	<div class="container">
		<div class="card">
			<form action="{{ route('score.update',$scores->first()->alternative->id )}}" method="post">
				@csrf
				@method('put')				
				<div class="card-header">
					<h1 class="card-title">Data Penilaian</h1>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $scores->first()->alternative->name }}" disabled>
					</div>
					@foreach($scores as $key => $score)
						<div class="form-group">
							<label>{{ $score->criteria->name }}</label>
							<input type="number" class="form-control" name="score_{{ $key }}" placeholder="Nilai" value="{{ $score->score }}" required>
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