
{{-- Tampilan Menu Sidebar Untuk User level 1 yaitu Admin --}}
@if($users->level == 1)
  <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Data Produk</span>
  </li>
  <li class="menu-item">
      <a href="" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div data-i18n="Analytics">Produk</div>
      </a>
      
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/produk/" class="menu-link">
            <div data-i18n="Without menu">Semua Produk</div>
          </a>
        </li>
      </ul>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/produk/create" class="menu-link">
            <div data-i18n="Without menu">Tambah Produk</div>
          </a>
        </li>
      </ul>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Data Kasir</span>
      </li>

      <li class="menu-item">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-user-rectangle"></i>
          <div data-i18n="Analytics">kasir</div>
        </a>
        
        
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="/kasir/" class="menu-link">
              <div data-i18n="Without menu">Semua kasir</div>
            </a>
          </li>
        </ul>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="/kasir/create" class="menu-link">
              <div data-i18n="Without menu">Tambah kasir</div>
            </a>
          </li>
        </ul>

      </li>
      
  </li>
  
@endif

{{-- Tampilan Menu Sidebar Untuk User level 2 yaitu Kasir --}}
@if($users->level == 2)
  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Menu Kasir</span>
  </li>

  <li class="menu-item">
    <a href="/penjualan/" class="menu-link">
      <i class="menu-icon tf-icons bx bx-cart-alt"></i>
      <div data-i18n="Analytics">Penjualan</div>
    </a>
  </li>
@endif

