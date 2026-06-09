<x-app-layout>
    <br>
    <div class="flex justify-center items-center">


        <table class="divide-y-2 divide-zinc-200 bg-zinc-50 drop-shadow-xl rounded-sm ">
            <thead class="sticky top-0 bg-zinc-700 ltr:text-left rtl:text-right font-bold">
            <tr class="*:font-medium *:text-white">
                <th class="px-1 py-2 whitespace-nowrap">Status</th>
                <th class="px-3 py-2 whitespace-nowrap">Task</th>
                <th class="px-3 py-2 whitespace-nowrap">Badges</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-zinc-200">
            @foreach($tasks as $task)

                <tr class="*:text-zinc-900 *:first:font-medium hover:bg-white">

                    <td class="w-full  col-span-2 justify-center justify-self-center mx-auto  text-white text-center text-lg">


                        <form action="{{ route('tasks.update',$task->id,  ) }}"
                              method="post"
                              class="grid grid-cols-3 gap-2 w-full">
                            @csrf
                            @method('patch')


                        <label for="completed" class="inline-flex items-center gap-3 text-black">
                            <input  type="checkbox" class="size-8 border-2 border-black bg-white shadow-[2px_2px_0_0] shadow-black checked:bg-black focus:ring-2 focus:ring-black" value="completed" id="completed"
                                   onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }} name="completed"
                            >
                        </label>
                                <input  class="invisible w-0" type="text" value="checkbox" name="checkbox">

                        </form>
                    </td>
                    <td class="px-3 py-1 whitespace-nowrap flex flex-col min-w-1/3">
                        <span class="">{{ $task->label }}</span>
                        <span class="text-sm text-zinc-500">{{ $task->description }}</span>
                    </td>
                    <td class="">

                    </td>


                </tr>
            @endforeach

            </tbody>

            <tfoot>
            <tr>

            </tr>
            </tfoot>
        </table>
{{--        @foreach($tasks as $task)--}}
{{--            {{$task->label}}--}}

{{--        @endforeach--}}
    </div>

</x-app-layout>
