@extends('template')

@section('main')
    
<div id='siswa'>
    <h2>Siswa</h2>
    @include('_partial.flash_message')
    <br>
    @include('siswa.form_pencarian')
    <br>
     <div class="pull-left">
        <strong>Jumlah Siswa: {{ $jumlah_siswa }}</strong>
    </div>
    @if (count($siswa_list) > 0) 
    <table class="table table-hover">
        <thead>
            <tr class="table-info">
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Telepon</th>
                @if (Auth::check())
                <th scope="row">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($siswa_list as $siswa)  
            <tr class="table-light">
                <td>{{ $siswa->nisn}}</td>
                <td>{{ $siswa->nama_siswa}}</td>
                <td>{{ $siswa->tanggal_lahir->format('d-m-Y')}}</td>
                <td>{{ $siswa->jenis_kelamin}}</td>
                <td>{{ $siswa->kelas->nama_kelas}}</td>
                <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</td>
                @if (Auth::check())
                    <td>
                    <div class="box-button">
                        {{ link_to('siswa/'.$siswa->id, 'Detail', ['class'=> 'btn btn-success btn-sm' ]) }}
                        </div>
                        <div class="box-button">
                            {{ link_to('siswa/'.$siswa->id.'/edit', 'Edit', ['class'=> 'btn btn-warning btn-sm' ]) }}
                        </div>
                        <div class="box-button">
                            {!! Form::open(['method' => 'DELETE', 'action'=> ['SiswaController@destroy',$siswa->id] ]) !!}
                            {!! Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) !!}                              
                            {!! Form::close() !!}                              
                        </div>
                    </td>
                @endif 
            </tr>
            @endforeach 
        </tbody>
    </table> 
    @else 
        <p> tidak ada data siswa</p>
    @endif
    <div class="table-nav">
            <div class="pull-left">
                  <strong> Jumlah Siswa: {{ $jumlah_siswa }}</strong>  
            </div>
            <div class="pull-right">
                Pagination
            </div>
             <div class="paging pagination">
                {{ $siswa_list->links() }}
            </div>
    </div>
    @if (Auth::check())
       <div class="bottom-nav">
         <a href="siswa/create" class="btn btn-primary"> Tambah Siswa</a>
       </div>
    @endif
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
