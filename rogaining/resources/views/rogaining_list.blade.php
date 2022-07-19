<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
    <title>{{ config('app.name') }}ロゲイニングシステム</title>
</head>
<body>

<font size="6">
ロゲイニング一覧
</font>
<br>
<form action="/rogaining_add" method="POST">
     {{ csrf_field() }}
    <input name="user_id" type="hidden" value="{{$user_id}}">
    <input name="count" type="hidden" value="{{$count}}">
    <input type="submit" value="新規ロゲイニング追加" >
</form>
<br>
 <table>
     <tr>
        <td>ID  </td>
        <td>ロゲイニング名  </td>
        <td></td>
        <td></td>
    </tr>
@foreach($rogainings as $rogainings=>$index)
    <tr>
        
        <td align="right">{{ $index->id }}</td>
        <td>{{ $index->title }}</td>
        <td>
            <input type="button" value="プレビュー" onclick="location.href='/developing'">
        </td>
        <td>
            <input type="button" value="編集" onclick="location.href='/rogaining_edit?rogaining_id={{$index->id}}&user_id={{$user_id}}'">
        </td>

    </tr>
@endforeach
</table>
<br>
<br>
<center>
<!--     <input type="submit" value="戻る"> -->
</center>



</body>
</html>