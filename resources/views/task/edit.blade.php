<x-app-layout>
    <br>

    <br>
    <div class="flex justify-center items-center">

        <div class="section py-2 px-6 w-md bg-sky-100">


            <br>


            @foreach($errors->all() as $error)
                <div class="border-2 bg-red-100 p-2 text-red-900 shadow-[4px_4px_0_0] shadow-black">

                    <i class="fa-solid fa-triangle-exclamation"></i>{{$error}}
                </div>
            @endforeach

            <form method="POST" action="{{ route('tasks.update',$task->id) }}">
                @csrf
                @method('patch')

                <div class="flex flex-col gap-3">


                    <label for="label">
                        <span class="text-sm font-bold"> Label </span>
                        <input type="text" id="label" name="label" class="text-input"
                               value="{{$task->label}}"
                               placeholder="{{$task->label}}">
                    </label>


                    <label for="description">
                        <span class="text-sm font-bold"> Description </span>
                        <input type="text" id="description" name="description" class="text-input"
                               value="{{$task->description}}"
                               placeholder="{{$task->description}}">
                    </label>


                    <label for="completed">
                        <span class="text-sm font-bold"> Completed </span>

                        <div class="w-full">
                            <input type="checkbox"
                                   class="checkbx"
                                   value="completed" id="completed"

                                   {{ $task->completed ? 'checked' : '' }} name="completed"
                            >
                        </div>

                    </label>


                    <label for="badge">
                        <span class="text-sm font-bold"> Badge </span>

                        <select name="badge" id="badge" class="text-input">

                            <option selected value="">None</option>
                            @foreach($badges as $badge)
                                @if($task->badge == $badge->id)
                                    <option value="{{$badge->id}}" selected="selected">{{$badge->label}}     </option>
                                @else
                                    <option value="{{$badge->id}}">{{$badge->label}}     </option>
                                @endif

                            @endforeach

                        </select>
                    </label>

                    <label for="due">
                        <span class="text-sm font-bold"> Due </span>

                        <input type="date" id="due" name="due" class="text-input" value="{{$task->due}}">
                    </label>


                    <div class="flex gap-4">
                        <button
                            class="form-button" type="submit">
                            <i class="fa-solid fa-square text-green-500"></i>
                            Save
                        </button>

            </form>

            <form action="{{ route('tasks.destroy',$task->id) }}"
                  method="post"
                  class="">
                @csrf
                @method('delete')

                <button
                    class="form-button" type="submit">
                    <i class="fa-solid fa-square text-red-500"></i>
                    Delete
                </button>
            </form>


            <a href="{{route('tasks.index')}}"
            >

                <button
                    class="form-button" type="button">
                    <i class="fa-solid fa-square text-black"></i>
                    Cancel
                </button>
            </a>


        </div>
    </div>

    <br>


    </div>


    </div>


</x-app-layout>


