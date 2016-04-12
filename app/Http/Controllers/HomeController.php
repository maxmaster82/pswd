<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\AccountRepository;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * The account repository instance.
     *
     * @var AccountRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountRepository $accounts)
    {
        $this->middleware('auth');
        $this->accounts = $accounts;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('home', [
            'accounts' => $this->accounts->forUser($request->user()),
            'encrypter' => new Encrypter($request->session()->get('spk'))
        ]);
    }
}
