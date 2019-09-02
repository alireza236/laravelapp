@extends('template')
@section('main')
    <div class="user">
        <h2>Edit User</h2>
        {!! Form::model($user, ['method'=> 'PATCH','Action'=> ['UserController@update', $user->id]]) !!}
            @include('user.form',['submitButtonText'=> 'Tambah User'])
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection