<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background:transparent;">
    <div>
       <a href="#" class="MainLogo"><img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}"  style="max-width: 270px;" class="h-15px"/></a>
    </div>

    <div class="login_text">
        <span>Your Temporary Works Portal</span>
        <h2>GROUND BREAKING HUB</h2>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
