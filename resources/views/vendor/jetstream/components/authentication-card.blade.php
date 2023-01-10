
<div  class="flex-div ">
    <div class="login-page">
        <div class="p-4">
                 {{ $logo }}
             </div>

        <div class="w-full sm:max-w-md px-6 py-2 bg-white overflow-hidden sm:rounded-lg">
            <h2 class="text-2xl font-extrabold mb-5">Good morning </br> Log into LogoInUsa</h2>
            {{ $slot }}
        </div>
    </div>
    <div class="login-background" style="width:100%; background-repeat: no-repeat;  background-size: cover; height:100vh;">
    </div>
</div>
