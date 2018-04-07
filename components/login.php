<div class="login-wrap">
	<form action="/logic/login.php" method="POST" class="login">
        <?php if (isset($_SESSION['login_errors'])): ?>
        <div><?php echo $_SESSION['login_errors'] ?></div>
        <?php endif; ?>
    		<div class="mdc-text-field" data-mdc-auto-init="MDCTextField">
    			<input type="text" class="mdc-text-field__input" name="email" id="email-input">
    			<label for="demo-input" class="mdc-floating-label">Email</label>
    		</div>

    		<div class="mdc-text-field" data-mdc-auto-init="MDCTextField">
    			<input type="password" class="mdc-text-field__input" name="password" id="password-input">
    			<label for="demo-input" class="mdc-floating-label">Password</label>
    		</div>

    		<div class="login-button">
    			<button class="mdc-button">Login</button>
    		</div>
		<div class="register-link">
			<span>Don't have an account? <a href="/register">sign up</a></span>
		</div>

	</form>
</div>
