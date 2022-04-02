<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @forelse(auth()->user()->follows as $user)
    <li class="mt-4">
        <div>
            <a href="{{ route('profile', $user->username) }}" class="flex items-center text-sm">
                <img
                    src="{{$user->avatar}}"
                    alt=""
                    class="rounded-full mr-2"
                    height="50"
                    width="50"
                >
                {{$user->name}}
            </a>
        </div>
    </li>
    @empty
        <li>No follows yet</li>
    @endforelse
</ul>
