<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs = BlogPost::all();
        return view('blog.index', ['blogs'=>$blogs]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $category = new Category;
        // $category = $category->selectCategory();

        // $category = Category::selectCategory();
        // return $category;
        return view('blog.create');
        //return view('blog.create', ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newBlogPost = BlogPost::create([

            'title' => $request->title,
            'body'  => $request->body,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id

        ]);

        // return $newBlogPost->id;
        return redirect(route('blog.show'),$newBlogPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //use this to check data
        //return $blogPost;


        return view('blog.show', ['blogPost' => $blogPost]);

        // use this method if you want to change the names of your table.\\
        // protected $table = 'blog';
        // protected $primary = 'blog_id';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $category = Category::selectCategory();

        return view('blog.edit', ['blogPost'=>$blogPost, 
                                 'categories'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'title' => $request->body
        ]);

        return redirect(route('blog.show', $blogPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('blog.index'));
    }


    //limit the amount of data you will get
    public function page(){
        $blogPost= BlogPost::select()
            ->paginate(5);
            return view('blog.page',['blogPosts'=> $blogPost]);
    }

 
    //================= HOW TO USE MYSQL FUNCTIONS :) ================\\

    // public function query(){

        // select * from blog_posts;--------------------------------
        //$query = BlogPost::all();

        //selects all the titles from all the blog posts-------------
        //$query = BlogPost::select('title')->get();

        //select where-----------------------------------------------
        //thirs paramater of where indicates = if left empty
        // $query = 
        //     BlogPost::select('title')
        //     ->where('user_id','>',1)
        //     ->get();

        //WHERE pk this automatically finds using primary key-------
        //SELECT * FROM  blog_posts where id = ?
        //$query = BlogPost::find(1);


        //AND the user_id is 1 and the id has to be 23-------------
        // $query = BlogPost::Select()
        //     ->where('user_id','=',1)
        //     ->where('id','=',23)
        //     ->get();

        //OR the user_id is 1 OR the id has to be 23---------------
        // $query = BlogPost::Select()
        // ->where('user_id','=',1)
        // ->orwhere('id','=',23)
        // ->get();


        // ORDER BY 
        // SELECT * FROM blog_posts ORDER BY 'TITLE'--------------
        // $query = BlogPost::Select()
            //where("user_id", ">", 2)
        //     ->orderby('title','desc')
        //     ->get();

        
        // INNER JOIN--------------------------------------------
        // SELECT * FROM blog_posts INNER JOIN users ON user_id = user.id
        // $query = BlogPost::Select()
        //     ->join('users','user_id','=', 'user_id')
        //     ->get();

        
        // OUTER JOIN-------------------------------------------
        //will display user 20 even if they have not written a post
        // $query = BlogPost::Select()
        // ->rightjoin('users','user_id','=', 'user_id')
        // ->get();


        //aggregate function-------------------------------------
        // returns a string. how many id's in your table
        // $query = BlogPost::Max('id');

        //also performs an aggregate function
        // $query = BlogPost::select()
        //         ->count();

        // DON'T FORGET TO RETURN AT THE END OF THE FUNCTION :)
        // // return $query;



        //===== RAW QUERY======\\

        //use a raw query for cle compose
        //use raw query for if case scenarios of generating views


        // $query = BlogPost::select(DB::raw('count(*) blogs, user_id'))
        //     ->groupBy('user_id')
        //     ->get();

        // return $query;
    // }


}
