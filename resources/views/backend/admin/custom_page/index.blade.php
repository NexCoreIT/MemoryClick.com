@extends('backend.layout.app')
@section('content')
<div class="container">
    <br>
    <h2 style="text-align: center">Custom Page</h2>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                <tr>
                    <th>Title</th>
                    <th>Meta Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ Str::limit($item->title,20) }}</td>
                    <td>{{ Str::limit($item->meta_title,20) }} </td>
                    <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('custom.page.edit', $item->id) }}" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
    </svg></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

</div>

@endsection


