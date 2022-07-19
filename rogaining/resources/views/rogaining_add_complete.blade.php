<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">

    <title>{{ config('app.name') }}ロゲイニングシステム</title>
</head>


<body>
    ロゲイニングを追加しました
        <br>
        <br>
        <center>
<!--         <a href="{{ url('/rogaining_list')}}?user_id={{$user_id}}">戻る </a>
        <br> -->
        <form action="/rogaining_list" method="POST">
        {{ csrf_field() }}
        <input name="user_id" type="hidden" value="{{$user_id}}">
        <input type="submit" value="戻る">
        </form>
        </center>
</body>
</html>