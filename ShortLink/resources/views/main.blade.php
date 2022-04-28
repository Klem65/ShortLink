@extends('layout.app')
@section('title', 'Главная страница')
@section('content')

    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center" style="background: #7ecbff">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <form id="url-form" class="space-y-5 mt-5">

                <input id="url" name="url" type="url" placeholder="Input url..." class="w-full h-12 border border-gray-800 rounded px-3">
                <p id="error" class="text-red-500 hidden"></p>

                <input id="submit-btn" type="submit" value="Send" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">

                <div id="result" class="hidden">
                    <p>Link:</p>
                    <a id="link" href="#">
                        <p id="text-link" class="no-underline hover:underline"></p>
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
