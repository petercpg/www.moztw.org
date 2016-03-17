<?php
define('SiteKey', '6LdlOxYTAAAAALp47v-OJ69P3s1fuOPsR987xpGO');
?>

<?php echo file_get_contents('../../sandstone/meta.shtml'); ?>
		<title>MozTW Telegram Group</title>
		<meta property="og:title" content="MozTW Telegeam Groups">
		<meta property="og:locale" content="zh_TW">
		<meta property="og:image" content="https://moztw.org/foxmosa/images/30series/30foxmosa-12.png">
		<meta property="og:image:secure_url" content="https://moztw.org/foxmosa/images/30series/30foxmosa-12.png">
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image:width" content="553" />
		<meta property="og:image:height" content="526" />
		<script src="//www.google.com/recaptcha/api.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<?php echo file_get_contents('../../sandstone/iefix.shtml'); ?>
	</head>
	<body>
<?php echo file_get_contents('../../sandstone/header.shtml'); ?>
		<div id="recaptcha">
			<p>為了防止廣告機器人進入群組，麻煩您點選下面的「我不是機器人」</p>
			<!-- Google reCAPTCHA -->
			<div class="g-recaptcha" data-sitekey="<?php echo SiteKey ?>" data-callback="recaptcha"></div><br />
		</div>

		<div id="waiting" style="display: none">
			<p>處理中，請稍候..</p>
		</div>

		<div id="join" style="display: none">
			<p>非常感謝您的配合，加入連結：</p>
			<div id="link"></div>
		</div>

		<div id="error" style="display: none">
			<p>驗證失敗，<a href=".">點我重試</a></p>
		</div>

		<!-- Public to bots -->
		<div id="sticker" style="display: none">
			<a href="https://telegram.me/addstickers/Foxmosa" target="_blank">Foxmosa Sticker</a>
		</div>

		<script type="text/javascript">
		function recaptcha() {
			$("#recaptcha").hide();
			$("#waiting").show();
			var url = 'ajax.php?recaptcha=' + $("#g-recaptcha-response").val();
			$.get(url, {}, function (result) {
				show(result);
			});
		}

		function show(json) {
			var obj = JSON.parse(json);
			if (obj.success) {
				var data = obj.data;
				var theHtml = '';
				for (key in data) {
					var link = 'https://telegram.me/joinchat/' + data[key].trim();
					theHtml += '<a href="' + link + '" target="_blank">' + key + '</a><br>\n';
				}
				$("#link").html(theHtml);
				$("#waiting").hide();
				$("#join").show();
				$("#sticker").show();
			} else {
				$("#waiting").hide();
				alert("驗證失敗\n麻煩您再試一次");
				document.location.href = ".";
				$("#error").show();
			}
		}
		</script>
<?php echo file_get_contents('../../sandstone/footer.shtml'); ?>
