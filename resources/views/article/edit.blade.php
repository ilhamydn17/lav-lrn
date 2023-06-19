@extends('layout.main')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Edit Article
        </div>
        <div class="card-body">
            <form action="{{ route('article.update', $article ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" class="form-control" value="{{ $article->title }}" name="title"></br>

                    <label for="content">Content: </label>
                    <textarea type="text" class="form-control" value="{{ $article->content }}" name="content"></textarea></br>

                    <label for="image">Feature Image: </label>
                    <input type="file" class="form-control" value="{{ $article->image_content }}" name="update_image"></br>
                    <img src="{{ asset('storage/' . $article->image_content) }}" width="100px" alt="">

                    <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
