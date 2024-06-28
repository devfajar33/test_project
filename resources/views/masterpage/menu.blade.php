<nav class="sb-sidenav accordion sb-sidenav-dark mt-3" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Dashboard</div>
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard 
            </a>
            <div class="sb-sidenav-menu-heading">FORM MASTER</div>
            <a class="nav-link" href="{{ route('product') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                Products
            </a>
            <a class="nav-link" href="{{ route('service') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                Services
            </a>
            <div class="sb-sidenav-menu-heading">FORM TRANSACTIONS</div>
            <a class="nav-link" href="{{ route('transaction') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                Transactions
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">PROJECT SAGARA 2024</div>
    </div>
</nav>
