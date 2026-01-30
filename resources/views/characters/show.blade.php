<x-app-layout>
    <div id="toast-container" class="absolute rounded bg-dark opacity-0 translate-x-10"></div>

    <div class="character">
        <section>
            <div class="innerWrap">
                <div class="grid">
                    <div class="col12">
                        <p class="breadcrumb">
                            <a href="{{ route('dashboard') }}">Dashboard</a> /
                            <a href="{{ route('lobbies.show', $character->lobby->code) }}">{{ $character->lobby->name }}</a> /
                            <span><u>{{ $character->name }}</u></span>
                        </p>
                    </div>

                    <div class="grid col6">
                        <div class="col12">
                            <div class="character__info">
                                <div class="character__header">
                                    <div class="character__image">
                                        <figure class="panorma">
                                            <img src="https://hqcompanion.com/assets/characters/barbarian.png" alt=""/>
                                        </figure>
                                    </div>
                                    <h1 class="character__name">{{ $character->name }}</h1>
                                    <p class="character_class">{{ $character->class }}</p>
                                </div>

                                <div class="innerWrap">
                                    <div class="grid character__stats">
                                        <div class="character__stats--hp col-6">
                                            <div class="grid character__stat__base">
                                                <span class="character__stat__base__label">Basis: {{ $character->base_body_points }}</span>
                                                <div class="character__stat__base__mod">
                                                    <button onclick="updateModifier('body_mod', -1)" class="btn-minus character__stat__base__mod__btn">-</button>
                                                    <span id="mod-body_mod" class="character__stat__base__mod__label text-hp">({{ $character->body_mod >= 0 ? '+' : '' }}{{ $character->body_mod }})</span>
                                                    <button onclick="updateModifier('body_mod', 1)" class="btn-plus character__stat__base__mod__btn">+</button>
                                                </div>
                                            </div>

                                            <div class="character__stat">
                                                <div class="character__stat__box character__stat__box--hp">
                                                    <div id="stat-points-height-body" class="character__stat__box--current" style="height: {{ $character->body_percentage }}%;"></div>
                                                    <span id="stat-body_points" class="special">{{ $character->body_points }}</span>
                                                </div>
                                                <div class="character__change__stat">
                                                    <button onclick="changeStat('body_points', -1)" class="btn-minus">-</button>
                                                    <span class="special character__change__stat--hp text-hp">HP</span>
                                                    <button onclick="changeStat('body_points', 1)" class="btn-plus">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="character__stats--int col-6">
                                                <div class="grid character__stat__base">
                                                    <span class="character__stat__base__label">Basis: {{ $character->base_mind_points }}</span>
                                                    <div class="character__stat__base__mod">
                                                        <button onclick="updateModifier('mind_mod', -1)" class="btn-minus character__stat__base__mod__btn">-</button>
                                                        <span id="mod-mind_mod" class="character__stat__base__mod__label text-int">({{ $character->mind_mod >= 0 ? '+' : '' }}{{ $character->mind_mod }})</span>
                                                        <button onclick="updateModifier('mind_mod', 1)" class="btn-plus character__stat__base__mod__btn">+</button>
                                                    </div>
                                                </div>

                                            <div class="character__stat">
                                                <div class="character__stat__box character__stat__box--int">
                                                    <div id="stat-points-height-mind" class="character__stat__box--current" style="height: {{ $character->mind_percentage }}%;"></div>
                                                    <span id="stat-mind_points" class="special">{{ $character->mind_points }}</span>
                                                </div>
                                                <div class="character__change__stat">
                                                    <button onclick="changeStat('mind_points', -1)" class="btn-minus">-</button>
                                                    <span class="special character__change__stat--int text-int">INT</span>
                                                    <button onclick="changeStat('mind_points', 1)" class="btn-plus">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gold -->
                        <div class="col12">
                            <div class="box rounded border bg-01dp flex-center">
                                <h3 class="marg-bottom-no flex-grow">Gold</h3>

                                <div class="box border character__gold__mod bg-dark">
                                    <button onclick="changeStat('gold', -5)" class="btn-minus">-</button>
                                    <span id="stat-gold" class="text-gold">{{ $character->gold }}</span>
                                    <button onclick="changeStat('gold', 5)" class="btn-plus">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Würfel -->
                    <div class="col6 character__dice box rounded border" x-data="{ openDice: true }">
                        <h3 class="show-medium">Würfel</h3>     
                        <h3 class="hide-medium" :class="openDice ? '' : 'marg-bottom-no'"><a href="#" @click.prevent.stop="openDice = ! openDice" class="icon-right icon-add">Würfel</a></h3>
                        <div class="grid" x-show="openDice">
                            <div class="col-6 character__dice__box box border rounded">
                                <h4 class="t-center">Angriff: <span id="base-atk" class="special">{{ $character->total_attack }}</span></h4>

                                <div class="character__dice__box__mod">
                                    <button onclick="adjustTempDice('atk', -1)" class="btn-minus character__dice__box__mod__btn">-</button>
                                    <span id="temp-atk-mod">+0</span>
                                    <button onclick="adjustTempDice('atk', 1)" class="btn-plus character__dice__box__mod__btn">+</button>
                                </div>

                                <button onclick="rollDice('atk')" class="btn-red rounded w-full">Rollen</button>
                            </div>

                            <div class="col-6 character__dice__box box border rounded">
                                <h4 class="t-center">Verteidigung: <span id="base-def" class="special">{{ $character->total_defence }}</span></h4>
                                
                                <div class="character__dice__box__mod">
                                    <button onclick="adjustTempDice('def', -1)" class="btn-minus character__dice__box__mod__btn">-</button>
                                    <span id="temp-def-mod">+0</span>
                                    <button onclick="adjustTempDice('def', 1)" class="btn-plus character__dice__box__mod__btn">+</button>
                                </div>

                                <button onclick="rollDice('def')" class="btn-blue rounded w-full">Rollen</button>
                            </div>

                            @php

                                $normalDefault = 2;

                            @endphp

                            <div class="col-12 character__dice__box box border rounded">
                                <h4 class="t-center">Normal: <span id="base-normal" class="special">{{ $normalDefault }}</span></h4>
                                
                                <div class="character__dice__box__mod">
                                    <button onclick="adjustTempDice('normal', -1)" class="btn-minus character__dice__box__mod__btn">-</button>
                                    <span id="temp-normal-mod">+0</span>
                                    <button onclick="adjustTempDice('normal', 1)" class="btn-plus character__dice__box__mod__btn">+</button>
                                </div>

                                <button onclick="rollDice('normal')" class="btn-white rounded w-full">Rollen</button>
                            </div>

                            <div id="dice-result" class="grid box border rounded bg-dark flex-center justify-center flex-grow">
                                <span class="special">Ergebnis erscheint hier...</span>
                            </div>
                        </div>
                    </div>

                    <!-- Inventar -->
                     <div class="col12">
                        <div class="box rounded border bg-01dp" x-data="{ openInventory: true }">
                            <div class="grid ">
                                <h3 class="show-medium flex-grow">Inventar</h3>
                                <h3 class="hide-medium flex-grow" :class="openInventory ? '' : 'marg-bottom-no'"><a href="#" @click.prevent.stop="openInventory = ! openInventory" class="icon-right icon-add">Inventar</a></h3>
                            </div>

                            <div class="grid" x-show="openInventory">
                                <div class="col12">
                                    <p class="t-right">
                                        <button @click="modalOpen = ! modalOpen" class="btn-gold rounded icon-right icon-add">Item hinzufügen</button>
                                    </p>

                                    <div class="modal" :class="modalOpen ? 'open' : ''">
                                        <div class="modal__filler" @click="modalOpen = ! modalOpen"></div>
                                        <div class="modal__wrap">
                                            <div class="modal__inner">
                                                <div class="box bg-01dp rounded">
                                                    <div class="t-right">
                                                        <button @click="modalOpen = ! modalOpen" class="btn-transparent btn-modal icon-close"></button>
                                                    </div>
                                                    
                                                    <div class="grid">
                                                        <h3 class="marg-bottom-no w-full">Rüstungskammer & Alchemist</h3>
                                                        
                                                        <div class="item__search w-full">
                                                            <input type="text" id="itemSearch" onkeyup="doSearch(this.value)" placeholder="Nach Ausrüstung suchen..." class="border rounded w-full marg-bottom-no">
                                                            <div class="item__search__dropdown w-full">
                                                                <div id="searchDropdown" class="hidden"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach(['weapon' => 'Waffen', 'armor' => 'Ausrüstung', 'artifact' => 'Artefakte', 'potion' => 'Tränke'] as $type => $title)
                                    <div class="box rounded border bg-dark {{ $type == 'weapon' || $type == 'armor' ? 'col12' : 'col6' }}">
                                        <h4>{{ $title }}</h4>
                                        <div class="grid-row-gap">
                                            @if ($character->items->where('type', $type)->count() > 0)
                                                @foreach($character->items->where('type', $type) as $item)
                                                    <div class="box rounded-small border bg-01dp flex-center">
                                                        <span class="flex-grow">
                                                            {{ $item->name }}
                                                        </span>
                                                        <div class="grid-gap-small flex-center">
                                                            @if(!$item->pivot->is_equipped && in_array($type, ['weapon', 'helm', 'armor', 'shoes', 'shield']))
                                                                <form action="{{ route('items.equip', [$character->id, $item->pivot->id]) }}" method="POST">
                                                                    @csrf <button class="btn-blue rounded small btn-add"></button>
                                                                </form>
                                                            @endif
                                                            @if($item->pivot->is_equipped && in_array($type, ['weapon', 'helm', 'armor', 'shoes', 'shield']))
                                                                <span class="tag">Equipped</span>
                                                            @endif
                                                            <form action="{{ route('items.remove', [$character->id, $item->pivot->id]) }}" method="POST">
                                                                @csrf <button class="btn-red small btn-delete rounded"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-xs italic text-gray-800">Leer</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Ausgerüstet -->
                    <div class="col12">
                        <div class="grid">
                            <div class="col12 box rounded border bg-01dp" x-data="{ openEquipped: true }">
                                <h3 class="show-medium">Ausgerüstet</h3>    
                                <h3 class="hide-medium" :class="openEquipped ? '' : 'marg-bottom-no'"><a href="#" @click.prevent.stop="openEquipped = ! openEquipped" class="icon-right icon-add">Ausgerüstet</a></h3>
                                <div class="grid" x-show="openEquipped">
                                    <div class="box border rounded bg-dark col12">
                                        <h4>Weapon</h4>
                                        @php $equipped = $character->equipped('weapon'); @endphp
                                        @if($equipped)
                                            <div class="grid flex-center">
                                                <span class="flex-grow">{{ $equipped->name }}</span>
                                                <form action="{{ route('items.unequip', [$character->id, $equipped->pivot->id]) }}" method="POST">
                                                    @csrf <button class="btn-red rounded small">Ablegen</button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-xs italic text-gray-800">Leer</span>
                                        @endif
                                    </div>
                                    
                                    @foreach(['helmet' => 'Helm', 'armor' => 'Rüstung', 'boots' => 'Schuhe', 'shield' => 'Schild'] as $sub_type => $label)
                                        <div class="box border rounded bg-dark col6">
                                            <h4>{{ $label }}</h4>
                                            @php $equipped = $character->equipped($sub_type); @endphp
                                            @if($equipped)
                                                <div class="grid flex-center">
                                                    <span class="flex-grow">{{ $equipped->name }}</span>
                                                    <form action="{{ route('items.unequip', [$character->id, $equipped->pivot->id]) }}" method="POST">
                                                        @csrf <button class="btn-red rounded small">Ablegen</button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-xs italic text-gray-800">Leer</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script>
        function changeStat(statName, changeValue) {
            fetch(`/character/{{ $character->id }}/update-stat`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ stat: statName, change: changeValue })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    console.log(statName);
                    document.getElementById('stat-' + statName).innerText = data.newValue;

                    const heightElement = document.getElementById('stat-points-height-' + statName.split('_')[0]);
                    const percentage = data.maxValue > 0 ? (data.newValue / data.maxValue) * 100 : 0;
                    
                    if (heightElement) {
                        heightElement.style.height = percentage + '%';
                    }
                } else if(data.message) {
                    alert(data.message);
                }
            });
        }

        function updateModifier(stat, change) {
            fetch(`/character/{{ $character->id }}/update-modifier`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ stat: stat, change: change })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('mod-' + stat).innerText = `(${data.newMod >= 0 ? '+' : ''}${data.newMod})`;
                const currentStatField = stat.includes('body') ? 'stat-body_points' : 'stat-mind_points';
                document.getElementById(currentStatField).innerText = data.newCurrent;
  
                const heightElement = document.getElementById('stat-points-height-' + stat.split('_')[0]);
                const percentage = data.newMax > 0 ? (data.newCurrent / data.newMax) * 100 : 0;
                
                if (heightElement) {
                    heightElement.style.height = percentage + '%';
                }
            });
        }

        function doSearch(q) {
            const d = document.getElementById('searchDropdown');
            if(q.length < 2) { d.classList.add('hidden'); return; }

            fetch(`/items/search-api?query=${q}`)
            .then(res => res.json())
            .then(items => {
                let html = '';
                if(items.length === 0) {
                    html = '<div class="p-4 text-center text-gray-500 italic text-sm">Keine Schätze gefunden...</div>';
                } else {
                    items.forEach(i => {
                        // Werte vorbereiten
                        let stats = '';
                        if(i.attack_bonus > 0) stats += `<span class="text-red-500 font-bold text-xs">⚔️${i.attack_bonus}</span> `;
                        if(i.defence_bonus > 0) stats += `<span class="text-blue-500 font-bold text-xs">🛡️${i.defence_bonus}</span>`;
                        
                        html += `
                        <div onclick="addItem(${i.id})" class="item">
                            <div class="item-info">
                                <span>${i.name} - ${i.type} ${stats}</span>
                            </div>
                            <div class="item-extra">
                                <span class="btn-gold rounded">${i.gold_value ?? 0} G</span>
                            </div>
                        </div>`;
                    });
                }
                d.innerHTML = html;
                d.classList.remove('hidden');
            });
        }

        let tempAtk = 0;
        let tempDef = 0;
        let tempNormal = 0;

        function adjustTempDice(type, change) {
            if(type === 'normal') {
                tempNormal += change;
                document.getElementById('temp-normal-mod').innerText = (tempNormal >= 0 ? '+' : '') + tempNormal;
            } else if (type === 'atk') {
                tempAtk += change;
                document.getElementById('temp-atk-mod').innerText = (tempAtk >= 0 ? '+' : '') + tempAtk;
            } else {
                tempDef += change;
                document.getElementById('temp-def-mod').innerText = (tempDef >= 0 ? '+' : '') + tempDef;
            }
        }

        function rollDice(type, amount) {
            const resultDiv = document.getElementById('dice-result');
            resultDiv.innerHTML = '<span class="special">...</span>';

            setTimeout(() => {
                let html = '';

                const baseValue = parseInt(document.getElementById('base-' + type).innerText);
                var modValue = 0;

                if (type === 'normal') {
                    modValue = tempNormal;
                } else {
                    modValue = (type === 'atk') ? tempAtk : tempDef;
                }

                const finalDiceCount = Math.max(0, baseValue + modValue);
                
                if(finalDiceCount === 0) {
                    html = '<span class="special">Keine Würfel verfügbar</span>';
                } else {
                    if(type === 'normal') {
                        var final = 0;

                        for(let i = 0; i < finalDiceCount; i++) {
                            const roll = Math.floor(Math.random() * 6) + 1;
                            final = final + roll;
                            html += `<div class="dice"><span class="number">${roll}</span></div>`;
                        }

                        if (finalDiceCount > 1) {
                            html += `<div class="dice" style="background:transparent"><span class="number" style="color:#fff">=</span></div><div class="dice"><span class="number">${final}</span></div>`;
                        }
                    } else {
                        const symbols = ['skull', 'skull', 'skull', 'white_shield', 'white_shield', 'black_shield']; // HQ Würfel: 3x Totenkopf, 2x Weißes Schild, 1x Schwarzes Schild
                        
                        for(let i = 0; i < finalDiceCount; i++) {
                            const roll = symbols[Math.floor(Math.random() * 6)];
                            const bgColor = (roll === 'skull') ? 'bg-red-900/20 border-red-800' : 'bg-white border-gray-300';
                            const textColor = (roll === 'skull') ? 'text-red-500' : 'text-gray-900';
                            let svgContent = '';

                            if (roll === 'skull') {
                                svgContent = '<svg id="skull" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333.21 420.2"><g id="Ebene_1-2"><path d="M157.97.41c71.44-5.59,153.17,46.8,150.24,124.24-1,26.31-7.74,74.76,10.54,96.38,5.95,7.03,16.25,5.59,14.19,17.34-1.72,9.81-23.89,30.96-27.75,42.25-2.61,4.35-13.55,2.51-15.54,6.47-2.18,4.32,4.05,9.58-.04,14.95-1.67,2.2-9.83,4.15-13.48,7.52-9.84,9.07-18.03,28.63-14.69,41.77,2.01,7.91,8.04,12.26,2.56,21.1-6.47,10.44-22.4,20.85-30.65,33.35-3.78,5.72-3.01,11.98-11.77,13.23-34.56-2.35-73.97,3.44-107.96.14-11.39-1.11-10.98-9.72-16.47-17.53-7.17-10.19-19.27-18.1-26.5-27.5-8.52-11.07.13-15.14,1.44-24.61,1.76-12.74-4.87-30.75-14.41-39.41-3.37-3.06-12.5-6.17-13.94-8.06-3.39-4.44.99-10.08-1.05-14.96-1.18-2.36-7.98-2.73-10.9-4.1-5.26-2.45-11.91-15.69-15.8-21.2-3.47-4.91-15.05-18.49-15.75-23.25-1.73-11.68,6.76-10.19,12.83-16.04,20.27-19.54,12.79-74.23,12.12-99.9C23.27,49.66,91.76,5.58,157.97.41ZM157.97,16.41c-33.53,2.76-77.68,21.37-100.31,46.69-36.88,41.25,1.85,113.65-26.66,159.34-2.35,3.76-6.51,5.59-6.76,11.25-.18,4.01,10.08,28.1,12.73,32.12,13.02,19.72,26.42-5.62,41.47-2.46,11.54,2.42,21.45,23.24,31.43,27.56,11.49,4.97,30.23-1.26,43.79.21,5.42.58,9.44,5.06,13,5.06,3.91,0,7.02-4.48,11.98-5.08,13.35-1.62,32.19,4.48,43.51.51,8.87-3.1,17.64-18.44,25.53-24.47,18.94-14.45,29.5,16.42,45.5,2.5,3.96-3.44,15.96-30.94,15.99-36.02.03-5.77-3.9-6.91-6.43-10.59-23.6-34.4-2.66-94.26-13.44-133.56-12.74-46.46-87-76.71-131.35-73.05ZM102.29,354.99c-.38-4.41,2.69-7.51,2.61-12.11-.3-16.24-16.74-50.07-27.76-62.25-2.21-2.45-4.89-6.18-8.44-5.59-1.03.17-8.45,8.88-9.01,10.08-3.04,6.46,6.92,9.64,10.97,13,9.74,8.12,17.1,21.44,16.52,34.45-.48,10.76-7.94,22.27-5.77,32.8,1.11,5.37,10.24,12.77,13.74,17.26,6.4,8.19,13.79,24.19,24.51,25.49,29.91-2.15,63.61,2.78,93.06.01,12.3-1.16,15.34-12.44,22.06-20.94,3.34-4.21,15.46-16.79,16.63-20.37,3.42-10.47-4.61-23.52-5.23-34.26-.72-12.49,6.72-26.03,15.98-33.99,8.33-7.15,18.33-7.17,6.52-19.5-6.17-6.45-7.06-4.46-12.48,1.54-10.9,12.07-28.43,46.97-27.86,63,.13,3.71,4.31,8.16,1.91,11.78-.64.97-18.37,9.6-20.82,10.44-10.78,3.68-15.46,2.19-25.71,2.2-16.54.01-45.44,2.93-59.81-2.19-7.57-2.7-14.14-7.97-21.62-10.88ZM106.73,300.12c-5.97,8.1,1.86,22.81,8.94,27.98,3.36,2.46,9.85,6.53,10.54.56.26-2.24-1-21.42-1.54-22.55-1.81-3.8-7.7-2.51-10.78-3.22-2.76-.65-4.44-2.59-7.16-2.76ZM207.17,311.61c-.63,5.59,0,13.12,0,19,0,2.7,5.49.24,6.67-.33,10.53-5.04,16.16-17.13,14.17-28.51l-2.3-1.67c-2.34.34-4.04,2.24-6.28,2.77-7.83,1.85-11.07-1.82-12.26,8.74ZM158.86,305.42c-3.73-3.4-19.77-5.94-24.09-3.2-5.74,3.63-1.75,19.17,1.56,24.23,5.09,7.78,23.83,17.58,26.6,3.94,1-4.9-.36-21.58-4.07-24.96ZM186.95,301.39c-13.35,1.66-16.06,5.31-16.77,18.23-.47,8.55-1.21,18.67,10.39,17.42,12.61-1.36,20.14-13.64,20.65-25.41.48-11.16-4.39-11.47-14.26-10.24ZM129.1,361.07c1.12-.81.34-14.17,0-16.4-1.44-9.6-17.79-18.23-18.98-4.11-.99,11.7,7.75,19.55,18.98,20.51ZM221.91,335.36c-.47-.5-3.74-1.94-4.49-2.06-12.22-1.94-16.18,18.81-13.31,27.38,8.78,1.03,18.23-7.28,19.06-16.08.22-2.34.32-7.57-1.26-9.25ZM139.67,336.44c-7.01-.07-9.01,23.09,2.51,27.15,4.35,1.54,17.92,2.57,18.96-3.02,3.84-20.59-9.2-15.32-21.47-24.13ZM194.86,361.8c4.58-4.15,5.97-17.58,2.76-22.63-3.67-5.77-7.53-.2-11.46,1.42-14.32,5.9-16.73,4.51-12.81,23.34,5.48.39,17.51,1.49,21.52-2.14Z"/><path d="M98.52,227.46c-2.49,2.12-3.82,5.83-7.65,7.84-6.34,3.33-11.87,1.13-16.13-4.27-1.56-1.98-12.41-18.35-12.55-19.52-1.01-7.96,11.85-21.35,14.76-30.13,2.12-6.42.94-14.31,7.86-18.14,15.35-8.5,33.72,7.42,48.08,11.65,11.5,10.33,5.95,21.85-3.31,31.11s-21.38,13.24-31.05,21.45Z"/><path d="M235.82,228.46c-12.57-10.6-43.29-22.59-41.66-41.84,1.08-12.74,12.25-13.42,21.39-17.63,9.83-4.52,12.48-9,25.11-7.86,15.19,1.37,12.35,11.84,16.32,22.67,2.66,7.26,14.05,19.61,14.05,25.81,0,4.89-5.92,10.21-8.69,14.18-3.66,5.26-4.8,12.21-12.94,13.14-7.37.84-9.62-5.12-13.58-8.46Z"/><path d="M160.42,197.36c2.25-2.17,11.06-1.57,13.24.75,1.52,1.61,5.85,19.82,8.33,24.67,2.24,4.38,9.56,10.79,10.13,13.88,1.73,9.47-6.11,11.83-12,16.9-2.11,1.82-2.14,4.53-5.67,5.33-4.51,1.02-13.88.64-17.99-1.58-1.25-.68-12.38-10.49-13.33-11.68-7.3-9.17,1.45-12.53,5.85-19.21s8.44-26.18,11.43-29.06Z"/></g></svg>';
                            } else if (roll == 'white_shield') {
                                svgContent = '<svg id="white_shield" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 349 398.56"><g id="Ebene_1-2"><path d="M220.58,367.54c-.71.6-2.22.57-3.13,1.32-13.18,10.76-27.18,20.41-41.52,29.61-3.54,1-12.85-6.45-16.33-8.78C72.32,331.26,15.76,238.96,3.07,134.23c-1.93-15.9-4.65-50.88-1.9-65.62.25-1.35.71-3.35,1.78-4.22,1.91-1.57,13.66-4.28,17.24-5.76,21.31-8.79,41.28-24.6,49.02-46.98,1.15-3.34,1.16-10.62,4.42-11.58l202.67-.07c2.26.77,2.47,8.09,3.33,10.67,8.43,25.53,29.28,40.28,53.34,49.66,4.77,1.86,12.75,1.71,14.51,7.49,1.86,6.12-.76,15.77,1.53,22.54-.95,106.15-47.34,209.01-128.41,277.18ZM262.66,15.26l-176.31-.03c-2.92,5.51-4.22,11.52-7.59,16.97-6.02,9.74-22.35,25.74-31.93,32.07s-20.39,9.42-29.95,15.26c-1.09,32.6,3.41,65.04,11.33,96.54,18.13,72.09,61.55,140.62,120.47,185.8,8.08,6.19,17.47,11.04,25.89,16.81,79.64-46.81,132.59-131.31,151.08-221.59,3.84-18.77,6.84-41.56,7.32-60.68.15-5.9.41-12.07-1.04-17.79-.78-1.45-18.08-7.83-21.53-9.72-14.33-7.84-37.1-28.67-43.67-43.32-1.07-2.38-1.84-5.83-2.21-8.44l-1.85-1.87Z"/><path d="M120.91,95.87l-4.91,14.34c.65,2.34,15.02,5.8,18.19,6.88,2.71.92,5.68,3.43,8.32,3.75,5.2.63,13.23-4.21,19.41-1.97-7.23,6.75-4.32,13.45-4.01,21.99-10.64-2.52-20.92-3.29-30.99-8.01,6.93-3.71-9.66-15.67-12.55-15.98-1.93-.21-1.17.19-1.7,1.25-1.08,2.19-7.31,16.84-6.71,17.63,12.39,3.11,24.92,13.71,30.14,25.42s-7.54,10.75-6.25,22.21c.23,2.02,6.52,13.63,8.04,15.01,1.79,1.64,3.8,1.69,6.04.77,5.93-2.46,14-9.18,20.26-11.53,3.06-1.15,8.66-.15,9.32-3.71,1.11-6.02-17.42-21.82-24.59-18.06l4.01-14.99c3.22-1.02,1.23,3.18,3.6,3.93,6.91-1.47,13.77-3.29,20.94-2.99,6.39.27,12.61,2.71,18.55,2.6l1.89-3.54,4.01,14.99c-7.63-3.81-26.1,12.68-23.89,19.36.75,2.25,5.89,1.55,8.62,2.41,5.97,1.88,18.41,11.84,23.78,12.12,4.57.25,8.35-12,11.57-15.34,2.55-6.5-7.34-12.57-7.84-17.2-.6-5.55,9.67-18.9,13.86-22.75s11.67-6.32,16.77-8.74c1.21-1.9-3.91-11.75-4.95-14.41-.64-1.64.44-4.64-2.44-4.51-2.18.1-19.92,12.06-12.49,16.03-10.08,4.67-20.46,5.18-30.99,8.01-.41-9.15,4.16-16.02-5.01-21.99,5.74-2.41,11.61,1.24,16.57,1.95,6.96,1,22.05-8.96,30.39-9l-4.96-14.95c13.34.56,26.38-3.04,38.99-7.01-2.71,8.53-6.24,17.75-12.98,23.48,1.54,5.38,4.15,4.22,7.49,6.53,14.49,10.05,32.21,23.88,35.5,41.98-7.25-2.67-13.16-6.2-21.27-4.76-2.08.37-7.01,2.63-4.11,4.84.6.45,2.25.54,3.34,1.45,16.11,13.5,26.28,27.7,28.05,49.46-1.71,2.18-13.74-4.35-17-2.99.11,8.71,4.45,15.95,8.99,22.97-8.43,5.09-17.75,10.93-28.11,7.43-5.7-1.93-18.57-15.48-22.63-20.63-2.93-3.72-8.58-12.96-12.23-18.53-3.35-5.11-5.01-11.01-9.54-15.25-8.88,4.87-6.24,29.98-22.19,21.2-5.28-2.91-12.92-11.07-18.59-13.41-4.57-1.89-12.98-2.3-17.48-.45-4.89,2.01-11.7,9.3-16.32,12.08-19.62,11.8-14.3-10.84-24.41-19.4-1.94,0-7.39,11.52-8.51,13.29-6.71,10.62-20.21,31.17-32.05,39.13-8.36,5.62-26.61,2.26-31.59-6.93,4.13-6.68,7.44-13.41,7.64-21.5l-16.99,3.99c1.4-5.13,1.44-10.48,2.85-15.64,2.82-10.27,10.95-22.03,18.62-29.39,7.22-6.93,19.76-11.18-.85-11.87l-15.59,5.41c4.28-15.72,17.11-27.84,29.52-37.5,2.79-2.17,13.92-8.03,14.38-10.64-5.82-7.35-10.56-15.19-12.91-24.36,12.84,2.9,26.8,8.76,39.98,6Z"/><path d="M210.93,344.87c-2.16-7.96-.26-16.15,1.49-24,6.76-30.44,23.7-40.95,15.21-76.2-3.08-12.76-12.81-24.78-6.6-38.18,1.76-3.81,4.79-8.02,8.35-3.56s7.54,14.29,11.13,19.87c6.21,9.66,15.94,23.05,24.94,30.06,2.29,1.79,10.53,5.46,10.35,7.33-.25,2.59-8.77,19.02-10.7,22.36-13.51,23.43-34.87,43.69-54.16,62.33Z"/><path d="M140.91,343.87c-4.07.68-5.2-4.46-7.6-6.89-17.8-18-35.71-34.19-48.44-56.62-1.2-5.02-9.06-15.82-8.93-20.06.09-3,8.41-4.92,10.91-7,9.62-8.04,21.55-25.63,28.01-36.21,2.18-3.58,3.92-9.12,6.09-12.46.63-.96,2.89-2.12,3.46-3.74,15.71,10.46,4.15,26.31.15,38.9-10.95,34.46,3.93,45.26,12.28,74.66,2.71,9.54,4.74,19.46,4.07,29.42Z"/><path d="M179.92,223.87l7.5,9c12.45,9.6,10.68-9.18,12.63-16.87l12.87-4.13c-3.64,14.89,4.69,28.65,8.31,42.19,8.35,31.27-13.41,42.61-24.85,65.76-1.71,3.46-7.46,18.57-7.46,21.54v14.5c-4.05-2.7-9-14.01-9-18.5v-113.5Z"/><path d="M138.92,211.87l12.57,4.93c.88,3.2,1.38,18.02,4.06,18.95,7.33,2.55,11.3-5.95,15.37-9.88v113.5c0,3.08-5.35,15.74-8.99,17.5.34-2.96,1.14-5.41,1.07-8.52-.92-37.44-39.02-53.4-33.99-89.9,1.19-8.63,9.91-23.12,9.91-32.09v-14.5Z"/><path d="M228.92,52.86c-1.54.07-3.13.33-4.55.96-10.62,4.7-23.75,15.16-30.86,24.14-3.19,4.02-13.98,25.01-18.1,24.67-2.11-1.72-4.19-3.71-5.9-5.83-3.72-4.63-5.55-10.83-8.94-15.56-5.07-7.06-15.65-16.43-23.17-21.32-4.78-3.11-9.7-6.27-15.47-7.04-.87-1.11,10.58-5.32,11.75-5.73,23.57-8.28,50.29-9.24,74.47-2.98,6.38,1.65,15.77,4.8,20.77,8.72Z"/><path d="M135.52,66.29c4.29,2.57,9.51,6.83,12.92,10.54,1.12,1.22,2.82,2.08,2.48,4.04-6.86,1.34-15.97,1.97-22.45,4.05-2.92.93-5.05,3.24-7.25,3.74-6.33,1.46-30.84-4.03-36.01-8.09-1.4-1.1-4.7-7.56-5.05-9.44-.43-2.33-.99-15.27,1.26-15.24,6.96,8.76,16.96-.23,25.95-.05,7.95.16,21.2,6.29,28.15,10.45Z"/><path d="M268.63,58.52c.15-.06.54-3.35,1.78-.65,3.65,7.91-1.05,21.87-9.38,25.41-4.54,1.93-25.13,6.25-29.67,5.64-3.46-.46-4.09-2.88-7.19-3.81-6.28-1.9-14.69-2.78-21.54-4.53-1.12-.29-1.7.03-2.71.29l5.96-7.63c10.2-6.07,25.81-17.68,38.52-17.44,8.85.17,14.15,6.48,24.22,2.73Z"/></g></svg>';
                            } else {
                                svgContent = '<svg id="black_shield" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 416.98 416.68"><g id="Ebene_1-2"><path d="M364.72,348.34c-.52.64-9.54,8.57-11.83,10.69C207.16,494.24-24.74,374.32,2.15,178.29,24.46,15.61,223.64-57.29,346.88,52c89.26,79.15,91.13,206.1,17.83,296.33ZM148.37,58.52c-13.28-1.69-29.85,1.25-43.5,0l30,18.5c-20.55,11.07-41.67,23.37-65.49,25.5-2.07,2.07.94,2.01,1.97,2.97,5.58,5.18,12.65,9.88,17.54,15.51,3.37,3.87,6.18,10.74,9.46,13.54,1.58,1.35,12.11,6.68,14.01,7,1.74.29,1.56.11,1.31-1.3-.47-2.66-1.81-6.42-1.58-8.98.81-9.16,12.24-10.49,17.48-16.53,1.55-.39,3.16-.4,4.73-.16,7.99,1.21,22.52,20.42,29.55,26.47,2.79,2.4,16.49,11.26,17.07,12.2,2.97,4.76-3.76,10.4-2.93,13.58l14.36,15.72c5.18-24.18,14.2-46.77,5.27-71.27-8.22-22.57-22.5-49.34-49.26-52.74ZM312.87,58.52h-41.5c-16.01,0-32.77,15.76-40.02,28.98-21.46,39.12-14.93,52.47-6.45,93.5.28,1.37-.98,2.93,1.46,2.52,2.27-5.76,14.17-13.2,13.32-19.28-.31-2.24-3.4-5.31-3.59-7.39-.35-3.87,13.22-11.74,16.79-14.82,7.54-6.5,24.8-29.17,34.44-27.53.88.15,14.59,8.71,15.21,9.35,5.49,5.63,2.24,12.14,1.83,18.66,4.32-3.23,10.9-4.72,15-8,3.63-2.9,5.32-7.86,8.48-11.52,6.17-7.15,13.79-12.99,21.01-18.99l-31.96-10.02-34.02-16.48,29.99-18.99ZM185.83,191.47c.41-1.47-.14-2.33-.91-3.5-.71-1.09-11.51-12.36-12.32-12.7-4.44-1.89-8.66,1.75-13.22,2.26-2.95.33-7.66.26-10.54-.47s-23.31-11.62-25.49-13.51c-4.62-4.01-2.23-8.75-4.49-11.51-1.26-1.54-20.75-10.58-22.27-10.35l-14.69,13.35c7.13,5.91,6.57,14.4,5.95,22.99-.35,4.84-3.99,8.59-.01,13.04,1.08,1.21,14.29,8.17,15.7,8.23,1.88.09,7.37-4.13,10.51-5.07,31.9-9.6,36.11,21.02,56.12,33.51,1.83,1.14,10.72,5.7,12.27,5.8,3.19.21,6.75-3.52,10.08-3.7s8.59,4.17,13.86,4.69c10.25,1.01,11.68-3.88,17.98-4.07,5.33-.16,8.4,3.97,12.75,2.88,1.9-.48,18.22-9.67,19.8-11.26,4.42-4.45,7.86-13.45,12.45-18.55,8.05-8.95,22.85-13.25,34.31-9.29,7.12,2.46,7.9,6.6,16.88,2.47,1.86-.86,10.83-6.58,11.19-7.88-1.65-11.2-5.22-24.99,4.1-33.79-3.28-2.37-11.75-13.88-15.23-13.37-1.83.27-17.84,8-19.68,9.43-4.99,3.9-1.39,7.92-6.55,12.45-3.02,2.65-23.45,13.39-27.1,13.9-6.63.92-19.89-3.7-22.42-2.43-1.83.91-10.49,12.76-12.89,15.03,0,1.58,7.48,4.59,8.43,6.49,1.44,2.87-2.28,9.52-4.48,11.55-9.32,8.58-16.59-2.48-26.56-2.63-7.87-.12-12.34,5.6-17.09,6.06-12.43,1.19-21.99-16.72-6.45-20.03ZM311.6,204.8c-6.75-5.59-25.32-2.75-32.2,2.75-14.58,11.64-2.6,30.84.18,45.77,8.07,43.31-.02,82.03-25.89,117.52-4.7,6.45-10.37,12.06-14.82,18.67,49.47-10.16,79.63-55.98,89.53-102.96,5.19-24.63,4.67-49.44,4.46-74.53-.99-5.43-5.35.62-8.74,1.28-9.29,1.83-8.73-5.36-12.53-8.51ZM178.87,389.51l-19.22-25.27c-23.08-35.08-29.11-73.64-20.28-114.74,1.5-6.96,7.1-20.3,7.48-25.61.53-7.54-7.22-17.17-13.97-19.88-5.54-2.22-18.53-2.4-23.99,0-6.25,2.74-5.54,11.3-15.27,9.27-2.99-.62-4.81-3.44-7.72-3.76-2.9,36.31-.3,74,13.53,107.96,14.02,34.45,42.1,64.26,79.46,72.03ZM257.86,232.52c-1.33-1.22-15.03,8.27-17.73,8.79-4.9.96-10.36-2.59-16.78-1.81-4.94.6-6.98,3.93-12.96,4.09-7.4.19-10.14-3.48-14.96-4.12-6.46-.86-12.63,2.84-17.81,1.84-4.06-.78-11.67-7.3-16.25-8.77-4.82.3-4.84,33.07-4.48,37.46.46,5.64,2.1,15.65,5.97,19.52.91-8.24,4.51-16.47,9.59-22.92.9-1.14,8.32-9.32,9.41-8.08,1.16,11.94.87,37.73,17,37.99-2.08-9.94-3.02-23.98.93-33.57,2.5-6.06,15.1-5.8,17.14-2.74,4.57,6.84,5.05,26.9,2.03,34.73,1.14,2.17,2.96,1.76,4.96,1.15,9.98-3.08,12.04-28.9,12.46-37.58,7.52,4.69,12.53,12.07,15.97,20.03,1.54,3.56,1.67,8.63,4.51,10.98,5.95-18.89,6.25-37.91,1-57ZM188.22,322.17c-6.7-6.22-8.67-20.22-11.36-28.64-2.02,1.67-4.13,4.91-5.18,7.3-4.26,9.7-5.31,19.52-1,29.38,1.1,2.51,12,19.62,13.64,21.36,6.48,6.84,37.2,6.18,45.56,2.46,5.93-2.64,6.8-8.22,9.97-13.03,2.05-3.11,4.97-5.33,6.53-8.47,6.12-12.27,4.32-29.11-5.5-39.01-1.88,9.78-6.74,33.79-20.25,31.81-4.84-.71-6.48-5.28-12.25-4.88-6.84.48-10.88,10.35-20.17,1.72Z"/></g></svg>';
                            }
                            
                            html += `<div class="dice">${svgContent}</div>`;
                        }
                    }
                }
                
                
                resultDiv.innerHTML = html;
                tempAtk = 0; tempDef = 0; tempNormal = 0;
                document.getElementById('temp-atk-mod').innerText = "+0";
                document.getElementById('temp-def-mod').innerText = "+0";
                document.getElementById('temp-normal-mod').innerText = "+0";

            }, 400);
        }

        function addItem(itemId) {
            const d = document.getElementById('itemSearch');
            const s = document.getElementById('searchDropdown');

            fetch(`/character/{{ $character->id }}/add-specific-item/${itemId}`, {
                method: 'POST',
                headers: { 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(async res => {
                const data = await res.json();
                if (res.ok) {
                    d.value = '';
                    s.classList.add('hidden');

                    showToast(data.message, 'success');
                    setTimeout(() => location.reload(), 1200);
                } else {
                    showToast(data.message, 'error');
                }
            });
        }
    </script>
</x-app-layout>
