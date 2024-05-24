<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>

  body{
    background: yellow
  }
  .note-container {
    max-width: 980px;
    margin: 0 auto;
    background: rgb(148, 142, 142);
  }
  .note-btns {
    width: 200px;
    display: block;
    margin: 0 auto 20px;
    background-color: #fff;
    padding: 10px 32px;
    border: 1px solid #e0e0e0;
    font-size: 26px;
    outline: 0;
    transition: all 0.3s;
    cursor: pointer;
    font-family: 'Caveat', cursive;
    text-align: center;
    text-decoration: none;
    color: #1e1e1e
  }
  .note-btns:hover {
    box-shadow: 0 5px 7px rgba(0, 0, 0, 0.1);
  }
  .note-btns:active {
    position: relative;
    top: 1px;
  }
  .notes {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 0 auto;
  }
  .note {
    background-color: rgb(12, 22, 30);
    border-radius: 8px;
    width: 300px;
    margin: 0 10px 20px;
    box-shadow: 1px 3px 5px rgba(243, 242, 242, 0.2);
    transition: all 0.5s;
    cursor: pointer;
    text-decoration: none;
    color: #cec4c4
  }
  
  .note .note-body {
    outline: 0;
    font-family: 'Caveat', cursive;
    font-size: 24px;
    padding: 10px 16px 16px;
  }
  .notes .note:hover {
    box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.3);
  }
  .single-note .note {
    margin: 0;
    width: 100%;
  }
  .single-note .note .note-body {
    background-color: transparent;
    width: 100%;
    height: 100%;
    border: none;
    resize: none;
    padding: 20px;
  }
  .single-note .note .note-body::placeholder {
    color: #111111
  }
  .note .note-buttons {
    opacity: 0;
  }
  .note:hover .note-buttons{
    opacity: 1;
  }
  .note-buttons {
    text-align: right;
    padding: 10px;
    display: flex;
    gap: 5px;
    justify-content: end;
  }
  
  .note-buttons .note-cancel-button {
    padding: 6px 10px;
    border-radius: 4px;
    background-color: #e0e0e0;
    border: 1px solid #bdbdbd;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    display: inline-block;
    font-size: 16px;
  }
  .note-buttons .note-cancel-button:hover {
    background-color: #ffffff;
  }
  
  .note-buttons .submit-btn {
    padding: 6px 10px;
    border-radius: 4px;
    color: white;
    background-color: #452900;
    border: 1px solid #212000;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .note-buttons .submit-btn:hover {
    background-color: #704300;
  }
  
  .note-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  
  .note-buttons .note-edit-button {
    padding: 6px 10px;
    border-radius: 4px;
    color: white;
    background-color: #0a6cd5;
    border: 1px solid #f3f5f8;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .note-buttons .note-edit-button:hover {
    background-color: #dce3eb;
    color: black;
  }
  
  
  .note-buttons .note-delete-button {
    padding: 6px 10px;
    border-radius: 4px;
    color: white;
    background-color: #c93f3f;
    border: 1px solid #a82f2f;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .note-buttons .note-delete-button:hover {
    background-color: #a82f2f;
  }
  .note-date {
    margin-top: 20px;
    font-size: 13px;
    font-style: italic;
    color: rgb(92, 92, 92);
  }
  
  .success-message {
    padding: 15px 25px;
    background-color: rgb(15, 33, 47);;
    color: white;
    border-radius: 8px;
    margin: 2% 5% 1% 5%;
    text-align: center;
    font-size: 2rem;
  }
  .new-note{
      text-align: center;
      background-color: rgb(12, 22, 30);
      border-radius: 7px;
      color: rgb(189, 185, 185);
      margin: 2rem 0 2rem 35%;
      padding: .2rem;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 2rem; 
      text-decoration: none;
  
  
  }
  .new-note:hover{
      background: #d0dbe1;
      border-radius: 8px;
  }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 white:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @session('message')
                <div class="success-message">
                    {{ session('message')}}
                </div>
                    
                @endsession
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
