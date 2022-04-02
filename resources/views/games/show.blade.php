@extends('layouts.app')

@push("styles")
    <style>
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .refresh {
            animation: rotate 1.5s linear infinite;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Game') }}</div>

                    <div class="card-body">
                        <div class="text-center">
                            <img  src="{{asset('img/game.webp')}}"  width="250" height="250" alt="" id="circle">
                            <p id="winner" class="display-1  text-primary"></p>
                        </div>

                        <hr>

                        <div class="text-center">
                            <label class="font-weight-bold h5">Your Bet</label>
                            <select id="bet" class="custom-select form-control">
                                <option selected>Not in</option>
                                @foreach(range(1,12) as $number)
                                    <option>{{$number}}</option>
                                @endforeach
                            </select>
                            <hr>
                            <p class="font-weight h5">Remaining Time</p>
                            <p id="timer" class="text-danger">Waiting to start</p>
                        </div>
                        <hr>

                        <div id="result"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script>
        let circleElement = document.getElementById("circle");
        let timerElement = document.getElementById("timer");
        let winnerElement = document.getElementById("winner");
        let betElement = document.getElementById("bet");
        let resultElement = document.getElementById("result");


        Echo.channel("game")
        .listen("RemainingTimeChanged",(e)=>{
            timerElement.innerText = e.time;
            circleElement.classList.add("refresh");
            winnerElement.classList.add("d-none");
            resultElement.innerText = "";
            resultElement.classList.remove("text-success");
            resultElement.classList.remove("text-danger");
        })
        .listen("WinnerNumberGenerated",(e)=>{
            winner = e.number;
            winnerElement.classList.remove("d-none");
            winnerElement.innerText = winner;

            let bet = betElement[betElement.selectedIndex].innerHTML;

            if(bet === winner){
                resultElement.innerText = "YOU WIN";
                resultElement.classList.add("text-success");
            }else{
                resultElement.innerText = "YOU LOSE";
                resultElement.classList.add("text-danger");
            }

        });

    </script>
@endpush
