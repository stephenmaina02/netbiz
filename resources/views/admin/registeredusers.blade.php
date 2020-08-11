@extends('admin.layouts.main')

@section('title','Users')
@section('page_title','Registered Users')

@section('content')
@if(count($users)>0)
    <table class="table table-bordered" id="users">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Banned</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        @if($user->active=='n')
                        <label class="text-secondary">Inactive</label>
                        @elseif($user->active=='y')
                        <label class="text-success">Active</label>
                        @else
                        <label class="text-danger">Unknown</label>
                        @endif
                    </td>
                    <td>
                        @if($user->banned=='n')
                        <label class="text-secondary">Not Banned</label>
                        @elseif($user->banned=='y')
                        <label class="text-danger">Banned</label>
                        @else
                        <label class="text-info">Unknown</label>
                        @endif
                    </td>
                    <td>
                        @if($user->role=='u')
                        <label class="text-secondary">User</label>
                        @elseif($user->role=='a')
                        <label class="text-secondary">Admin</label>
                        @else
                        <label class="text-info">Unknown</label>
                        @endif
                    </td>
                    <td><a href="{{-- route('admin.edit-user',['id'=>$user->id]) --}}#">Edit</a></td>
                </tr>
            </tbody>
            @endforeach
            <tfoot>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Banned</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </tfoot>
    </table>
    {{-- $users->links() --}}
@else
    <p>No users have registered at the moment</p>
@endif


@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#users').DataTable();
} );
</script>
@endsection
