@extends('user.partials.app')

@section('title', 'Generated PDFs')

@section('content')

<div class="container">

    <h3 class="mb-4">Generated PDF Files</h3>

    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Size</th>
                <th>Created/Modified</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($pdfs as $pdf)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $pdf['name'] }}</td>

                    <td>{{ $pdf['size'] }} KB</td>

                    <td>{{ $pdf['last_modified'] }}</td>

                    <td>

                        <a href="{{ asset('storage/'.$pdf['path']) }}"
                           target="_blank"
                           class="btn btn-sm btn-primary">
                            View
                        </a>

                        <a href="{{ asset('storage/'.$pdf['path']) }}"
                           download
                           class="btn btn-sm btn-success">
                            Download
                        </a>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        No PDF files found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection