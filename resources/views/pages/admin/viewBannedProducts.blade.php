<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="viewBannedProducts">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewBannedProducts">
            <p class="text-2xl font-bold text-center mt-8 mb-10">Banned Products</p>
            <div id="BanProducts" class="flex flex-row flex-wrap justify-evenly mt-8">
                <!-- Page Data -->
            </div>
        </div>

        <!-- Backend replay section -->
        <div class="hidden" id="compleateResponce">null1</div>
        <div class="hidden" id="responce">null</div>
    </div>
</x-app-layout>