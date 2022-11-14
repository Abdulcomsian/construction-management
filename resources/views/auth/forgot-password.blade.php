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

.rememberMe{
    color: #f6f6f6;
}


@media (max-width: 1250px){
#myVideo {
    object-fit: cover;
}
}

/* body{
    background-image: url('https://i.ibb.co/yB2v00g/bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
} */

body .antialiased{
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
    margin: 30px 0 10px;
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
    height: 50px;
    box-shadow: none !important;
    outline: none !important;
    padding-left: 10px !important;
    margin-bottom: 20px !important;
}


label{
    color:white !important;
}


.submitBTN{
        display: flex !important;
    width: 100% !important;
    align-items: center !important;
    margin: 0 !important;
    justify-content: center;
    border-radius: 25px !important;
    height: 50px !important;
    background: #35c64a !important;
    font-size: 16px !important;
}


@media (min-width: 1200px){
    .login_text h2 {
    font-size: 42px;
    }
}

@media (max-width: 720px){
    .MainLogo{
        margin-top: 100px;
        display: block;
    }
    .forgotPass {
    font-size: 14px !important;
}

}

</style>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-white">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label class="label" for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

               <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3 mt-2">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
