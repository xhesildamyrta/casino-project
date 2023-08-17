<div class="hidden md:grid gap-y-6 place-content-center pb-10">
    @foreach ($casinos as $key => $casino)
        <div class="flex bg-white rounded-md pr-6">
            <div class="relative flex">
                <x-icons.polygon fill="{{ $casino['rgb'] }}" />
                <div class="absolute top-3">
                    <img src="/images/{{ $casino['image'] }}" alt="Casino" class="w-36 h-auto" />
                </div>
                @if ($casino['badge'])
                    <div class="absolute -top-4 -left-2">
                        <x-icons.label class="w-36 h-10" />
                        <div class="absolute top-0 text-black font-bold uppercase pl-2 pt-2 text-[10px]">
                            {{ $casino['badge'] }}</div>
                    </div>
                @endif
            </div>
            <div class="flex justify-between md:pl-10 divide-x gap-x-8">
                <div class="grid place-content-center">
                    <div class="max-w-[150px]">{!! $casino['info'] !!}</div>
                </div>
                <div class="grid place-content-center pl-8">
                    <div>Rating(2150)</div>
                    <div class="flex flex-row">
                        @for ($i = 0; $i < $casino['stars']; $i++)
                            <x-icons.favourite class="text-yellow-400 hover:fill-[gray]" fill="currentColor" />
                        @endfor
                    </div>
                </div>
                <div class="font-bold grid place-content-center text-3xl pl-8">10.0</div>
                <div class="grid place-content-center  pl-8">
                    <x-core.button type="button" data-button-id="{{$key+1}}"
                        class="text-xl xl:text-sm leading-tight w-[100px] bg-[#2BE925] h-10 play-button">Play</x-core.button>
                </div>
            </div>
        </div>
    @endforeach
</div>
