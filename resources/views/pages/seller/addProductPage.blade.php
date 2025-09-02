<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="addNewProduct">
        <!-- Page Maintainence Section -->
        <div class="hidden">
            <input type="file" accept="image/*" id="mainImgIN">
            <input type="file" accept="image/*" id="imgIN1">
            <input type="file" accept="image/*" id="imgIN2">
            <input type="file" accept="image/*" id="imgIN3">
            <input type="file" accept="image/*" id="imgIN4">

            <div id="mainImageBase64">null</div>
            <div id="image1Base64">null</div>
            <div id="image2Base64">null</div>
            <div id="image3Base64">null</div>
            <div id="image4Base64">null</div>
        </div>

        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="addNewProductPage">
            <p id="AddUpdatePageTitle" class="text-2xl font-bold text-center mt-8 mb-10">Add Product</p>

            <!-- Product Card Section -->
            <div class="flex flex-col md:flex-row justify-center">
                <div class="relative border border-white mb-5 md:mb-0 w-[90%] md:w-[20%] lg:w-[20%] xl:w-[15%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[300px] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-transform duration-300">
                    <img id="mainImgDisplayImg" src="{{asset('assets/uploadImg.webp')}}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" id="">
                    <div id="mainImgDisplayDiv" class="relative z-10 w-full h-full flex items-center justify-center">
                        <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                    </div>
                </div>

                <!-- Input Section -->
                <div class="flex justify-center flex-col bg-blue-600/5 hover:bg-blue-600/10 w-[90%] md:w-[50%] px-3 py-2 mt-10 mx-auto md:mx-0 md:ml-10 md:mt-0 rounded-xl hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Product Name:</p>
                        <input type="text" id="productNameIN" maxlength="25" class="border bg-white/5 px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] rounded-xl">
                    </div>
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Price (Rs.):</p>
                        <input type="text" id="priceIN" class="border bg-white/5 px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] rounded-xl">
                    </div>
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Discount:</p>
                        <input type="text" id="discountIN" class="border bg-white/5 px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] rounded-xl">
                    </div>
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <label class="text-xl font-semibold">Role:</label>
                        <select id="categorySelect"
                            class="border border-white border-r-10 bg-white text-white bg-opacity-5 px-1.5 py-0.5 w-[50%] md:w-[45%] lg:w-[40%] rounded-full hover:bg-opacity-10">
                            <option value="art" class="bg-white text-black">Art</option>
                            <option value="collectibles" class="bg-white text-black">Collectibles</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Product Add Discription section -->
            <div class="mx-[10%] mt-10 pt-10">
                <p class="text-2xl font-bold text-center md:text-left mt-8 mb-10">Description</p>
                <div class="flex justify-center">
                    <textarea placeholder="Enter product description..." maxlength="1000"
                        id="descriptionIN" class="border bg-white/5 w-[90%] aspect-[2/1] md:aspect-[5/1] px-4 py-4 rounded-xl"></textarea>
                </div>
            </div>

            <!-- Product Add Adition Images Section -->
            <div class="mx-[10%] mt-10 pt-10">
                <p class="text-2xl font-bold text-center mt-10 mb-10 md:mb-20">Product Images</p>
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg1" src="{{asset('assets/uploadImg.webp')}}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" id="">
                        <div id="imgDisplayDiv1" class="relative z-10 w-full h-full flex items-center justify-center">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg2" src="{{asset('assets/uploadImg.webp')}}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" id="">
                        <div id="imgDisplayDiv2" class="relative z-10 w-full h-full flex items-center justify-center">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg3" src="{{asset('assets/uploadImg.webp')}}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" id="">
                        <div id="imgDisplayDiv3" class="relative z-10 w-full h-full flex items-center justify-center">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg4" src="{{asset('assets/uploadImg.webp')}}" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl" id="">
                        <div id="imgDisplayDiv4" class="relative z-10 w-full h-full flex items-center justify-center">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Add Product Btn -->
            <div class="flex flex-col items-center justify-center pt-20">
                <p id="errorDisplayMsg" class="mb-1 text-center"></p>
                <button type="button" id="addProductBtn" class="border text-3xl font-bold py-4 px-4 w-[220px] rounded-xl hover:scale-101 hover:bg-green-600/10 hover:shadow-[0_0_15px_2px_rgba(100,255,0,0.8)] transition-colors duration-500">Submit</button>
            </div>
        </div>

        <!-- Backend replay section -->
        <div class="hidden" id="compleateResponce">null1</div>
        <div class="hidden" id="responce">null</div>
    </div>
</x-app-layout>