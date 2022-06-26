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
    ポイントを追加しました
        <br>
        <br>
        <center>
        <a href="{{ url('/rogaining_edit')}}?rogaining_id={{$rogaining_id}}">戻る </a>
        <br>
        </center>
</body>
</html>