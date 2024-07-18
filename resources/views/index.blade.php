@php use Carbon\Carbon; @endphp
@extends('layout.master')
@section('content')
    <div class="main-wrapper" id="top_">

        <section class="sidebar d-flex align-items-center text-sm-left text-center p-3 pt-4 pb-4 p-sm-5">
            <div class="main-info">
                <img alt="Zoran Bogoevski"
                     class="rounded-circle mb-3  img-black-white" src="images/me.jpeg" width="160px">
                <h1 class="heading text-white">Hi, i&#39;m <span>Zoran Bogoevski</span>
                </h1>
                <p class="sub-heading text-white"><span class="">Senior Software
                Engineer</span> | Laravel Developer</p>
                <div class="social my-4">
                    <a data-placement="bottom" data-toggle="tooltip" href="https://github.com/kalimeromk"
                       rel="noreferrer"
                       target="_blank" title="Find me on Github">
                        <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg fill="#ffffff" height="40" id="lni_lni-github-original"
                             style="enable-background:new 0 0 64 64;" version="1.1"
                             viewBox="0 0 64 64" width="40"
                             x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                             y="0px">
<path d="M32,1.8c-17,0-31,13.8-31,31C1,46.4,9.9,58,22.3,62.2c1.6,0.3,2.1-0.7,2.1-1.4c0-0.7,0-2.7-0.1-5.4
	c-8.6,2-10.4-4.2-10.4-4.2c-1.4-3.5-3.5-4.5-3.5-4.5c-2.8-2,0.1-2,0.1-2c3.1,0.1,4.8,3.2,4.8,3.2c2.7,4.8,7.3,3.4,9,2.5
	c0.3-2,1.1-3.4,2-4.2c-6.8-0.7-14.1-3.4-14.1-15.2c0-3.4,1.3-6.1,3.2-8.2c-0.3-0.7-1.4-3.9,0.3-8.2c0,0,2.7-0.8,8.6,3.2
	c2.5-0.7,5.1-1.1,7.8-1.1c2.7,0,5.4,0.3,7.8,1.1c5.9-3.9,8.5-3.2,8.5-3.2c1.7,4.2,0.7,7.5,0.3,8.2c2,2.1,3.2,4.9,3.2,8.2
	c0,11.8-7.3,14.5-14.1,15.2c1.1,1,2.1,3,2.1,5.8c0,4.2-0.1,7.5-0.1,8.5c0,0.8,0.6,1.7,2.1,1.4C54.1,57.8,63,46.3,63,32.6
	C62.9,15.6,49,1.8,32,1.8z"/>
</svg>
                    </a>
                    <a data-placement="bottom" data-toggle="tooltip" href="https://www.linkedin.com/in/zoran-bogoevski/"
                       rel="noreferrer"
                       target="_blank" title="Contact me on LinkedIn">
                        <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg fill="#ffffff" width="40" height="40" version="1.1" id="lni_lni-linkedin-original"
                             xmlns="http://www.w3.org/2000/svg"
                             x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;"
                             xml:space="preserve">
<path d="M58.5,1H5.6C3.1,1,1.1,3,1.1,5.5v53c0,2.4,2,4.5,4.5,4.5h52.7c2.5,0,4.5-2,4.5-4.5V5.4C63,3,61,1,58.5,1z M19.4,53.7h-9.1
	V24.2h9.1V53.7z M14.8,20.1c-3,0-5.3-2.4-5.3-5.3s2.4-5.3,5.3-5.3s5.3,2.4,5.3,5.3S17.9,20.1,14.8,20.1z M53.9,53.7h-9.1V39.4
	c0-3.4-0.1-7.9-4.8-7.9c-4.8,0-5.5,3.8-5.5,7.6v14.6h-9.1V24.2h8.9v4.1h0.1c1.3-2.4,4.2-4.8,8.7-4.8c9.3,0,11,6,11,14.2v16H53.9z"/>
</svg>
                    </a>
                    <a data-placement="bottom" data-toggle="tooltip" href="mailto:zbogoevski@gmail.com" rel="noreferrer"
                       target="_blank"
                       title="Contact me via E-mail">
                        <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg fill="#ffffff" width="40" height="40" version="1.1" id="lni_lni-envelope"
                             xmlns="http://www.w3.org/2000/svg" x="0px"
                             y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
<path d="M57,10.9H7c-3.2,0-5.8,2.6-5.8,5.8v30.7c0,3.2,2.6,5.8,5.8,5.8h50c3.2,0,5.8-2.6,5.8-5.8V16.7C62.8,13.5,60.2,10.9,57,10.9z
	 M57,14.4c0.5,0,0.9,0.1,1.3,0.4L33.4,29.9c-0.9,0.5-1.9,0.5-2.8,0L5.7,14.8c0.4-0.2,0.8-0.4,1.3-0.4H57z M57,49.6H7
	c-1.2,0-2.3-1-2.3-2.3v-29l24,14.6c1,0.6,2.1,0.9,3.2,0.9c1.1,0,2.2-0.3,3.2-0.9l24-14.6v29C59.3,48.6,58.2,49.6,57,49.6z"/>
