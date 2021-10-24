<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember" />
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div>
                                        <!-- End .custom-checkbox -->

                                        <a href="forgot-password.html" class="forgot-link">Forgot Your Password?</a>
                                    </div>
                                    <!-- End .form-footer -->
                                </form>
                            </div>
                            <!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="register-user-name">Username *</label>
                                        <input type="text" class="form-control" id="register-user-name" name="register-user-name" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-number">Phone Number *</label>
                                        <input type="tel" class="form-control" id="register-number" name="register-number" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-confirm-password">Confirm Password *</label>
                                        <input type="password" class="form-control" id="register-confirm-password" name="register-confirm-password" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required />
                                            <label class="custom-control-label" for="register-policy">I agree to the
                                                <a href="#">privacy policy</a> *</label>
                                        </div>
                                        <!-- End .custom-checkbox -->
                                    </div>
                                    <!-- End .form-footer -->
                                </form>
                            </div>
                            <!-- .End .tab-pane -->
                        </div>
                        <!-- End .tab-content -->
                    </div>
                    <!-- End .form-tab -->
                </div>
                <!-- End .form-box -->
            </div>
            <!-- End .modal-body -->
        </div>
        <!-- End .modal-content -->
    </div>
    <!-- End .modal-dialog -->
</div>
<!-- End .modal -->