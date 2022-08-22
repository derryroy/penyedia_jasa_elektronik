<?= $this->extend('auth/template') ?>
<?= $this->section('content') ?>
    <form method="POST" action="/login" class="login100-form validate-form">
        <?= csrf_field() ?>
        <span class="login100-form-title pb-1">
            Login
        </span>
        <div class="panel panel-primary">
            <div class="panel-body tabs-menu-body p-0 pt-5">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="wrap-input100 validate-input input-group"
                             data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="fe fe-mail text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="email" name="email"
                                   tabindex="1"
                                   placeholder="Email">
                        </div>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="fe fe-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="password" name="password"
                                   tabindex="2"
                                   placeholder="Password">
                        </div>
                        <!--                                        <div class="text-end pt-4">-->
                        <!--                                            <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>-->
                        <!--                                        </div>-->
                        <div class="container-login100-form-btn">
                            <button tabindex="3" type="submit" class="login100-form-btn btn-primary">
                                Login
                            </button>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">Don't have an account?
                                <a href="/register" class="text-primary ms-1">Register</a>
                            </p>
                        </div>
                        <!--                                        <label class="login-social-icon"><span>Login with Social</span></label>-->
                        <!--                                        <div class="d-flex justify-content-center">-->
                        <!--                                            <a href="javascript:void(0)">-->
                        <!--                                                <div class="social-login me-4 text-center">-->
                        <!--                                                    <i class="fa fa-google"></i>-->
                        <!--                                                </div>-->
                        <!--                                            </a>-->
                        <!--                                            <a href="javascript:void(0)">-->
                        <!--                                                <div class="social-login me-4 text-center">-->
                        <!--                                                    <i class="fa fa-facebook"></i>-->
                        <!--                                                </div>-->
                        <!--                                            </a>-->
                        <!--                                            <a href="javascript:void(0)">-->
                        <!--                                                <div class="social-login text-center">-->
                        <!--                                                    <i class="fa fa-twitter"></i>-->
                        <!--                                                </div>-->
                        <!--                                            </a>-->
                        <!--                                        </div>-->
                    </div>
                </div>
            </div>
        </div>

    </form>
<?= $this->endSection() ?>
