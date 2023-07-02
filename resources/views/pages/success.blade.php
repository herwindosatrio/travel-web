@extends('layouts.success')

@section('title', 'Success')

@section('content') 
{{-- URL gambar tolong diganti  --}}
  <main>
    <div class="section-success d-flex align-items-center">
      <div class="col text-center">
        <img src="{{ url('frontend/images/ic_mail.png') }}" alt="">
        <h1>Yay! Success</h1>
        <p>
          We've sent you email for trip instruction
          <br>
          please read it as well
        </p>
        {{-- bisa pake url atau {{ url('/') }} --}}
        <a href="{{ (route('home')) }}" class="btn btn-home-page mt-3 px-5">
          Home Page
        </a>
      </div>
    </div>
  </main>
@endsection