@extends('layouts.app')

@section('title')
    {{config('app.name')}} - 404 Not Found
@endsection


@section('content')
    <section class="container">

        <canvas id="mascotte-not-happy-canvas" width="100%" height="100%"></canvas>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Error 404</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <article>
                    <h4>Sorry, but this page does not exist.</h4>
                </article>
            </div>
        </div>


    </section>
@endsection

@section("scripts")

    <!--<script>
//todo fix it
            var canvas = document.getElementById('mascotte-not-happy-canvas');
            var context1 = canvas.getContext('2d');

            //la tête
            var centerX = canvas.width / 2;
            var centerY = canvas.height / 2;
            var radius = 150;
            context1.beginPath();
            context1.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
            context1.fillStyle = '#FEE347';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();

            //les yeux

            centerX = 600
            centerY = 250
            radius = 40
            context1.beginPath();
            context1.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
            context1.fillStyle = 'white';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();


            centerX = 800
            centerY = 250
            radius = 40
            context1.beginPath();
            context1.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
            context1.fillStyle = 'white';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();

            //pupille gauche



            context1.beginPath();
            context1.moveTo(580, 250);
            context1.quadraticCurveTo(600, 310, 620, 250);
            context1.fillStyle = 'black';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();


            context1.beginPath();
            context1.moveTo(580, 250);
            context1.quadraticCurveTo(600, 190, 620, 250);
            context1.fillStyle = 'black';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();


            //pupille droite
            context1.beginPath();
            context1.moveTo(780, 300-50);
            context1.quadraticCurveTo(800, 310, 820, 250);
            context1.fillStyle = 'black';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();


            context1.beginPath();
            context1.moveTo(780, 300-50);
            context1.quadraticCurveTo(800, 190, 820, 250);
            context1.fillStyle = 'black';
            context1.fill();
            context1.lineWidth = 5;
            context1.strokeStyle = '#000000';
            context1.stroke();

            //la bouche
            centerX = canvas.width / 2;
            centerY = canvas.height / 2;
            radius = 140;
            context1.beginPath();
            context1.arc(centerX, centerY, radius, 0.2*Math.PI, 0.8 * Math.PI, false);
            context1.fillStyle = 'black';
            context1.fill();
            context1.lineWidth = 2;
            context1.strokeStyle = '#000000';
            context1.stroke();


    </script>-->
@endsection