@extends('layouts.admin')

@section('content')
<div class="p-3">
    <a class="flex gap-2" href="{{ route('admin.all') }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        Back to subscriptions
    </a>
</div>
    <div class="p-10">
        <h1 class=" text-3xl">Subscription</h1>

        <div class="border rounded-lg shadow p-4 mt-3">
            <h3>User: {{ $subscription->user->name }}</h3>
            <h3>Subscription date: {{ $subscription->subscription_date }}</h3>
            <h3>Subscription plan: {{ $subscription->type }}</h3>
            <h3>Next renewal date: {{ $subscription->next_renew_date }}</h3>
        </div>
    </div>
@endsection
