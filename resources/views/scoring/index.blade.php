@extends('layout')

@section('title','Perhitungan')

@section('content')
<div class="accordion">
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">
				Normalisasi
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-list"></i></button>
			</h1>
		</div>
		<div id="collapseOne" class="collapse">
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-normalizations" class="table table-bordered">
						<thead>
							<tr>
								<th>Alternatif</th>
								@foreach($criterias as $criteria)
								<th>{{ $criteria->name }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($alternatives as $key => $alternative)
							<tr>
								<td width="20%">{{ $alternative->name }}</td>
								@foreach($normalizations[$key] as $k => $normalization)
								<td>{{ $normalization }}</td>
								@endforeach
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">
				Normalisasi Terbobot
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-list"></i></button>
			</h1>
		</div>
		<div id="collapseTwo" class="collapse">
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-normalization-weights" class="table table-bordered">
						<thead>
							<tr>
								<th>Alternatif</th>
								@foreach($criterias as $criteria)
								<th>{{ $criteria->name }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($alternatives as $key => $alternative)
							<tr>
								<td width="20%">{{ $alternative->name }}</td>
								@foreach($normalizationWeights[$key] as $k => $normalizationWeight)
								<td>{{ $normalizationWeight }}</td>
								@endforeach
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">
				Solusi Ideal
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-list"></i></button>
			</h1>
		</div>
		<div id="collapseThree" class="collapse">
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-solusi" class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								@foreach($criterias as $criteria)
								<th>{{ $criteria->name }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td width="20%">A+</td>
								@foreach($solusiPlus as $sPlus)
								<td>{{ $sPlus }}</td>
								@endforeach
							</tr>
							<tr>
								<td>A-</td>
								@foreach($solusiMinus as $sMinus)
								<td>{{ $sMinus }}</td>
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h1 class="card-title">
				Hasil
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour"><i class="fa fa-list"></i></button>
			</h1>
		</div>
		<div id="collapseFour" class="collapse show">
			<div class="card-body">
				<p class="alert alert-primary">Nilai preferensi terbesar adalah nilai terbaik</p>
				<div class="table-responsive">
					<table id="table-result" class="table table-bordered">
						<thead>
							<tr>
								<th width="20%">Alternatif</th>
								<th>Positif</th>
								<th>Negatif</th>
								<th>Preferensi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alternatives as $key => $alternative)
							<tr>
								<td>{{ $alternative->name }}</td>
								<td>{{ $dPlus[$key] }}</td>
								<td>{{ $dMinus[$key] }}</td>
								<td>{{ $v[$key] }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table-normalizations').DataTable({
				'bLengthChange': false,
			});
			$('#table-normalization-weights').DataTable({
				'bLengthChange': false,
			});
			$('#table-solusi').DataTable({
				'bLengthChange': false,
			});
			$('#table-result').DataTable({
				'bLengthChange': false,
				order: [[ 3, 'desc']],
				columnDefs: [
					{ orderable: false, targets: [0,1,2]}
				]
			});
		});
	</script>
@endsection