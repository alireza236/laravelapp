 @extends('template')

@section('main')
    
<div id='user'>
    <h2>User</h2>
    @include('_partial.flash_message')
        
       @if (count($user_list) > 0) 
    <br>
    <table class="table table-hover">
        <thead>
            <tr class="table-info">
                <th scope="col">NO</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th scope="row">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach($user_list as $user)  
            <tr class="table-light">
                <td>{{ ++$i }}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->level}}</td>
                <td>
                  {{--   <div class="box-button">
                        {{ link_to('siswa/'.$user->id, 'Detail', ['class'=> 'btn btn-success btn-sm' ]) }}
                    </div> --}}
                    <div class="box-button">
                        {{ link_to('user/'.$user->id.'/edit', 'Edit', ['class'=> 'btn btn-warning btn-sm' ]) }}
                    </div>
                    <div class="box-button">
                          {!! Form::open(['method' => 'DELETE', 'action'=> ['UserController@destroy',$user->id] ]) !!}
                          {!! Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) !!}                              
                          {!! Form::close() !!}                              
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table> 
    @else 
        <p> tidak ada data user</p>
    @endif
   
    <div class="bottom-nav">
        <a href="user/create" class="btn btn-primary"> Tambah User</a>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
