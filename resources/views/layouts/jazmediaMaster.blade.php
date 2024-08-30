<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') |
      {{ config('variables.templateName') ? config('variables.templateName') : 'TemplateName' }} -
      {{ config('variables.templateSuffix') ? config('variables.templateSuffix') : 'TemplateSuffix' }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <!-- Vendor Styles -->
    @yield('vendor-style')
    <!-- Page Styles -->
    @yield('page-style')
</head>
<body>
  <!-- Sections:Start -->
  @yield('content')
  <!-- / Sections:End -->
  <!-- Vendor Scripts -->
  @yield('vendor-script')
  <!-- Page Scripts -->
  @yield('page-script')
</body>
</html>
