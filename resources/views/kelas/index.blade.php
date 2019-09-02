@extends('template')
@section('main')
<span>
    <br>
    <br>
</span>
    <div id="kelas">
        @include('_partial.flash_message')
        @if (count($kelas_list) > 0)
            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($kelas_list as $kelas)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>
                        <div class="box-button">
                            {{ link_to('kelas/'.$kelas->id.'/edit','Edit',['class'=> 'btn btn-warning btn-sm']) }}
                        </div>
                        <div class="box-button">
                            {!! Form::open(['method'=> 'DELETE', 'action'=> ['KelasController@destroy', $kelas->id]]) !!}
                            {!! Form::submit('delete', ['class'=> 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table> 
        @else
            <p>Tidak ada data kelas</p>  
        @endif
        <div class="tombol-nav">
            <a href="{{ url('kelas/create') }}" class="btn btn-primary"> Tambah Kelas</a>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection