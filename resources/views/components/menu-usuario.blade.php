<!-- Sidebar Start -->
<div class="sidebar bg-dark pe-4 pb-3">
    <nav class="navbar navbar-dark">
        <a href="{{url('/')}}" class="navbar-brand mx-4 mb-3">
            <img src="{{asset('logo.png')}}" width="150px" alt="">
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <i class="fas fa-user-circle fa-2x text-white"></i>
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">{{ Auth::user()->name }}</h6>
                <span style="color:#ff9400;">{{ strtoupper(Auth::user()->group) }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{url('/aluno')}}" class="nav-item nav-link active">
                <i class="fas fa-laptop"></i> Meu Painel
            </a>
            <a href="#" class="nav-item nav-link">
                <i class="fas fa-book-reader"></i> Meus Cursos
            </a>
            <a href="#" class="nav-item nav-link">
                <i class="fas fa-store"></i> Meus Produtos
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
