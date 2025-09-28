@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Orders</h1>
    <table class="table table-bordered" id="ordersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Tukang</th>
                <th>Start Date</th>
                <th>Duration</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->tukang->user->name }}</td>
                <td>{{ $order->start_date }}</td>
                <td>{{ $order->duration_days }} hari</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable();
    });
</script>
@endpush
@endsection