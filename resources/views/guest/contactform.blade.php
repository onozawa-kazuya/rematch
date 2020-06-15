@extends('layouts.guest')

@section('title', 'お問い合わせフォーム')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="panel panel-default">
                <div class="panel-heading">お問い合わせ</div>
                <div class="panel-body">
                    <!--エラー表示-->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    {!! Form::open(['url' => 'guest/confirm',
                                'class' => 'form-horizontal']) !!}
                                
                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                        {!! Form::label(['type', 'お問い合わせ種別:', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            @foreach($types as $key => $value)
                            <label class="checkbox-inline">
                                {!! Form::checkbox('type[]', '$value') !!}
                                {{ $value }}
                            </label>
                            @endforeach
                            @if($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label(['name', 'お名前', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label(['phone', '電話番号', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            @if($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label(['email', 'メールアドレス', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            @if($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label(['address', '建物所在地', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            @if($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('equipment') ? ' has-error' : '' }}">
                        {!! Form::label(['equipment', '点検希望設備', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('equipment', null, ['class' => 'form-control']) !!}
                            @if($errors->has('equipment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('equipment') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        {!! Form::label(['comment', 'コメント', 'class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                            @if($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection