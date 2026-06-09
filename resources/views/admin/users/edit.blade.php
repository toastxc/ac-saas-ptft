<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                User Edit
            </h3>
        </header>
        <div class="flex flex-1 w-full max-h-min overflow-x-auto">


            <tr>
                <td colspan="4" class="p-3">
                    <article class="rounded-xl bg-white p-4 ring-3 ring-indigo-50 sm:p-6 lg:p-8">
                        <div class="flex items-start sm:gap-8">
                            <div
                                class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
                                aria-hidden="true">
                                <div class="flex items-center gap-1 text-5xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>

                            <div>


                                <h3 class="mt-4 text-lg font-bold sm:text-2xl">
                                    <a href="#"
                                       class="hover:underline"> {{$user->given_name}} {{$user->family_name}} </a>
                                </h3>
                                <br>
                                <div class="flow-root">
                                    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                                            <form method="POST" class="w-full max-w-sm"
                                                  action="{{ route('admin.users.update', $user) }}">
                                                @csrf
                                                @method('patch')
                                                <x-input-label for="given_name" :value="__('Given Name')"/>
                                                <x-text-input id="given_name" class="block mt-1 w-full" type="text"
                                                              name="given_name" :value="old('given_name')"
                                                              autofocus autocomplete="given_name"
                                                              placeholder="{{$user->given_name}}"/>
                                                <x-input-error :messages="$errors->get('given_name')" class="mt-2"/>


                                                <x-input-label for="given_name" :value="__('Family Name')"/>
                                                <x-text-input id="family_name" class="block mt-1 w-full" type="text"
                                                              name="family_name" :value="old('family_name')"
                                                              autofocus autocomplete="family_name"
                                                              placeholder="{{$user->family_name}}"/>
                                                <x-input-error :messages="$errors->get('family_name')" class="mt-2"/>


                                                <x-input-label for="given_name" :value="__('Email')"/>
                                                <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                              name="email" :value="old('email')" hint="aaaa"
                                                              autofocus autocomplete="email"
                                                              placeholder="{{$user->email}}"/>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                                                <div class="md:flex md:items-center">
                                                    <div class="md:w-1/3"></div>

                                                    <div class="md:w-2/3 my-3">

                                                        <button
                                                            class="hover:text-white hover:border-white hover:bg-gray-500 transition text-gray-500 border-2 p-2 text-center rounded"
                                                            type="submit">
                                                            Save
                                                        </button>
                                                        <a
                                                        >

                                                            <button
                                                                class="hover:text-white hover:border-white hover:bg-gray-500 transition text-gray-500 border-2 p-2 text-center rounded">
                                                                Cancel
                                                            </button>
                                                        </a>


                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </td>
            </tr>
        </div>


    </section>


</x-admin-layout>
