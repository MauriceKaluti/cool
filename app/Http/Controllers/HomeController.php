<?php

namespace App\Http\Controllers;

use Mail;
use Reminder;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'home' );
	}

	public function test() {

		/*$data          = array();
		$data['email'] = 'kazisafi254@gmail.com';
		$data['name'] = 'Test User';
		$data['password'] = 'TEST@12345';
		$data['site_url'] = url('/');

		Mail::send( 'emails.users.register', $data, function ( $message ) use ( $data ) {
			$message->subject( "Welcome to site name" );
			$message->to( $data['email'] );
			$message->cc( 'jadiyan@gmail.com' );
		} );
		echo 'message has been send';*/
	}
}
