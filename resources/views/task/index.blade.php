@php use Carbon\Carbon; @endphp
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
<span hidden class="text-red-500">aaaaaaaaaaaa</span>

<x-app-layout>
    <br>
    <div class="flex justify-center items-center font-[Open_Sans]  font-semibold text-black">

    </div>


    <br>
    <div class="flex justify-center items-center">


        <form action="{{ route('tasks.store') }}"
              method="post"
              class="">

            <div
                class="  flex h-10 section "
            >

                @csrf
                @method('post')

                <input
                    type="text"
                    id="label"
                    name="label"
                    class="w-full border-none bg-white text-black focus:ring-0 sm:text-sm"/>


                <button class="bg-emerald-300 px-4 py-2 text-xs/none font-bold tracking-wide  hover:bg-emerald-400">
                    <a
                        type="submit"

                        class="">
                        ADD
                    </a>
                </button>


            </div>
        </form>

    </div>

    <br>
    <div class="flex justify-center items-center">


        <div class="section"
        >

            @foreach($tasks as $task)

                <div
                    class="flex gap-4   m-3  "
                >

                    <div class="flex flex-col justify-center justify-self-center mx-auto ">

                        <form action="{{ route('tasks.update',$task->id) }}"
                              method="post"
                        >
                            @csrf
                            @method('patch')


                            <label for="completed" class="inline-flex items-center gap-3 text-black">
                                <input type="checkbox"
                                       class="checkbx"
                                       value="completed" id="{{$task->name}}"
                                       onChange="this.form.submit()"
                                       {{ $task->completed ? 'checked' : '' }} name="completed"
                                >
                            </label>
                            <input class="invisible w-0" type="text" value="checkbox" name="checkbox">

                        </form>

                    </div>

                    <a href="{{route('tasks.edit',$task->id)}}" class="w-250 font-semibold text-black">

                        <span class="">{{ $task->label }}</span>


                        <br>


                        <span class="text-sm text-zinc-500">{{ $task->description }}</span>
                    </a>


                    <div class="flex items-end gap-1 flex-col">

                        @if($task->due != null)

                            @php
                                $date = Carbon::parse( $task->due);
                                $now = Carbon::now();
                                   if($now->isSameDay($date)) {
                                      $text = "today";
                                   }else   if($date->isNextDay()) {
                                       $text = "tomorrow";
                                   }else    if($date->isYesterday()) {
                                       $text = "yesterday";

                                       }else if (!$now->isSameYear($date)) {
                                       $text = "$date->day/$date->month/$date->year";
                                   }else {
                                       $text ="$date->day/$date->month";
                                   }

                                   $class = "badge";
                                   if ($date->isBefore($now)) {
                                       $class = $class . " bg-red-200";
                                   }
                            @endphp

                            <p class="{{$class}}">
                                {{$text}}
                            </p>

                        @else
                            <p class="invisible badge">
                                {{"padding"}}
                            </p>
                        @endif
                        @if($task->badge != null)
                            @php
                                $badge = $badges->find($task->badge)
                            @endphp

                            <div

                                class="py-1  bg-{{$badge->color}}-100  badge"
                            >

                                <p class=" whitespace-nowrap">

                                    {{$badge->label}}
                                </p>
                            </div>
                        @else
                            <p class="invisible badge">
                                {{"padding"}}
                            </p>
                        @endif


                    </div>


                </div>
                <hr class="solid border">
            @endforeach


        </div>


    </div>


</x-app-layout>
