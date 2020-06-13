@extends('template_backend.home')
@section('sub-judul','Tambah Post')
@section('content')
@if (count($errors)>0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id">
            <option value="" holder>Pilih Kategori</option>
            @foreach ($category as $result)
            <option value="{{$result->id}}">{{ $result->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
            <label>Judul</label>
            <select class="form-control" name="" multiple="">
                <option>Option 1</option>
                <option>Option 2</option>
            </select>
        </div>
    <div>
        <label>Content</label>
        <textarea class="form-control" name="content"></textarea>
    </div>
    <div>
        <label for="">Upload Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success btn-sm"><i class="fa fa-save"></i> Kategori</button>
    </div>
</form>

@endsection