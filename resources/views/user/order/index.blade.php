@extends('layouts.admin')

@section('title', 'Pesanan Saya')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <h3>Pesan Tukang</h3>
                <form action="{{ route('user.order.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tukang_id" class="form-label">Pilih Tukang</label>
                        <select name="tukang_id" id="tukang_id" class="form-select" required>
                            @foreach($tukangs as $tukang)
                                <option value="{{ $tukang->id }}">
                                    {{ $tukang->user->name }} ({{ $tukang->status }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="duration_days" class="form-label">Durasi (hari)</label>
                        <input type="number" name="duration_days" id="duration_days" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Pesan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Pesanan Saya</h3>
                <table class="table table-bordered" id="userOrdersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tukang</th>
                            <th>Mulai</th>
                            <th>Durasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->tukang->user->name }}</td>
                            <td>{{ $order->start_date }}</td>
                            <td>{{ $order->duration_days }} hari</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#userOrdersTable').DataTable();
});
</script>
@endpush
@endsection
