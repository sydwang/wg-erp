<?php

//namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;


class BlogController extends BaseController {   // Original code is BaseController, but there is no such kind of class

	// The following codes are added by charles
	// 4-11-2016

	protected $layout = 'layouts.master';

	public function index()
	{
		$this->layout->content = View::make('blog.index');

	} 


	// I need the function newPost() is runnale

	public function newPost()
	{
	//	$this->layout->content = View::make('blog.new');
		return View::make('blog.new');
	}
}