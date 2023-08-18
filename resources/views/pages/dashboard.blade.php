@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <x-core.session-alert :success="true">
            <strong> {{ session()->get('success') }}</strong>
        </x-core.session-alert>
    @endif
    <div class="p-6 max-w-screen-2xl mx-auto">
        <div class="flex items-center justify-between pb-4">
            <a href="{{ route('home') }}">
                <img class="max-w-[100px] sm:max-w-[200px] h-auto mr-2" src="/images/logo.png" alt="logo">
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-core.button type="submit"
                    class="text-sm leading-tight w-full bg-[#2BE925] h-10">{{ __('Log out') }}</x-core.button>
            </form>
        </div>
        <div class="py-4">
            <div class="font-medium">Filter By Year, Button Id and User Ip</div>
            <div class="py-4">
                <form action="{{ route('filter') }}" method="GET" class="mb-4 flex flex-col gap-y-3">

                    <input type="text" name="filter_value" id="filter_value" value="{{ request('filter_value') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:max-w-sm p-2 "
                        placeholder="Add Value">
                    <x-core.button type="submit"
                    class="text-sm leading-tight w-1/3 md:max-w-sm bg-[#2BE925] h-11">{{ __('Filter') }}</x-core.button>
                </form>

            </div>
        </div>
        <div class="overflow-x-auto ">
            <table class="w-full border">
                <thead>
                    <tr>
                        <th class="border p-2">Year</th>
                        <th class="border p-2">Month</th>
                        <th class="border p-2">IP</th>
                        <th class="border p-2">Button ID</th>
                        <th class="border p-2">Count of Clicks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clicks as $click)
                        <tr>
                            <td class="border p-2">{{ $click->year }}</td>
                            <td class="border p-2">{{ $click->month }}</td>
                            <td class="border p-2">{{ $click->user_ip }}</td>
                            <td class="border p-2">{{ $click->button_id }}</td>
                            <td class="border p-2">{{ $click->click_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
