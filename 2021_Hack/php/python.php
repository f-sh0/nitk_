<?php
//こちら受信側→サーバ側に置いておく

	$id = Shibao;
	$command="echo $id | python graph.py";
	exec($command, $output);

    $bin = file_get_contents("../");//受信したモノを取り出し
    file_put_contents('./sample02.jpg',$bin);//同じディレクトリに『img.jpg』というファイル名で保存する
	 echo $bin;
?>
