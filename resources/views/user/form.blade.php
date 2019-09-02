 @if (isset($user))
     {!! Form::hidden('id', $user->id) !!}
 @endif

<fieldset>
     {{-- Nama --}}  
     @if ($errors->any())
     <div class="form-group {{ $errors->has('nisn') ? 'has-danger' : 'has-success' }}">
            @else    
            <div class="form-group">
                @endif
                {!! Form::label('name', 'Nama:',['class'=> 'control-label']) !!}
                {!! Form::text('name',null, ['class'=> 'form-control']) !!}
                @if ($errors->has('name'))
                <span class="help-block text-primary">{{ $errors->first('name')}}</span>
                @endif
            </div>
            
        {{-- Email --}}  
        
        @if ($errors->any())
        <div class="form-group {{ $errors->has('email') ? 'has-danger' : 'has-success' }}">
                @else    
                <div class="form-group">
                    @endif
                    {!! Form::label('email', 'Email:',['class'=> 'control-label']) !!}
                    {!! Form::text('email',null, ['class'=> 'form-control']) !!}
                    @if ($errors->has('email'))
                    <span class="help-block text-primary">{{ $errors->first('email')}}</span>
                    @endif
                </div>
                
        {{-- Level --}} 
        
        @if ($errors->any())
                <div class="form-group {{ $errors->has('level') ? 'has-danger' : 'has-success' }}">
        @else    
                <div class="form-group">
                    {!! Form::label('level', 'Level:',['class'=> 'control-label']) !!}
        @endif
                    <div class="form-group">
                <div class="form-check">
                     <label class="form-check-label">
                         {!! Form::radio('level','operator',['class'=> 'form-check-input form-control']) !!}
                        Operator
                     </label>
                </div>
            </div>
             <div class="form-group">
                <div class="form-check">
                     <label class="form-check-label">
                         {!! Form::radio('level','admin',['class'=> 'form-check-input form-control']) !!}
                        Administrator
                     </label>
                </div>
            </div>
            @if ($errors->has('level'))
                <span class="help-block text-primary">{{ $errors->first('level')}}</span>
            @endif
         </div>
   
         {{-- Password--}}
         
         @if ($errors->any())
            <div class="form-group {{ $errors->has('password') ? 'has-danger' : 'has-success' }}">
         @else    
                <div class="form-group">
         @endif
                    {!! Form::label('password', 'Password:',['class'=> 'control-label']) !!}
                    {!! Form::password('password', ['class'=> 'form-control']) !!}
                    @if ($errors->has('password'))
                       <span class="help-block text-primary">{{ $errors->first('password')}}</span>
                    @endif
                </div>
         
            {{-- Conform Password--}}
         @if ($errors->any())
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-danger' : 'has-success' }}">
         @else    
                <div class="form-group">
         @endif
                    {!! Form::label('password_confirmation', 'Password Confirmation:',['class'=> 'control-label']) !!}
                    {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                    @if ($errors->has('password_confirmation'))
                       <span class="help-block text-primary">{{ $errors->first('password_confirmation')}}</span>
                    @endif
                </div>

          {{-- Submit Button --}}
          <div class="form-group">
            {!! Form::submit($submitButtonText,'',['class'=> 'btn btn-primary form-control']) !!}
          </div>
</fieldset