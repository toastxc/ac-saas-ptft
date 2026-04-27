<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                User Delete
            </h3>
        </header>
        <div class="flex flex-1 w-full max-h-min overflow-x-auto">


            <tr>
                <td colspan="4" class="p-3">
                    <article class="rounded-xl bg-white p-4 ring-3 ring-indigo-50 sm:p-6 lg:p-8">
                        <div class="flex items-start sm:gap-8">


                            <div>


                                <h3 class="mt-4 text-lg font-bold sm:text-2xl">
                                    <a href="#"
                                       class="hover:underline"> Are you sure you want to
                                        delete {{$user->given_name}} {{$user->family_name}} ?</a>
                                </h3>
                                <br>
                                <div class="flow-root">
                                    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                                            <div
                                                class="hidden sm:grid sm:size-40 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
                                                aria-hidden="true">
                                                <div class="flex items-center gap-1 text-8xl">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            </div>
                                            <form method="POST" class="w-full max-w-sm"
                                                  action="{{ route('admin.users.destroy', $user) }}">
                                                @csrf
                                                @method('delete')
                                                <x-input-label for="given_name"
                                                               :value="__('To confirm; type out the word confirm')"/>
                                                <input id="confirm" type="text"
                                                       class="border-2 border-red-600 block mt-1 w-full rounded   focus:outline-2 focus:outline-red-500 "
                                                       name="confirm"
                                                       autofocus
                                                />
                                                <x-input-error :messages="$errors->get('given_name')" class="mt-2"/>


                                                <div class="flex-col flex gap-1 ">
                                                    <div class="md:w-1/3"></div>


                                                    <button
                                                        class=" disabled:focus:none disabled:text-gray-300 disabled:hover:bg-white disabled:hover:border-gray-300   hover:text-white w-1/1 hover:border-white hover:bg-red-500 transition text-red-500 border-2 p-2 text-center rounded"
                                                        type="submit">
                                                        Permanently Delete
                                                    </button>

                                                    <a

                                                        href="{{ route('admin.users.index') }}">

                                                        <button type="button"
                                                                class="hover:text-white  w-1/1 hover:border-white hover:bg-gray-500 transition text-gray-500 border-2 p-2 text-center rounded">
                                                            Cancel
                                                        </button>
                                                    </a>


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
