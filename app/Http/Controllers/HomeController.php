<?php namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Input;
use Illuminate\Http\Request;
use Redirect;



class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['only' => ['create', 'show'] ]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('category')->orderby('created_at', 'DESC')->get();

		

		return view('home', compact('posts', 'categories'));
	}

	public function post($id)
	{
		$post = Post::with('category')->find($id);

		return view('post', compact('post') );
	}

	public function create()
	{

		$categoriesArray = Category::get()->lists('name', 'id');

		return view('post.create', compact('categories', 'categoriesArray') );
	}

	public function show($id)
	{
		$post = Post::findOrFail($id);

		$categoriesArray = Category::get()->lists('name', 'id');

		return view('post.edit', compact('post', 'categories', 'categoriesArray') );
	}

	public function store()
	{
		$input = Input::all();

		$image = Input::file('cover');
		
		$destinationPath = public_path() . '/img/uploads';

		$fileName = str_replace(' ', '_', $image->getClientOriginalName() );

		$image->move($destinationPath, $fileName);

		$attributes = [
			'title' => $input['title'],
			'tagline' => $input['tagline'],
			'content' => $input['content'],
			'category_id' => $input['category_id'],
			'photo_name' => $fileName
		];

		Post::create($attributes);

		return Redirect::route('home');
	}

	public function edit($id)
	{
		$post = Post::findOrFail($id);

		$input = Input::all();

		if(Input::has('file'))
		{
			$image = Input::file('cover');
			
			$destinationPath = public_path() . '/img/uploads';

			$fileName = str_replace(' ', '_', $image->getClientOriginalName() );

			$image->move($destinationPath, $fileName);

			$post->photo_name = $fileName;

		}

		$post->title = $input['title'];
		$post->tagline = $input['tagline'];
		$post->content = $input['content'];
		$post->category_id = $input['category_id'];

		$post->save();

		return Redirect::route('home');
	}

	public function category($category)
	{
		$category = Category::where('name', $category)->first();

		$posts = Post::where('category_id', $category->id)->get();

		return view('home', compact('posts') );
	}

	public function login()
	{
		return view('auth.login');
	}

	public function register()
	{
		return view('auth.register');
	}

}
