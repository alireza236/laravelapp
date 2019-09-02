<div id="pencarian">
    {!! Form::open(['url'=> route('carisiswa'), 'method'=> 'GET','id'=> 'form_pencarian']) !!}
    <div class="input-group">
        <div class="row">
                <div class="col-6 col-md-4">
                     <div class="input-group">
                    {!! Form::select('id_kelas',$list_kelas, (!empty($id_kelas) ? $id_kelas : null), ['id'=> 'id_kelas', 'class'=> 'form-control','placeholder'=> '-kelas-']) !!}
                </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="input-group">
                  {!! Form::select('jenis_kelamin', ['L'=> 'Laki-laki','P'=>'Perempuan'], (!empty($jenis_kelamin) ? $jenis_kelamin : null), ['id'=> 'jenis_kelamin', 'class'=> 'form-control','placeholder'=> '-Kelamin-']) !!}
                </div>
                </div>
                <div class="col-6 col-md-4">
                     <div class="input-group">
                      {!! Form::text('kata_kunci',(!empty($kata_kunci)) ? $kata_kunci: null, ['class' => 'form-control','placeholder'=> 'Enter..']) !!}
                     <span class="input-group-btn">
                        {!! Form::button('Cari', ['class'=> 'btn btn-success', 'type'=> 'Submit']) !!}
                     </span>
                    </div>
                </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>