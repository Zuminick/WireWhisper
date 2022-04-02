<div class="border b border-gray-300 rounded-lg">
    @forelse ($whisps as $whisp)
        @include(('_whisp'))

    @empty
        <p class="p-4">Nothing here yet</p>
    @endforelse

</div>
<div class="my-4 mb-6">
    {{ $whisps->links() }}
</div>
