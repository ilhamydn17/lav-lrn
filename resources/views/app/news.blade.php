@extends('layout.master')

@section('content')
<div class="section-header">
    <h1>Halaman News</h1>
  </div>

  <div class="section-body">
    <div class="card">
        <div class="card-body">
            ini adalah halaman news Dengan Parameter {{ $id }}
        </div>
    </div>
  </div>
@endsection
