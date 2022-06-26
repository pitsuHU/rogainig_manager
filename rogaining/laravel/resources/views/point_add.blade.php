<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css?201610261218') }}" />
    <script src="{{ asset('/js/location.js?201610539226') }}"></script>
    <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMinzpKvKIvAHCddcJiutLP9_Q4nKyBns&callback=initMap"
          async
        >
        </script>
    <title>{{ config('app.name') }}ロゲイニングシステム</title>
</head>


<body>
<div class="container">
    @yield('content')
</div>
<a href="/rogaining_edit">←戻る</a>
       <!--  地図 -->
        <div id="map"></div>
<br>
<form action="/point_insert" method="POST">
     {{ csrf_field() }}
        経度: <input type="text" id="lat" name="latitude" size="20" maxlength="20"> <br>
    	緯度: <input type="text" id="lng" name="longitude" size="20" maxlength="20">
    <br>
    <br>
    <font size="4">
        ポイント名：
        <input type="text" name="point_title" size="40" maxlength="20" placeholder="ポイント名">
        <br>
    </font>
    <br>
    画像URL：<input type="text" name="image_url" size="50" maxlength="20">
    <br>
    <br>
    音声：<input type="text" name="audio" size="40" maxlength="20">
    <br>
    <br>
    説明<br>
    <textarea name="description" rows="6" cols="60" placeholder="ここに説明を記入してください"></textarea>

    <br>
    <br>
    <br>
    {{ csrf_field() }}
    <input name="public" type="hidden" value="true">
    <input name="rogaining_id" type="hidden" value="{{$rogaining_id}}">
    <input name="count" type="hidden" value="{{$count}}">
    <center><input type="submit" value="保存"></center>
</form>
    <br>
<center>
<a href="/rogaining_edit">戻る</a>
</center>
</body>
</html>