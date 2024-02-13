@extends('layouts.index', ['title' => 'Admin Dashboard', 'page_heading' => 'Dashboard'])

@section('content')
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="fas fa-columns"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Barang</h4>
				</div>
				<div class="card-body">
					{{ $commodity_count }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="fas fa-fw fa-check-circle"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Kondisi Baik</h4>
				</div>
				<div class="card-body">
					{{ $commodity_condition_good_count }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="fas fa-fw fa-exclamation-circle"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Kondisi Rusak Ringan</h4>
				</div>
				<div class="card-body">
					{{ $commodity_condition_not_good_count }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="fas fa-fw fa-times-circle"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Kondisi Rusak Berat</h4>
				</div>
				<div class="card-body">
					{{ $commodity_condition_heavily_damage_count }}
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Diagram Lingkaran Kondisi Barang</h4>
            </div>
            <div class="card-body">
                <canvas id="conditionChart" height="10"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Barang Termahal</h4>
            </div>
            <div class="card-body">
                <canvas id="priceChart" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-12 col-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h4>Detail Barang Termahal</h4>
			</div>
			<div class="card-body">
				@foreach($commodity_order_by_price as $key => $order_by_price)
				<ul class="list-unstyled list-unstyled-border">
					<li class="media">
						<!-- <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar"> -->
						<div class="media-body">
							<button data-id="{{ $order_by_price->id }}"
								class="float-right btn btn-info btn-sm show-modal" data-toggle="modal"
								data-target="#show_commodity">Detail</button>
							<div class="media-title">{{ $order_by_price->name }}</div>
							<span class="text-small text-muted">Harga: Rp{{
								$order_by_price->indonesian_currency($order_by_price->price) }}</span>
						</div>
					</li>
				</ul>
				@endforeach
				<div class="text-center pt-1 pb-1">
					<a href="{{ route('barang.index') }}" class="btn btn-primary btn-lg btn-round">
						Lihat Semua Barang
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
@include('_script');

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<script>
    // Data untuk diagram lingkaran
    var conditionData = [
        {{ $commodity_condition_good_count }},
        {{ $commodity_condition_not_good_count }},
        {{ $commodity_condition_heavily_damage_count }}
    ];

    // Data untuk grafik barang termahal
    var priceData = @json($commodity_order_by_price);

    // Inisialisasi diagram lingkaran
    var conditionChart = new Chart(document.getElementById('conditionChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Kondisi Baik', 'Kondisi Rusak Ringan', 'Kondisi Rusak Berat'],
            datasets: [{
                data: conditionData,
                backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
            }]
        },
    });

    // Inisialisasi grafik barang termahal
    var priceChart = new Chart(document.getElementById('priceChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: priceData.map(item => item.name),
            datasets: [{
                label: 'Harga',
                data: priceData.map(item => item.price),
                backgroundColor: '#007bff',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return 'Rp' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endpush


@push('modal')
@include('commodities.modal.show')
@endpush

@push('js')
@include('_script');
@endpush
