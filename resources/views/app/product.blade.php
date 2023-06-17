@extends('layout.master')

@section('content')
<div class="section-header">
    <h1>Halaman Product</h1>
  </div>

  <div class="section-body">
    <div class="card">
        <div class="card-body">
            ini adalah halaman Product
            <br>
            <a href="/product/pertama" class="btn btn-primary">Product satu</a>
            <a href="/product/kedua" class="btn btn-info">Product dua</a>
        </div>
    </div>
  </div>
@endsection
