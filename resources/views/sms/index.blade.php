@extends('layouts.app')

@section('content')

    <h1 class="page-header">SMS Central API</h1>
    <form action="/sms/send" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-primary" value="Send SMS" />
    </form>

@endsection
