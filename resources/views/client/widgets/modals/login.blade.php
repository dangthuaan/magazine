<!-- Login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content registration">
            <div class="modal-header">
                <h2 class="text-uppercase">Login</h2>
                <hr>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="lnr lnr-cross"></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" required>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                    </div>
                    <div class="form-group login col-lg-12 col-md-12">
                        <span>New User? <a href="#" class="register-link" data-toggle="modal" data-target="#registerModal">Sign Up here</a></span>
                        <span class="float-right"><a href="#" class="forgot-link" data-dismiss="modal" data-toggle="modal" data-target="#forgotModal">Forgot your password?</a></span>
                    </div>
                    <div class="form-group clear-both col-lg-12 col-md-12">
                        <button type="submit" class="primary-btn text-uppercase">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Login modal -->
