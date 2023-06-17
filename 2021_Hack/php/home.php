<?php
$lebel = $_POST['lebel'];
if($lebel == 'group'){
	include 'group.php';
	return;
}

$id = $_POST['phase1'];//htmlで入力されたIDを取得
$url = "https://1b17-36-11-229-71.ngrok.io/graph";//必要なjsonファイルが置かれているurl
$url_id = $url."/".$id;//urlとIDの組み合わせで個人データを得るurl
$url_gr = "https://1b17-36-11-229-71.ngrok.io/image";
$url_g = $url_gr."/".$id;//urlとIDの組み合わせで個人データを得るurl
$json = file_get_contents($url_id);
$json_img = file_get_contents($url_g);
//$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');//文字化けを回避
$arr = json_decode($json,true);//連想配列に格納
$img_g = json_decode($json_img,true);

if (isset($_POST['phase1'])){
if ($arr != NULL) {//データに何か入っている時の処理
		  $bc_id = array();
        $bc_date = array();
        $bc_temp = array();
        $bc_heart = array();
		  $bc_img = array();
        
		  for($i=0;$i<count($arr['records']);$i++){
        	$bc_date[] = $arr['records'][$i]['date'];
        	$bc_temp[] = $arr['records'][$i]['temperature'];
        	$bc_heart[] = $arr['records'][$i]['heart'];
        	$bc_stress[] = $arr['records'][$i]['stress'];
		  }
		
        $bc_img = $img_g['imagedata'];
		  
		  //var_dump($bc_img);//確認用
		  //var_dump($bc_temp);
		  //var_dump($bc_heart);
		  
}else{//データに何も入っていない時の処理
        echo 'Not Data.';//確認用
}
}
$imginfo = getimagesize('data:application/octet-stream;base64,'.$bc_img);
?>

<html>
<head>
<title>健康チェック表</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700">
<style>
@import url('https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap');
body {
  font-family: 'Lato', sans-serif;
  background: #e2dedb;
  color: black;
}

h1{
	font-family: "Kokoro";
	background-color:#a7bab2;
	color:#514349;
	text-align:center;
}

h2{
	font-family: "Kokoro";
	color: black;
   padding: 1rem 2rem;
   border-bottom: 3px solid #000;
   background: #f4f4f4;
}

h2.circle-two {
    position: relative;
    display: block;
    padding: 0.2em 0 0.2em 1.2em;
}

h2.circle-two::before {
    position: absolute;
    top: 0.6em;
    left: 0;
    display: block;
    width: 0.8em;
    height: 0.8em;
    border-radius: 50%;
    background: #70e2ef;
    box-shadow: 0.4em -0.4em 0 -1px #ffcdcd;
    content: "";
}

h3 {
  position: relative;
  padding: 1.5rem 2rem;
  border: 3px solid #000000;
  border-radius: 10px;
  background: #f9f9f9;
}

h3:before {
  position: absolute;
  bottom: -14px;
  left: 1em;
  width: 0;
  height: 0;
  content: '';
  border-width: 14px 12px 0 12px;
  border-style: solid;
  border-color: #000000 transparent transparent transparent;
}

h3:after {
  position: absolute;
  bottom: -10px;
  left: 1em;
  width: 0;
  height: 0;
  content: '';
  border-width: 14px 12px 0 12px;
  border-style: solid;
  border-color: #f9f9f9 transparent transparent transparent;
}

h4{
  color: #364e96;/*文字色*/
  border: solid 3px #364e96;/*線色*/
  padding: 0.5em;/*文字周りの余白*/
  border-radius: 0.5em;/*角丸*/
}

h5 {
  color: #ffffff;
  background: rgba(0,0,0,20%);
  text-align: center;
  padding: 3.00em;
  border-top: solid 2px #6cb4e4;
  border-bottom: solid 2px #6cb4e4;
}

.wrap {
  display: grid;
  gap: 40px;
  /* 以下、minmax内の「240px」が１個の円の最小幅。お好みで */
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
}

.wrap .item {
  border-radius: 100%;
  padding: 12px;
  background: #F09199;
  /* 以下のFlexboxで文字を中央寄せ */
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.wrap .item::before {/* 擬似要素で正円を作る */
  display: block;
  content: '';
  padding-top: 100%;
}

</style>
</head>
<body>
<?php
$span = "<h1>$id.さんの健康チェック</h1>";
echo $span;
?>
<div class="col-sm-4">
<h2 class="circle-two">&nbsp; あなたの体調</h2>
</div>
<h5><div class="wrap">
        <div class="item"><font size="5">あなたの</font><br><font size="5">最近の体温は...</font>
		  <font size="7">
		  <?php
		  $temp_new = "$bc_temp[0]";
		  echo $temp_new;
		  ?>
		  </font>
		  </p></div>
        <div class="item"><font size="5">あなたの</font><br><font size="5">ストレス度は...</font>
		  <font size="7">
		  <?php
		  $stress_new = "$bc_stress[0]";
		  echo $stress_new;
		  ?>
		  </font>
		  </p></div>
		  <div class="item">
		  <?php
		  $stress = (int)$stress_new;
		  $temp = (double)$temp_new;
		  if($stress>=0 && $stress<=3 && $temp<37.5){
		  	$text ="いい調子です. 今日も元気に頑張りましょう!";
		  	echo($text);
		  }else if($stress>=4 && $stress<=6 && $temp<37.5){
		  	$text ="ストレスが少し溜まっているようです.今日も 元気に頑張りましょう!";
		  	echo($text);
		  }else if($temp<37.5){
		  	$text ="ストレスがかなり溜まっているようです. たまには休息もとってくださいね！";
		  	echo($text);
		  }else{//temp>37.5
		  	$text ="熱があるようです. 体調に気をつけてゆっくりとお休みください.";
		  	echo($text);
		  }
        ?>
		  </div>
		</div>
		</h5>

<div class="row">
<div class="col-sm-4">
<h2 class="circle-two">&nbsp; 健康チェック表</h2>
<table>
  <tr>
    <th>日付</th>
    <th>体温</th>
    <th>心拍数</th>
  </tr>
<?php
for($j=0;$j<count($arr['records']);$j++){
	$bc_temp[$j]=(double)$bc_temp[$j];
	if($bc_temp[$j]>=37.5){
   	$data_table="<tr><td>$bc_date[$j]</td><td><font color='red'>$bc_temp[$j]</font></td><td>$bc_heart[$j]</td></tr>";
	 	echo($data_table);
	}else{
   	$data_table="<tr><td>$bc_date[$j]</td><td>$bc_temp[$j]</td><td>$bc_heart[$j]</td></tr>";
	 	echo($data_table);	
}
}
?>
</table>
</div>

<div class="col-sm-4">
	<h2 class="circle-two">&nbsp; グラフ</h2>
<?php
	echo '<img src="data:'.$imginfo['mime'].';base64,'.$bc_img.'">';
?>
</div>
</div>
</body>
</html>
