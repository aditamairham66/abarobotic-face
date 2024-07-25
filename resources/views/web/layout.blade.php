<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Status Grid</title>

    <meta name="title" content="{{ env('APP_NAME') }}">
    <meta name="description" content="{{ env('APP_NAME') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ env('APP_NAME') }}">
    <meta property="og:description" content="{{ env('APP_NAME') }}">
    <meta property="og:image" content="{{ asset('assets/sentuh.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="{{ env('APP_NAME') }}">
    <meta property="twitter:description" content="{{ env('APP_NAME') }}">
    <meta property="twitter:image" content="{{ asset('assets/sentuh.png') }}">

    <link rel="shortcut icon" href="{{ asset('assets/icon.jpeg') }}" type="image/x-icon">
    
    @vite(['resources/css/app.css', 'resources/js/web/web.js'])

</head>
<body class="bg-gray-100">
  <!-- Header Section -->
  <header class="w-full flex items-center justify-between p-4 bg-white shadow">
    <div class="flex items-center">
      <img src="{{ asset('assets/sentuh.png') }}" alt="App Logo" class="mr-4 h-[36px] w-auto">
    </div>
    <div>
      <h1 class="text-xl font-bold text-right">{{ \Carbon\Carbon::now()->format('d F Y') }}</h1>
      <h1 class="text-sm font-bold text-right" id="clock">00:00</h1>
    </div>
  </header>

  <main class="flex flex-col items-center justify-center">
    <div class="container mx-auto p-4">
      <!-- Status Text -->
      <h2 class="text-center text-3xl font-bold mb-1">
        <span class="{{ $status == 'GOOD' ? 'text-green-500' : 'text-red-500' }}">
          {{ $status }}
        </span>
      </h2>
      <h2 class="text-center text-xl font-bold mb-5">Face Score : {{ $faceScore }}</h2>

      <!-- Images and Status Grid -->
      <div class="grid md:grid-cols-2 gap-4">
        <!-- Image 1 -->
        <div class="bg-white p-4 shadow rounded flex flex-col justify-center">
          <img src="{{ "data:image/jpeg;base64,".$face->img_face }}" alt="Face Image" class="object-contain h-[500px] mb-4">
          <h2 class="text-center text-xl font-bold">FACE</h2>
        </div>
        <!-- Image 2 -->
        <div class="bg-white p-4 shadow rounded flex flex-col justify-center">
          <img src="{{ "data:image/jpeg;base64,".$face->img_passport }}" alt="Passport Image" class="object-contain h-[500px] mb-4">
          <h2 class="text-center text-xl font-bold">PASSPORT</h2>
        </div>
      </div>

    </div>
  </main>
</body>
</html>
