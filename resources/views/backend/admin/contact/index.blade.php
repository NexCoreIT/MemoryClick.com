@extends('backend.layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Contact Messages</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $key => $contact)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>
                                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No Contacts Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$contacts->links()}}
    </div>
</div>
@endsection
