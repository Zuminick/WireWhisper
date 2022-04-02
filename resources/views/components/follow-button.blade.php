@unless (current_user()->is($user))
    <form
        method="POST"
        action="{{ route('follow', $user->username) }}">

        @csrf

        @if(current_user()->isFollowing($user))
            <button type="submit"
                    class="bg-white rounded-full shadow py-2 px-4 border border-gray-400 text-xs font-bold">
                Unfollow
            </button>
        @else
            <button type="submit"
                    class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs font-bold">
                Follow
            </button>
        @endif

    </form>
@endunless

