@php
    $casinos = [
        'playzee' => [
            'image' => 'playzee.png',
            'badge' => 'Player Favourite',
            'title' => 'PlayZee',
            'info' => '100% Up to + <span class="font-bold">$1500</span> + 150 Zee Spins + 500 Zee Points',
            'stars' => 4,
            'fill' => 'bg-purple-800',
            'rgb' => '#7906B9',
        ],
        'machance' => [
            'image' => 'machance.png',
            'badge' => 'Trending',
            'title' => 'Machance',
            'info' => '200% Up to + $500 + 20 Free Spins',
            'stars' => 4,
            'fill' => 'bg-black',
            'rgb' => '#000000',
        ],
        'intense' => [
            'image' => 'intense.png',
            'badge' => 'Number 1 In Europe',
            'title' => 'Intense',
            'info' => '200% Up to + $3,000 + 30 FREE SPINS',
            'stars' => 4,
            'fill' => 'bg-blue-200',
            'rgb' => '#C2EEF9',
        ],
        'leovegas' => [
            'image' => 'leovegas.png',
            'badge' => 'Exclusive',
            'title' => 'Leovega',
            'info' => '200% Up to + $200 + 25 Free Spins on Book of Dead',
            'stars' => 4,
            'fill' => 'bg-teal-600',
            'rgb' => '#45C0A5',
        ],
        'casumo' => [
            'image' => 'casumo.png',
            'badge' => null,
            'title' => 'Casumo',
            'info' => 'Welcome Bonus + $50 + 20 Free Spins',
            'stars' => 4,
            'fill' => 'bg-gray-200',
            'rgb' => '#D1D7D5',
        ],
    ];
@endphp
<div
    class="block md:bg-[url(https://img.traveltriangle.com/blog/wp-content/uploads/2018/09/hong-kong-casinos-cover.jpg)] h-full">
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
            {{-- mobile --}}
            <x-casino.casino-mobile :casinos="$casinos" />
            {{-- desktop --}}
            <x-casino.casino-desktop :casinos="$casinos" />
        </div>
    </div>
</div>
