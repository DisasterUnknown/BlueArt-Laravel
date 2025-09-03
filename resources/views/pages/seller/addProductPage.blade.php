<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="addNewProduct" x-data="productAlpine({
            oldMain: '{{ old('mainImageBase64') }}',
            oldImg1: '{{ old('image1Base64') }}',
            oldImg2: '{{ old('image2Base64') }}',
            oldImg3: '{{ old('image3Base64') }}',
            oldImg4: '{{ old('image4Base64') }}'
        })" x-init="init()">

        <!-- Page Maintainence Section -->
        <div class="hidden">
            <input type="file" accept="image/*" id="mainImgIN" x-ref="mainImgIN" @change="onFileChange($event, 'main')">
            <input type="file" accept="image/*" id="imgIN1" x-ref="imgIN1" @change="onFileChange($event, 'img1')">
            <input type="file" accept="image/*" id="imgIN2" x-ref="imgIN2" @change="onFileChange($event, 'img2')">
            <input type="file" accept="image/*" id="imgIN3" x-ref="imgIN3" @change="onFileChange($event, 'img3')">
            <input type="file" accept="image/*" id="imgIN4" x-ref="imgIN4" @change="onFileChange($event, 'img4')">
        </div>

        <form action="{{ route('add-product') }}" method="POST" enctype="multipart/form-data" class="space-y-4 min-h-[calc(100vh-92px)]" id="addNewProductPage">
            @csrf

            <!-- Form Submit Image Data -->
            <div class="hidden">
                <input name="mainImageBase64" id="mainImageBase64" x-ref="mainImageBase64" value="{{ old('mainImageBase64') }}">
                <input name="image1Base64" id="image1Base64" x-ref="image1Base64" value="{{ old('image1Base64') }}">
                <input name="image2Base64" id="image2Base64" x-ref="image2Base64" value="{{ old('image2Base64') }}">
                <input name="image3Base64" id="image3Base64" x-ref="image3Base64" value="{{ old('image3Base64') }}">
                <input name="image4Base64" id="image4Base64" x-ref="image4Base64" value="{{ old('image4Base64') }}">
            </div>

            <p id="AddUpdatePageTitle" class="text-2xl font-bold text-center mt-15 mb-20">Add Product</p>

            <!-- Product Card Section -->
            <div class="flex flex-col md:flex-row justify-center">
                <div class="relative border border-white mb-5 md:mb-0 w-[90%] md:w-[20%] lg:w-[20%] xl:w-[15%] aspect-w-16 h-[300px] md:h-[250px] xl:h-[300px] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-transform duration-300">
                    <img id="mainImgDisplayImg"
                        :src="previews.main || '{{ asset('assets/uploadImg.webp') }}'"
                        alt="Background"
                        value="{{ old('mainImageBase64') }}"
                        class="absolute w-full h-full object-cover opacity-40 rounded-xl">
                    <div id="mainImgDisplayDiv" class="relative z-10 w-full h-full flex items-center justify-center" @click="$refs.mainImgIN.click()">
                        <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                    </div>
                </div>

                <!-- Input Section -->
                <div class="flex justify-center flex-col bg-blue-600/5 hover:bg-blue-600/10 w-[90%] md:w-[50%] px-3 py-2 mt-10 mx-auto md:mx-0 md:ml-10 md:mt-0 rounded-xl hover:scale-101 hover:shadow-[0_0_15px_2px_rgba(100,100,255,0.8)] transition-colors duration-500">
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Product Name:</p>
                        <input type="text" name="name" id="productNameIN" maxlength="25" value="{{ old('name') }}" class="border bg-white/5 px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] rounded-xl">
                    </div>
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Price (Rs.):</p>
                        <input type="text" name="price" id="priceIN" @input="onPriceInput($event)" value="{{ old('price') }}" class="border bg-white/5 px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] rounded-xl">
                    </div>
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <p class="text-xl font-semibold">Discount:</p>
                        <input type="text" name="discount" id="discountIN" @input="onDiscountInput($event)" value="{{ old('discount') }}" class="border bg-white/5 px-5 md:px-5  w-[50%] md:w-[45%] lg:w-[40%] rounded-xl">
                    </div>
                    <div class="flex justify-between mx-2 md:mx-[10%] my-3">
                        <label class="text-xl font-semibold">Role:</label>
                        <select id="categorySelect" name="category"
                            class="border border-white border-r-10 bg-white text-white bg-opacity-5 px-1.5 py-0.5 w-[50%] md:w-[45%] lg:w-[40%] rounded-full hover:bg-opacity-10">
                            <option value="art" {{ old('category') == 'art' ? 'selected' : '' }} class="bg-white text-black">Art</option>
                            <option value="collectibles" {{ old('category') == 'collectibles' ? 'selected' : '' }} class="bg-white text-black">Collectibles</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Product Add Discription section -->
            <div class="mx-[10%] mt-10 pt-10">
                <p class="text-2xl font-bold text-center md:text-left mt-8 mb-10">Description</p>
                <div class="flex justify-center">
                    <textarea name="description" placeholder="Enter product description..." maxlength="1000"
                        id="descriptionIN" class="border bg-white/5 w-[90%] aspect-[2/1] md:aspect-[5/1] px-4 py-4 rounded-xl">{{ old('description') }}</textarea>
                </div>
            </div>

            <!-- Product Add Adition Images Section -->
            <div class="mx-[10%] mt-10 pt-10">
                <p class="text-2xl font-bold text-center mt-10 mb-10 md:mb-20">Product Images</p>
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg1" :src="previews.img1 || '{{ asset('assets/uploadImg.webp') }}'" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl">
                        <div id="imgDisplayDiv1" class="relative z-10 w-full h-full flex items-center justify-center" @click="$refs.imgIN1.click()">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg2" :src="previews.img2 || '{{ asset('assets/uploadImg.webp') }}'" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl">
                        <div id="imgDisplayDiv2" class="relative z-10 w-full h-full flex items-center justify-center" @click="$refs.imgIN2.click()">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg3" :src="previews.img3 || '{{ asset('assets/uploadImg.webp') }}'" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl">
                        <div id="imgDisplayDiv3" class="relative z-10 w-full h-full flex items-center justify-center" @click="$refs.imgIN3.click()">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                    <div class="relative border mb-5 md:mb-0 h-[220px] md:h-[200px] xl:h-[225px] w-[55%] md:w-[20%] lg:w-[20%] xl:w-[15%] rounded-2xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                        <img id="imgDisplayImg4" :src="previews.img4 || '{{ asset('assets/uploadImg.webp') }}'" alt="Background" class="absolute w-full h-full object-cover opacity-40 rounded-xl">
                        <div id="imgDisplayDiv4" class="relative z-10 w-full h-full flex items-center justify-center" @click="$refs.imgIN4.click()">
                            <span class="font-bold text-white material-symbols-outlined">add_photo_alternate</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Add Product Btn -->
            <div class="flex flex-col items-center justify-center pt-20">
                @if(session('error'))
                <p class="mb-1 text-center text-red-600 font-bold">{{ session('error') }}</p>
                @endif

                <button type="submit" id="addProductBtn" class="border text-3xl font-bold py-4 px-4 w-[220px] rounded-xl hover:scale-101 hover:bg-green-600/10 hover:shadow-[0_0_15px_2px_rgba(100,255,0,0.8)] transition-colors duration-500">Submit</button>
            </div>
        </form>

        <!-- Backend replay section -->
        <div class="hidden" id="compleateResponce" x-ref="compleateResponce">null</div>
        <div class="hidden" id="responce">null</div>
    </div>
</x-app-layout>