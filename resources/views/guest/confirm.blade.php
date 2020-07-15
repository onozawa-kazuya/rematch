@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">お問い合わせ内容確認</div>
                    <div class="panel-body">
                        
                    <p>誤りがなければ送信ボタンを押してください</p>
                    <table class="table">
                        <tr>
                            <th>お問い合わせ種別</th>
                            <td>{{ $type }}</td>
                        </tr>
                        <tr>
                            <th>お名前</th>
                            <td>{{ $contactform->name }}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{ $contactform->phone }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $contactform->email }}</td>
                        </tr>
                        <tr>
                            <th>建物所在地</th>
                            <td>{{ $contactform->address }}</td>
                        </tr>
                        <tr>
                            <th>点検希望設備</th>
                            <td>{{ $contactform->equipment }}</td>
                        </tr>
                        <tr>
                            <th>コメント</th>
                            <td>{{ $contactform->comment }}</td>
                        </tr>
                    </table>
                    
                    {!! Form::open(['url' => 'guest/complete',
                                    'class'=> 'form-horizontal',
                                    'id' => 'post-input']) !!}
                                    
                    @foreach($contactform->getAttributes() as $key => $value)
                        @if(isset($value))
                            @if(is_array($value))
                                @foreach($value as $subValue)
                                <input name="{{ $key }}[]" type="hidden" value="{{ $subValue }}">
                                @endforeach
                            @else
                                {!! Form::hidden($key, $value) !!}
                            @endif
                        @endif
                    @endforeach
                    
                    {!! Form::submit('戻る',['name'=> 'action', 'class' => 'btn']) !!}
                    {!! Form::submit('送信',['name'=> 'action', 'class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection