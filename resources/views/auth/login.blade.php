<style>
    #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

/* Add some content at the bottom of the video/page */
.text-gray-900 {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}


@media (max-width: 1250px){
#myVideo {
    object-fit: cover;
}
}

body{
    background-image: url('https://i.ibb.co/yB2v00g/bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

/* @media ( max-width: 1250px ){
  body {
    background: url(https://i.ibb.co/J3tNNwG/ezgif-com-gif-maker.gif);
    background-repeat:no-repeat;
    background-size:cover;
  }
  #myVideo { 
     display: none !important;
  }
} */

.login_text{
    color: #fff;
    text-align:center;
}

.login_text span{
    font-size: 20px;
    display: block;
    margin: 15px 0;
}

.login_text h2{
    font-size: 35px;
    font-weight: 600;
    display: block;
    text-transform: uppercase;
    position: relative;
}

.login_text h2::before {
       content: "";
    position: absolute;
    width: 50px;
    bottom: -13px;
    height: 5px;
    background: #26a23f;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 5px;
}

input{
    border-left: 4px solid #26a23f !important;
    border-radius: 0 !important;
    height: 42px;
    box-shadow: none !important;
    outline: none !important;
    padding-left: 10px !important;
}

input[type="checkbox"]{
    border-left: none !important;
}

.forgotPass{
    color: #26a23f;
    text-decoration: none !important;
}

.submitBTN{
    display: block !important;
    width: 100% !important;
    margin: 0 !important;
    border-radius: 25px !important;
    height: 42px !important;
    background: #33cc33 !important;
}

@media (max-width: 720px){
    .MainLogo{
        margin-top: 100px;
        display: block;
    }
}

</style>
<!-- <video autoplay muted loop id="myVideo">
  <source src="{{asset('temporary/login.mp4')}}" type="video/mp4">
</video> -->
<x-guest-layout style="background:transparent;">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" style="margin-top: -15px;">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" style="">
            @csrf

            <!-- Email Address -->
            <div>
                <!-- <x-label for="email" :value="__('Email')" /> -->

                <x-input id="email" class="block mt-1 w-full" type="Email ID" placeholder="Email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <!-- <x-label for="password" :value="__('Password')" /> -->

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex justify-between my-5">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                  @if (Route::has('password.request'))
                    <a class="underline text-sm forgotPass" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
              

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
