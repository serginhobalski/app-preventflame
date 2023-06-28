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
            <a href="{{url('/admin/painel')}}" class="nav-item nav-link {{($slug == 'admin' ? 'active' : '')}}">
                <i class="fas fa-laptop"></i> Painel
            </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-book"></i> Gerenciar Cursos
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('/admin/cursos') }}" class="dropdown-item text-primary">
                        <i class="fas fa-book-open"></i> Cursos
                    </a>
                    <a href="{{ url('/admin/aulas') }}" class="dropdown-item text-primary">
                        <i class="fas fa-book-reader"></i> Aulas
                    </a>
                    <a href="{{ url('/admin/recursos') }}" class="dropdown-item text-primary">
                        <i class="fas fa-book-medical"></i> Recursos
                    </a>
                </div>
            </div>
            <a href="{{url('/admin/produtos')}}" class="nav-item nav-link">
                <i class="fas fa-store"></i> Produtos
            </a>
            <a href="{{url('/admin/usuarios')}}" class="nav-item nav-link">
                <i class="fas fa-user-graduate"></i> Alunos
            </a>
            <a href="{{url('/admin/vendas')}}" class="nav-item nav-link">
                <i class="fas fa-cash-register"></i> Vendas
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
