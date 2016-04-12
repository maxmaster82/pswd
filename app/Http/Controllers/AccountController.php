<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;

use App\Http\Requests;

class AccountController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'username' => 'required|max:100',
            'password' => 'required|max:32',
        ]);

        $request->user()->accounts()->create([
            'title' => $request->title,
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect()->to('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Account $account)
    {
        $encrypter  = new Encrypter($request->session()->get('spk'));
        $account->password = $encrypter->decrypt($account->password);
        return view('account.edit', [
            'account' => $account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'username' => 'required|max:100',
            'password' => 'required',
        ]);

        $account->update([
            'title' => $request->title,
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        return response()->json(['success' => $account->delete()]);
    }
}
