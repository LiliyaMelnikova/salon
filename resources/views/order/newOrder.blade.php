@extends('layouts.app')
@section('content')
    <div class="container services mt-3">
        <div class="back">
            <a id="btnBack"  >< Назад</a>
        </div>
        <div class="title">
            <h2>Укажите Ваши данные</h2>
        </div>
        @if( session('success') )
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row m-0">
            <div class="col-md-6">
                <form method="POST" action="/order/add">
                    @csrf
                    <div class="form-group col">
                        <label for="name" class="col-md-6 col-form-label">Имя*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="phone" class="col-md-6 col-form-label">Номер телефона*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col">
                    <label for="email" class="col-md-6  col-form-label">Эл. почта*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    </div>

                    <div class="form-group col">
                        <label for="message" class="col-md-6 col-form-label">Добавьте сообщение</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="message" name="message" value="{{ old('message') }}">
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="message" class="col-md-6 col-form-label">*Обязательные поля</label>
                    </div>

                    <input type="hidden" name="Times" value="{{ $Times }}" />
                    <input type="hidden" name="DateT" value="{{ $DateT }}" />
                    <input type="hidden" name="service" value="{{ $service->id }}" />

                    <div class="form-group row mb-0">
                        <div class="col offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 mt-5 mt-md-0">
                <div class="container-datetime-service">
                    <h2>{{$service->name}}</h2>
                    <h2>{!! $service->description!!}</h2>
                    <h2>{{$service->time}}</h2>
                    <h2>{{$service->price}} грн.</h2>
                    <h2>{{$DateT}}</h2>
                    <h2>{{$Times}}</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
