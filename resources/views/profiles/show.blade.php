<x-app>
    <header class="mb-6">
        <div class="relative">
            <img
{{--                src="/images/profile-banner.png"--}}
                src="{{ $user->banner }}"
                alt="Banner"
                class=""
                style="width: 700px; height: 223px">
            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full mr-2 absolute overflow-hidden"
                style="left: 50%; transform: translateX(-50%); bottom: -35%; max-width: 150px; width: 30vw;"
            >
        </div>

        <div class="flex justify-between items-center mb-4">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can ('edit', $user)
                    <a href="{{ $user->path('edit') }}"
                            class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs font-bold mr-2">Edit
                        Profile
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>

            </div>
        </div>

        <p class="text-sm">
            {{ $user->description }}
        </p>

    </header>
    @include('_timeline', [
        'whisps' => $whisps
    ])
</x-app>
