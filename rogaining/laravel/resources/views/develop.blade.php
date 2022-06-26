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

<font size="4">
	<br>
</font>
<br>
    <div id="map"></div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMinzpKvKIvAHCddcJiutLP9_Q4nKyBns&callback=initMap"
      async
    ></script>
    <br>
    経度: <span id="lat"><input type="text" name="lat" size="20" maxlength="20"></span> 
	緯度: <span id="lng"><input type="text" name="lng" size="20" maxlength="20"></span> 
<br>
<br>
<br>
<br>
<br

</body>
</html>