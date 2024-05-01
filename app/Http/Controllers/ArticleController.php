<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Arg;

class ArticleController extends Controller
{

    public function index()
    {
        return Article::latest()->get();
        // return Article::count();
        // return Article::where('is_published', true)->count();
        // return Article::pluck('user_id')->countBy();
        // return Article::max('min_to_read');
        // return Article::whereBetween('user_id', [5, 9])->max('min_to_read');
        // return Article::pluck('user_id')->mode(); // user_id yg paling banyak articlenya
        // return Article::where('is_published', true)->pluck('user_id')->mode(); // yg paling banyak article dan publishnya true
        // return Article::inRandomOrder()->first();
        // return Article::inRandomOrder()->value('title');
        // return Article::sum('min_to_read');

        // $collection = collect([
        //     ['name' => 'Alex', 'age' => 27],
        //     ['name' => 'Dary', 'age' => 27],
        //     ['name' => 'Jhon', 'age' => 43],
        //     ['name' => 'Mike', 'age' => 22],
        // ]);

        // return $collection->where('age', '<', 22);
        // return Article::where('is_published', true)->get();
        // return Article::where('is_published', true)->where('min_to_read', '>=', 3)->get();

        // return Article::where(function ($query) {
        //     return $query->where('is_published', true);
        // })->get();

        // $collection = collect([
        //     ['name' => 'dary', 'age' => 27],
        //     ['name' => 'Dary', 'age' => 27],
        //     ['name' => 'Jhon', 'age' => 43],
        //     ['name' => 'Mike', 'age' => 22],
        // ]);
        // whereStrict()
        // return $collection->whereStrict('name', 'dary');

        // whereBetween()
        // return Article::whereBetween('min_to_read', [4, 8])->get();
        // return Article::whereBetween(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), ['2024-04-01', '2024-04-30'])
        //     ->where('min_to_read', '>=', 9)
        //     ->get(); {->count() }

        // return Article::where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), '>=', '2024-04-01')
        //     ->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), '<=', '2024-04-30')
        //     ->where('min_to_read', '>=', 8)
        //     ->get(); {->count() }

        // whereNull() and ehreNotNull()

        // return Article::where('min_to_read',  9)->update(['excerpt' => null]);
        // return Article::whereNull('excerpt')->get();
        // return Article::whereNull('excerpt')->get(['user_id', 'title', 'excerpt', 'min_to_read']);
        // return Article::whereNull('excerpt')->count();

        // whereNotNull() method
        // $collection = collect([
        //     ['name' => 'test not null'],
        //     ['name' => null]
        // ]);
        // return $collection->whereNull('name');
        // return $collection->whereNotNull('name');

        // return Article::whereNull('excerpt')->get();
        // return Article::whereNull('excerpt')->count();
        // return Article::whereNotNull('excerpt')->get();
        // return Article::whereNotNull('excerpt')->count();

        // Eloquent Date Method
        // return Article::all();
        // return Article::latest()->get();
        // return Article::all(['user_id', 'title', 'excerpt', 'min_to_read', 'created_at']);

        // return Article::whereDate(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), '2024-05-01')
        //     ->get();

        // whereDay()
        // return Article::whereDay('created_at', 30)->get();
        // return Article::whereDay('created_at', 30)->count();

        // whereMonth

        // return Article::whereMonth('created_at', 5)->get();
        // return Article::whereMonth('created_at', 5)->count();

        // whereYear
        // return Article::whereYear('created_at', 2023)->get();
        // return Article::whereYear('created_at', 2023)->count();

        // whereTime()
        // return Article::whereTime('created_at', '>=', ' 11:04:22')->get();
        // return Article::whereTime('created_at', '>=', ' 11:04:22')->count();

        // filter() and reject()
        // $collection = collect(([1, 2, 3, 4, 5, '', null, false, 0, []]));

        // return $collection->filter(function ($value, $key) {
        //     // return $item !== null;
        //     return $value > 2 && $key < 9;
        // });

        // $articles = Article::where('is_published', true)->get();
        // $articles = Article::where('is_published', true)->get(['user_id', 'title', 'min_to_read']);

        // return $articles->filter(function ($value, $key) {
        //     return $value->min_to_read > 8;
        // });

        // reject and filter are the opposite result
        // reject()
        // $collection = collect(([1, 2, 3, 4, 5, '', null, false, 0, []]));

        // return $collection->reject(function ($value, $key) {
        //     return empty($value);
        // });

        // return $collection->filter(function ($value, $key) {
        //     return empty($value);
        // });

        // contains()
        // return collect(([1, 2, 3, 4, 5, '', null, false, 0, []]))->contains(6);
        // $collection = collect(([1, 2, 3, 4, 5, '', null, false, 0, []]));
        // return $collection->contains(12); // will return true if element exist

        // except()
        // $collection = collect([
        //     'name' => 'benzema',
        //     'age' => 35,
        //     'club' => 'Al nasser',
        // ]);

        // return $collection->except('age'); // query tersebut untuk tidak menampilkan field age dan hanya menampilkan nama and age

        // only()
        // return $collection->only('name'); // query tersebut hanya menampilkan field yg dimasukan kedalam method tersebut

        // $article = Article::whereDate(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), '2023-05-01')
        //     ->get();
        // return $article;

        // return $article->only('title');

        // map() and mapWithKeys()
        // $club = 'Al Nasser';
        // $collection = collect([
        //     [
        //         'name' => 'Karim',
        //         // 'club' => $club,
        //         'position' => 'forward',
        //     ],
        //     [
        //         'name' => 'Benzema',
        //         // 'club' => $club,
        //         'position' => 'forward',
        //     ],
        //     [
        //         'name' => 'Karim Benzema',
        //         // 'club' => $club,
        //         'position' => 'forward',
        //     ],
        // ]);

        // return $collection->map(function ($value, $key) {
        //     $value['club'] = 'Al Nasser';
        //     // return $value;
        //     // return $value['name'];
        //     return ['name' => $value['name'], 'postion' => $value['position'], 'club' => $value['club']];
        // });

        //  Article::with('user')->get();
        // return Article::with('user')->get()->mapWithKeys(function ($value, $key) {
        //     return [
        //         $value->id => [
        //             'title' => $value->title,
        //             'user_name' => $value->user->name,
        //             'user_email' => $value->user->email,
        //             'created_at' => $value->created_at->format('m/d/Y'),
        //         ]
        //     ];
        // });

        // pluck() and keyBy()
        // return Article::pluck('title');

        // keyBy()
        // $articles = Article::with('user')->get('user_id');
        // return $articles;
        // $articles = Article::with('user')->get();
        // $articleById = $articles->keyBy('id')->map(function ($article) {
        //     return ['id' => $article->id, 'title' => $article->title, 'user' => $article->user];
        // });
        // return $articleById;
        // query below same as above
        // return Article::with('user')
        //     ->get()
        //     ->keyBy('id')->map(function ($article) {
        //         return [
        //             'id' => $article->id,
        //             'title' => $article->title,
        //             'user' => $article->user
        //         ];
        //     });

        // push(), put(), forget(), pop(), shift()
        // $collection = collect(([1, 2, 3, 4, 5, '', null, false, 0, [], 'dev']));

        // push() to add elemtn to collection
        // return $collection->push('laravel', [1, 2, 3]);

        // put() to add element to collection with key value pairs
        // return $collection->put('name', 'karim benzema');

        // forget() remove item from the collection
        // return $collection->forget(5);

        // pop() get value from the last element
        // return $collection->pop();

        // shift() remove first element from the collection
        // return $collection->shift();

        // concat() and zip()
        // $collection1 = collect(['barcelona', 'london']);
        // $collection2 = collect(['amsterdam', 'berlin']);

        // concat()
        // return $collection1->concat($collection2);
        // $collection1 = collect(['barcelona', 'london', 'amsterdam']);
        // $collection2 = collect(['spain', 'UK', 'netherland']);

        // return $collection1->zip($collection2);
        // collaps() and split()

        // $order = collect([
        //     [
        //         'id' => 1,
        //         'items' => [
        //             ['id' => 1, 'name' => 'widget', 'price' => 10],
        //             ['id' => 1, 'name' => 'gizmo', 'price' => 5]
        //         ]
        //     ],
        //     [
        //         'id' => 2,
        //         'items' => [
        //             ['id' => 2, 'name' => 'Thing', 'price' => 15],
        //             ['id' => 2, 'name' => 'doos', 'price' => 20]
        //         ]
        //     ],
        // ]);

        // collapse()
        // return $order->pluck('items')->collapse();
        // return $order->pluck('items')
        // return $order->where('id', 1)
        // return $order
        //     ->pluck('items',)
        //     ->collapse()
        //     ->mapWithKeys(function ($item) {
        //         return [
        //             $item['id'] => [
        //                 'name' => $item['name'],
        //                 'price' => $item['price']
        //             ]
        //         ];
        //     });

        // return Article::pluck('title');

        // split()
        // $posts = collect([
        //     ['title' => 'Post 1', 'body' => 'content post 1'],
        //     ['title' => 'Post 2', 'body' => 'content post 2'],
        //     ['title' => 'Post 3', 'body' => 'content post 3'],
        //     ['title' => 'Post 4', 'body' => 'content post 4'],
        //     ['title' => 'Post 5', 'body' => 'content post 5'],
        //     ['title' => 'Post 6', 'body' => 'content post 6'],
        //     ['title' => 'Post 7', 'body' => 'content post 7'],
        //     ['title' => 'Post 8', 'body' => 'content post 8'],
        //     ['title' => 'Post 9', 'body' => 'content post 9'],
        //     ['title' => 'Post 10', 'body' => 'content post 10']
        // ]);

        // return $posts->split(7);

        // sort() and sortDesc()
        // $collection = collect([
        //     3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5
        // ]);
        // return $collection->sort();
        // return $collection->sortDesc();
        // return $collection->sortBy(function ($item) {
        //     return $item;
        // })->values();
        // return $collection->sortByDesc(function ($item) {
        //     return $item;
        // })->values();

        // $collection = collect(([
        //     ['name' => 'karim', 'age' => 25],
        //     ['name' => 'benzema', 'age' => 27],
        //     ['name' => 'karim benzema', 'age' => 29],
        // ]));

        // return $collection->sortBy('age');
        // return $collection->sortBy('name');
        // return $collection->sortByDesc('age');
        // return $collection->sortByDesc('name');
    }
}
