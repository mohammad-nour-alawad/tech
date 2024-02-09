  <div class="main-body row" style="min-height: calc(100vh - 300px);">

      <div class="real-body">
          <div class="register-container">
              <div class="content">
                  <h1>Sign Up</h1>
                  <h3>it's easy, it's quick!</h3>
                  <form method="POST" action="<?php echo URL; ?>register/checkRegister">
                      <div class="form-controller">
                          <i class="fa fa-user"><span>*</span></i>
                          <input type="text" placeholder="Enter First Name" name="first-name" id="firstname"><br>
                          <i class="fas fa-check-circle"></i>
                          <i class="fas fa-exclamation-circle"></i>
                          <span id="first-name-error">name contains only letters and more than 2.</span>
                      </div>
                      <div class="form-controller">
                          <i class="fa fa-user"><span>*</span> </i>
                          <input type="text" placeholder="Enter Last Name" name="last-name" id="lastname"><br>
                          <i class="fas fa-check-circle"></i>
                          <i class="fas fa-exclamation-circle"></i>
                          <span id="last-name-error">name contains only letters and more than 2.</span>
                      </div>
                      <div class="form-controller">

                          <i class="fa fa-envelope"><span>*</span></i>
                          <input type="text" placeholder="Enter Email" name="email" id="email" autocomplete="off"><br>
                          <i class="fas fa-check-circle"></i>
                          <i class="fas fa-exclamation-circle"></i>
                          <span id="email-error">must be like: hello@google.com</span>
                      </div>
                      <div class="form-controller">

                          <i class="fa fa-key"><span>*</span></i>
                          <input type="password" placeholder="Enter Password" name="password" id="password"
                              autocomplete="off"><br>
                          <i class="fas fa-check-circle"></i>
                          <i class="fas fa-exclamation-circle"></i>
                          <span id="pass-error"></span>
                      </div>
                      <div class="form-controller">

                          <i class="fa fa-key"><span>*</span></i>
                          <input type="password" placeholder="Confirm Password" name="confirm-password"
                              id="password2"><br>
                          <i class="fas fa-check-circle"></i>
                          <i class="fas fa-exclamation-circle"></i>
                          <span id="password-error">Password dose not match.</span>
                      </div>
                      <select name="role" id="">
                          <option value="student">student</option>
                          <option value="teacher">teacher</option>
                      </select>
                      <button type="submit" name="submit-register">Submit</button>
                      <a href="login.html">already have an account?</a>
                  </form>
              </div>
          </div>
      </div>