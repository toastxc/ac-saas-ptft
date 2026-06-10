<x-app-layout>
    <br>
    <div class="flex justify-center items-center">

        <div class="divide-y-2 divide-zinc-200 bg-zinc-50 drop-shadow-xl rounded-sm p-2">
            <form method="POST" class="w-full max-w-sm"
                  action="{{ route('tasks.update',$task->id) }}">
                @csrf
                @method('patch')

                <x-input-label for="label" :value="__('Label')"/>
                <x-text-input id="label" class="block mt-1 w-full" type="text"
                              name="label" value="{{$task->label}}"
                              autofocus autocomplete="label"
                              placeholder="{{$task->label}}"/>
                <x-input-error :messages="$errors->get('label')" class="mt-2"/>

                <x-input-label for="description" :value="__('Description')"/>
                <x-text-input id="description" class="block mt-1 w-full" type="text"
                              name="description" value="{{$task->description}}"
                              autofocus autocomplete="description"
                              placeholder="{{$task->description}}"/>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>

                <x-input-label for="completed" :value="__('Completed')"/>
                <input type="checkbox"
                       class="size-8 border-2 border-black bg-white shadow-[2px_2px_0_0] shadow-black checked:bg-black focus:ring-2 focus:ring-black"
                       value="completed" id="completed"

                       {{ $task->completed ? 'checked' : '' }} name="completed"
                >
                <x-input-error :messages="$errors->get('completed')" class="mt-2"/>

                <br>
                <label for="Headline">
                    <span class="text-sm font-medium text-gray-700"> Badge </span>

                    <select name="badge" id="badge" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">
                        <option value="">None</option>
                        @foreach($badges as $badge)
                            @if($task->badge == $badge->id)
                                <option value="{{$badge->id}}" selected="selected">{{$badge->label}}     </option>
                            @else
                                <option value="{{$badge->id}}">{{$badge->label}}     </option>
                            @endif

                        @endforeach

                    </select>
                </label>

                <div class="my-3">

                    <button
                        class="hover:text-white hover:border-white hover:bg-gray-500 transition text-gray-500 border-2 p-2 text-center rounded"
                        type="submit">
                        Save
                    </button>
                    <a href="{{route('tasks.index')}}"
                    >

                        <button type="button"
                                class="hover:text-white hover:border-white hover:bg-gray-500 transition text-gray-500 border-2 p-2 text-center rounded">
                            Cancel
                        </button>
                    </a>




                </div>

            </form>
            <a
            >

            </a>


            <form action="{{ route('tasks.destroy',$task->id) }}"
                  method="post"
                  class="">
                @csrf
                @method('delete')

                <button type="submit"
                        class="hover:text-white hover:border-white hover:bg-red-500 transition text-red-500 border-2 p-2 text-center rounded">
                    Permanently Delete
                </button>



            </form>


        </div>
    </div>

</x-app-layout>

