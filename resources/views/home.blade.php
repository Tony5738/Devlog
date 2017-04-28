@extends('layouts.app')

@section('title')
    {{config('app.name')}} - Home
@endsection

@section('content')

    <header id="home-header">
        <div class="container">
            <h1 class="page-header">Home</h1>
            <h2 class="page-header">Welcome on my Devlog about my work placement experience in IMaR Technology Gateway</h2>
        </div>
    </header>

    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-customize-orange">
                    <div class="panel-heading"><strong>Company</strong></div>
                    <div class="panel-body">
                        <article>
                            <img src="/site_images/imar_logo.png" alt="imar logo" class="pull-right"/>
                            <strong>IMaR Technology Gateway</strong><br><br>
                            The IMaR Gateway is an applied research provider delivering technology solutions for industry, which work for manufacturing, agriculture, and process sectors through electronic and mechanical hardware, software, IoT and data analytics innovation.<br><br>
                            These expertises are separated into two strands: Mechatronics (Hardware) and RFID/IoT/Analytic (Software)<br><br>
                            IMaR offers different type of services such as project development and specification, prototype /proof of concept development, consultancy and industry collaborations, as well as assistance in sourcing funding for R&D project.
                            <ul>
                                <li>
                                    Established in November 2013.
                                </li>
                                <li>
                                    25 researchers work in projects with a value between 5000 € and 2.000.000 €, and for all size of company: SMEs, multinationals…
                                </li>
                                <li>
                                    800 industrial projects since 2013 with a total value in excess 9.000.000 € with 46% directly coming from industry.
                                </li>
                            </ul>
                            IMaR Gateway belongs to the Technology Gateway Network, where 14 other gateway work on their expertise in different places in Ireland. This network is a programme run by Enterprise Ireland, a government organisation responsible to develop Irish company in the work market, as well as the partnership with Institute of technology
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-customize-orange">
                    <div class="panel-heading"><strong>College</strong></div>
                    <div class="panel-body">
                        <article>
                            <img src="/site_images/ittralee_logo.jpg" alt="ITTralee logo" class="pull-right"/>
                            <strong>Institute of Technology Tralee</strong><br><br>
                            The Institute of Technology Tralee (IT Tralee) was established in 1977 as the Regional Technical College, Tralee
                            and in 1992 became the Institute of Technology, Tralee. The Institute is located in two separate campus in Tralee co. Kerry: one on the north and the other on the south.<br> <br>
                            The institute offers courses in three principal schools such as School of Business, Computing & Humanities, School of Science, Technology, Engineering & Mathematics and School of Health & Social Sciences.<br><br>
                            The Institute has a number of research centres in the following areas including Intelligent Mechatronics and RFID (IMaR).<br>

                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-customize-blue">
                    <div class="panel-heading"><strong>My industry supervisor</strong></div>
                    <div class="panel-body">
                        <strong>Mr. Keith O'faolain</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-customize-blue">
                    <div class="panel-heading"><strong>My academic supervisor</strong></div>
                    <div class="panel-body">
                        <strong>Mrs. Helen Fitzgerald</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-customize-blue">
                    <div class="panel-heading"><strong>My experience</strong></div>
                    <div class="panel-body">
                        <article>
                            This placement gave me a great work experience in Ireland, I got some competences in Laravel, but as well in Ajax, Jquery, Git, Linux, Gulp, Bower, Composer,...<br>
                            This placement was a continuity of my professional project to become developer and later project manager.
                        </article>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection








