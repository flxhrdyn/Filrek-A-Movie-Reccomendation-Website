@extends('layouts.layout')
@section('content')

    <div class="wrapper">
        <!--Form-->
        <form action="{{ route('view.updateAccount') }}" method="post">
            @csrf
            @method('put')
            <h1>Edit Account</h1>
            @foreach ($errors->all() as $e)
                <center>
                    <p>{{ $e }}</p>
                </center>
            @endforeach
            @if (session()->has('msg'))
                <center>
                    <p>{{ session('msg') }}</p>
                </center>
            @endif
            <!--Textbox Username-->
            <div class="input-box">
                <input name="oldUsername" type="text" placeholder="Username" required value="{{ $user[0]->username }}"
                    readonly>
                <i class='bx bx-user'></i>
            </div>
            <!--Textbox New Username-->
            <div class="input-box">
                <input name="username" type="text" placeholder="New Username" required>
                <i class='bx bx-user'></i>
            </div>
            <!--Save Button-->
            <button type="submit" class="btn">Save</button>
        </form>
    </div>
