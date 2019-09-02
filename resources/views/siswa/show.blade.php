@extends('template')

@section('main')
    
<div id='siswa'>
    <h2>Detail Siswa</h2>
    <table class="table table-hover">
            <tr class="table-info">
                <th scope="col">NISN</th>
                <td scope="col">{{ $siswa->nisn }}</td>
            </tr>
             <tr class="table-info">
                <th scope="col">Nama Siswa</th>
                <td scope="col">{{ $siswa->nama_siswa }}</td>
            </tr>
             <tr class="table-info">
                <th scope="col">Tgl Lahir</th>
                <td scope="col">{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
            </tr>
             <tr class="table-info">
                <th scope="col">telepon</th>
                <td scope="col">{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</td>
            </tr>
             <tr class="table-info">
                <th scope="col">Jenis kelamin</th>
                <td scope="col">{{ $siswa->jenis_kelamin }}</td>
            </tr>
             <tr class="table-info">
                <th scope="col">Hobi</th>
                <td scope="col">
                    @foreach ($siswa->hobi as $item)
                        <span><strong>
                            {{ $item->nama_hobi }}
                        </strong></span>,
                    @endforeach
                </td>
            </tr>
             <tr class="table-info">
                <th scope="col">Nama kelas</th>
                <td scope="col">{{ $siswa->kelas->nama_kelas }}</td>
            </tr>
             <tr class="table-info">
                <th scope="col">Foto</th>
                <td scope="col">
                    @if (isset($siswa->foto))
                        <img src="{{ asset('fotoupload/'.$siswa->foto) }}" alt="picture">
                    @else
                        @if ($siswa->jenis_kelamin == 'L')
                            <img src="{{ asset('fotoupload/dummymale.jpg') }}" alt="picture">
                        @else
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}" alt="picture">
                        @endif
                    @endif
                </td>
            </tr>
</table> 
</div>

@endsection

@section('footer')
    @include('footer')
@endsection
