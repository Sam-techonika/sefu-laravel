<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }} - Login</title>
  <!-- Tabler CSS -->
  <link href="{{ asset('tabler/theme/css/tabler.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/theme/css/tabler-flags.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/theme/css/tabler-payments.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('tabler/theme/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    @php $tablerVersion = config('settings.tabler_version'); @endphp 

  <!-- Tabler Icons -->
  <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="{{ asset('tabler/theme/style.css') . '?v=' . $tablerVersion }}">
  <link rel="stylesheet" href="{{ asset('tabler/theme/loaders.css') . '?v=' . $tablerVersion }}">
  @livewireStyles
</head>

<body class="border-top-wide border-primary d-flex flex-column">
  {{ $slot }}
  @livewireScripts
  <script src="{{ asset('tabler/theme/js/tabler.min.js') }}"></script>
  <script src="{{ asset('tabler/theme/js/demo-theme.min.js') }}"></script>
  <script src="{{ asset('tabler/theme/prefs.js') }}"></script>
</body>

</html>