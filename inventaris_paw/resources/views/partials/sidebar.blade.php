<div class="d-flex flex-column flex-shrink-0 p-3 text-white h-100 w-100 sidebar-content shadow" style="background: linear-gradient(180deg, #0dcaf0 0%, #0d6efd 100%);">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="bi bi-box-seam fs-3 me-2"></i>
        <span class="fs-4 fw-bold tracking-wide">Owabong</span>
    </a>
    <hr class="opacity-25 my-3">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}" 
               class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-white bg-opacity-25 fw-bold shadow-sm' : '' }} d-flex align-items-center px-3 py-2" 
               aria-current="page"
               style="transition: all 0.2s;">
                <i class="bi bi-speedometer2 me-3 fs-5"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('barang.index') }}" 
               class="nav-link text-white {{ request()->is('barang*') ? 'active bg-white bg-opacity-25 fw-bold shadow-sm' : '' }} d-flex align-items-center px-3 py-2"
               style="transition: all 0.2s;">
                <i class="bi bi-archive me-3 fs-5"></i>
                Data Barang
            </a>
        </li>
    </ul>
    
    <div class="mt-auto">
        <!-- User profile removed as requested -->
    </div>
</div>

<style>
    .nav-pills .nav-link:hover:not(.active) {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
    }
    .hover-bg-opacity:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    .tracking-wide {
        letter-spacing: 0.5px;
    }
</style>
