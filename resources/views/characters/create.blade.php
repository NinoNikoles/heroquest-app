<x-app-layout>
    <div class="innerWrap">
        <form action="{{ route('characters.store', $lobby->code) }}" method="POST">
            <section>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 class="t-center">Wähle deinen Helden für die Lobby<br> "{{ $lobby->name }}"</h1>

                        
                    
                </div>
            </section>

            <section>
                <div class="box rounded border bg-01dp">
                    @csrf
                    <label>Name deines Helden:</label>
                    <input type="text" name="name" placeholder="Name..." class="bg-dark border w-full rounded marg-bottom-no" required>
                </div>
            </section>

            <section>
                <div class="grid">
                    @foreach($classes as $className => $stats)
                        <div class="box border rounded bg-01dp col-3 cursor-pointer character-select" id="{{ $className }}">
                            <label class="cursor-pointer">
                                <input type="radio" name="class" value="{{ $className }}" class="hidden" required 
                                    onclick="
                                        document.getElementById('hp').value='{{ $stats['hp'] }}';
                                        document.getElementById('in').value='{{ $stats['in'] }}';
                                        document.getElementById('ad').value='{{ $stats['ad'] }}';
                                        document.getElementById('dd').value='{{ $stats['dd'] }}';
                                        document.getElementById('md').value='{{ $stats['md'] }}';
                                        console.log(document.getElementById('{{ $className }}'));
                                        document.querySelectorAll('.character-select').forEach(e => { e.classList.remove('border-success'); });
                                        document.getElementById('{{ $className }}').classList.add('border-success');
                                        "
                                    >
                                <div class="bg-gray-800 p-6 rounded-lg border-2 border-transparent  hover:bg-gray-700 transition">
                                    <h2>{{ $className }}</h2>
                                    <p class="text-red-400">Attack: {{ $stats['ad'] }}</p>
                                    <p class="text-red-400">Defense: {{ $stats['dd'] }}</p>
                                    <p class="text-red-400">HP: {{ $stats['hp'] }}</p>
                                    <p class="text-blue-400">IN: {{ $stats['in'] }}</p>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>

                <input type="hidden" name="body_points" id="hp" value="0">
                <input type="hidden" name="mind_points" id="in" value="0">
                <input type="hidden" name="attack_dice" id="ad" value="0">
                <input type="hidden" name="defence_dice" id="dd" value="0">
                <input type="hidden" name="movement_dice" id="md" value="0">
            </section>

            <div class="t-right">
                <button type="submit" class="btn-blue rounded">
                    Abenteuer beginnen
                </button>
            </div>
        </form>
    </div>
</x-app-layout>