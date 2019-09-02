@extends('template')
@section('main')
    <div id="hobi">
        <h2>Hobi</h2>
        @include('_partial.flash_message')
        @if (count($hobi_list) > 0)
             <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Hobi</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($hobi_list as $hobi)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $hobi->nama_hobi }}</td>
                    <td>
                        <div class="box-button">
                            {{ link_to('kelas/'.$hobi->id.'/edit','Edit',['class'=> 'btn btn-warning btn-sm']) }}
                        </div>
                        <div class="box-button">
                            {!! Form::open(['method'=> 'DELETE', 'action'=> ['HobiController@destroy', $hobi->id]]) !!}
                            {!! Form::submit('delete', ['class'=> 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        @else
            <p>Tidak ada list hobi</p>
        @endif
         <div class="tombol-nav">
            <a href="{{ url('hobi/create') }}" class="btn btn-primary">Tambah Hobi</a>
         </div>
    </div>
@endsection
@section('footer')
    @include('footer')
@endsection