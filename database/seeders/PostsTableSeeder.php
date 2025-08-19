<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1 = Category::create([
            'name' => 'news'
        ]);
        $category2 = Category::create([
            'name' => 'marketing'
        ]);
        $category3 = Category::create([
            'name' => 'partnership'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);
        $tag2 = Tag::create([
            'name' => 'customers'
        ]);
        $tag3 = Tag::create([
            'name' => 'create'
        ]);
        $author1 = User::create([
            'name' => 'hosamm',
            'email' => 'hosamm@gmail.com',
            'password' => Hash::make('password')
        ]);
        $author2 = User::create([
            'name' => 'hosam1',
            'email' => 'hosam1@gmail.com',
            'password' => Hash::make('password')
        ]);



        $post1 = $author1->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);
        $post2 = $author2->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);
        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);
        $post4 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category1->id,
            'image' => 'posts/4.jpg'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag2->id, $tag3->id]);
    }
}
