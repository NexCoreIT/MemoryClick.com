@extends('backend.layout.app')
@section('content')
<div class="container">
    <br>
    <h2 style="text-align: center">{{ $title ?? 'Home Page Contents' }}</h2>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>Homepage Title</th>
                            <th>Homepage Content</th>
                            <th>About Title</th>
                            <th>About Content</th>
                            <th>Home Button</th>
                            <th>About Button</th>
                            <th>Footer Title</th>
                            <th>Footer Button</th>
                            <th>YouTube Link</th>
                            <th>Facebook Link</th>
                            <th>LinkedIn Link</th>

                            <th>Facebook Messenger</th>
                            <th>Phone</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($content as $item)
                        <tr>
                            <td>{{ Str::limit($item->homepage_title, 10) }}</td>
                            <td>{{ Str::limit($item->homepage_content, 10) }}</td>
                            <td>{{ Str::limit($item->about_title, 10) }}</td>
                            <td>{{ Str::limit($item->about_content, 10) }}</td>
                            <td>{{ Str::limit($item->home_btn, 10) }}</td></td>
                            <td>{{ $item->about_btn }}</td>
                            <td>{{ Str::limit($item->footer_title, 10) }}</td>
                            <td>{{ $item->footer_btn }}</td>
                            <td>
                                <a href="{{ $item->youtube_link }}" target="_blank">YouTube</a>
                            </td>
                            <td>
                                <a href="{{ $item->facebook_link }}" target="_blank">Facebook</a>
                            </td>
                            <td>
                                <a href="{{ $item->linkedin_link }}" target="_blank">LinkedIn</a>
                            </td>

                            <td>
                                <a href="{{ $item->messenger_username }}" target="_blank">Facebook Messenger</a>
                            </td>
                            <td>
                                <a href="{{ $item->phone }}" target="_blank">Phone</a>
                            </td>


                            <td>
                                <a href="{{ route('home.page.edit') }}" class="btn btn-primary btn-sm">
                                    <x-backend.svg.edit-btn/>
                                </a>
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
