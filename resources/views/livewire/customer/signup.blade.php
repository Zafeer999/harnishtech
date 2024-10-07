<div>
    {{-- @if ($step == 1)
        <div class="form-group">
            <label for="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" wire:model.defer="name" placeholder="Enter your name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" wire:model.defer="email" placeholder="Enter your email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model.defer="password" name="password" placeholder="Enter your password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="form-label">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" wire:model.defer="confirm_password" name="confirm_password" placeholder="Confirm your password">
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="form-label">Mobile <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" wire:model.defer="mobile" placeholder="Enter your mobile">
            @error('mobile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group text-end">
            <button type="submit" class="btn btn-heading btn-block hover-up" wire:click="sendOtp()" name="login">Send OTP</button>
        </div>
    @endif
    @if ($step == 3)
        <div class="form-group">
            <label for="form-label">OTP</label>
            <input type="number" class="form-control @error('otp') is-invalid @enderror" name="otp" wire:model.defer="otp" placeholder="Enter OTP">
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

        <div class="form-group text-end">
            <button type="submit" class="btn btn-heading btn-block hover-up" wire:click="sendOtp()" name="login">Resend OTP</button>
        </div>
        <div class="form-group text-end">
            <button type="submit" class="btn btn-heading btn-block hover-up" wire:click="confirmOtp" id="loginFormSubmit" name="register">Register</button>
        </div>
    @endif --}}

    @if ($step === 1)
        <form wire:submit.prevent="sendOtp">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" wire:model="name">
                @error('name')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" wire:model="email">
                @error('email')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobile">Mobile</label>
                <input type="text" wire:model="mobile">
                @error('mobile')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" wire:model="password">
                @error('password')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" wire:model="confirm_password">
                @error('confirm_password')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Send OTP</button>
        </form>
    @elseif ($step === 2)
        <form wire:submit.prevent="verifyOtp">
            <div class="mb-3">
                <label for="otp">Enter OTP</label>
                <input type="text" wire:model="otp">
                @error('otp')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <button class="mb-3" type="submit">Verify OTP</button>

            <button class="mb-3" type="submit" wire:click="resendOtp">Resend OTP</button>
        </form>
    @elseif ($step === 3)
        <div>
            <p>Registration successful!</p>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


</div>
