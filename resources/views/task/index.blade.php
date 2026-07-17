<span hidden class="bg-red-100 px-2.5 py-0.5 text-red-700"></span>
<span hidden class="bg-orange-100 px-2.5 py-0.5 text-orange-700"></span>
<span hidden class="bg-amber-100 px-2.5 py-0.5 text-amber-700"></span>
<span hidden class="bg-yellow-100 px-2.5 py-0.5 text-yellow-700"></span>
<span hidden class="bg-lime-100 px-2.5 py-0.5 text-lime-700"></span>
<span hidden class="bg-green-100 px-2.5 py-0.5 text-green-700"></span>
<span hidden class="bg-emerald-100 px-2.5 py-0.5 text-emerald-700"></span>
<span hidden class="bg-teal-100 px-2.5 py-0.5 text-teal-700"></span>
<span hidden class="bg-cyan-100 px-2.5 py-0.5 text-cyan-700"></span>
<span hidden class="bg-sky-100 px-2.5 py-0.5 text-sky-700"></span>
<span hidden class="bg-blue-100 px-2.5 py-0.5 text-blue-700"></span>
<span hidden class="bg-indigo-100 px-2.5 py-0.5 text-indigo-700"></span>
<span hidden class="bg-violet-100 px-2.5 py-0.5 text-violet-700"></span>
<span hidden class="bg-purple-100 px-2.5 py-0.5 text-purple-700"></span>
<span hidden class="bg-fuchsia-100 px-2.5 py-0.5 text-fuchsia-700"></span>
<span hidden class="bg-pink-100 px-2.5 py-0.5 text-pink-700"></span>
<span hidden class="bg-rose-100 px-2.5 py-0.5 text-rose-700"></span>
<span hidden class="bg-slate-100 px-2.5 py-0.5 text-slate-700"></span>
<span hidden class="bg-gray-100 px-2.5 py-0.5 text-gray-700"></span>
<span hidden class="bg-zinc-100 px-2.5 py-0.5 text-zinc-700"></span>
<span hidden class="bg-neutral-100 px-2.5 py-0.5 text-neutral-700"></span>
<span hidden class="bg-stone-100 px-2.5 py-0.5 text-stone-700"></span>
<span hidden class="bg-taupe-100 px-2.5 py-0.5 text-taupe-700"></span>
<span hidden class="bg-mauve-100 px-2.5 py-0.5 text-mauve-700"></span>
<span hidden class="bg-mist-100 px-2.5 py-0.5 text-mist-700"></span>
<span hidden class="bg-olive-100 px-2.5 py-0.5 text-olive-700"></span>

<x-app-layout>
    <br>
    <div class="flex justify-center items-center">


        <table class="divide-y-2 divide-zinc-200 bg-zinc-50 drop-shadow-xl rounded-sm ">
            <thead class="sticky top-0 bg-zinc-700 ltr:text-left rtl:text-right font-bold">
            <tr class="*:font-medium *:text-white">
                <th class="px-1 py-2 whitespace-nowrap">Status</th>
                <th class="px-3 py-2 whitespace-nowrap">Task</th>
                <th class="px-3 py-2 whitespace-nowrap">Badges</th>
                <th class="px-3 py-2 whitespace-nowrap">Due</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-zinc-200">
            <a href="{{ route('tasks.create') }}"
               class="fixed bottom-6 right-6 w-14 h-14 bg-green-600 text-white rounded-full shadow-lg hover:shadow-2xl hover:scale-110 transition-all duration-200 flex items-center justify-center z-50">
                <i class="fa-solid fa-plus"></i>
            </a>
            @foreach($tasks as $task)

                <tr class="*:text-zinc-900 *:first:font-medium hover:bg-white">

                    <td class="col-span-5 justify-center justify-self-center mx-auto  text-white text-center text-lg">

                        <form action="{{ route('tasks.update',$task->id) }}"
                              method="post"
                              class="">
                            @csrf
                            @method('patch')


                            <label for="completed" class="inline-flex items-center gap-3 text-black">
                                <input type="checkbox"
                                       class="size-8 border-2 border-black bg-white shadow-[2px_2px_0_0] shadow-black checked:bg-black focus:ring-2 focus:ring-black"
                                       value="completed" id="completed"
                                       onChange="this.form.submit()"
                                       {{ $task->completed ? 'checked' : '' }} name="completed"
                                >
                            </label>
                            <input class="invisible w-0" type="text" value="checkbox" name="checkbox">

                        </form>
                    </td>
                    <td class="px-3 py-1 whitespace-nowrap flex flex-col min-w-1/3">


                        <a href="{{route('tasks.edit',$task->id)}}">

                            <span class="">{{ $task->label }}</span>


                        </a>

                        <a href="{{route('tasks.edit',$task->id)}}">

                            <span class="text-sm text-zinc-500">{{ $task->description }}</span>
                        </a>
                    </td>
                    <td class="">
                        @if($task->badge != null)
                            @php
                                $badge = $badges->find($task->badge)
                            @endphp

                            <span
                                class="inline-flex items-center justify-center rounded-full bg-{{$badge->color}}-100 px-2.5 py-0.5 text-{{$badge->color}}-700">

                        <p class="text-sm whitespace-nowrap">

                           {{$badge->label}}
                        </p>
                        </span>
                        @endif


                    </td>


                    <td>
                        @if($task->due != null)
                            @php
                                $date = \Carbon\Carbon::parse( $task->due);
                            @endphp
                            {{$date->day}}/{{$date->month}}
                        @endif
                    </td>


                </tr>
            @endforeach


            </tbody>

            <tfoot>

            <tr>


            </tr>

            </tfoot>

        </table>
    </div>

</x-app-layout>
