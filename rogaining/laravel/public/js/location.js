let map;

var pointMarkerData = [];
var markerData = [];
const urlPointMakerPng = 'https://rogaining.nzc.jp/img/maru.png'
const urlPointMakerSvg = 'https://rogaining.nzc.jp/img/maru_move.svg'
const urlPointMaker = 'https://rogaining.nzc.jp/img/maru.svg'
const urlCurrentMaker = 'https://rogaining.nzc.jp/img/here.png'

function getClickLatLng(lat_lng, map) {
      // 座標を表示
    //document.getElementById('lat').textContent = lat_lng.lat();
      //document.getElementById('lng').textContent = lat_lng.lng();
      document.getElementById('lat').value = lat_lng.lat();
      document.getElementById('lng').value = lat_lng.lng();
  
      //Markerアイコン
      var img = {                                 // 画像の設定
          url: urlPointMaker,                   // 画像ファイル名
          scaledSize: new google.maps.Size(30, 30)    // 画像を縮小表示
      };
      // マーカーを設置
      var marker = new google.maps.Marker({
        position: lat_lng,
        map: map,
        icon: img
      });

      // 座標の中心をずらす
      // http://syncer.jp/google-maps-javascript-api-matome/map/method/panTo/
      for(var i=0; i<markerData.length; i++){
        markerData[i].setMap(null); // マーカー削除
      }
      markerData.splice(0)    // 配列要素を削除
      markerData.push(marker);

      map.panTo(lat_lng);

}

//なにも取得できない
function defaultMap(){
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 35.68125362951954, lng: 139.76671710422715 },
          zoom: 15,
        });
                     // クリックイベントを追加
          map.addListener('click', function(e) {
               getClickLatLng(e.latLng, map);
       });

}

//編集
function editMap(){
  let lat= document.getElementById("lat").value;
  let lng= document.getElementById("lng").value;
  let num = document.getElementById("no").textContent;

  map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: Number(lat), lng: Number(lng) },
        zoom: 15,
  });

  var img = {                                 // 画像の設定
        url: urlPointMakerSvg,                   // 画像ファイル名
        scaledSize: new google.maps.Size(40, 40)    // 画像を縮小表示
     };
  var markerLatLng = new google.maps.LatLng({lat: Number(lat), lng: Number(lng)}); // 緯度経度のデータ作成
  var marker = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
         map: map, // マーカーを立てる地図を指定
         icon: img,
         label: {text: String(num), color: "red"}
  });
  markerData.push(marker);

                     // クリックイベントを追加
  map.addListener('click', function(e) {
    getClickLatLng(e.latLng, map);
  });
}

function initMap() {
  if (navigator.geolocation) {
        // 現在地を取得
        navigator.geolocation.getCurrentPosition(
          // 取得成功した場合
          function(position) {
            // 緯度・経度を変数に格納
            var mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            // マップオプションを変数に格納
            var mapOptions = {
              zoom : 15,          // 拡大倍率
              center : mapLatLng  // 緯度・経度
          
            };
            // マップオブジェクト作成
            var map = new google.maps.Map(
              document.getElementById("map"), // マップを表示する要素
              mapOptions         // マップオプション
            );
            //　マップにマーカーを表示する
                  //Markerアイコン
            var img = {                                 // 画像の設定
                 url: urlCurrentMaker,                   // 画像ファイル名
                 scaledSize: new google.maps.Size(40, 40)    // 画像を縮小表示
            };
            var marker = new google.maps.Marker({
              map : map,             // 対象の地図オブジェクト
              position : mapLatLng,   // 緯度・経度
              icon : img
            });

             // クリックイベントを追加
    			 map.addListener('click', function(e) {
    			       getClickLatLng(e.latLng, map);
    			 });
          },
          // 取得失敗した場合
          function(error) {
            // エラーメッセージを表示
            switch(error.code) {
              case 1: // PERMISSION_DENIED
//                alert("位置情報の利用が許可されていません");
                defaultMap();
                break;
              case 2: // POSITION_UNAVAILABLE
                alert("現在位置が取得できませんでした");
                defaultMap();
                break;
              case 3: // TIMEOUT
                alert("タイムアウトになりました");
                defaultMap();
                break;
              default:
                alert("その他のエラー(エラーコード:"+error.code+")");
                defaultMap();
                break;
            }
          }
        );
      // Geolocation APIに対応していない
  } else {
//        alert("この端末では位置情報が取得できません");
        defaultMap();
  }
}


