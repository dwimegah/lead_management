@extends('layout')

@section('content')

<h1>Leads List</h1>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Product Interest</th>
            <th>Score</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
        <tr>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->email }}</td>
            <td>{{ $lead->phone }}</td>
            <td>{{ $lead->product_interest }}</td>
            <td>{{ $lead->score }}</td>
            <td>
                @if($lead->status == 'New')
                    <span class="badge bg-primary">New</span>
                @elseif($lead->status == 'Contacted')
                    <span class="badge bg-info">Contacted</span>
                @elseif($lead->status == 'Qualified')
                    <span class="badge bg-success">Qualified</span>
                @elseif($lead->status == 'Unqualified')
                    <span class="badge bg-danger">Unqualified</span>
                @else
                    <span class="badge bg-secondary">{{ $lead->status }}</span>
                @endif
            </td>
            <td>
                <form action="{{ route('leads.delete', $lead->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>