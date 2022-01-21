@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tenants') }}</div>

                <div class="card-body">
                    <a href="{{ route('tenants.create') }}"
                        class="btn btn-primary">Add New Tenants</a>
                        <br>
                        <br>
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Domain</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @forelse ($tenants as $tenant)
                                <tr>
                                    <td>{{  $tenant->name}}</td>
                                    <td>{{  $tenant->email}}</td>
                                    <td>{{  $tenant->domain}}</td>
                                    <td>
                                        <a href="{{ route('tenants.edit',$tenant->id) }}" 
                                            class="btn btn-sm btn-success">Edit</a>
                                        <form action="{{ route('tenants.destroy',$tenant->id) }}" method="POST" >
                                            @method('Delete')
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure to delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Tenant</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
