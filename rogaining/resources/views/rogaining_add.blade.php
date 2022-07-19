<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css?201610261221') }}" />
    <script src="{{ asset('/js/location.js?201610261226') }}"></script>
    <title>{{ config('app.name') }}ロゲイニングシステム</title>
</head>
<body>
<a href="{{ url('/rogaining_list')}}?user_id={{$user_id}}">←戻る</a>
<br>
<br>

<form action="/rogaining_insert" method="POST">
 {{ csrf_field() }}
    <font size="4">
    	ロゲイニングタイトル<br>
    	<input type="text" name="title" size="50" maxlength="20">
    	<br>
    </font>
    <br>
    説明<br>
    <textarea name="description" placeholder="ここに説明を記入してください" rows="4" cols="80"></textarea>
    <br>
    <input name="user_id" type="hidden" value="{{$user_id}}">
    <input name="count" type="hidden" value="{{$count}}">
    <input name="login" type="hidden" value=0>
    <input name="public" type="hidden" value=1>
    <center>
        <input type="submit" value="保存">
    </center>
</form>
<br>
<br>
<center>
    <a href="{{ url('/rogaining_list')}}?user_id={{$user_id}}">戻る</a>
</center>

</body>
</html>