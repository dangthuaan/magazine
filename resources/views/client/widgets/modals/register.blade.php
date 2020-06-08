<!-- Register modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content registration">
            <div class="modal-header">
                <h2 class="text-uppercase">Sign Up</h2>
                <hr>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="lnr lnr-cross"></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Your Full Name" required>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" required>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                    </div>
                    <div class="form-group login col-lg-12 col-md-12">
                        <span>Have and Account? <a href="#" class="login-link" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Login here</a></span>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <button type="submit" class="primary-btn text-uppercase">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Register modal -->
