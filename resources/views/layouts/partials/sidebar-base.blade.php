<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <span class="logo">VIT CRM</span>
        <button id="toggleSidebar">☰</button>
    </div>

    <ul class="menu">
        @yield('menu')
    </ul>

    <div class="sidebar-footer">
        <small>{{ auth()->user()->name }}</small>
        <span class="role">{{ auth()->user()->getRoleNames()->first() }}</span>
    </div>
</aside>
