@extends('layout.main')

@section('content')
    <ul>
        @foreach ($articles as $item)
            <li>{{ $item->title }}</li>
            <li><img src="{{ asset('storage/' . $item->image_content) }}" width="100px" alt=""></li>
            </br>
        @endforeach
    </ul>
@endsection
