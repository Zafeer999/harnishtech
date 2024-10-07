<div>
    {{-- The whole world belongs to you. --}}
    @if ($step == 1)
        <div class="form-group">
            <label for="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
            <span class="text-danger error-text name_err"></span>
        </div>
        <div class="form-group">
            <label for="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
            <span class="text-danger error-text email_err"></span>
        </div>
        <div class="form-group">
            <label for="form-label">Mobile <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter your mobile">
            <span class="text-danger error-text mobile_err"></span>
        </div>
        <div class="form-group">
            <label for="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
            <span class="text-danger error-text password_err"></span>
        </div>
        <div class="form-group">
            <label for="form-label">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
            <span class="text-danger error-text confirm_password_err"></span>
        </div>
    @endif
    <div class="form-group text-end">
        <button type="submit" class="btn btn-heading btn-block hover-up" id="loginFormSubmit" name="register">Register</button>
    </div>
</div>
