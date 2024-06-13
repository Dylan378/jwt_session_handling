<div class="flex w-screen px-6 space-x-6 items-center">

    <button-component url="{{ route('home') }}">
        Home    
    </button-component> 

    <button-component url="{{ route('login') }}">
        Login    
    </button-component> 

    <button-component url="{{ route('register') }}">
        Register    
    </button-component> 

    <logout-component></logout-component>
</div>