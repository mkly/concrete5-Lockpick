<?php
$submit = isset($_REQUEST['submit']) ? true : false;
$error = '';
$username = isset($_REQUEST['admin-username']) ? $_REQUEST['admin-username'] : '';
$password = isset($_REQUEST['admin-password']) ? $_REQUEST['admin-password'] : '';
$confirm = isset($_REQUEST['admin-password-confirm']) ? $_REQUEST['admin-password-confirm'] : '';

if ($submit) {
	define('C5_EXECUTE', 1);
	define('C5_ENVIRONMENT_ONLY', 1);
	require(dirname(__FILE__) . '/concrete/dispatcher.php');
	$ui = UserInfo::getByUserName($username);
	if ($password !== $confirm) {
		$error = 'Passwords do not match';
	} else if (!$ui) {
		$error = 'Username not found';
	} else {
		$ui->changePassword($password);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="noindex" />
		<meta name="viewport" content="initial-scale=1">
	
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
				border: 1px solid #20bde8;
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
		<img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAAQABAAD/4AAcT2NhZCRSZXY6IDIwMTkzICQAAAAAAAAAABD/2wCEAAUGBgkQCRAQEBAQEBAQEBAUFBQUFBQUFBQUFBQUFBQUFBQUFhwYGBgaGBgYGCEYGh0dHx8fGBgiJCIeJBweHx4BBRAQICAgICAgIEBAQEBAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgP/AABEIAK4AqgMBIgACEQEDEQH/xACkAAABBAMBAQAAAAAAAAAAAAAFAAYHCAMECQIBAQEBAQEBAQAAAAAAAAAAAAAAAQQDAgUQAAEDAgEFCAoNCQcEAAAAAAEAAgMEEQUGEhMhMQciQVFhcZKhFDJSYnSBkbGy0hcYIzM2QlVyc4KTwcMVJEOis8LR0/AIJTVTg+HxFjRjoxEBAAIBBAEEAgAAAAAAAAAAAAECEQMSMVFBEyEiMkJx/9oADAMBAAIRAxEAPwC5aSS8SSNa0uJAaASTxW2kk7EHtJV2yg3csJindDTWne0kZ5u2O/IfjeUKPJt3LEAdsA+oT152tBcxJUt9nXEO6g6B9ZL2dcQ7qDoH1lRdJJUt9nXEO6g6B9ZL2dcQ7qDoH1kF0klS32dcQ7qDoH1kvZ1xDuoOgfWQXSSVLfZ1xDuoOgfWS9nXEO6g6B9ZBdJJUt9nXEO6g6B9ZL2dcQ7qDoH1kF0klS32dcQ7qDoH1kvZ1xDuoOgfWQXSSVLfZ1xDuoOgfWXtm7niJO2DoH7nILnpKr2D7veHmYR1bMy+rSRXc0crmng5ibKx0GJwSUomiImjLc5pYQc7h1EkC/OQoCaSaNBlXRzVDYQHtkd8Vw4NGyUG4JFi19hxlrx8Up3IEqZbumX82m/JlO4tFgZy3a4nW2O/FbWfIrmrlPic0lXjlTI476Wpk8Wc53mYOoIPGD4HpN882Z1usdebxDvvIpJpY6eIbyNjeW2+5y43J8ZWvGwBoA1AC3kWeyqCfZ7kuz3IdZKyAj2e5Ls9yHWSsgI9nuS7Pch1krICPZ7kuz3LXpqSaSQMjY57zsa0FzjzAa1nrsLq4Hhs0UkTjsz2lt+UXGscyD72e5Ls9yHWSsgI9nuS7Pch1krICPZ7lpVDoZB7pGx/O3zG1wsdl5QMXGMBYAXxXzdpbrJHK07XDkOvi4lIu49l5LRYk2jmdelqHZuvZG93aubxNdsI2a1olRbjFPoqi7d7YhzeTOuRbmcD5Qg6sR4bStfnNjja7VrDADvc5rdYF9QcQOIOPGiCA5O1hmwullO2SCJx53MaT1o8opLlXhw/vKX6d/4q6qLlZhv+ITfTu/GQP4LMFgYVstQerJWXpfUHiyMYfgVfUZ2ghklDdpaDYePZfk2oUru5I0kUWDUoYLAwRvPK57Q9x8ZKCkckL2vLXAtc0kEG4II23B2FY7Kct1bBmNq4qho9+aWv+cy1ieUt1fVUNNpnFe8OU2WP3JsIjbQSVBG/leWg8TGW2cV3XvzDiR3dQoo34G95G+hfG5v1nCM+Ih2zkC8ZBVcceBwNO33Trkf9yy7oFW12T9QBw6LqljK9bXOLx2qJZKyyFqknIjIrs9z3yOcyCM5u97Zzjrs0kECw1kkHaNXFyaEZWSsphy8yGp6GGOaBz3RufmOD9dnWJaQQBqIGu/DzqIUV4svBCyrwUGAqP8qBrB5B53J/uTBym4PF53IOkeRX+AUPgsH7Nqd6Z+RX+AUPgsHoNTwQJcqaA/n030580y6rLk7SPP5Rk+lf1aSyCRYnrdaUFjkRJj1XlvL0n/ueYBBWYkWy76KKMvLde+Nw1oNtdr6zzW4VKuXeQVCMPfPTRiKSEZzmtvmvYO33uwOA13FthBuoqtauPkTXh2T9M4/FYWdBzmDqCplnKZMEyldTZMzW30jJS2JvdSS5rYmjnft5LrrWGa9sD+WuJyVtQ2hpWaSeNzXve6+hgaQ4DSOGsuI1iNus2ubDWtGh3MKctvVVVRO7ijcaePxMjOcedzynjk5g0dJRCPOznkmSaQ7ZJX63yOPKdnEABwKP8S3SKh73NoI4nRtcW9kTX0b7ajoo2EOc2+rPLmg2Nr7V0znhx2xHvY8RuaYJm+5iphPdR1VS13PrkIv4kOxTILFdA5lNiMj2H9FWAStNiCLSsDZG+POWHCKjKuamFQyqpHhxd7m6lcGb0kantnzvOnFh+WNSyqjpsQgbTySnNimjcX08snBGC4B8bzwNcCDYgOJsExKbqSrvPDMyodBUROgqGi+Y7W17e7ieNT28o1jYQFa/c6pBHgcXdPL3n6ziGno2Tey4ycbW4eQ3VUQ3kp38LZG7AT3L+1cNljfaAjeQeLx1GE08jd6HRM3vclu9c08rXavEnJ9ZCN1qdowiNvC+ob+qyQk/1xqrKnPdhrvzmmh7lj5D9cho9A+VQLnrM+gzLE5eM9Y3PRGKRyYeUR3vR87k75Xpi5QP1t5vvKqumGRPwfofBYP2bU8UzsiPg/Q+Cwfs2p4qKS5Lwn8/k+lf+IutC5DVbiJpiDb3Y+d6B+xSotHKo0pq+bjvz/xTjgxLjCrysVuVYqyLGgxx1Txuj+tcPb5bZvO4K308LXxuY7tXNLTzO1Fc1aTFsyVr2ktexwc08Tmm4PDwroZkzjkVbhsNSz9I3fDuXjU9vid1WKj0ovVQPiqHxO7aN7mHnYS09adWT7XSYpRw/E0r6h3+hG5rP15GnxIvul4ZosoHuA3s7WSeM71/jzhf6ywZFRn8vXPxKGT9eaPX5GrTHEvm2n5VSdl3VyMwOcMdmvm0cDTxaeRkZI5Q1xPiUBVR0do26msGaPq6gpwy5f8AmVP4fQft2KCcWual/wA93nKteJeb/aMrT7lcjZMC+ZPI30Xfem9uuwAYSc3evzs5p4nMa57COIhwCG7jmLNaypp3Gxu2VvL8R/k3nlWHdXxJr5o4W/Ehke76+pt+Wwv9ZeqPGrjCT8Mr9NQwTf5sMcnTaHJm5AuMdbiNP/lV8rmjiZOGTNtxC7zqW/klJ/cVB4FS/smJr0OItp8axeQ8DaWTnOgDR5S2y50d9bhHO6Biemx2c33sZEY+pZrv187ypg56x1U7zI5zjvnOJPKSbk+VaJqG8YXFtb5etd8iHPrWcaFzYlxBRRGWVM3GDcjm/ilU4jMeIf1yoI573NcSb6x96K6qZEfB+g8Eg9BqeKZ2Q/weoPBIPQaniopLkLWe+TfTHzyLr0uQtV203038xBhgRmJBoEZiRBSNWL3G8q9BVuopD7nUHOj72UarfXGrna0cKrpGilO5zXtINiDcHiINwQeMKotFuuwCWeiY12Y+SZzM4dsIhaR5BOq4DbC/C5BsksGhgr3yaeWVzodGBJmdqHZ+osa26EPymNZW4U5/vzJJ2P4nZ0D7OHFct1jj2alIzqCndtaL8Yu13OC2xuu9mHTjy1cs6R02GFokEbmywPa4jO3zJGvG9uL7ONQjJh2Ik656Y/6L/wCapkqsmBIb6eX65z7c17G3jQKbIis+JPG75wLfNnLnFmi1InmEcwRYpFIHxzwMeL74RyfzVhqGYpI97pKmEuffOdonOOvVwy8SkA5AYsf0tP0pP5a2odzSvd29RE35oc7z5q975cvSr0kbJoMZhFKxrs8R08Md+PMY1h1XNjfg4FCeWlE2XFJ9DLMJpGxttG85pkYLMzmN1OIPAb7Spewnc9jiBzqupdfaGO0TTzgXPWpFwrAsPpveYWMOu7tr+W73XcRzlcWtQ2a74WvLc1xuHDic0lr/ACOCClqcAfnUbHd3pHdN7nIMV2sxaTQehsiKSIXIuDaDTLUHaO52/etuZao97dzt/eRXVTIb4PUHgkHoNTyTMyF+DtB4JB6ATzRSXIWp2zfTfzF16XIap/TfTD8RBggRmJBoEZiRBSNFIkLjTzyYwzsnFKeD4skrGu+be7yPqoh8Q4DJFTYdUybZa2MNb/43xSgE8rjYjktx6pljY74rvE7X17fGbr1ulwtZBSECzY6+i8QMgZq5LFZ2haLMel5/bOyV/Czom/nsepbzKlvf9B/8FrsB41vMzuRZ25sMqWd/0H+qt5k/Ex58Wb6ZCwMzuTr/AILeZncaDOzTnuW+V3ULAeUr7O1jYXvJMmYxztfajNBN7CzdXHa6zMYOf+uLYh+Uc+jwesf3FLUO6MbygpVhOFVU9NSwwRukkdDHvW8oBJJ2AcZJACmOh3Dq58V5qqOFxHatYZPK7OaL81xzqXNznCIIMLgzW2c6CLOd8Y7wbTxDgClpaLvn6XDnbllkNiGGyN0ua+J9wyVl808NnA62utrsduuxNioukVi92HLNlVVtpITeCmcS53A+XW025GDeg8JLuCxVdJFnbwaZazfe3c7f3lszLXb7075zP3kHVDIX4O0HgkHoBPRMrIT4O0HgkHoBPVFJchaj9N9MPxF16XISbZL9MPxEGKBGYkGgRmJEFI1KW5tM1mUdGTwyFvjexzG9ZUWxo5Q1MkczJGGz43tc08TmkOafKiLg7q7f7pc7uJ6V3RqIiT5FqMe8bRncrfvbt8l/EsOW+JR1uSE1THsdBn27lzHBz2nlaRbxXWSiq4JYw+N7ZGH4zTnN8o1LRbwx6f5CkMrDsP8AtzjaETYhuiYdoBW0ynZxu6Tv4rO3C7FvMQhlOO6f0j/yt5lLHwjO+cS70iUG+KmO+o5x4m77y22eOyZu6FPK3Jmvcd43saRttrjn7zWdg27BfnT5jAUZ7p1bTuwh9E2Rhqap9OyOK/ujgZ4y8hg15oZcl2wWVRJuTUObSsb3LGjyWCizdS3Qex4nUdM784eLSvH6Jp4AeB7h0RykW95W5ctoaXQQkOq3t5xED8Zw4XcTfGdVgaj1Er3Pc5xLnOJJJuSSTckk7SSu9+WLS+sBMiFyIpIhciztoNMtdvvTudv7y2Jlrt96dzt/eQdT8g/g5QeCQegE9Uycgvg5h/gkHoBPZFJcg5u1l+lb+Iuvi5Ay9rJ9I38RB5gRmJBYUaiRBSNE40Kjet1j0EtZFZYuopSyS76aQ79vC07M9l+G2ojhFuIKdHZEYNVt7KpHOhL9elpXmInjz2t3rncYe0kcKp0JU4cFynxCjlz6eVzL7RtY75zDqPnHBZdosy2plZF+TmU0J9yqoKhvFUQlrunAQCeXMWPs7KVhs7DoZO+iqvM2SJp60NwfdugIDaymIPdw6/1HkEdIqR6XdKyWkH/chh4nskb15ub5CvWY6c9tuzPGPY9wYS/x1MH3ErN+UcrJPe6Kkg5Zp3yfqxRj0k/v+tcmdvZlP0vu2oBX7qeTEI3srp3dzEw+k8Nb1p7Hz7CmZN5Q1DfznEHxtO1lIwQf+12fLbmLUzMcxHCMKzoaONjqx18+Xt3NvtL5H3c93ekm208RbmUm6/XTsdHTM7FjNxnXzpTzPsA3xC/fKFTUE8P9cabj0+5EKiokkkc95LnOJJJ2m+0kodIvOlWB0i4NzWkQuRb8j0PkKgDzLWHvTudv7y2Jlrt96d85n7yDqdkD8HMP8Eg9AJ7pj5AfBvD/AASD0AnwikuUOUuEvpMYq6V2rMmkaOa+cw8xHDxFdXlWHdo3NJaxnZ1I3OqI2ZsrB20rG7C0cLmjVbhGzWACFF2EgolHItFxN7P1OGrh4O6HHyrPG9n/ABr/AN1XkWZKtjTIXpI++8hX3Sx991oCmnS06F6WPvutLSx991oCmnS06F6WPvutLSx991oCmnS06F6WPvutLSx991oCmnS06F6WPvutLSx991oCmnXzToZpY++60tLH33Wg3XSrRllS0kffeQrXe9nL5vOg05HrOyB7iyJou97tnK7U0W4/WssGeOc9Q/if61q1u4tuZzuqWYlWMLWM30DHds93BI4HXmjaOM2OwayreYBh3Y+GU0H+TBFH42MDSfKjiSSikkkvhKCLcqdyzJ/EXl80OjmP6WE5jzyu1FrjyuaTyqIpf7N2Hl29rp2jljY7rBHmVrrr0gqT7W2j+UJfsW+ul7W2j+UJfsW+ura3XzOQVL9rbR/KEv2LfXS9rbR/KEv2LfXVs85fboKl+1to/lCX7Fvrpe1to/lCX7Fvrq2y83QVL9rbR/KEv2LfXS9rbR/KEv2LfXVtM5fM9BUz2ttH8oS/Yt9dL2ttH8oS/Yt9dW1uldBUr2ttH8oS/Yt9dL2ttH8oS/Yt9dW0zV6QVJ9rbR/KEv2LfXXpv9m2hvrr5rfRNHXnFWzSQQvk5uMZN0UjZNG6pkbrDpznAHjawAM8oJ5VNACQC+oEkkkg/9k=" />
	<?php if ($submit) { ?>
		<?php if ($error) { ?>
			<div class="change-message">
				<p><?php echo $error ?></p>
				<p><a href="<?php echo $_SERVER['REQUEST_URI'] ?>">Try Again</a></p>
			</div>
		<?php } else { ?>
			<div class="change-message">
				<p>Password changed</p>
				<p><strong style="color: #cc0000">Delete this file right now.</p>
				<p><a href="<?php echo View::url('login') ?>">Login</a></p>
			</div>
		<?php } ?>
	<?php } else { ?>
		<form method="post" action="/concrete5lockpick.php">
			<label for="admin-username">Username</label>
			<input type="text" name="admin-username" />
			<label for="admin-password">New Password</label>
			<input type="password" name="admin-password" />
			<label for="admin-password-confirm">Confirm Password</label>
			<input type="password" name="admin-password-confirm" />
			<input type="submit" name="submit" value="Change" />
			<div style="clear:both"></div>
		</form>
		<script>
			document.forms[0].elements[0].focus();
		</script>
	<?php } ?>
	</body>
</html>
