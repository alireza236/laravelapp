@extends('template')

@section('main')
<br>
<br>
<div id="siswa">
   
   {!! Form::open(['url'=> 'siswa','files'=> true]) !!}
      @include('siswa.form',['submitButtonText' => 'Tambah Siswa'])
   {!! Form::close() !!}

@endsection

@section('footer')
    @include('footer')
@endsection