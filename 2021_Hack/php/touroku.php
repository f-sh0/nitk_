<?php
$gl = $_POST['name'];//htmlで入力されたIDを取得
$url = "https://0ac1-118-10-65-11.ngrok.io/group";//必要なjsonファイルが置かれているurl
$url_gl = $url."/".$gl;//urlとgroupの組み合わせで個人データを得るurl
$json = file_get_contents($url_gl);
//$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');//文字化けを回避
$arr = json_decode($json,true);//連想配列に格納

$data=array(
	'name' => $_POST['name'],
	'userlist' => $_POST['member']
);

$data_json = json_encode($data);

// ストリームコンテキストのオプションを作成
$options = array(
// HTTPコンテキストオプションをセット
  'http' => array(
    'method'=> 'POST',
    'header'=> 'Content-type: application/json; charset=UTF-8', //JSON形式で表示
    'content' => $data_json
  )
);

// ストリームコンテキストの生成
// ストリーム
// -> I/Oデータをプログラムで扱えるよう抽象化したもの
//    -> 抽象化の過程でストリームラッパーが用いられる
$context = stream_context_create($options);
// POST送信
$contents = file_get_contents($url, false, $context);

if (isset($_POST['name'])){
if ($arr != NULL) {//データに何か入っている時の処理

}else{//データに何も入っていない時の処理
        echo 'Not Data.';//確認用
}
}
?>

<html>
<head>
<style>
body{
	background: #e2dedb;
}

h1{
	color: #000000;
	text-align: center;
}
</style>
</head>
<body>
<h1>登録が完了しました.
<a href="../html/home.html"target=_blank>TOPに戻る</a>
</h1>
</body>
</html>
