@extends('layouts.login')

@section('content')

<div class="container">
  {!! Form::open(['url' => '/profile/update', 'enctype' => 'multipart/form-data']) !!}
    <div class='form-froup'>
      <label>username{!! Form::input('text', 'username', $profile->username, ['required', 'class' => 'form-control']) !!}</lavel>
    </div>
    <div class='form-froup'>
      <label>Mail Adress{!! Form::input('email', 'mail', $profile->mail, ['required', 'class' => 'form-control']) !!}</label>
    </div>
    <div class='form-froup'>
      <label>password{!! Form::input('password', 'password', $profile->password, ['required', 'class' => 'form-control']) !!}</label>
    </div>
    <div class='form-froup'>
      <label>newpassword{!! Form::input('text', 'newpassword', "", ['class' => 'form-control']) !!}</label>
    </div>
    <div class='form-froup'>
      <label>bio
      {!! Form::input('text', 'bio', $profile->bio, ['class' => 'form-control']) !!}
    </div>
    <div class='form-froup'>
      <label>IconImage {{Form::file("cover_image")}}</label>
    </div>
      <button type="submit" value="">更新</button>
  {!! Form::close() !!}
</div>
@endsection
