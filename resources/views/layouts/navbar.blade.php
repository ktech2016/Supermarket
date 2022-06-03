<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
        height="16"
        alt=""
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/contact')}}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/blog')}}">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/services')}}">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('category.create')}}">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('category.index')}}">View Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('menu.index')}}">View Menu</a>
        </li>
      
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-link px-3 me-2">
          Login
        </button>
        <button type="button" class="btn btn-primary me-3">
          Sign up for free
        </button>
        <a
          class="btn btn-dark px-3"
          href="https://github.com/mdbootstrap/mdb-ui-kit"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->