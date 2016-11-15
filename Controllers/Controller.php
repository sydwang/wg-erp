<?php
namespace app\Http\Controllers;

use View;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


//  Unfortunately, I failed to test with BlogController, which Eric used in his tutorial.
//  So I have to try to modify this file.
//  I will add some functions in this class definition.

protected $layout = 'layouts.master';  // assign layout => 'layouts/master.blade.php'

//  charles define the following $matrixadmin
//  14-11-2016
//  for the test of Matrix Admin template
protected $matrixadmin = 'layouts.matrixadmin';


public function index()
	{
		// $this->layout->content = View::make('blog.index',['posts' => Post:all()]);
		// The following expression is quite useful
		return View::make('blog.index',['posts' => Post::all()]);

	} 


public function newPost()
	{
		// $this->layout->content = View::make('blog.new');
		// Finally the folling line works. 
		// Obviously, the original code is outdated.
		// I try to search the error message by google, someone suggest to use as the followling mothod. 
		return View::make('blog.new');	// not sure whether I can wirite like this.
	}    

public function createPost(Request $request)
	{
		$post = new Post();
		$post->title = $request->input('title');
		$post->context = nl2br($request->input('content'));
		$post->save();

		//return Redirect::route('newPost');
		return View::make('blog.view',['post' => $post]);
	}

public function viewPost($id)
	{

		$post = Post::findOrFail($id);

		//$this->layout->content = View::make('blog.viewPost',['post' => $post]);
		//return $post;		// It works;
		return View::make('blog.view',['post' => $post]); // render a view with a input parameter

	}

public function viewComments($id)
	{

		$post = Post::findOrFail($id);

		//$this->layout->content = View::make('blog.viewPost',['post' => $post]);
		//return $post;		// It works;
		return View::make('blog.viewcomments',['post' => $post]); // render a view with a input parameter

	}


public function createComment(Request $request, $id)  // two parameters?
	{
		$post = Post::findOrFail($id);
		$comment = new Comment();
		$comment->name = $request->input('name');
		$comment->content = nl2br($request->input('content'));
		//$comment->save();
		
		// By this mean, the comments will save the post_id
		$post->comments()->save($comment);

		//return Redirect::route('newPost');
		return View::make('blog.view',['post' => $post]);
	}

public function masimpleform()
	{
		return View::make('matrixadmin.simpleform');
	}

public function masingleinputform()
	{
		return View::make('matrixadmin.singleinputform');
	}
}
