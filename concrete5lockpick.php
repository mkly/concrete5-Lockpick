<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="noindex" />
	
		<title>concrete5 Lock Pick</title>
		<style type="text/css" media="all">
			body {
				color: #555;
				font-size: 14px;
			}
			a,
			a:link,
			a:visited,
			a:hover,
			a:active {
				color: #20bde8;
				font-weight: bold;
				text-decoration: none;
			}
			a:hover,
			a:active {
				text-decoration: underline;
			}
			a:active {
				padding: 1px 0px 0px 1px;
			}
			label,
			input,
			form,
			img {
				display: block;
			}
			form,
			.change-message {
				width: 250px;
				padding: 20px;
				-webkit-box-shadow: 0px 0px 3px 0px rgba(33, 186, 227, 1);
				-moz-box-shadow: 0px 0px 3px 0px rgba(33, 186, 227, 1);
				box-shadow: 0px 0px 3px 0px rgba(33, 186, 227, 1); 
			}
			img,
			form,
			.change-message {
				margin: 10px auto;
			}
			.change-message {
				text-align: center;
			}
			input[type=text],
			input[type=password] {
				width: 240px;
				padding: 3px;
				font-size: 20px;
				background: #fff;
				border: 1px solid #999;
				margin-bottom: 4px;
			}
			input[type=text]:focus,
			input[type=password]:focus {
				border: 1px dashed #20bde8;
			}
			input[type=submit] {
				float: right;
				margin: 7px;
				border: 1px solid #aaa;
				background: #333;
				padding: 5px;
				color: #fff;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px; 
			}
			input[type=submit]:hover {
				-webkit-box-shadow: 0px 0px 3px 0px rgba(33, 186, 227, 1);
				-moz-box-shadow: 0px 0px 3px 0px rgba(33, 186, 227, 1);
				box-shadow: 0px 0px 3px 0px rgba(33, 186, 227, 1); 
			}
			input[type=submit]:active {
				padding: 6px 4px 4px 6px;
				background: #111;
			}
		</style>
	</head>
	<body>
		<img src="http://i40.tinypic.com/k4u8i.jpg" />
	<?php if(isset($_REQUEST['admin-username'])): ?>
<?php
		define('C5_EXECUTE', 1);
		require_once getcwd() . '/concrete/config/base_pre.php';
		require_once getcwd() . '/concrete/config/base.php';
		require_once getcwd() . '/config/site.php';
		require_once getcwd() . '/concrete/libraries/loader.php';
		Loader::library('object');
		Loader::database();
		Loader::library('model');
		Loader::library('events');
		Loader::model('user');
		Loader::model('userinfo');
		$ui = UserInfo::getByUserName($_REQUEST['admin-username']);
?>
		<?php if($ui): ?>
			<?php if(strcmp($_REQUEST['admin-password'], $_REQUEST['admin-password-confirm']) === 0): ?>
				<?php $ui->changePassword($_REQUEST['admin-password']); ?>
				<div class="change-message">
					<p>Password changed.</p>
					<p><strong style="color: #cc0000">Delete this file right now.</p>
					<p><a href="<?php echo BASE_URL . '/index.php/login' ?>">Login</a></p>
				</div>	
			<?php else: ?>
				<div class="change-message">
					<p>Passwords do not match.</p>
					<p><a href="<?php echo $_SERVER['REQUEST_URI'] ?>">Try Again</a></p>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="change-message">
				<p>Username not found.</p>
				<p><a href="<?php echo $_SERVER['REQUEST_URI'] ?>">Try Again</a></p>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<form method="post" action="">
			<label for="admin-username">Username</label>
			<input type="text" name="admin-username" />
			<label for="admin-password">New Password</label>
			<input type="password" name="admin-password" />
			<label for="admin-password-confirm">Confirm Password</label>
			<input type="password" name="admin-password-confirm" />
			<input type="submit" value="Change" />
			<div style="clear:both"></div>
		</form>
		<script>
			document.forms[0].elements[0].focus();
		</script>
	<?php endif; ?>	
	</body>
</html>
