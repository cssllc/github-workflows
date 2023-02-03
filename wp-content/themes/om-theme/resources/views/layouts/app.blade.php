@include('partials.header')

<div class="site-content">
  <main class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
  <aside class="sidebar">
    @yield('sidebar')
  </aside>
  @endif
</div>

@include('partials.footer')