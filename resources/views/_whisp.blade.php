<div class="flex {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="flex container p-4">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ $whisp->user->path() }}">
                <img
                    src="{{ $whisp->user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50"
                    height="50"
                >
            </a>
        </div>

        <div class="container">

            <div class="font-bold mb-2 flex container justify-between">
                <a href="{{ $whisp->user->path() }}">
                    {{ $whisp->user->name }}
                </a>
                <div class="font-light">
                    {{ $whisp->created_at }}
                </div>
            </div>

            <p class="text-sm mb-3">
                {{ $whisp->body }}
            </p>
        </div>
    </div>
    <div class="flex justify-between items-center">
        <x-like-buttons :whisp="$whisp"/>
    </div>
</div>
