<ul class="list-none">
    <li><a
            class="font-bold text-lg mb-4 block inline-flex"
            href="{{ route('home') }}"
        >Home</a></li>
    <li><a
            class="font-bold text-lg mb-4 block inline-flex"
            href="/explore"
        >Explore</a></li>
    <li><a
            class="font-bold text-lg mb-4 block inline-flex"
            href="{{ route('profile', auth()->user()) }}"
        >Profile</a></li>
    <li>
        <form method="GET" action="/logout">
            @csrf

            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>

</ul>
