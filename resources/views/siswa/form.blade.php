 @if (isset($siswa))
     {!! Form::hidden('id', $siswa->id) !!}
 @endif
 <fieldset>
       @if ($errors->any())
         <div class="form-group {{ $errors->has('nisn') ? 'has-danger' : 'has-success' }}">
       @else    
         <div class="form-group">
       @endif
            {!! Form::label('nisn', 'NISN:',['class'=> 'control-label']) !!}
            {!! Form::text('nisn',null, ['class'=> 'form-control']) !!}
            @if ($errors->has('nisn'))
                <span class="help-block text-primary">{{ $errors->first('nisn')}}</span>
            @endif
         </div>
        
       @if ($errors->any())
         <div class="form-group {{ $errors->has('nama_siswa') ? 'has-danger' : 'has-success' }}">
       @else    
         <div class="form-group">
       @endif
            {!! Form::label('nama_siswa','Nama:',['class'=> 'control-label']) !!}
            {!! Form::text('nama_siswa',null,['class'=> 'form-control']) !!}
            @if ($errors->has('nama_siswa'))
                <span class="help-block text-primary">{{ $errors->first('nama_siswa') }}</span>
            @endif
        </div>

       @if ($errors->any())
         <div class="form-group {{ $errors->has('id_kelas') ? 'has-danger' : 'has-success' }}">
       @else    
         <div class="form-group">
       @endif
            {!! Form::label('id_kelas','Nama:',['class'=> 'control-label']) !!}
                @if (count($list_kelas) > 0)
                    {!! Form::select('id_kelas',$list_kelas,null,['class'=> 'form-control','id'=>'id_kelas','placeholder'=>'Pilih kelas']) !!}
                @else    
                    <p> Tidak ada kelas</p>
                @endif

            @if ($errors->has('id_kelas'))
                <span class="help-block text-primary">{{ $errors->first('id_kelas') }}</span>
            @endif
        </div>

       @if ($errors->any())
           <div class="form-group {{ $errors->has('nomor_telepon') ? 'has-danger' : 'has-success' }}">
       @else    
           <div class="form-group">
       @endif
            {!! Form::label('nomor_telepon','Telepon:',['class'=> 'control-label']) !!}
            {!! Form::text('nomor_telepon', !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : null ,['class'=> 'form-control']) !!}
            @if ($errors->has('nomor_telepon'))
                <span class="help-block text-primary">{{ $errors->first('nomor_telepon')}}</span>
            @endif
        </div>

        @if ($errors->any())
           <div class="form-group {{ $errors->has('hobi_siswa') ? 'has-danger' : 'has-success' }}">
        @else    
           <div class="form-group">
        @endif
            {!! Form::label('hobi_siswa','Hobi:',['class'=> 'control-label']) !!}
             @if (count($list_hobi) > 0)
               @foreach ($list_hobi as $key => $value)
                 <div class="checkbox">
                        <label>
                            {!! Form::checkbox('hobi_siswa[]',$key, null) !!} {{ $value }}
                        </label>
                    </div>
                @endforeach
             @else
               <p> Tidak ada pilihan hobi..</p>
             @endif

            @if ($errors->has('hobi'))
                <span class="help-block text-primary">{{ $errors->first('hobi')}}</span>
            @endif
        </div>
        
       @if ($errors->any())
         <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-danger' : 'has-success' }}">
       @else    
         <div class="form-group">
       @endif
            {!! Form::label('tanggal_lahir','Tanggal Lahir:',['class'=> 'control-label']) !!}
            {!! Form::date('tanggal_lahir',!empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d') : null ,['class'=> 'form-control', 'id'=> 'tanggal_lahir']) !!}
             @if ($errors->has('tanggal_lahir'))
                <span class="help-block text-primary">{{ $errors->first('tanggal_lahir')}}</span>
            @endif
        </div>
    </fieldset>

             
         @if ($errors->any())
            <div class="form-group {{ $errors->has('foto') ? 'has-danger' : 'has-success' }}">
         @else      
            <div class="form-group">
         @endif   
            <div class="input-group">
                <div class="custom-file">
                 {!! Form::label('foto','Foto:',['class'=> 'custom-file-label',"for"=>"inputGroupFile02"]) !!}
                 {!! Form::file('foto',['class'=> 'custom-file-input',"id"=>"inputGroupFile02"]) !!}
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
            </div>
            </div>
             @if ($errors->has('foto'))
                   <span class="help-block text-primary">{{ $errors->first('foto')}}</span>
             @endif
        </div>
   
     @if ($errors->any())
         <fieldset class="form-group {{ $errors->has('nama_siswa') ? 'has-danger' : 'has-success' }}">
       @else    
             <fieldset class="form-group">
       @endif
            <label for="jenis_kelamin">Jenis kelamin:</label>
            <div class="form-group">
                <div class="form-check">
                     <label class="form-check-label">
                         {!! Form::radio('jenis_kelamin','L',['class'=> 'form-check-input']) !!}
                        Laki-laki</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                        {!! Form::radio('jenis_kelamin','P',['class'=> 'form-check-input']) !!}
                        Perempuan</label>
                </div>
                 @if ($errors->has('jenis_kelamin'))
                  <span class="help-block text-primary">{{ $errors->first('jenis_kelamin')}}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::submit($submitButtonText,['class'=> 'btn btn-primary form-control']) !!}
            </div>
        </fieldset>