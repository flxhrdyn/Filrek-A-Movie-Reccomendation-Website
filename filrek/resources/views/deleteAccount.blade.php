@extends('layouts.layout')
@section('content')

    <div class="wrapper">
        <!--Form-->
        <form action="{{ route('view.startDeleteAccount') }}" method="post">
            @csrf
            @method('delete')
            <h1>Delete Account</h1>
            @if (session('error'))
                <center>
                    <p>{{ session('error') }}</p>
                </center>
            @endif
            <!--Textbox Username-->
            <div class="input-box">
                <input name="username" type="text" placeholder="Please Enter Your Username" required
                    value="{{ $user[0]->username }}" readonly>
                <i class='bx bx-user'></i>
            </div>
            <!--Textbox Old Password-->
            <div class="input-box">
                <input name="password" type="password" placeholder="Please Enter Your Password" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <!--warning text-->
            <div class="register-acc">
                <p>Are you sure you want to delete your account permanently?</p>
            </div>
            <!--Delete Button-->
            <button type="submit" class="btn">Delete Account</button>
        </form>
    </div>
