<x-app>
    <div>
        @foreach($users as $user)
            <div class="container flex justify-between">
                <a href="{{ $user->path() }}" class="flex items-center mb-6">
                    <img class="mr-4 rounded-full"
                         src="{{ $user->avatar }}"
                         alt="{{ $user->username }}, avatar"
                         width="60">

                    <div>
                        <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                    </div>
                </a>
                <div>
                    <x-follow-button :user="$user"></x-follow-button>
                </div>
            </div>
        @endforeach

        {{ $users->links() }}
    </div>
</x-app>
