<x-app-layout>
    <section class="t-center">
        <h1 class="">Dashboard</h1>
        <p class="marg-bottom-no">Join or create a Quest to start your adventure!</p>
    </section>

    <div class="innerWrap">    
        <section class="grid">
            <div class="bg-02dp col-6 rounded box border">
                <h3 class="t-center">Neue Lobby starten</h4>
                <form action="{{ route('lobbies.store') }}" method="POST" class="t-center">
                    @csrf
                    <input type="text" name="name" placeholder="Name der Lobby" class="w-full rounded border-none" required>
                    <button type="submit" class="btn-red rounded w-full">Erstellen</button>
                </form>
            </div>

            <div class="bg-02dp col-6 rounded box border">
                <h3 class="t-center">Einer Lobby beitreten</h4>
                <form action="{{ route('lobbies.join') }}" method="POST" class="t-center">
                    @csrf
                    <input type="text" name="code" placeholder="Lobby Code" class="w-full rounded border-none" required>
                    <button type="submit" class="btn-blue rounded w-full">Beitreten</button>
                </form>
            </div>
        </section>

        <section>
            <h2 class="">Meine Quests (Zargon)</h2>
            <div class="grid">
                @forelse($myCreatedLobbies as $lobby)
                    <div class="bg-02dp col6 rounded box border">
                        <h3>{{ $lobby->name }}</h3>
                        <hr>
                        <p class="t-small text-medium">Code: {{ $lobby->code }}</p>
                        <a href="{{ route('lobbies.show', $lobby->code) }}" class="btn-blue rounded">
                            Master-Ansicht
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Du hast noch keine Quest als Master gestartet.</p>
                @endforelse
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4 text-blue-500 uppercase tracking-wider">Beigetretene Quests</h2>
            <div class="grid">
                @forelse($joinedLobbies as $lobby)
                    <div class="bg-02dp col6 rounded box border">
                        <div class="grid">
                            <div class="flex-grow">
                                <h3>{{ $lobby->name }}</h3>
                                <p class="t-small text-medium">Code: {{ $lobby->code }}</p>
                            </div>
                            <div>
                                <a href="{{ route('lobbies.show', $lobby->code) }}" class="btn-blue rounded">Lobby</a>
                            </div>
                        </div>
                        @php
                            $chars = $lobby->characters;
                        @endphp
                        
                        @foreach($chars as $char)
                            <hr>
                            <div class="grid flex-center">
                                <p class="flex-grow marg-bottom-no">
                                    Held: {{ $char->name }} ({{ $char->class }})
                                </p>
                                @if($char->user_id == Auth::id())
                                    <a href="{{ route('characters.show', $char->id) }}" class="btn-gold hollow small rounded">Charakter</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @empty
                    <p class="text-gray-500 italic">Du nimmst aktuell an keinem Abenteuer teil.</p>
                @endforelse
            </div>
        </section>          

    </div>
</x-app-layout>