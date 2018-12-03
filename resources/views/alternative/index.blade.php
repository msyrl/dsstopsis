@extends('layout')

@section('title','Alternatif')

@section('content')
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">Data Alternatif</h1>
			<form action="{{ route('alternative.index') }}" method="GET">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="Cari data alternatif..." name="q" value="{{ request('q') }}">
					<div class="input-group-append">
						<button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
						&nbsp
						<a href="{{ route('alternative.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
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
							<th>No HP</th>
							<th>Alamat</th>
							<th width="5%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($alternatives as $alternative)
							<tr>
								<td>{{ $alternative->name }}</td>
								<td>{{ $alternative->phone_number }}</td>
								<td>{{ $alternative->address }}</td>
								<td>
									<div class="btn-group">
										<a href="{{ route('alternative.show',$alternative->id) }}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
										&nbsp
										<form id="delete" action="{{ route('alternative.destroy',$alternative->id)}}" method="post">
										@csrf
										@method('delete')
										<button type="submit" href="#" class="btn btn-outline-danger" onclick="return confirm('Hapus alternatif {{ $alternative->name }}')"><i class="fa fa-trash"></i></button>
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
		})
	</script>
@endsection