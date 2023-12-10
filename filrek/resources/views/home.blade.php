@extends('layouts.layout')
@section('content')

    <!-- carousel -->
    <div class="carousel">

        <!-- button left -->
        <button class="carousel_btn carousel_btn--left is-hidden">
            <i class='bx bx-chevron-left'></i>
        </button>

        <!-- carousel img -->
        <div class="carousel_track-container">
            <ul class="carousel_track">
                <li class="carousel_slide current-slide">
                    <img class="carousel_img" src="{{ asset('images/mi7.jpeg') }}" alt="">
                    <div class="carousel_info">
                        <h3>Mission: Impossible - Dead Reckoning Part One</h3>
                        <p> Christopher McQuarrie</p>
                        <i class='bx bxs-star'>9</i>
                    </div>
                </li>
                <li class="carousel_slide">
                    <img class="carousel_img" src="{{ asset('images/gt.jpg') }}" alt="">
                    <div class="carousel_info">
                        <h3>Gran Turismo</h3>
                        <p>Neill Blomkamp</p>
                        <i class='bx bxs-star'>8</i>
                    </div>
                </li>
                <li class="carousel_slide">
                    <img class="carousel_img" src="{{ asset('images/oppen.jpg') }}" alt="">
                    <div class="carousel_info">
                        <h3>Oppenheimer</h3>
                        <p>Christopher Nolan</p>
                        <i class='bx bxs-star'>10</i>
                    </div>
                </li>
            </ul>
        </div>

        <!-- button right -->
        <button class="carousel_btn carousel_btn--right">
            <i class='bx bx-chevron-right'></i>
        </button>

        <!-- carousel image indicator (yang titik2 dibawah carousel) -->
        <div class="carousel_nav">
            <button class="carousel_indicator current-slide"></button>
            <button class="carousel_indicator"></button>
            <button class="carousel_indicator"></button>
        </div>

    </div>
