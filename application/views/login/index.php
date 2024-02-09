  <div class="main-body row" style="min-height: calc(100vh - 300px);">

      <div class="real-body">
          <div class="login-container">
              <div class="content">
                  <h1>
                      <a href="#home">
                          <p
                              style="font-size: 30px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                              <span style="color: red;">T</span>ech
                          </p>
                      </a>
                  </h1>
                  <form method="POST" action="<?php echo URL; ?>login/checkLogin">
                      <label id="username-label">Email </label>
                      <input type="text" id="username" autocomplete="off" name="email">
                      <label id="password-label">Password </label>
                      <input type="password" id="password" autocomplete="off" name="password">
                      <label for="remember-me" id="remember-label">remember me</label>
                      <input type="checkbox" name="remember" id="remember-me">
                      <input type="submit" id="login" value="Login" name="submit-login">
                  </form>
                  <a href="<?php echo URL; ?>register/">Don't have an account?</a>
              </div>
          </div>
      </div>