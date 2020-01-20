./public/<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta http-equiv="Pragma" content="no-cache">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="format-detection" content="telephone=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<link href="./public/css/bksystem.css" rel="stylesheet" type="text/css" />
		<link href="./public/css/style.css" rel="stylesheet" type="text/css" />
		<link href="./public/font/iconfont.css" rel="stylesheet" type="text/css" />
		<link href="./public/css/module.css" rel="stylesheet" type="text/css" />
		<link href="./public/css/pages.css" rel="stylesheet" type="text/css" />
		<title>结构说明</title>
		<script src="./public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="./public/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="./public/js/HUpages.js" type="text/javascript"></script>
		<!--[if lt IE 9]>
          <script src="js/html5shiv.js" type="text/javascript"></script>
          <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
        <![endif]-->
	</head>

	<body id="pagestyle" class="backgroundf0">
		<div class="bk-con-message message-section" id="iframe_box">
			<div class="box-module height100b margin0">
				<div class="box-title">结构说明</div>
				<div class="box-content padding15">
					<div class="Promp_plate btn-green "><b>提示：</b>该模块依赖于BKframe控件,除首页其他内页需使用Hupage插件进行编辑操作
						<span  class="iconfont PrompClose">&#xe627</span>
					</div>
					<div class="color4 mt20">本框架支持移动端和PC端使用。不支持IE9以下的浏览器使用，如需要支持IE9以下浏览器请慎重使用。</div>
					<div class="ptb20">
						<h2>主框架：（首页）</h2>
						<h5>
 	                <p class="margin">$(function() { </p>
		            <p class="margin">$("<b class="color1">参数[1]</b>").BKframe({</p>
			        <p class="margin"> <b class="color2">设置参数值[2]</b></p><p class="margin"> });</p>
 	                </h5>
						<h4 class="margin"><b class="color1">[1]</b>:该参数为设置框架的必备条件填写该参数才能使用框架效果，该参数可以为class属性也可以为ID属性</h4>
						<h4 class="margin"><b class="color2">[2]</b>:该元素设置框架里的不同属性实现效果，可以自定义元素扩展方法，具体参数值请看下面的说明</h4>
						<div><img src="./public/images/stencil/image.jpg" width="100%"></div>
					</div>
					<table class="table tab-content table-bordered table_striped border table-hover table-responsive ">
						<thead>
							<tr>
								<th class="text-center" width="12%">参数</th>
								<th class="text-center" width="12%">参数名</th>
								<th class="text-center" width="15%">默认值</th>
								<th class="text-center">说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">bkposition</td>
								<td class="text-center">菜单栏显示的方位</td>
								<td class="text-center color4">left</td>
								<td>
									设置菜单栏目录板块显示的方向，<b class="color4">left</b>为左侧，<b class="color4">top</b>为顶部，默认左侧显示，菜单栏显示方形改变布局也将发生改不
									<div class="l_f mr20"><img src="./public/images/stencil/image.png" width="200px">
										<p>当显示位置在左侧时界面样式</p>
									</div>
									<div class="l_f"><img src="./public/images/stencil/image1.png" width="360px">
										<p>当显示位置在顶部时界面样式</p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="text-center">data</td>
								<td class="text-center">菜单栏数据</td>
								<td class="text-center color4">null</td>
								<td>设置菜单栏数据，格式
									<div class="padding10 " style="text-align: left;">
										var data = [{ //声明数据源<br>
											id: 2,//默认设置显示页时该值必须保持为2,不为2时将出错 <br>
											pid: 0, //二级以下菜单指明显示位置<br>
											url: "index_home.php", //地址自定义 但需要和homepage保持一致 <br>
											icon: 'iconfont icon-home', //显示设置栏目图标<br>
											name: '系统首页', //栏目名称<br>
											}
											]
									</div>
								</td>
							</tr>
							<tr>
								<td class="text-center">hrederheight</td>
								<td class="text-center">顶部高度</td>
								<td class="text-center color4">50</td>
								<td>设置顶部显示板块的高度值，默认为50，可自定义高度。</td>
							</tr>
							<tr>
								<td class="text-center">footerheight</td>
								<td class="text-center">底部高度</td>
								<td class="text-center color4">40</td>
								<td>设置底部显示板块的宽度，默认40,可自定义高度，40高度值比较适合,该值主要设置选项卡的高度。</td>
							</tr>
							<tr>
								<td class="text-center">sortmodeWidth</td>
								<td class="text-center">图标菜单显示宽度</td>
								<td class="text-center color4">60</td>
								<td>设置菜单显示为图标菜单时，默认60，可自定义。

								</td>
							</tr>
							<tr>
								<td class="text-center">menuheight</td>
								<td class="text-center">菜单栏高度</td>
								<td class="text-center color4">80</td>
								<td>该方法只使用菜单栏显示在顶部横排时有效 ,当参数<i class="color4">"bkposition":top</i>时该值有效</td>
							</tr>
							<tr>
								<td class="text-center">menuWidth</td>
								<td class="text-center">菜单栏宽度</td>
								<td class="text-center color4">200</td>
								<td>当差菜单栏显示在左侧或右侧竖排显示时该方法有效 ,当参数<i class="color4">"bkposition":left</i>时该值有效</td>
							</tr>
							<tr>
								<td class="text-center">minStatue</td>
								<td class="text-center">显示/隐藏菜单栏</td>
								<td class="text-center color4">false</td>
								<td>默认设置当前菜单栏是否显示或隐藏(true/false)</td>
							</tr>
							<tr>
								<td class="text-center">cookieDate</td>
								<td class="text-center">cookie时间（单位天）</td>
								<td class="text-center color4">7</td>
								<td>设置主题皮肤有效显示时间（单位天）</td>
							</tr>
							<tr>
								<td class="text-center">header</td>
								<td class="text-center">顶部盒子</td>
								<td class="text-center color4">自定义</td>
								<td>设置框架顶部布局层名称</td>
							</tr>
							<tr>
								<td class="text-center">footer</td>
								<td class="text-center">底部盒子（选项卡盒子）</td>
								<td class="text-center color4">自定义</td>
								<td>选项卡显示盒子当参数<i class="color4">"bkposition":top</i>时该布局盒子显示在顶部，当参数<i class="color4">"bkposition":left</i>时显示位置在header层下面</td>
							</tr>
							<tr>
								<td class="text-center">content</td>
								<td class="text-center">内容盒子</td>
								<td class="text-center color4">自定义</td>
								<td>用于显示内容架构的布局盒子内页界面将显示在该盒子里面</td>
							</tr>
							<tr>
								<td class="text-center">message</td>
								<td class="text-center">窗体显示</td>
								<td class="text-center color4">自定义</td>
								<td>设置窗体显示位置(frame)，显示各不相同的内页frame，布局位于content盒子的里面</td>
							</tr>
							<tr>
								<td class="text-center">menuModule</td>
								<td class="text-center">菜单盒子</td>
								<td class="text-center color4">自定义</td>
								<td>用于显示菜单位置，和data一起使用。</td>
							</tr>
							<tr>
								<td class="text-center">menu</td>
								<td class="text-center">菜单盒子</td>
								<td class="text-center color4">自定义</td>
								<td>设置菜单显示的样式</td>
							</tr>
							<tr>
								<td class="text-center">mouIconOpen</td>
								<td class="text-center">展开</td>
								<td class="text-center color4">自定义（字体库图标名）</td>
								<td>菜单展开用的图标，只适合用字体图标，不限于字体库的名称<p class="l_f"><img src="./public/images/stencil/image2.png" width="100px"></p></td>
							</tr>
							<tr>
								<td class="text-center">mouIconClose</td>
								<td class="text-center">隐藏</td>
								<td class="text-center color4">自定义（字体库图标名）</td>
								<td>菜单隐藏用的图标，只适合用字体图标，不限于字体库的名称<p class="l_f"><img src="./public/images/stencil/image2.png" width="100px"></p></td>
							</tr>
							<tr>
								<td class="text-center">iconsort</td>
								<td class="text-center">图文</td>
								<td class="text-center color4">自定义（字体库图标名）</td>
								<td><p class="l_f"><img src="./public/images/stencil/image3.png" width="100px"></p>  设置菜单栏显示模式为图文模式下的样式</td>
							</tr>
							<tr>
								<td class="text-center">iconsortg</td>
								<td class="text-center">图标</td>
								<td class="text-center color4">自定义（字体库图标名）</td>
								<td><p class="l_f"><img src="./public/images/stencil/image4.png" width="40px"></p> 设置菜单栏显示模式为图标模式下的样式</td>
							</tr>
							<tr>
								<td class="text-center">menuopt</td>
								<td class="text-center">事件</td>
								<td class="text-center color4">string(click/hover)</td>
								<td>菜单栏鼠标执行的事件，<i class="color4">'click'</i>为点击事件，点击展示栏目效果，<i class="color4">'hover'</i>为鼠标移动到菜单栏上是执行效果</td>
							</tr>
							<tr>
								<td class="text-center">rightclick</td>
								<td class="text-center">右键操作</td>
								<td class="text-center color4">false</td>
								<td>设置鼠标点击右键，当为false时鼠标点击右键有效，当为true时鼠标点击右键无效</td>
							</tr>
							<tr>
								<td class="text-center">closebtn</td>
								<td class="text-center">隐藏</td>
								<td class="text-center color4">自定义</td>
								<td>点击用于隐藏菜单栏配合<i class="color5">showbtn</i>使用，<i class="color3">menuModule</i></td>
							</tr>
							<tr>
								<td class="text-center">showbtn</td>
								<td class="text-center">显示</td>
								<td class="text-center color4">自定义</td>
								<td>点击用于显示菜单栏配合<i class="color5">closebtn</i>使用,<i class="color3">menuModule</i></td>
							</tr>
							<tr>
								<td class="text-center">slide</td>
								<td class="text-center">滑动盒子</td>
								<td class="text-center color4">自定义</td>
								<td>用于设置菜单栏超出显示区域进行滑动，该方法只在当参数<i class="color4">"bkposition":top</i>时该值有效</td>
							</tr>
							<tr>
								<td class="text-center">boxname</td>
								<td class="text-center">盒子</td>
								<td class="text-center color4">自定义</td>
								<td>定义一个盒子，设置你需要弹框盒子的名称</td>
							</tr>
							<tr>
								<td class="text-center">Promp</td>
								<td class="text-center">提示</td>
								<td class="text-center color4">自定义</td>
								<td>用于设置提示盒子时使用</td>
							</tr>
							<tr>
								<td class="text-center">iframe</td>
								<td class="text-center">窗体</td>
								<td class="text-center color4">自定义</td>
								<td>用于设置内容窗体显示位置</td>
							</tr><tr>
								<td class="text-center">tabs</td>
								<td class="text-center">选择卡</td>
								<td class="text-center color4">自定义</td>
								<td>用于设置选项卡显示位置</td>
							</tr>
							<tr>
								<td class="text-center">titlename</td>
								<td class="text-center">名称</td>
								<td class="text-center color4">自定义</td>
								<td>给菜单栏命名</td>
							</tr>
							<tr>
								<td class="text-center">iconfont</td>
								<td class="text-center">字体库名称</td>
								<td class="text-center color4">自定义</td>
								<td>用于设置字体库名称，第三方的字体库名称。
									<i class="color2">mouIconOpen</i>
									<i class="color2">mouIconClose</i>
									<i class="color2">iconsort</i>
									<i class="color2">iconsortg</i>
								</td>
							</tr>
							<tr>
								<td class="text-center">skinicon</td>
								<td class="text-center">选中图标</td>
								<td class="text-center color4">自定义</td>
								<td><p class="l_f"><img src="./public/images/stencil/image6.png" width="200px"></p>皮肤选择时显示的图标</td>
							</tr><tr>
								<td class="text-center">Bombboxinfo</td>
								<td class="text-center">消息盒子</td>
								<td class="text-center color4">自定义</td>
								<td><p class="l_f"><img src="./public/images/stencil/image7.png" width="200px"></p>用于设置消息盒子显示层样式</td>
							</tr>
							<tr>
								<td class="text-center">boxname</td>
								<td class="text-center">弹框盒子</td>
								<td class="text-center color4">'.Bombbox'</td>
								<td>
									<p class="l_f"><img src="./public/images/stencil/image8.png" width="200px"></p>
									用于设置需要弹框显示的盒子模块,需要指定class使用，支持table选项卡模式切换
									选项卡切换设置参考system_info.php界面
								    <p>模块指定class</p>
								    <p class="color2">clickBombbox//点击事件</p>
								    <p class="color2">Bombbox//显示内容</p>
								    <p class="color2">selected//默认显示时添加该class到clickBombbox中</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>

</html>
<script>
	//内页框架
	$(function() {
		$("#pagestyle").Hupage({
			slide: '#breadcrumb',
			scrollbar: function(e) {
				e.niceScroll({
					cursorcolor: "#dddddd",
					cursoropacitymax: 1,
					touchbehavior: false,
					cursorwidth: "3px",
					cursorborder: "0",
					cursorborderradius: "3px",
				});
			},
			expand: function(thisBox, settings) {
				settings.scrollbar(
					$(".box-content").css({
						height: $(window).height() - $('.box-title').outerHeight() - 30
					})
				); //设置当前页滚动样式
			}
		})
	})
</script>
