$('#wrapper').multiscroll({
   sectionsColor: ['#333', '#444', '#555','#333', '#444', '#555'],//セクションごとの背景色設定
	anchors: ['area1', 'area2', 'area3','area4','area5','area6'],//セクションとリンクするページ内アンカーになる名前
	menu: '#menu',//上部ナビゲーションのメニュー設定
	navigation: false,//右のナビゲーション出現、非表示は false
	navigationTooltips:['Area1', 'Area2', 'Area3','Area4','Area5','Area6'],//右のナビゲーション現在地時に入るテキスト
	loopTop: true,//最初のセクションを上にスクロールして最後のセクションまでスクロールするかどうかを定義します。
	loopBottom: true,//最後のセクションを下にスクロールして最初のセクションまでスクロールするかどうかを定義します。
});
