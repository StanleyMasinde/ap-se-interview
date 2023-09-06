@extends('layouts.admin')

@section('content')
    <div class="p-10">
        <h1 class=" text-xl">Subscriptions</h1>
        <div>
            <form action="" method="GET">

                <div class="mb-3">
                    <label for="status">Filter by status</label>
                    <select name="status" id="status" class="rounded-lg w-full">
                        <option value="active">Active</option>
                        <option value="inactive">Not active</option>
                    </select>
                </div>
                <button class="bg-primary py-2 px-3 rounded-lg">Filter results</button> {{ $status }}
            </form>
        </div>
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
