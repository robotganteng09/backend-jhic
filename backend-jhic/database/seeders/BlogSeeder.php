<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'judul' => 'Blog Pertama',
            'konten' => 'Ini adalah konten blog pertama',
            'penulis' => 'Admin',
        ]);

        Blog::create([
            'judul' => 'Blog Kedua',
            'konten' => 'Ini adalah konten blog kedua',
            'penulis' => 'Admin',
        ]);

        Blog::create([
            'judul' => 'Blog Ketiga',
            'konten' => 'Ini adalah konten blog ketiga',
            'penulis' => 'Admin',
        ]);
    }
}
