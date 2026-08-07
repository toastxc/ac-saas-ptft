<x-app-layout>
    <br>

    <br>
    <div class="flex justify-center items-center">

        <div class="section py-2 px-6 w-md bg-{{$badge->color}}-100 transition-colors">


            <br>


            @foreach($errors->all() as $error)
                <div class="border-2 bg-red-100 p-2 text-red-900 shadow-[4px_4px_0_0] shadow-black">

                    <i class="fa-solid fa-triangle-exclamation"></i>{{$error}}
                </div>
                <br>
            @endforeach


            <form method="POST" action="{{ route('badges.update',$badge->id) }}">
                @csrf
                @method('patch')

                <div class="flex flex-col gap-3">


                    <label for="label">
                        <span class="text-sm font-bold"> Label </span>
                        <input type="text" id="label" name="label" class="text-input"
                               value="{{$badge->label}}"
                               placeholder="{{$badge->label}}">
                    </label>


                    <label for="color" class="text-black">
                        <span class="text-sm font-bold"> Color </span>
                        <select
                            name="color"
                            id="{{$badge->id}}-color"
                            class="text-input"

                        >

                            @php
                                $colors = ['red', 'orange', 'amber', 'yellow', 'lime', 'green', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose']
                            @endphp
                            @foreach($colors as $color)
                                @if($badge->color == $color)
                                    <option value="{{$color}}" selected="selected">{{$color}}</option>
                                @else
                                    <option value="{{$color}}">{{$color}}</option>
                                @endif

                            @endforeach


                        </select>
                    </label>


                    <div class="flex gap-4">
                        <button
                            class="form-button" type="submit">
                            <i class="fa-solid fa-square text-green-500"></i>
                            Save
                        </button>

            </form>

            <form action="{{ route('badges.destroy',$badge->id) }}"
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


            <a href="{{route('badges.index')}}"
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