function successFunc(position) {
            // 緯度・経度を変数に格納
            var mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            // マップオプションを変数に格納
            var mapOptions = {
              zoom : 15,          // 拡大倍率
              center : mapLatLng  // 緯度・経度
            };
            // マップオブジェクト作成
            var map = new google.maps.Map(
              document.getElementById("map"), // マップを表示する要素
              mapOptions         // マップオプション
            );
            var img = {                                 // 画像の設定
                 url: urlCurrentMaker,                   // 画像ファイル名
                 scaledSize: new google.maps.Size(40, 40)    // 画像を縮小表示
            };
            //　マップにマーカーを表示する
            var marker = new google.maps.Marker({
              map : map,             // 対象の地図オブジェクト
              position : mapLatLng,   // 緯度・経度
              icon: img
            });
}
           // 取得失敗した場合
function errorFunc(error) {
            // エラーメッセージを表示
            switch(error.code) {
              case 1: // PERMISSION_DENIED
//                alert("位置情報の利用が許可されていません");
                defaultMap();
                break;
              case 2: // POSITION_UNAVAILABLE
                alert("現在位置が取得できませんでした");
                defaultMap();
                break;
              case 3: // TIMEOUT
                alert("タイムアウトになりました");
                defaultMap();
                break;
              default:
                alert("その他のエラー(エラーコード:"+error.code+")");
                defaultMap();
                break;
            }
}


function initAllMap() {
  if (navigator.geolocation) {
        // 現在地を取得
        var options = {timeout:60000};
        navigator.geolocation.getCurrentPosition(
          successFunc,
          errorFunc,
          options
        );
  }
  else {
//        alert("この端末では位置情報が取得できません");
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 35.68125362951954, lng: 139.76671710422715 },
          zoom: 15,
        });
  }
}


var marker = [];
var infoWindow = [];

function initPointsMap() {
	let pointlist= document.getElementById("pointlist").value;
	var pointMarkerList =JSON.parse(pointlist);
	

// 地図の作成
    var mapLatLng = new google.maps.LatLng({lat: pointMarkerList[0]['latitude'], lng: pointMarkerList[0]['longitude']}); // 緯度経度のデータ作成
   	map = new google.maps.Map(document.getElementById('map'), { // #sampleに地図を埋め込む
     center: mapLatLng, // 地図の中心を指定
      zoom: 14 // 地図のズームを指定
   });
 

 	var img = {                                 // 画像の設定
        url: urlPointMakerSvg,                   // 画像ファイル名
        scaledSize: new google.maps.Size(40, 40)    // 画像を縮小表示
     };
 	// マーカー毎の処理
 	for (var i = 0; i < pointMarkerList.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: pointMarkerList[i]['latitude'], lng: pointMarkerList[i]['longitude']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
         map: map, // マーカーを立てる地図を指定
         icon: img,
         label: {text: String(pointMarkerList[i]['no']), color: "red"}
       });
 
     	infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="sample">' + pointMarkerList[i]['point_title'] + '</div>' // 吹き出しに表示する内容
       });
 
     	markerEvent(i); // マーカーにクリックイベントを追加
 	}
 
//    	marker[0].setOptions({// TAM 東京のマーカーのオプション設定
//         icon: {
// 		 url:urlCurrentMaker,
// 		 scaledSize: new google.maps.Size(30, 30)
//        }
//    });
}

// マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}




      
 





