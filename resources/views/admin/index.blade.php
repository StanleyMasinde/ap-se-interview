@extends('layouts.admin')

@section('content')
    <div class="p-10">
        <h1 class=" text-xl">Subscriptions</h1>
        <div class="mt-3 flex flex-col gap-3">
            @foreach ($subscriptions as $sub)
                <div class="border rounded-lg px-2 py-3 shadow">
                    <h3 class="text-lg">Name: {{ $sub->user->name }}</h3>
                    <h3>Email: {{ $sub->user->email }}</h3>
                    <h3>Plan type: {{ $sub->type }}</h3>

                    <hr>
                    <button class="bg-primary mt-2 rounded-lg px-4 py-1">View more</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
