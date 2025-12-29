<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Bluetooth Headphones',
                'description' => 'Premium noise-cancelling wireless headphones with 30-hour battery life and superior sound quality.',
                'price' => 89.99,
                'image' => 'headphones.jpg',
                'stock' => 50,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Smart Watch Pro',
                'description' => 'Advanced fitness tracker with heart rate monitor, GPS, and smartphone notifications.',
                'price' => 199.99,
                'image' => 'smartwatch.jpg',
                'stock' => 35,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Laptop Stand Aluminum',
                'description' => 'Ergonomic laptop stand made from premium aluminum with adjustable height settings.',
                'price' => 45.99,
                'image' => 'laptop-stand.jpg',
                'stock' => 100,
                'category' => 'Accessories'
            ],
            [
                'name' => 'Mechanical Keyboard RGB',
                'description' => 'Gaming mechanical keyboard with customizable RGB lighting and tactile switches.',
                'price' => 129.99,
                'image' => 'keyboard.jpg',
                'stock' => 60,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with precision tracking and long battery life.',
                'price' => 29.99,
                'image' => 'mouse.jpg',
                'stock' => 150,
                'category' => 'Electronics'
            ],
            [
                'name' => 'USB-C Hub 7-in-1',
                'description' => 'Multi-port USB-C hub with HDMI, USB 3.0, SD card reader, and charging port.',
                'price' => 39.99,
                'image' => 'usb-hub.jpg',
                'stock' => 80,
                'category' => 'Accessories'
            ],
            [
                'name' => 'Portable Power Bank 20000mAh',
                'description' => 'High-capacity portable charger with fast charging support for multiple devices.',
                'price' => 49.99,
                'image' => 'powerbank.jpg',
                'stock' => 120,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Webcam HD 1080p',
                'description' => 'Professional HD webcam with auto-focus and built-in microphone for video calls.',
                'price' => 69.99,
                'image' => 'webcam.jpg',
                'stock' => 45,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Phone Case Premium Leather',
                'description' => 'Genuine leather phone case with card slots and magnetic closure.',
                'price' => 24.99,
                'image' => 'phone-case.jpg',
                'stock' => 200,
                'category' => 'Accessories'
            ],
            [
                'name' => 'Bluetooth Speaker Waterproof',
                'description' => 'Portable waterproof Bluetooth speaker with 360-degree sound and 12-hour playtime.',
                'price' => 59.99,
                'image' => 'speaker.jpg',
                'stock' => 75,
                'category' => 'Electronics'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
