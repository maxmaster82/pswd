@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ route('account::create') }}" class="btn btn-success pull-right">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Add New Account
                                </a>
                            </div>
                        </div>
                        @if(count($accounts) > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{$account->title}}</td>
                                            <td>{{$account->username}}</td>
                                            <td class="col-sm-4">
                                                <input type="password" class="form-control password-field" value="{{ $encrypter->decrypt($account->password)}}">
                                            </td>

                                            <td class="col-xs-1 text-right">
                                                <a href="{{ route('account::edit', $account->id) }}" role="button" class="btn btn-warning btn-xs">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeConfirm" data-name="{{$account->title}}" data-route="{{ route('account::edit', $account->id) }}">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center">You don't have any account yet!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('includes.removeconfirm')
@endsection
