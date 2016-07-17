<section class="col-md-12">

    @if( Session::has('message'))
        <div class="alert alert-info">
{{ Session::get('message') }}
        </div>
    @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    {!! Form::model($user, [ 'route' => array('user.update', $user->id), 'method' => 'PUT', 'class'=>'form-horizontal', 'id' => 'userform', 'data-toggle'=>'validator', 'role'=>'form']) !!}

    <legend>User data</legend>

    <div class="form-group">
        {!! Form::label('name', 'Name', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-4">
            {!! Form::text('name', $user->name, array('class' => 'form-control input-md', 'required' => '')) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-4">
            {!! Form::email('email', $user->email, array('class' => 'form-control input-md', 'required' => 'required')) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-4">
            {!! Form::password('password', array('class' => 'form-control input-md', 'id'=>'password', 'required' => 'required')) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>

        <div class="form-group">
            {!! Form::label('password-repeat', 'Repeat Password', array('class' => 'col-md-4 control-label')) !!}
            <div class="col-md-4">
                <input type="password" class="form-control input-md" id="password-repeat" data-match="#password" required="required">
                <div class="help-block with-errors"></div>
            </div>
        </div>

    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="send"></label>
        <div class="col-md-4">
            <button id="send" name="send" type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>


    {!! Form::close() !!}

</section>
