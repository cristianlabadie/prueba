@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">@lang("Poll")</div>
            <div class="card-body">
                @if(session()->has('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <form action="{{ route('polls.store') }}" method="POST">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid"><br>
                        <label>
                            “¿En una escala de 1 a 10: ¿Qué le pareció el proceso de selección de Rateinc?”
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="score">@lang("Note")</label>
                        <select name="score" class="form-control" id="score" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        {{ $errors->first('score', ':message') }}
                    </div>
                    <div class="form-group">
                        <label for="comment">@lang('Commentary')</label>
                        <textarea name="comment" class="form-control" id="comment" rows="3" required></textarea>
                        {{ $errors->first('comment', ':message') }}
                    </div>
                    <button type="submit" class="btn btn-primary float-right">
                        @lang("Send")
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')

@endsection
