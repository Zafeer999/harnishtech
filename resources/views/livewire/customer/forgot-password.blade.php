<div>
    @if ($step == 1)
        <div class="form-group">
            <label for="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" wire:model.defer="email" placeholder="Enter your email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="login_footer form-group mb-20">
            <a class="text-muted" href="{{ route('customer.login') }}">Want to Signin ?</a>
        </div>
        <div class="form-group text-end">
            <button type="submit" class="btn btn-heading btn-block hover-up" wire:click="sendOtp()" name="login">Send OTP</button>
        </div>
    @endif
    @if ($step == 2)
        <div class="form-group">
            <label for="form-label">OTP</label>
            <input type="number" class="form-control" name="otp" wire:model.defer="otp" placeholder="Enter OTP">
            @error('otp')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        @if ($alert)
            <div class="form-group text-end">
                <div class="alert alert-danger">
                    {{ $alert }}
                </div>
            </div>
        @endif
        <div class="login_footer form-group mb-20">
            <a class="text-muted" href="{{ route('customer.login') }}">Want to Signin ?</a>
        </div>
        <div class="form-group text-end">
            <button type="submit" class="btn btn-heading btn-block hover-up"  wire:click="confirmOtp()" name="login">Confirm OTP</button>
        </div>
    @endif
    @if ($step == 3)
        <div class="form-group">
            <label for="form-label">Password</label>
            <input type="text" class="form-control" name="password" wire:model.defer="password" placeholder="Enter Password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="form-label">Confirm Password</label>
            <input type="text" class="form-control" name="confirm_password" wire:model.defer="confirm_password" placeholder="Confirm Password">
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="login_footer form-group mb-20">
            <a class="text-muted" href="{{ route('customer.login') }}">Want to Signin ?</a>
        </div>
        <div class="form-group text-end">
            <button type="submit" class="btn btn-heading btn-block hover-up" wire:click="resetPassword()" name="login">Reset Password</button>
        </div>
    @endif

</div>
