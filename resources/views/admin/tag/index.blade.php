@extends('template_backend.home')
@section('sub-judul','Tag')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif
<a href="{{ route('tag.create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a>
<br><br>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tag</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tag as $result=>$hasil)
            <tr>
                <td>{{ $result + $tag->firstitem() }}</td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <form action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('tag.edit', $hasil->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tag->links() }}
@endsection