</svg>
                    </a>

                </div>
                <div class="d-flex justify-content-center justify-content-sm-start my-4">
                    <a class="btn btn-dark btn-lg" href="#contact">Contact</a>
                </div>
            </div>
        </section>

        <div class="main-content">
            <!--        ########### ABOUT ME SECTION START ##################-->
            <section class="bg__javascript2" id="about">
                <h2 class="heading">
                    <i class="fa fa-address-card fa-fw custom-title-icon"></i>
                    About me
                </h2>
                <div class="row">
                    <div class="col-md-12 section-content text-justify">
                        <p class="tab-indent">{{ $customFields['custom_field_1'] }}
                        </p>

                    </div>
                </div>
            </section>
            <!--        ########### ABOUT ME SECTION END ##################-->

            <!--        ########### EXPERIENCE SECTION START ##################-->
            <section class="bg__javascript2" id="experience">
                <h2 class="heading">
                    <i class="fa fa-briefcase fa-fw custom-title-icon"></i>
                    Experience
                </h2>
                <div id="timeline">
                    @foreach($experiences as $experience)
                        <div class="timeline-item clearfix">
                            <div class="timeline-icon"></div>
                            <div class="timeline-content right">
                                <span
                                        class="date">{{ Carbon::parse($experience->start_date)->format('F Y') }}
 - {{ $experience->end_date ? Carbon::parse($experience->end_date)->format('F Y') : 'Present' }}

