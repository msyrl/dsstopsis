@extends('layout')

@section('title','Penilaian')

@section('content')
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">Data Penilaian</h1>
			<form action="{{ route('score.index') }}" method="GET">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="Cari data penilaian..." name="q" value="{{ request('q') }}">
					<div class="input-group-append">
						<button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
						&nbsp
						<a href="{{ route('score.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</form>
		</div>
		<div class="card-body">
			@if(session()->has('info'))
				<p class="alert alert-success">{{ session()->get('info') }}</p>
			@endif
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="1%">#</th>
							<th>Nama</th>
							@foreach($criterias as $criteria)
							<th>{{ $criteria->name }}</th>
							@endforeach
							<th width="5%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($alternatives as $key => $alternative)
							<tr>
								<td class="text-right">{{ $key+1 }}</td>
								<td>{{ $alternative->name }}</td>
								@foreach($alternative->scores as $score)
									<td>{{ $score->score }}</td>
								@endforeach
								<td>
									<div class="btn-group">
										<a href="{{ route('score.show',$alternative->id) }}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
										&nbsp
										<form id="delete" action="{{ route('score.destroy',$alternative->id) }}" method="post">
										@csrf
										@method('delete')
										<button type="submit" href="#" class="btn btn-outline-danger" onclick="return confirm('Hapus penilaian {{ $alternative->name }}')"><i class="fa fa-trash"></i></button>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('table').DataTable({
				'bLengthChange': false,
				'searching': false,
			});
		});
	</script>
@endsection