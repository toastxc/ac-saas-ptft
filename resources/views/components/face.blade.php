@php
    $color = "white"
@endphp

@if(empty($user->email_verified_at))
    @php
        $color = "yellow"
    @endphp
@elseif (!empty($user->suspended_at))
    @php
        $color = "blue"
    @endphp
@elseif (!empty($user->banned_at))
    @php
        $color = "red"
    @endphp
@else
    @php
        $color = "emerald"
    @endphp
@endif
<div
    class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-{{$color}}-500"
    aria-hidden="true">
    <div class="flex items-center gap-1 text-5xl">
        <i class="fa-solid fa-user"></i>
    </div>
</div>

<div>
    @if(empty($user->email_verified_at))
        <x-chip color="yellow" message="Unverified"></x-chip>
    @elseif (!empty($user->suspended_at))
        <x-chip color="blue" message="Suspended"></x-chip>
    @elseif (!empty($user->banned_at))
        <x-chip color="red" message="banned"></x-chip>
    @else
        <x-chip color="emerald" message="Verified"></x-chip>
    @endif

    <h3 class="mt-4 text-lg font-bold sm:text-2xl">
        <a href="#"
           class="hover:underline"> {{$user->given_name}} {{$user->family_name}} </a>
    </h3>
</div>
