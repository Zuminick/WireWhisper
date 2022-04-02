<x-master>
    <section class="px-8">
        <main class="container mx-auto">

            <section class="px-8 py-4 mb-6">
                <header class="container mx-auto">
                    <h1>
                        <img
                            src="/images/WireWhisper-logo.svg" width="100" height="60"
                            alt="WireWhisper">
                    </h1>
                </header>
            </section>

            <div class="lg:flex lg:justify-between lg:items-start">
                @auth()
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endauth

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                @auth()
                    <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
                        @include('_friends-list')
                    </div>
                @endauth

            </div>
        </main>
    </section>
</x-master>
