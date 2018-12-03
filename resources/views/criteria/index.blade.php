@extends('layout')

@section('title','Kriteria')

@section('content')
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">Data Kriteria</h1>
			<form action="{{ route('criteria.index') }}" method="GET">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="Cari data kriteria..." name="q" value="{{ request('q') }}">
					<div class="input-group-append">
						<button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
						&nbsp
						<a href="{{ route('criteria.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
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
							<th>Nama</th>
							<th>Bobot</th>
							<th width="5%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($criterias as $criteria)
							<tr>
								<td>{{ $criteria->name }}</td>
								<td>{{ $criteria->weight }}</td>
								<td>
									<div class="btn-group">
										<a href="{{ route('criteria.show',$criteria->id) }}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
										&nbsp
										<form id="delete" action="{{ route('criteria.destroy',$criteria->id)}}" method="post">
										@csrf
										@method('delete')
										<button type="submit" href="#" class="btn btn-outline-danger" onclick="return confirm('Hapus kriteria {{ $criteria->name }}')"><i class="fa fa-trash"></i></button>
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