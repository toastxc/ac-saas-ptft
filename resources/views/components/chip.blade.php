@if($color == "danger")
    <span
        class="inline-flex items-center justify-center rounded-full bg-red-100 px-2.5 py-0.5 text-red-700">
            <p class="text-sm whitespace-nowrap">{{$message}}</p>
</span>
@elseif($color == "warning")
    <span
        class="inline-flex items-center justify-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-yellow-700">
            <p class="text-sm whitespace-nowrap">{{$message}}</p>
</span>
@elseif($color == "success")
    <span
        class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
            <p class="text-sm whitespace-nowrap">{{$message}}</p>
</span>
@elseif($color == "info")
    <span
        class="inline-flex items-center justify-center rounded-full bg-sky-100 px-2.5 py-0.5 text-sky-700">
            <p class="text-sm whitespace-nowrap">{{$message}}</p>
</span>
@endif


