@extends('template_backend.home')
@section('sub-judul','Kategory')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif
<a href="{{ route('category.create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a>
<br><br>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategory</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $result=>$hasil)
            <tr>
                <td>{{ $result + $category->firstitem() }}</td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <form action="{{ route('category.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('category.edit', $hasil->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $category->links() }}
@endsection