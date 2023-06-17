@extends('layout.master')

@section('content')
<div class="section-header">
    <h1>Halaman Program</h1>
  </div>

  <div class="section-body">
    <div class="card">
        <div class="card-body">
            ini adalah halaman program
            <br>
            <a href="/program/pertama" class="btn btn-primary">program satu</a>
            <a href="/program/kedua" class="btn btn-info">program dua</a>
        </div>
    </div>
  </div>
@endsection
