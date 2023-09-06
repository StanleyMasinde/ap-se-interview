@extends('layouts.user')

@section('content')
    <div>
        @if ($user->subscription)
        <div class="grid place-content-center align-middle h-[70vh]">
            <div>
                <h1 class="text-xl font-bold">You have an active subscription</h1>
                <h3>Type: {{ $user->subscription->type }}</h3>
                <h3>Subcscription Date: {{ $user->subscription->subscription_date }}</h3>
                <h3>Next renew date: {{ $user->subscription->next_renew_date }}</h3>
            </div>
        </div>
        @else
            <div class="grid place-content-center align-middle h-[70vh]">
                <div>
                    <h1 class="text-xl font-bold">It looks like you do not have a subscription</h1>
                    <p>Pick a plan from below</p>

                    <div class="flex flex-col w-full gap-3 mt-5">
                        <form action="{{ route('user.subscribe') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="monthly">
                            <button type="submit" class="bg-primary py-2 rounded-lg w-full">Monthly plan</button>
                        </form>
                        <form action="{{ route('user.subscribe') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="annual">
                            <button class="bg-primary py-2 rounded-lg w-full">Annual plan</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
