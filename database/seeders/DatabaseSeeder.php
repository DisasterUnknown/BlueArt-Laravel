<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Image;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating costomer 
        User::factory()->create([
            'name' => 'wolf',
            'email' => 'wolf@gmail.com',
            'password' => Hash::make('wolf12345'),
            'role' => 'customer',
            'status' => 'active',
            'OAUTH' => 'application',
            'pFPdata' => 'null',
        ]);

        // Creating admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin',
            'status' => 'active',
            'OAUTH' => 'application',
            'pFPdata' => 'null',
        ]);

        // Creating seller
        User::factory()->create([
            'name' => 'fox',
            'email' => 'fox@gmail.com',
            'password' => Hash::make('fox12345'),
            'role' => 'seller',
            'status' => 'active',
            'OAUTH' => 'application',
            'pFPdata' => 'null',
        ]);

        Seller::create([
            'user_id' => 3,
            'address' => '92, Grand Street, Negombo',
            'contact' => '0775168884',
        ]);


        // =================================================================
        // =================================================================
        // =================================================================
        // Cresting Art Products
        $product1 = Product::create([
            'user_id' => 3,
            'name' => 'Bleach Metal Poster',
            'price' => 1000,
            'discount' => 10,
            'description' => "Bleach Metal Poster – A Fierce and Stunning Display of Soul Reapers Transform your space with this incredible Bleach Metal Poster, featuring vibrant artwork of your favorite characters from the iconic anime series. Printed on high-quality, durable metal, this poster brings the powerful essence of the Soul Society to life, showcasing characters like Ichigo Kurosaki, Rukia Kuchiki, and more in bold, eye-catching colors. Whether you're an avid collector or a passionate fan of the Bleach universe, this metal poster is a perfect way to show off your love for the series. Its premium material ensures it will last for years, maintaining its sharp details and striking design. Perfect for your bedroom, gaming room, or anime collection, this Bleach Metal Poster is more than just decoration—it's a tribute to the world of Soul Reapers, full of action, adventure, and unforgettable moments.",
            'category' => 'art',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product1->id,
            'content' => $this->imageToBase64('art/product1/img1.webp'),
            'level' => 'main',
        ]);
        Image::create([
            'product_id' => $product1->id,
            'content' => $this->imageToBase64('art/product1/img2.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product1->id,
            'content' => $this->imageToBase64('art/product1/img3.webp'),
            'level' => 'sub',
        ]);


        // Art 2
        $product2 = Product::create([
            'user_id' => 3,
            'name' => 'Metal Art Gojo',
            'price' => 20000,
            'discount' => 2,
            'description' => "Step into the limitless domain of style with this sleek metal wall art featuring Satoru Gojo, the most powerful sorcerer from Jujutsu Kaisen. Designed with high-precision laser cuts and a bold contrast finish, this piece captures Gojo’s iconic blindfolded stare and effortless confidence. Whether you’re building an anime-themed setup or just want that one eye-catching statement piece — this is it. ⚔️ Material: Durable stainless steel with protective matte coating 📏 Dimensions: 18 x 24 inches (custom sizes available) 🖤 Design: Infinity motif background with high contrast detailing 🛠️ Mounting: Wall-ready with secure hooks or magnet backing 💫 Aura: Minimalist, clean, and insanely cool — just like Gojo 👁 'Throughout Heaven and Earth, I alone am the honored one.'",
            'category' => 'art',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product2->id,
            'content' => $this->imageToBase64('art/product3/img1.jpg'),
            'level' => 'main',
        ]);


        // Art 3
        $product3 = Product::create([
            'user_id' => 3,
            'name' => 'Metal Art Kyojuro Rengoku',
            'price' => 30000,
            'discount' => 20,
            'description' => "🔥 Metal Art - Kyojuro Rengoku (Demon Slayer) Bring the flame and passion of the Flame Hashira into your space with this stunning Metal Art of Kyojuro Rengoku. Crafted with precision and a deep respect for the iconic Demon Slayer character, this artwork showcases Rengoku’s fierce resolve and blazing spirit in intricate metal detailing. Material: High-quality durable metal Design: Laser-cut silhouette with fine detailing and fire-themed accents Size: [Insert size here] Perfect for: Anime fans, wall décor collectors, and Demon Slayer enthusiasts Placement: Ideal for living rooms, bedrooms, game rooms, or anime-themed corners Let Rengoku’s unwavering determination and legendary final stand inspire you every day. Whether you're a collector or a fan, this piece is a must-have tribute to one of anime's most beloved heroes.",
            'category' => 'art',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product3->id,
            'content' => $this->imageToBase64('art/product4/img1.jpg'),
            'level' => 'main',
        ]);


        // Art 4
        $product4 = Product::create([
            'user_id' => 3,
            'name' => 'Bleach Metal Poster',
            'price' => 15000,
            'discount' => 20,
            'description' => "Bleach Metal Poster – A Bold Tribute to the Legendary Anime Transform your space with this eye-catching Bleach Metal Poster, a must-have for fans of the iconic anime series. Crafted from high-quality metal, this poster showcases vibrant, durable artwork that captures the essence of Bleach’s unique world. With stunning imagery of your favorite characters like Ichigo Kurosaki and Rukia Kuchiki, this poster brings the action-packed adventure to life in vivid detail. Perfect for display in your home, office, or gaming setup, this poster is more than just wall art — it’s a bold statement for any Bleach enthusiast. The sleek metal finish ensures long-lasting quality, while the vibrant colors and sharp lines bring a touch of anime-inspired excitement to your decor. Whether you’re a longtime Bleach fan or new to the series, this metal poster is the perfect way to celebrate the story of soul reapers, hollows, and unforgettable battles.",
            'category' => 'art',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product4->id,
            'content' => $this->imageToBase64('art/product5/img1.webp'),
            'level' => 'main',
        ]);
        Image::create([
            'product_id' => $product4->id,
            'content' => $this->imageToBase64('art/product5/img2.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product4->id,
            'content' => $this->imageToBase64('art/product5/img3.webp'),
            'level' => 'sub',
        ]);


        // Art 5
        $product5 = Product::create([
            'user_id' => 3,
            'name' => 'Bleach Anime Metal Poster',
            'price' => 75000,
            'discount' => 25,
            'description' => "Bleach Anime Metal Poster – A Fierce Tribute to the World of Soul Reapers Bring the epic world of Bleach to life with this striking Bleach Anime Metal Poster. Perfect for fans of the iconic anime series, this high-quality metal poster features vibrant artwork that captures the intense action, powerful characters, and unforgettable moments of the Bleach universe. Made with durable metal, this poster is built to last, ensuring that your favorite characters like Ichigo Kurosaki, Rukia Kuchiki, and the Soul Reapers will always stand out in bold, vibrant colors. The sharp, high-resolution print is designed to withstand the test of time, bringing an anime-inspired energy to your space. Whether you're displaying it in your bedroom, living room, or gaming corner, this metal poster will be a focal point in your collection. Celebrate the Bleach legacy and showcase your love for one of the most iconic anime series of all time.",
            'category' => 'art',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product5->id,
            'content' => $this->imageToBase64('art/product6/img1.webp'),
            'level' => 'main',
        ]);
        Image::create([
            'product_id' => $product5->id,
            'content' => $this->imageToBase64('art/product6/img2.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product5->id,
            'content' => $this->imageToBase64('art/product6/img3.webp'),
            'level' => 'sub',
        ]);


        // Art 6
        $product6 = Product::create([
            'user_id' => 3,
            'name' => 'Bleach: Metal Poster',
            'price' => 75000,
            'discount' => 50,
            'description' => "Bleach: Metal Poster - A Bold Tribute to the Soul Society Showcase your love for Bleach with this stunning Bleach: Metal Poster, a must-have for any true anime fan. Featuring bold, high-quality artwork printed on durable metal, this poster brings the iconic world of Soul Reapers, Hollows, and Quincies to life. The sleek, shiny finish enhances the vibrant colors and crisp details of your favorite Bleach characters, from Ichigo Kurosaki to Rukia Kuchiki, and more. Perfect for decorating your bedroom, office, or anime collection, this metal poster offers a unique way to express your passion for one of the most beloved anime series of all time. The sturdy metal construction ensures long-lasting durability, making it a timeless addition to any fan’s space. Add this Bleach: Metal Poster to your walls and immerse yourself in the thrilling world of Bleach, where every battle and story moment is immortalized in bold artwork.",
            'category' => 'art',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product6->id,
            'content' => $this->imageToBase64('art/product7/img1.webp'),
            'level' => 'main',
        ]);
        Image::create([
            'product_id' => $product6->id,
            'content' => $this->imageToBase64('art/product7/img2.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product6->id,
            'content' => $this->imageToBase64('art/product7/img3.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product6->id,
            'content' => $this->imageToBase64('art/product7/img4.webp'),
            'level' => 'sub',
        ]);


        // =================================================================
        // =================================================================
        // =================================================================
        // Collectable 1
        $product7 = Product::create([
            'user_id' => 3,
            'name' => 'Action Figure Monkey D. Luffy',
            'price' => 750000,
            'discount' => 50,
            'description' => "Set sail on the Grand Line with the fearless captain of the Straw Hat Pirates, Monkey D. Luffy! This highly detailed action figure captures Luffy in all his glory — from his signature straw hat to his iconic “Gomu Gomu no” poses. Made for collectors and One Piece fans, this figure is ready to bring Luffy’s indomitable spirit straight into your collection. 🏴‍☠️ Height: 7 inches (scale varies based on pose) 🧑‍🍳 Details: Luffy’s authentic red vest, blue shorts, and straw hat 💪 Pose Options: Includes interchangeable hands for different iconic action poses (Gomu Gomu no Pistol, Gear Second, etc.) 🔥 Material: High-quality PVC with realistic details and shading 🧳 Packaging: Premium box featuring One Piece artwork and logo 🔄 Articulation: Fully articulated for dynamic posing ⚓ I'm gonna be King of the Pirates!",
            'category' => 'collectibles',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product7->id,
            'content' => $this->imageToBase64('collectibles/product1/img1.webp'),
            'level' => 'main',
        ]);


        // Collectable 2
        $product8 = Product::create([
            'user_id' => 3,
            'name' => 'Action Figure Monkey D. Luffy',
            'price' => 620000,
            'discount' => 20,
            'description' => "Set sail on the Grand Line with the fearless captain of the Straw Hat Pirates, Monkey D. Luffy! This highly detailed action figure captures Luffy in all his glory — from his signature straw hat to his iconic “Gomu Gomu no” poses. Made for collectors and One Piece fans, this figure is ready to bring Luffy’s indomitable spirit straight into your collection. 🏴‍☠️ Height: 7 inches (scale varies based on pose) 🧑‍🍳 Details: Luffy’s authentic red vest, blue shorts, and straw hat 💪 Pose Options: Includes interchangeable hands for different iconic action poses (Gomu Gomu no Pistol, Gear Second, etc.) 🔥 Material: High-quality PVC with realistic details and shading 🧳 Packaging: Premium box featuring One Piece artwork and logo 🔄 Articulation: Fully articulated for dynamic posing ⚓ I'm gonna be King of the Pirates!",
            'category' => 'collectibles',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product8->id,
            'content' => $this->imageToBase64('collectibles/product2/img1.avif'),
            'level' => 'main',
        ]);


        // Collectable 3
        $product9 = Product::create([
            'user_id' => 3,
            'name' => 'Action Figure Hu Tao',
            'price' => 800000,
            'discount' => 20,
            'description' => "Bring playful mischief and vibrant energy to your collection with this beautifully crafted Hu Tao Action Figure! Featuring detailed craftsmanship and her iconic Spirit Soother pose, this figure perfectly captures Hu Tao's charm and liveliness. A must-have for any Genshin Impact fan or figure collector! Edit",
            'category' => 'collectibles',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product9->id,
            'content' => $this->imageToBase64('collectibles/product3/img1.webp'),
            'level' => 'main',
        ]);
        Image::create([
            'product_id' => $product9->id,
            'content' => $this->imageToBase64('collectibles/product3/img2.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product9->id,
            'content' => $this->imageToBase64('collectibles/product3/img3.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product9->id,
            'content' => $this->imageToBase64('collectibles/product3/img4.webp'),
            'level' => 'sub',
        ]);
        Image::create([
            'product_id' => $product9->id,
            'content' => $this->imageToBase64('collectibles/product3/img5.webp'),
            'level' => 'sub',
        ]);


        // Collectable 4
        $product10 = Product::create([
            'user_id' => 3,
            'name' => 'Action Figure Hu Tao',
            'price' => 100000,
            'discount' => 40,
            'description' => "Bring playful mischief and vibrant energy to your collection with this beautifully crafted Hu Tao Action Figure! Featuring detailed craftsmanship and her iconic Spirit Soother pose, this figure perfectly captures Hu Tao's charm and liveliness. A must-have for any Genshin Impact fan or figure collector!",
            'category' => 'collectibles',
            'status' => 'active',
        ]);

        Image::create([
            'product_id' => $product10->id,
            'content' => $this->imageToBase64('collectibles/product4/img1.jpeg'),
            'level' => 'main',
        ]);
    }

    private function imageToBase64(string $path): ?string
    {
        $fullPath = database_path('seeders/' . $path);

        if (!file_exists($fullPath)) {
            return 'File Not Found';
        }

        $fileData = file_get_contents($fullPath);
        $mimeType = mime_content_type($fullPath);

        return 'data:' . $mimeType . ';base64,' . base64_encode($fileData);
    }
}