</span>
                                <div class="company-info d-flex align-items-center py-2">
                    <span class="company-logo">
                        <img alt="{{ $experience->company }} logo"
                             class="img-responsive rounded-circle" src="{{ asset('storage/' . $experience->image) }}"
                             width="65px"/>
                    </span>
                                    <span class="company-title-position">
                        <h6 class="h5 mt-2 mb-0">
                            {{ $experience->company }}
                        </h6>
                        <span class="h6 my-1 text-uppercase">
                            {{ $experience->position }}
                        </span>
                        <br/>
                        <span class="lead my-1">
                            {{ $experience->employment_type }}
                        </span>
                    </span>
                                </div>
                                <div class="employee-tasks section-content text-justify" id="axModule">
                                    <p class="pt-2">{!! $experience->description !!}</p>

                                    <div class="badges-container">
                                        @foreach($experience->tags as $tag)
                                            <span
                                                    class="badge badge-pill badge-custom py-2 px-3 mb-2">{{ $tag->name}}</span>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </section>
            <!--        ########### EXPERIENCE SECTION END ##################-->
            <!--        ########### CERTIFICATES SECTION START ##################-->
            <section class="bg__javascript2" id="certification">
                <h2 class="heading">
                    <i class="fa fa-certificate fa-fw custom-title-icon"></i>
                    Open Source Contributions
                </h2>
                <div class="row">
                    <div class="col-md-12 section-content">
                        <p>
                            Using community code for use developers is normal,
                            but in same way normal and moral to give some back to the community as well,
                            here are some of my open source projects:
                        </p>
                        @foreach($contributions as $contribution)
                            <div class="timeline-content right bs">
                                <div class="company-info d-flex align-items-center py-2 bs">
                                    <a href="{{ $contribution->url }}">
                                <span class="company-logo pr-3 bs">
                        <img alt="{{ $contribution->title }}logo" class="img-responsive rounded-circle bs"
                             src="{{ asset('storage/' . $contribution->image) }}"
                             width="65px">
                            </span>
                                    </a>
                                    <span class="company-title-position bs">
                        <h6 class="h5 mt-2 mb-0">
                            <a href="{{ $contribution->url }}"> {{ $contribution->title }}</a>
                        </h6>
                    </span>
                                </div>
                                <div class="employee-tasks section-content bs" id="vtModule">
                                    <p class="pt-2 bs">{!! $contribution->description !!}</p>
                                    <div class="badges-container bs">
                                        @foreach($contribution->tags as $tag)
                                            <span
                                                    class="badge badge-pill badge-custom py-2 px-3 mb-2">{{ $tag->name}}</span>
                                        @endforeach                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </section>
            <!--        ########### CERTIFICATES SECTION END ##################-->

            <!--        ########### CERTIFICATES SECTION START ##################-->
            <section class="bg__javascript2" id="certification">
                <h2 class="heading">
                    <i class="fa fa-certificate fa-fw custom-title-icon"></i>
                    Laravel Developer
                </h2>
                <div class="row">
                    <div class="col-md-12 section-content">
                        <p>
                            My preferred tool for building custom web applications. Laravel is the most popular PHP
                            framework at the moment. It has a huge ecosystem and therefore a lot of 3rd party packages,
                            speeding up the development process.
                        </p>
                    </div>
                </div>
            </section>
            <!--        ########### CERTIFICATES SECTION END ##################-->

        </div>


        <div class="bs" style="z-index: 4; position: relative;">
            <!--        ########### SKILLS SECTION START ##################-->
            <section class="aqua text-light" id="skills">
                <h2 class="heading">
                    <i class="fa fa-wrench fa-fw custom-title-icon"></i>
                    Developer Skills
                </h2>

                <div class="row">
                    <div class="col-md-6 section-content">
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">HTML5 / Bootstrap </span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">CSS / CSS3 </span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">JavaScript / jQuery</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 65%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">Twig / Blade</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">CI / Jenkins</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"> Ajax / JSON</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">Docker / Vagrant / VM</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>

                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">PHPUnit / Jest </span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 60%"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 section-content">
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">PHP / OOP PHP</span>
                </span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">Laravel Framework</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">SOLID Principles</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">Design Patterns</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">Test Driven Development / Domain Driven Design</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"> WordPress</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold">SQL / MySQL / MariaDB</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill">
                <span class="h6 d-flex justify-content-between align-items-center">
                    <span
                            class="font-weight-bold">RESTful API / Stripe / PayPal / 3rd party API Integrations</span></span>
                            <div class="progress">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                     class="progress-bar bg-blue"
                                     role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--        ########### SKILLS SECTION END ##################-->
        </div>

        <div class="main-content">
            <!--        ########### SERVICES SECTION START ##################-->
            <section class="blue" id="services">
                <h2 class="heading">
                    <i class="fa fa-cogs fa-fw custom-title-icon"></i>
                    Services
                </h2>
                <div class="row justify-content-md-center text-center bs d-flex flex-wrap">
                    <div class="card-wrapper col-12 col-lg-6 col-md-6 mb-3 bs d-flex">
                        <div class="card p-4 bs">
                            <i class="mt-3 fa fa-lightbulb fa-3x bs"></i>
                            <h5 class="mt-4">
                                Brainstorming
                            </h5>
                            <p class="text-muted bs">
                                I will ask you about your current business needs and suggest the most optimal set of
                                solutions.
                            </p>
                        </div>
                    </div>


                    <div class="card-wrapper col-12 col-lg-6 col-md-6 mb-3 bs d-flex">
                        <div class="card p-4 bs">
                            <i class="mt-3 fa fa-code fa-3x bs"></i>
                            <h5 class="mt-4">Package development</h5>
                            <p class="text-muted bs">
                                I will build custom laravel package to suite your needs .
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-center text-center bs d-flex flex-wrap">
                    <div class="card-wrapper col-12 col-lg-6 col-md-6 mb-3 bs d-flex">
                        <div class="card p-4 bs">
                            <i class="mt-3 fa fa-rocket fa-3x bs"></i>
                            <h5 class="mt-4">Proof of Concept/MVP</h5>
                            <p class="text-muted bs">
                                I will deliver a minimum viable product asap, so you can start receiving user feedback.
                            </p>
                        </div>
                    </div>

                    <div class="card-wrapper col-12 col-lg-6 col-md-6 mb-3 bs d-flex">
                        <div class="card p-4 bs">
                            <i class="mt-3 fa fa-laptop fa-3x bs"></i>
                            <h5 class="mt-4">Agile Development</h5>
                            <p class="text-muted bs">
                                At each stage of development, you'll have a working project, so you can make a profit
                                from
                                the very beginning.
                            </p>
                        </div>
                    </div>


                </div>

                <div class="row justify-content-md-center text-center bs d-flex flex-wrap">
                    <div class="card-wrapper col-12 col-lg-6 col-md-6 mb-3 bs d-flex">
                        <div class="card p-4 bs">
                            <i class="mt-3 fa fa-plug fa-3x bs"></i>
                            <h5 class="mt-4">Integrations</h5>
                            <p class="text-muted bs">
                                I can integrate your project with business tools and services (Payments, CRM, Helpdesk,
                                Accounting, etc.)
                            </p>
                        </div>
                    </div>

                    <div class="card-wrapper col-12 col-lg-6 col-md-6 mb-3 bs d-flex">
                        <div class="card p-4 bs">
                            <i class="mt-3 fa fa-life-ring fa-3x bs"></i>
                            <h5 class="mt-4">Support & improvements</h5>
                            <p class="text-muted bs">
                                I will provide support, analytics, and consulting to continuously improve your project,
                                customer service, and sales.
                            </p>
                        </div>
                    </div>

                </div>


            </section>
            <!--        ########### SERVICES SECTION END ##################-->
            <!--        ########### CONTACT ME SECTION START ##################-->
            <section class="bg__javascript2 d-flex align-items-center" id="contact">
                <div class="container">
                    <h2 class="heading mb-3">
                        <i class="fa fa-envelope fa-fw custom-title-icon"></i>
                        Contact
                    </h2>
                    <div class="text-success my-3">
                        I&#39;m available for work
                    </div>

                    <form id="contact-form" method="POST" action="{{ route('contact') }}">
                        @method('POST')
                        @csrf
                        @honeypot
                        <div class="form-row">
                            <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Name" required type="text">
                            </div>
                            <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                                <label>Email</label>
                                <input class="form-control" placeholder="Email" name="email" required type="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="message" placeholder="Message" required
                                      rows="4"></textarea>
                        </div>
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </form>
                </div>
            </section>
            <!--        ########### CONTACT ME SECTION END ##################-->
        </div>

@endsection
