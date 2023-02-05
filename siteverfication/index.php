<?php
  include("createdatabase.php");
?>
<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Login / Sign Up</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="container">
		<form class="form" name="loginForm" id="login">
			<h1 class="form__title">Login</h1>
			<div class="form__message form__message--error" id="login_message"></div>
			<div class="form__input-group">
				<input type="email" name="email" class="form__input" autofocus placeholder="email">
				<div class="form__input-error-message"></div>
			</div>
			<div class="form__input-group">
				<input type="password" name="password" class="form__input" autofocus placeholder="Password">
				<div class="form__input-error-message"></div>
			</div>
			<button class="form__button" type="submit">Continue</button>
			<p class="form__text">
				<a class="form__link" href="./" id="linkCreateAccount">Don't have an account? Create account</a>
			</p>
		</form>
		<form class="form form--hidden" id="createAccount">
			<h1 class="form__title">Create Account</h1>
			<div class="form__message form__message--error" id="signup_message"></div>
			<div class="form__input-group">
				<input type="text" id="signupUsername"  name="name" class="form__input" autofocus placeholder="Username" required>
				<div class="form__input-error-message"></div>
			</div>
			<div class="form__input-group">
				<input type="email" class="form__input"  name="email" autofocus placeholder="Email Address" required>
				<div class="form__input-error-message"></div>
			</div>
			<div class="form__input-group">
				<input type="password" class="form__input"  name="password" autofocus placeholder="Password" required>
				<div class="form__input-error-message"></div>
			</div>
			<button class="form__button" type="submit">Continue</button>
			<p class="form__text">
				<a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
			</p>
		</form>
	</div>
	<script src="main.js"></script>
</body>
