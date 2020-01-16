 <?php
//url para consumir api
$url = "https://www.canalti.com.br/api/pokemons.json";

//chamando a url com curl_init
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$pokemons = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pokémon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            div.box {
	            width: 150px;
	            display: inline-block;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                   Lista de Pokémons
            </div>
                    @foreach ($pokemons->pokemon as $pokemon)
            <div class="gallery box">
                <a target="_blank" href="img_5terre.jpg">
                <img src="{{$pokemon->img}}" alt="{{$pokemon->name}}">
                </a>
                <div class="desc">{{$pokemon->name}}</div>
                {{-- <p>
                    <ul>
                       @if (count($pokemon->next_evolution)){
                                echo " <h4>Proxímas evoluções</h4>";
                        @foreach ($pokemon->next_evolution as $evolucao){
                            {{$evolucao->name}}
                        }
                            }else{
                                echo " <h4>Não possui</h4>";
                            }
                         @endforeach
                        @endif --}}
            </div>
            @endforeach
            </div>
        </div>
    </body>
</html>
