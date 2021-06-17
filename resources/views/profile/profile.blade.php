@extends('layouts.app')


@section('content')


    <div class="uk-card uk-card-default uk-card-body uk-width-1-3@m uk-card-small uk-align-center">
        <div class="panel-heading uk-text-lead uk-text-center uk-text-bolder">Личный кабинет</div>
        <div class="container"
             style=" font-style: normal; font-weight: 500px; font-size: 21px; line-height: 50px; color: #000000;">
            <b>Ваше имя: </b> {{ $user->name }}
            <br>
            <b>Ваш номер телефона: </b> {{ $user->phone }}
            <form action="{{ route('changePhone') }}" method="POST">
                {!! csrf_field() !!}
                <br>
                Изменить номер телефона
                <br>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} uk-float-left ">

                    <div class="col-md-14">
                        <input id="number" type="text" pattern="[789][0-9]{10}" class="form-control" name="phone"
                               value="{{ old('phone') }}" required>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <p uk-margin>
                    <button type="submit" class="uk-button uk-button-primary uk-button-default "><b>Изменить</b>
                    </button>
                </p>
            </form>

            <form action="{{ route('changePassword') }}" method="POST">
                {!! csrf_field() !!}
                <div class="col-md-14">
                    Изменить пароль
                    <input type="password" name="password" class="form-control" style="width: 180px;">
                </div>

                <button type="submit" class="uk-button uk-button-primary uk-button-default">Изменить
                </button>
            </form>
        </div>


    </div>
@endsection