<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css?201610261218') }}" />
    <script src="{{ asset('/js/location.js?201610261211') }}"></script>
    <title>{{ config('app.name') }}ロゲイニングシステム</title>
</head>
<body>

<div class="container">
    @yield('content')
</div>

<center>
<font size="8">
現在開発中です<br>
しばらくお待ちください
<br>
<br>
</font>
  <a href="{{ url('/rogaining_list')}}">戻る </a>
</center>



</body>
</html>