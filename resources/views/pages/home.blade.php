@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Click Data</h1>

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
@endsection
