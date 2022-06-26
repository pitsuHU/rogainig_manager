<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css?201610261221') }}" />
    <script src="{{ asset('/js/location.js?21541727933197') }}"></script>
    <title>{{ config('app.name') }}ロゲイニングシステム</title>
</head>
<body>
    <a href="{{ url('/rogaining_list')}}?user_id={{$user_id}}">←戻る</a>
    <br>
    <br>
    <form action="/rogaining_update" method="POST">
          {{ csrf_field() }}
        <font size="4">
            タイトル<br>
            <input type="text" name="title" size="50" value="{{$rogaining->title}}" maxlength="20">
            <br>
        </font>
        <br>説明<br>
        <textarea name="description" placeholder="ここに説明を記入してください"　rows="6" cols="60">{{$rogaining->description}} 
        </textarea>
        <br>
        <input name="rogaining_id" type="hidden" value="{{$rogaining_id}}">
        <input name="login" type="hidden" value="true">
        <input name="public" type="hidden" value="true">
        <center>
            <input type="submit" value="保存">
        </center>
    </form>

<!-- <table>
@foreach($points as $point=>$i)
    <tr>
        <form action="/point_edit" method="POST">
            {{ csrf_field() }}
            <td align="right">{{ $i->no }}</td>
            <td>{{$i->latitude}}</td>
            <td>{{$i->longitude}}</td>
        </form>
    </tr>
@endforeach
</table> -->


@if($count == 0)
    新規ポイントを追加してください
@else
<input type="hidden" id="pointlist" value='{{$points}}'>
<br>
<br>
    <div id="map"></div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMinzpKvKIvAHCddcJiutLP9_Q4nKyBns&callback=initPointsMap"
      async
    ></script>
<br>
@endif



<!-- <a href="{{ url('/point_add')}}?rogaining_id={{$rogaining_id}}&count={{$count}}">新規ポイント追加 </a> -->
<form action="/point_add" method="POST">
     {{ csrf_field() }}
    <input name="rogaining_id" type="hidden" value="{{$rogaining_id}}">
    <input name="count" type="hidden" value="{{$count}}">
    <input type="submit" value="新規ポイント追加" >
</form>
<br>
 <table>
     <tr>
        <td>番号  </td>
        <td>ポイント名  </td>
        <td></td>
    </tr>
@foreach($points as $points=>$index)
    <tr>
        <form action="/point_edit" method="POST">
            {{ csrf_field() }}
            <input name="point_id" type="hidden" value="{{$index->id}}">
            <input name="rogaining_id" type="hidden" value="{{$rogaining_id}}">
            <td align="right">{{ $index->no }}</td>
            <td>{{ $index->point_title }}</td>
            <td><input type="submit" value="編集"></td>
        </form>
    </tr>
@endforeach
</table>
<br>
<br>
<center>
    <a href="{{ url('/rogaining_list')}}?user_id={{$user_id}}">戻る</a>
</center>

<br>
<br><br>
<br>
</body>
</html>