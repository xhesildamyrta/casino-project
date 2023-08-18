<div class="flex flex-col gap-y-10 relative -top-14 px-4 md:top-auto md:pt-4 md:hidden">
    @foreach ($casinos as $key => $casino)
        <div class="">
            <div class="relative flex flex-col">
                <div class="bg-white rounded-md">
                    @if ($casino['badge'])
                        <div
                            class="absolute  top-0 right-0 bg-[#2BE925] px-3 rounded-tr-md font-bold text-xs py-1.5 uppercase">
                            {{ $casino['badge'] }}</div>
                    @endif
                    <div class="flex flex-row justify-between  relative  py-8 px-3">
                        <img src="/images/{{ $casino['image'] }}" alt="..."
                            class="shadow rounded-full w-[70px]  h-[70px] {{ $casino['fill'] }} align-middle border-2 border-gray-600" />
                        <div class="flex flex-col text-center px-1.5">
                            <div class="font-bold text-xl">{{ $casino['title'] }}</div>
                            <div class="flex flex-wrap text-black text-xs mt-2 max-w-[140px]">
                                {!! $casino['info'] !!}</div>
                        </div>
                        <div class="flex flex-col gap-y-4 mt-1.5">
                            <div class="flex flex-row">
                                @for ($i = 0; $i < $casino['stars']; $i++)
                                    <x-icons.favourite class="text-yellow-400" fill="currentColor" />
                                @endfor
                                @for ($i = $casino['stars']; $i < 5; $i++)
                                    <x-icons.favourite class="text-gray-400" fill="currentColor" />
                                @endfor
                            </div>
                            <div>
                                <x-core.button type="button" data-button-id="{{ $key + 1 }}"
                                    class="text-xl xl:text-sm leading-tight w-[100px] bg-[#2BE925] h-10 play-button">Play</x-core.button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
