@extends('layouts.admin')

@section('title', 'Dashboard Tukang')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Daftar Order untuk Tukang</h3>
        <table class="table table-bordered" id="tukangOrdersTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Pemesan</th>
                    <th>Tanggal Mulai</th>
                    <th>Durasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->start_date }}</td>
                    <td>{{ $order->duration_days }} hari</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        @if($order->status === 'pending')
                        <form action="{{ route('tukang.order.accept', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-success btn-sm">Terima</button>
                        </form>
                        <form action="{{ route('tukang.order.reject', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-danger btn-sm">Tolak</button>
                        </form>

                        @elseif($order->status === 'accepted')
                        <form action="{{ route('tukang.order.status', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="status" value="on-the-way">
                            <button class="btn btn-primary btn-sm">Berangkat</button>
                        </form>

                        @elseif($order->status === 'on-the-way')
                        <form action="{{ route('tukang.order.status', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="status" value="completed">
                            <button class="btn btn-success btn-sm">Selesaikan</button>
                        </form>

                        @elseif($order->status === 'completed')
                        <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tukangOrdersTable').DataTable();
    });
</script>
@endpush
@endsection