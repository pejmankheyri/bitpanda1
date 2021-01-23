@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('Edit user details') }}</h3></div>

                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <a href="{{ route('index') }}" class="">Back to all users</a>
                            <hr>
                            @if(!$user->userDetail)
                                <div class="alert alert-danger">
                                    <p>You can not edit this user !</p>
                                </div>
                            @else
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                @if(session()->get('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}  
                                    </div>
                                @endif
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}  
                                    </div>
                                @endif

                                {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}

                                <div class="form-group">
                                    {{ Form::label('email', 'Email address') }}
                                    {{ Form::email('email', $user->email, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('first_name', 'First name') }}
                                    {{ Form::text('first_name', $user->userDetail->first_name, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('last_name', 'Last name') }}
                                    {{ Form::text('last_name', $user->userDetail->last_name, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('phone_number', 'Phone number') }}
                                    {{ Form::text('phone_number', $user->userDetail->phone_number, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('active', 'active') }}
                                    {{ Form::checkbox('active', 'active', $user->active) }}
                                </div>

                                {{ Form::submit('Edit the user', array('class' => 'btn btn-primary')) }}
                                <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>

                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection