<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page Not Found') }}
        </h2>
    </x-slot>

    <div class="space-y-4" id="aboutUs">
        <div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewUsersPage">
            <!-- Topic Section -->
            <p class="text-3xl font-bold text-center mt-20 md:mt-10 mb-10">About BlueArt</p>
            <div class="mb-10">
                <p class="font-semibold text-center mx-[5%] md:mx-[10%] mb-20 mp-20">
                    BlueArt - Your One-Stop Destination for Anime Art & Collectibles, Delivered with Passion, precision, and
                    love. From rare figures to original fan art, we bring the magic of anime into your home with authenticity,
                    care, and artistic excellence.
                </p>
            </div>

            <!-- Who We Are -->
            <div class="flex flex-col md:flex-row items-center justify-center pt-10 pb-20 px-10 md:px-0 bg-black/80 rounded-xl">
                <div class="w-full md:w-1/3 flex justify-center">
                    <img src="{{ asset('assets/art1.jpg') }}" alt="Who we are" class="w-[55%] h-auto rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">
                </div>
                <div class="w-full md:w-2/3 mt-20 md:mt-0 md:ml-1">
                    <p class="text-2xl font-bold text-blue-400 mb-5">Who We Are</p>
                    <p class="mx-1 md:mx-0 text-justify md:text-left md:w-[80%]">
                        At BlueArt, we're more than just a marketplace — we're a passionate community of anime lovers, artists,
                        and collectors. Born from a love for Japanese animation and creative expression, our mission is to bring
                        the vibrant world of anime into everyday life. Whether you're hunting for rare collectibles, stunning
                        fan-made artwork, or the perfect addition to your personal shrine, we curate every piece with care and
                        authenticity. <br><br> We support independent creators, celebrate unique fandoms, and deliver top-tier quality
                        with every order. With BlueArt, you don't just collect — you connect, express, and celebrate what you
                        love.
                    </p>
                </div>
            </div>

            <!-- Our Mission -->
            <div>
                <p class="text-2xl text-center font-bold mt-10">Our Mission</p>
                <p class="font-semibold text-center mx-[10%] md:mx-[10%] mt-5 mb-20">
                    At BlueArt, we aim to connect anime fans through unique art and collectibles. We strive to support
                    independent artists and bring the magic of anime into your life with quality, authenticity, and passion.
                    Every item we offer is carefully curated to celebrate the fandom and inspire personal expression.
                </p>
            </div>

            <!-- Why Choose BlueArt -->
            <div class="flex flex-col items-center justify-center bg-black/80 py-10 rounded-xl">
                <p class="text-2xl text-center font-bold mt-5">Why Choose BlueArt?</p>
                <div class="flex flex-col md:flex-row flex-wrap items-center justify-center md:w-[80%] mt-8">
                    <p class="border w-[90%] md:w-[30%] px-1 text-center py-6 mx-4 my-5 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">Unique creations for every fan</p>
                    <p class="border w-[90%] md:w-[30%] px-1 text-center py-6 mx-4 my-5 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">A curated collection you'll love</p>
                    <p class="border w-[90%] md:w-[30%] px-1 text-center py-6 mx-4 my-5 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">Quick delivery, no wait</p>
                    <p class="border w-[90%] md:w-[30%] px-1 text-center py-6 mx-4 my-5 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">Exclusive pieces you can't find elsewhere</p>
                    <p class="border w-[90%] md:w-[30%] px-1 text-center py-6 mx-4 my-5 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">Premium quality, every time</p>
                    <p class="border w-[90%] md:w-[30%] px-1 text-center py-6 mx-4 my-5 rounded-xl hover:scale-105 hover:shadow-[0_0_15px_2px_rgba(255,255,255,0.8)] transition-transform duration-300">Amazing art that surprises</p>
                </div>
            </div>

            <!-- Join Us -->
            <div class="flex flex-col items-center justify-center py-10">
                <p class="text-2xl text-center font-bold mt-5 text-blue-300">Join Us as a Service Provider</p>
                <p class="font-semibold text-center mx-[10%] md:mx-[10%] mt-5 mb-10">
                    Are you an artist or creator? Share your unique products with a passionate community. Join BlueArt
                    today and start selling your anime art, collectibles, and more. We offer a platform to showcase your
                    work and reach fans who truly appreciate it.
                </p>
                <a href="{{ url('/auth/register') }}" class="border px-5 py-4 w-[50%] md:w-[20%] text-center font-bold rounded-xl hover:scale-105 hover:bg-blue-200 hover:text-black hover:shadow-[0_0_15px_2px_rgba(0,255,255,0.8)] transition-transform duration-300">Register Now</a>
            </div>
        </div>

        <!-- Backend replay section -->
        <div class="hidden" id="compleateResponce">null1</div>
        <div class="hidden" id="responce">null</div>
    </div>
</x-app-layout>