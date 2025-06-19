


<x-app-layout>
    <div class="dashboard-content">
        @if(auth()->check())
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <p>This is your dashboard where you can manage your profile, orders, and more.</p>
        @else
            <h1>Welcome, Guest!</h1>
            <p>Please <a href="{{ route('login') }}">login</a> to view your dashboard.</p>
        @endif
    </div>
</x-app-layout>
