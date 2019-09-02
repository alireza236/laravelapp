@extends('template')
@section('main')
    <div id="kelas">
        <h2>Edit Hobi</h2>
        {!! Form::model($hobi,['method'=> 'PATCH', 'action'=> ['HobiController@update',$hobi->id]]) !!}
            @include('hobi.form',['submitButtonText'=> 'Edit Hobi'])
        {!! Form::close() !!}
    </div>
@endsection
@section('footer')
    @include('footer')
@endsection