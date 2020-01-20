<!doctype html>
<html>

	<head>
		<meta charset="utf-8">

		<link href="./public/css/bksystem.css" rel="stylesheet" type="text/css" />
		<link href="./public/skin/black/skin.css" rel="stylesheet" type="text/css" id="skin" />
		<link href="./public/css/module.css" rel="stylesheet" type="text/css" />
		<link href="./public/font/iconfont.css" rel="stylesheet" type="text/css" />
		<title>登录</title>
		<script src="./public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="./public/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="./public/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="./public/js/BKframe.js" type="text/javascript"></script>

	</head>
	<body class="login-layout Reg_log_style" id="loginstyle">
		<div class="logintop">
			<span>后台管理界面平台</span>
			<ul>
				<li>
					<a href="#">返回首页</a>
				</li>
				<li>
					<a href="#">帮助</a>
				</li>
				<li>
					<a href="#">关于</a>
				</li>
			</ul>
		</div>
		<div class="loginbody">
			<div class="login-container">
				<div class="center"> <img src="./public/images/logo.png" /></div>
				<div class="space-6"></div>
				<div class="position-relative">
					<div id="login-box" class="login-box widget-box no-border visible">
						<div class="login-main">
							<!--皮肤选择-->
						<div class="skin-section">
							<a href="javascript:void(0)" class="skin-btn clickBombbox iconfont icon-pifushezhi" id="skin-btn"></a>
							<div class="Bombbox">
								<ul class="skin-list">
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="black" id="default" style="background-color:#222A2D"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="blue" style="background-color:#438EB9;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="green" style="background-color:#72B63F;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="gray" style="background-color:#067350;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="red" style="background-color:#FF6868;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="purple" style="background-color:#6F036B;"></a>
									</li>
								</ul>
							</div>
						</div>
<!-- 表单管理 -->
							<div class="clearfix">
								<div class="login_icon"><img src="./public/images/login_img.png" /></div>
								<form class="" style=" width:300px; float:right; margin-right:50px;" action="check.php" method="post">
									<h4 class="title_name"><img src="./public/images/login_title.png" /></h4>
									<fieldset>
										<ul>
											<li class="frame_style form_error"><label class="user_icon iconfont">&#xe620;</label><input name="username" type="text" placeholder="用户名" id="username" /><i></i></li>
											<li class="frame_style form_error"><label class="password_icon iconfont">&#xe625;</label><input name="password" type="password" placeholder="密码" id="userpwd" /><i></i></li>
											<li class="frame_style form_error"><label class="Codes_icon iconfont">&#xe624;</label><input name="" type="text" data-name="验证码" id="Codes_text" /><i>验证码</i>
												<div class="Codes_region"><img src="./public/images/yanzhengma.png" width="100%" height="38px"></div>
											</li>
										</ul>
										<div class="space"></div>
										<div class="clearfix">
											<label class="inline">
                                      <input type="checkbox" class="ace">
                                      <span class="lbl">保存密码</span>
                                  </label>
											<button type="submit" class="login_btn" id="login_btn"> 登&nbsp;陆 </button>
										</div>

										<div class="space-4"></div>
									</fieldset>
								</form>
							</div>
							<div class="social-or-login center">
								<span class="bigger-110">通知</span>
							</div>
							<div class="social-login ">
								为了更好的体验性（兼容移动端），本网站系统不再对IE8（含IE8）以下浏览器支持，请见谅。
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="loginbm">版权所有 2016</div>
	</body>
</html>
<!-- <script type="text/javascript">
	//验证登录
	$(document).ready(function() {
		$("input[type='text'],input[type='password']").blur(function() {
			var $el = $(this);
			var inputname=0;
			var $parent = $el.parent();
			$parent.attr('class', 'frame_style').removeClass(' form_error');
			if($el.val() == '') {
				var name=$el.attr("data-name");
				$parent.attr('class', 'frame_style').addClass(' form_error form_prompt');
				$parent.find('i').eq(inputname).php(name+"不能为空").addClass("prompt");
			}
		});
		$("input[type='text'],input[type='password']").focus(function() {
			var $el = $(this);
			var $parent = $el.parent();
			if($el.val() == '') {
				$parent.attr('class', 'frame_style').addClass(' form_errors');
			} else {
				$parent.attr('class', 'frame_style').removeClass(' form_errors');
			}
		});
	  $('#login_btn').on('click', function() {
		var num = 0;
		var str = "";
		$("input[type$='text'],input[type$='password']").each(function(n) {
			var $el = $(this);
			var inputname=0;
			var $parent = $el.parent();
			if($el.val() == "") {
				var name=$el.attr("data-name");
				$parent.attr('class', 'frame_style').addClass(' form_error form_prompt');
                 $parent.find('i').eq(inputname).php(name+"不能为空").addClass("prompt");
				num++;
				return false;
			}
		});
		if(num > 0) {
			return false;
		} else {
			//ajax 判断用户名是否存在
			location.href = "index.php";
		}
	});
	})
	//框架设置
	$(function() {
		$("#loginstyle").BKframe({
               //必须保留否则无法进行皮肤更换，以及兼容移动端

		})
	});
</script> -->
