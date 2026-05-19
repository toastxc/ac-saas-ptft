<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                User
            </h3>
        </header>
        <div class="flex flex-1 w-full max-h-min overflow-x-auto">


            <tr>
                <td colspan="4" class="p-3">
                    <article class="rounded-xl bg-white p-4 ring-3 ring-indigo-50 sm:p-6 lg:p-8">

                        <div class="flex items-start sm:gap-8">
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
                                    {{}}
                                @elseif (!empty($user->banned_at))
                                    <x-chip color="red" message="banned"></x-chip>
                                @else
                                    <x-chip color="emerald" message="Verified"></x-chip>
                                @endif

                                <h3 class="mt-4 text-lg font-bold sm:text-2xl">
                                    <a href="#"
                                       class="hover:underline"> {{$user->given_name}} {{$user->family_name}} </a>
                                </h3>

                                <div class="flow-root">
                                    <dl class="-my-3 divide-y divide-gray-200 text-sm">


                                        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                            <dt class="font-medium text-gray-900">email</dt>

                                            <dd class="text-gray-700 sm:col-span-2">{{$user->email}}</dd>

                                        </div>

                                        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                            <dt class="font-medium text-gray-900">email verified at</dt>

                                            <dd class="text-gray-700 sm:col-span-2">{{$user->email_verified_at}}</dd>
                                        </div>

                                        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                            <dt class="font-medium text-gray-900">placeholder</dt>

                                            <dd class="text-gray-700 sm:col-span-2">
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et facilis
                                                debitis explicabo
                                                doloremque impedit nesciunt dolorem facere, dolor quasi veritatis
                                                quia fugit aperiam
                                                aspernatur neque molestiae labore aliquam soluta architecto?
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </article>
                </td>
            </tr>
        </div>


    </section>


</x-admin-layout>
