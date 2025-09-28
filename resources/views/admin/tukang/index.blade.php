@extends('layouts.admin')

@section('title', 'Data Tukang')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Tukang</h3>
        <table class="table table-bordered" id="tukangTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Skill</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tukangs as $tukang)
                <tr>
                    <td>{{ $tukang->id }}</td>
                    <td>{{ $tukang->user->name }}</td>
                    <td>{{ $tukang->skill }}</td>
                    <td>{{ $tukang->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#tukangTable').DataTable();
});
</script>
@endpush
@endsection
