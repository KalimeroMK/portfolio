@extends('layout.master')
@section('content')
    <div class="main-wrapper" id="top_" >

        <section class="sidebar d-flex align-items-center text-sm-left text-center p-3 pt-4 pb-4 p-sm-5">
            <div class="main-info">
                <img alt="Zoran Bogoevski" class="rounded-circle mb-3 img-black-white" src="images/me.jpeg" width="160px">
                <h1 class="heading text-white">Hi, i&#39;m <span>Zoran Bogoevski</span></h1>
                <p class="sub-heading text-white"><span class="">Senior Software Engineer</span> | Laravel Developer</p>
                <div class="social my-4">
                    <!-- Github -->
                    <a data-placement="bottom" data-toggle="tooltip" href="https://github.com/kalimeromk" rel="noreferrer" target="_blank" title="Find me on Github">
                        <svg fill="#ffffff" height="40" id="lni_lni-github-original" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" width="40" x="0px" xmlns="http://www.w3.org/2000/svg" y="0px">
                            <path d="M32,1.8c-17,0-31,13.8-31,31C1,46.4,9.9,58,22.3,62.2c1.6,0.3,2.1-0.7,2.1-1.4c0-0.7,0-2.7-0.1-5.4
                    c-8.6,2-10.4-4.2-10.4-4.2c-1.4-3.5-3.5-4.5-3.5-4.5c-2.8-2,0.1-2,0.1-2c3.1,0.1,4.8,3.2,4.8,3.2c2.7,4.8,7.3,3.4,9,2.5
                    c0.3-2,1.1-3.4,2-4.2c-6.8-0.7-14.1-3.4-14.1-15.2c0-3.4,1.3-6.1,3.2-8.2c-0.3-0.7-1.4-3.9,0.3-8.2c0,0,2.7-0.8,8.6,3.2
                    c2.5-0.7,5.1-1.1,7.8-1.1c2.7,0,5.4,0.3,7.8,1.1c5.9-3.9,8.5-3.2,8.5-3.2c1.7,4.2,0.7,7.5,0.3,8.2c2,2.1,3.2,4.9,3.2,8.2
                    c0,11.8-7.3,14.5-14.1,15.2c1.1,1,2.1,3,2.1,5.8c0,4.2-0.1,7.5-0.1,8.5c0,0.8,0.6,1.7,2.1,1.4C54.1,57.8,63,46.3,63,32.6
                    C62.9,15.6,49,1.8,32,1.8z"/>
                        </svg>
                    </a>
                    <!-- LinkedIn -->
                    <a data-placement="bottom" data-toggle="tooltip" href="https://www.linkedin.com/in/zoran-bogoevski/" rel="noreferrer" target="_blank" title="Contact me on LinkedIn">
                        <svg fill="#ffffff" width="40" height="40" version="1.1" id="lni_lni-linkedin-original" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                    <path d="M58.5,1H5.6C3.1,1,1.1,3,1.1,5.5v53c0,2.4,2,4.5,4.5,4.5h52.7c2.5,0,4.5-2,4.5-4.5V5.4C63,3,61,1,58.5,1z M19.4,53.7h-9.1V24.2h9.1V53.7z M14.8,20.1c-3,0-5.3-2.4-5.3-5.3s2.4-5.3,5.3-5.3s5.3,2.4,5.3,5.3S17.9,20.1,14.8,20.1z M53.9,53.7h-9.1V39.4 c0-3.4-0.1-7.9-4.8-7.9c-4.8,0-5.5,3.8-5.5,7.6v14.6h-9.1V24.2h8.9v4.1h0.1c1.3-2.4,4.2-4.8,8.7-4.8c9.3,0,11,6,11,14.2v16H53.9z"/>
                </svg>
                    </a>
                    <!-- E-mail -->
                    <a data-placement="bottom" data-toggle="tooltip" href="mailto:zbogoevski@gmail.com" rel="noreferrer" target="_blank" title="Contact me via E-mail">
                        <svg fill="#ffffff" width="40" height="40" version="1.1" id="lni_lni-envelope" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                    <path d="M57,10.9H7c-3.2,0-5.8,2.6-5.8,5.8v30.7c0,3.2,2.6,5.8,5.8,5.8h50c3.2,0,5.8-2.6,5.8-5.8V16.7C62.8,13.5,60.2,10.9,57,10.9z M57,14.4c0.5,0,0.9,0.1,1.3,0.4L33.4,29.9c-0.9,0.5-1.9,0.5-2.8,0L5.7,14.8c0.4-0.2,0.8-0.4,1.3-0.4H57z M57,49.6H7c-1.2,0-2.3-1-2.3-2.3v-29l24,14.6c1,0.6,2.1,0.9,3.2,0.9c1.1,0,2.2-0.3,3.2-0.9l24-14.6v29C59.3,48.6,58.2,49.6,57,49.6z"/>
                </svg>
                    </a>
                    <!-- Facebook -->
                    <a data-placement="bottom" data-toggle="tooltip" href="https://www.facebook.com/shefot"
                       rel="noreferrer" target="_blank" title="Find me on Facebook">
                        <svg fill="#ffffff" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                            <path d="M57.5,1H6.5C3.5,1,1,3.5,1,6.5v51C1,60.5,3.5,63,6.5,63h51c3,0,5.5-2.5,5.5-5.5v-51C63,3.5,60.5,1,57.5,1z M43,32h-4v31H29V32h-5v-7h5v-5.1C29,13.7,32,9,40.6,9H47v7h-5c-3,0-3,1.1-3,3.4V25h7L43,32z"/>
                        </svg>
                    </a>
                    <!-- Instagram -->
                    <a data-placement="bottom" data-toggle="tooltip" href="https://www.instagram.com/zoranshefot" rel="noreferrer" target="_blank" title="Find me on Instagram">
                        <svg fill="#ffffff" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                            <path d="M32,12.9c5.3,0,6,0,8.1,0.1c2,0.1,3,0.4,3.7,0.6c0.9,0.3,1.6,0.6,2.3,1.2c0.6,0.6,1,1.4,1.2,2.3c0.3,0.7,0.5,1.6,0.6,3.7 c0.1,2.1,0.1,2.8,0.1,8.1s0,6-0.1,8.1c-0.1,2-0.4,3-0.6,3.7c-0.3,0.9-0.6,1.6-1.2,2.3c-0.6,0.6-1.4,1-2.3,1.2 c-0.7,0.3-1.6,0.5-3.7,0.6c-2.1,0.1-2.8,0.1-8.1,0.1s-6,0-8.1-0.1c-2-0.1-3-0.4-3.7-0.6c-0.9-0.3-1.6-0.6-2.3-1.2 c-0.6-0.6-1-1.4-1.2-2.3c-0.3-0.7-0.5-1.6-0.6-3.7c-0.1-2.1-0.1-2.8-0.1-8.1s0-6,0.1-8.1c0.1-2,0.4-3,0.6-3.7 c0.3-0.9,0.6-1.6,1.2-2.3c0.6-0.6,1.4-1,2.3-1.2c0.7-0.3,1.6-0.5,3.7-0.6c2.1-0.1,2.8-0.1,8.1-0.1 M32,8c-5.3,0-6,0-8.1,0.1 c-2.2,0.1-3.7,0.4-5.1,0.9c-1.4,0.6-2.5,1.4-3.7,2.6c-1.2,1.2-2,2.4-2.6,3.7c-0.5,1.3-0.8,2.9-0.9,5.1c-0.1,2.1-0.1,2.8-0.1,8.1 s0,6,0.1,8.1c0.1,2.2,0.4,3.7,0.9,5.1c0.6,1.4,1.4,2.5,2.6,3.7c1.2,1.2,2.4,2,3.7,2.6c1.3,0.5,2.9,0.8,5.1,0.9c2.1,0.1,2.8,0.1,8.1,0.1 s6,0,8.1-0.1c2.2-0.1,3.7-0.4,5.1-0.9c1.4-0.6,2.5-1.4,3.7-2.6c1.2-1.2,2-2.4,2.6-3.7c0.5-1.3,0.8-2.9,0.9-5.1c0.1-2.1,0.1-2.8,0.1-8.1 s0-6-0.1-8.1c-0.1-2.2-0.4-3.7-0.9-5.1c-0.6-1.4-1.4-2.5-2.6-3.7c-1.2-1.2-2.4-2-3.7-2.6c-1.3-0.5-2.9-0.8-5.1-0.9 C38,8,37.3,8,32,8L32,8z"/>
                            <path d="M32,19.4c-7,0-12.6,5.7-12.6,12.6S25,44.6,32,44.6S44.6,39,44.6,32S39,19.4,32,19.4z M32,40.1c-4.5,0-8.1-3.6-8.1-8.1 s3.6-8.1,8.1-8.1s8.1,3.6,8.1,8.1S36.5,40.1,32,40.1z"/>
                            <circle cx="48.7" cy="15.4" r="2.9"/>
                        </svg>
                    </a>
                    <!-- X (formerly Twitter) -->
                    <a data-placement="bottom" data-toggle="tooltip" href="https://x.com/zaebalovek" rel="noreferrer" target="_blank" title="Follow me on X (formerly Twitter)">
                        <svg fill="#ffffff" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                            <path d="M32,1C14.3,1,0,15.3,0,33c0,9.6,4.1,18.1,10.6,24.1c1.1,1,1.4,1.4,1.6,1.8c-0.3,0.9-1.3,3.1-2.3,4.4c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0.7,0.1,3.6-0.2,5.1-0.8c0.1-0.1,0.4-0.1,0.4-0.1c0.7,0.1,2.1,0.2,3.8,0.2c17.5,0,31.5-14.2,31.5-31.8C64,15.3,49.7,1,32,1z M47.3,25.1c-0.3,0.6-0.8,1.4-1.2,2c-1.4,2-2.6,3.8-4,5.8c-0.4,0.7-1.1,1.2-1.8,1.2c-0.5,0-0.9-0.2-1.3-0.6c-0.8-0.8-1.5-1.7-2.3-2.5c-0.1-0.1-0.2-0.1-0.4-0.1c-0.5,0-0.8,0.3-1.2,0.6c-1.2,1.2-2.4,2.4-3.6,3.6c-1.5,1.4-3.2,2.7-4.8,4c-0.2,0.2-0.4,0.3-0.6,0.4c-0.5,0.3-0.9,0.2-1.1-0.3c-0.2-0.4-0.2-0.9-0.1-1.3c0.5-1.7,1.3-3.3,2.3-4.9c1.2-1.8,2.5-3.6,4-5.2c0.3-0.4,0.5-0.8,0.6-1.3c0.1-0.3,0-0.6-0.2-0.8c-1-1.1-1.9-2.2-2.9-3.3c-0.6-0.7-1.2-1.5-1.8-2.2c-0.7-0.7-1.3-1.5-2-2.3c-0.6-0.7-1.1-1.4-1.6-2.2c-0.4-0.7-0.4-1.1,0.3-1.7c0.8-0.7,1.6-1.2,2.5-1.7c2.4-1.3,4.8-2.5,7.3-3.7c0.8-0.4,1.5-0.9,2.2-1.3c0.7-0.4,1.5-0.5,2.2,0c0.5,0.4,0.9,0.8,1.2,1.3c0.3,0.5,0.6,1,0.8,1.5c0.8,1.9,1.7,3.8,2.5,5.7c0.3,0.6,0.6,1.2,0.9,1.8C48,24.1,47.6,24.6,47.3,25.1z"/>
                        </svg>
                    </a>
                </div>
                <div class="d-flex justify-content-center justify-content-sm-start my-4">
                    <a class="btn btn-dark btn-lg" href="{{ route('articles') }}" style="margin-right: 2%">Article</a>
                    <a class="btn btn-dark btn-lg" href="#contact">Contact</a>
                </div>
            </div>
        </section>

        <div class="main-content">
            <!--        ########### ABOUT ME SECTION START ##################-->
            @foreach($articles as $article)
            <section class="bg__javascript2" id="about">
                <h3 class="heading">
                    <a href="{{ route('article', $article->slug) }}">
                        <i class="fa fa-address-card fa-fw custom-title-icon"></i>
                        {{ $article->title }}</a>
                </h3>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid">
                    </div>
                    <div class="col-8 section-content text-justify">
                        {{ Str::limit(strip_tags($article->description), 500) }}
                    </div>
                </div>
            </section>
            @endforeach
        </div>


    </div>
@endsection