<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Mi CLIMA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <section>
        <div class="font-medium pt-10 2xl:pt-20 bg-blue-200 rounded-b-10xl pb-96">
            <div class="container px-4 mx-auto">
                <h2 class="font-heading text-9xl md:text-10xl xl:text-11xl leading-tight mb-12 text-center">Mi CLIMA</h2>
                <p class="text-lg leading-6 font-normal text-darkBlueGray-400 mb-20 text-center"></p>


            </div>
            <div class="text-center mx-auto pb-8">
                <form method="post" action="{{ route('buscar') }}">
                    @csrf
                    <input id="ciudad" type="text" name="ciudad" placeholder="Ciudad" value="{{ old('ciudad') }}"
                        class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">

                    <button
                        class="border-2 border-blue-500 rounded-lg font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                        Buscar
                    </button>
                    @error('ciudad')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>

                    @enderror
                </form>

            </div>


        </div>
        @if (sizeof($usArray) > 3)
            <div class="container px-4 mx-auto">
                <div
                    class="-mt-96 grid md:grid-cols-2 lg:grid-cols-3 lg:items-center gap-9 pb-24 2xl:pb-52 font-medium mx-auto max-w-7xl">

                    <div class="pt-14 pb-16 px-8 md:px-16 shadow-2xl text-center  bg-white">

                        <h3 class="font-heading text-4xl leading-10 tracking-tight mb-4 ">
                            {{ round($usArray['main']['temp'], 2) - 273 }} ° C</h3>
                        <h3 class="font-heading text-3xl leading-10 tracking-tight mb-4 ">
                            {{ $usArray['weather'][0]['description'] }}</h3>

                    </div>
                    <div class="pt-14 pb-16 px-8 md:px-16 shadow-2xl rounded-5xl bg-white">

                        <h3 class="font-heading text-6xl leading-10 tracking-tight mb-4 text-center">
                            {{ $usArray['name'] }}</h3>
                        <div class="font-heading text-3xl flex items-center mb-12 leading-5 tracking-tighter">

                          {{--   <img class="w-full"
                                src="http://openweathermap.org/img/wn/{{ $usArray['weather'][0]['icon'] }}.png"
                                alt=""> --}}


                            @switch($usArray['weather'][0]['main'])

                                @case ('Thunderstorm')
                                    <img class="w-full" src="{{ Storage::url('thunder.svg') }}">

                                @break;
                                @case ('Drizzle')
                                    <img class="w-full" src="{{ Storage::url('rainy-2.svg') }}">

                                @break;
                                @case ('Rain')
                                    <img class="w-full" src="{{ Storage::url('rainy-7.svg') }}">

                                @break;
                                @case ('Fog')
                                    <img class="w-full" src="{{ Storage::url('snowy-6.svg') }}">

                                @break;
                                @case ('Snow')
                                    <img class="w-full" src="{{ Storage::url('snowy-6.svg') }}">

                                @break;
                                @case ('Clear')
                                    <img class="w-full" src="{{ Storage::url('day.svg') }}">

                                @break;
                                @case ('Atmosphere')
                                    <img class="w-full" src="{{ Storage::url('weather.svg') }}">

                                @break;
                                @case ('Clouds')
                                    <img class="w-full" src="{{ Storage::url('cloudy-day-1.svg') }}">
                                    @if ($usArray['weather'][0]['main'])

                                    @endif

                                @break;


                            @endswitch

                        </div>

                    </div>
                    <div class="pt-14 pb-16 px-8 md:px-16 shadow-2xl rounded-5xl bg-white">

                        <h3 class="font-heading text-3xl leading-10 tracking-tight mb-4">Velocidad de viento</h3>
                        <h3 class="font-heading text-3xl text-center">{{ $usArray['wind']['speed'] }}m/s</h3>


                    </div>


                </div>
            </div>
        @else
            <div class=" px-4 mx-auto">
                <div class="-mt-96 bg-white grid md:grid-cols-1 pb-24 pt-10 ml-60 mr-60 ">

                    <h1 class="font-heading text-4xl text-center">Ciudad no encontrada</h1>
                    
                </div>
            </div>
        @endif


    </section>

</body>

</html>
