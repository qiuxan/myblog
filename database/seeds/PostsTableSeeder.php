<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
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
        //

        $author=User::create([
            'name'=>'xianq',
            'email'=>'qiuxam@126.com',
            'password'=>Hash::make('2302509'),
        ]);

        $author2=User::create([
            'name'=>'xianqiu',
            'email'=>'qiuxam@12.com',
            'password'=>Hash::make('2302509'),
        ]);

        $category1=Category::create([
            'name'=>'News'
        ]);

        $category2=Category::create([
            'name'=>'Design'
        ]);

        $category3=Category::create([
            'name'=>'Partnership'
        ]);

        $category4=Category::create([
            'name'=>'Hiring'
        ]);

        $post1=$author->posts()->create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ',
            'category_id'=>$category1->id,
            'image'=>'posts/1.jpg'

        ]);

        $post2=$author2->posts()->create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ',
            'category_id'=>$category2->id,
            'image'=>'posts/2.jpg'


        ]);

        $post3=$author->posts()->create([
            'title'=>'Best practices for minimalist design with example',
            'description'=>'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ',
            'category_id'=>$category3->id,
            'image'=>'posts/3.jpg'


        ]);

        $post4=$author2->posts()->create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ',
            'category_id'=>$category2->id,
            'image'=>'posts/4.jpg'


        ]);

        $tag1=Tag::create([
            'name'=>'Record'
        ]);

        $tag2=Tag::create([
            'name'=>'Job'
        ]);

        $tag3=Tag::create([
            'name'=>'Design'
        ]);

        $tag4=Tag::create([
            'name'=>'Offer'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);

        $post3->tags()->attach([$tag1->id, $tag4->id]);

        $post4->tags()->attach([$tag1->id, $tag3->id]);

    }
}
