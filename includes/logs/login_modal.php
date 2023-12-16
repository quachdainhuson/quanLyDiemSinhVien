<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content login-modal">
      <div class="modal-header login-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="loginModalLabel">Đăng Nhập Hệ Thống</h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div role="tabpanel" class="login-tab">
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active text-center" id="home">
                &nbsp;&nbsp;
                <span id="login_fail" class="response_error" style="display: none;">Loggin failed, please try again.</span>
                <div class="clearfix"></div>
                <form action="login.php" id="form-login" method="POST">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control" id="login_username" placeholder="Nhập mã định danh..." name="username">
                    </div>
                    <span class="help-block has-error" id="email-error"></span>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                      <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                    </div>
                    <span class="help-block has-error" id="password-error"></span>
                  </div>
                 <button type="submit" id="login_btn" name="submit" class="btn btn-block bt-login">Đăng Nhập</button>
                  <div class="clearfix"></div>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                &nbsp;&nbsp;
                <span id="registration_fail" class="response_error" style="display: none;">Registration failed, please try again.</span>
                <div class="clearfix"></div>
                <form role="form">
                  <div class="form-group">
                    <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" required>
                  </div>

                  <div class="form-group">
                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone Number.." required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="country" id="country" class="form-control input-sm" placeholder="Country.." required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="address" id="address" class="form-control input-sm" placeholder="Address.." required>
                  </div>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="text" name="city" id="city" class="form-control input-sm" placeholder="City.." required>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="text" name="zip" id="zip" class="form-control input-sm" placeholder="Zip.." required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" name="bio" id="bio" class="form-control input-sm" placeholder="About Yourself.." required>
                  </div>

                  <div class="form-group">
                    <input type="email" name="email-1" id="last_name" class="form-control input-sm" placeholder="Your Email.." required>
                  </div>

                  <div class="form-group">
                    <input type="email" name="email-2" id="email" class="form-control input-sm" placeholder="Repeat Email Address" required>
                  </div>

                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required>
                      </div>
                    </div>
                  </div>
                  <button type="button" id="register_btn" class="btn btn-block bt-login" data-loading-text="Registering....">Register</button>
                  <div class="clearfix"></div>
                  <div class="login-modal-footer">
                    <div class="row">
                      <div class="col-xs-8 col-sm-8 col-md-8">
                        <i class="fa fa-lock"></i>
                        <a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <i class="fa fa-check"></i>
                        <a href="javascript:;" class="signin-tab"> Sign In </a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane text-center" id="forget_password">
                &nbsp;&nbsp;
                <span id="reset_fail" class="response_error" style="display: none;"></span>
                <div class="clearfix"></div>
                <form>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control" id="femail" placeholder="Email">
                    </div>
                    <span class="help-block has-error" data-error='0' id="femail-error"></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="login-modal-footer">
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <i class="fa fa-lock"></i>
                        <a href="javascript:;" class="signin-tab"> Đăng Nhập </a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- - Login Model Ends Here -->