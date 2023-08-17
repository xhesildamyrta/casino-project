@php
    $casinos = [
        'playzee' => [
            'image' => 'playzee.png',
            'badge' => 'Player Favourite',
            'title' => 'PlayZee',
            'info' => '100% Up to + $1500 + 150 Zee Spins + 500 Zee Points',
            'stars' => 4,
            'fill' => 'bg-purple-700',
        ],
        'machance' => [
            'image' => 'machance.png',
            'badge' => 'Trending',
            'title' => 'Machance',
            'info' => '200% Up to + $500 + 20 Free Spins',
            'stars' => 4,
            'fill' => 'bg-black',
        ],
        'intense' => [
            'image' => 'intense.png',
            'badge' => 'Number 1 In Europe',
            'title' => 'Intense',
            'info' => '200% Up to + $3,000 + 30 FREE SPINS',
            'stars' => 4,
            'fill' => 'bg-blue-200',
        ],
        'leovegas' => [
            'image' => 'leovegas.png',
            'badge' => 'Exclusive',
            'title' => 'Leovega',
            'info' => '200% Up to + $200 + 25 Free Spins on Book of Dead',
            'stars' => 4,
            'fill' => 'bg-teal-600',
        ],
        'casumo' => [
            'image' => 'casumo.png',
            'badge' => null,
            'title' => 'Casumo',
            'info' => 'Welcome Bonus + $50 + 20 Free Spins',
            'stars' => 4,
            'fill' => 'bg-gray-200',
        ],
    ];
@endphp
<div
    class="block md:bg-[url(https://www.grandsierraresort.com/hubfs/casino/GSR-casino-floor-view-of-table-games-and-slots_q085_1920x1080.jpg)] bg-no-repeat h-screen">
    <div class=" backdrop-blur-md">
        <div class="bg-black w-full absolute inset-x-0 md:relative md:bg-transparent md:h-fit ">
            <img src="/images/logo.png" alt="Casino"
                class="w-1/2 px-4 py-2 md:max-w-xs md:px-0 md:py-5 md:block md:mx-auto " />
            <div class="relative">
                <img src="/images/banner.png" alt="Casino" class="md:hidden" />
                <div
                    class="absolute text-white text-2xl top-[10%] font-medium px-4 md:relative md:mx-auto md:text-center  md:pt-10">
                    {{ __('TOP 5 Real Money Online Casino Bonus List!') }}</div>
                <div class="hidden md:flex text-white text-sm text-center mt-6">Play online slots for real money at
                    trusted online casinos is Europe. Claim your exclusive welcome bonus and start playing slots today!
                </div>
                <div
                    class="absolute bg-gray-800 opacity-70 bottom-14 inset-x-0 py-4 md:relative md:bg-transparent md:opacity-100 md:bottom-auto">
                    <p class="text-white font-bold md:text-center px-4">{{ __('10,302 Claimed Bonuses And Counting!') }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col gap-y-10 relative -top-14 px-4 md:top-auto md:pt-4">
                @foreach ($casinos as $key => $casino)
                    <div class="">
                        <div class="relative flex flex-col">
                            <div class="bg-white rounded-md">
                                <div
                                    class="absolute  top-0 right-0 bg-green-400 px-3 rounded-tr-md font-bold text-xs py-1.5 uppercase">
                                    {{ __('Player Favourite') }}</div>
                                <div class="flex flex-row justify-between  relative  py-8 px-3">
                                    <img src="/images/{{ $casino['image'] }}" alt="..."
                                        class="shadow rounded-full w-[70px]  h-[70px] {{ $casino['fill'] }} align-middle border-2 border-gray-600" />
                                    <div class="flex flex-col text-center px-1.5">
                                        <div class="font-bold text-xl">{{ $casino['title'] }}</div>
                                        <div class="flex flex-wrap text-black text-xs mt-2 max-w-[140px]">
                                            {{ $casino['info'] }}</div>
                                    </div>
                                    <div class="flex flex-col gap-y-4 mt-1.5">
                                        <div class="flex flex-row">
                                            @for ($i = 0; $i < $casino['stars']; $i++)
                                                <x-icons.favourite class="text-yellow-400 hover:fill-[gray]"
                                                    fill="currentColor" />
                                            @endfor
                                        </div>
                                        <div>
                                            <x-core.button type="button"
                                                class="text-xl xl:text-sm leading-tight w-[100px] bg-green-400 h-10">Play</x-core.button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
