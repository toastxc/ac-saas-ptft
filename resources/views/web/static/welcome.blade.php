<x-app-layout>
    <div
        class="mt-24 flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-83.75 w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div
                class="text-[13px] leading-5 flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <h1 class="mb-1 font-medium">Welcome!</h1>
                <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">ac-saas-ptft is an open source task management tool,
                    designed to help you prioritize what matters
                </p>
                <ul class="flex flex-col mb-4 lg:mb-6">

                    <x-welcome-list child="Sign In"/>
                    <x-welcome-list child="Create Tasks"/>
                    <x-welcome-list child="Get Things Done"/>

                </ul>
                <ul class="flex gap-3 text-sm leading-normal">
                    <li>


                        <a href="{{route('register')}}" target="_blank"
                           class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                            Sign Up Now
                        </a>
                    </li>
                </ul>
            </div>
            <div
                class="text-white relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">

                <img class="md:object-cover object-fit h-full blur-xs brightness-75" src="https://www.publicdomainpictures.net/pictures/50000/velka/australian-trees.jpg" alt="">


                <p>"A man who dares to waste one hour of time has not discovered the value of life" -  Charles Darwin</p>

                <div class="absolute inset-0 flex items-center justify-center">
                    <p class="p-20 text-white text-shadow-lg/30    text-xl font-bold">"A man who dares to waste one hour of time has not discovered the value of life" - Charles Darwin</p>

                </div>

            </div>


        </main>
    </div>

</x-app-layout>
