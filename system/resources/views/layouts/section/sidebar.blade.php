<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li>
                    <a href="{{ url('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-calendar-alt"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="has-child {{ Request::is('ketinggian_air', 'suhu', 'kelembapan', 'cuaca') ? 'open' : '' }}">
                    <a href="#"
                        class="{{ Request::is('ketinggian_air', 'suhu', 'kelembapan', 'cuaca') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-window-section"></span>
                        <span class="menu-text">Data</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ 'ketinggian_air' }}"
                                class="{{ Request::is('ketinggian_air') ? 'active' : '' }}">Ketinggian Air</a>
                        </li>
                        <li>
                            <a href="{{ 'suhu' }}" class="{{ Request::is('suhu') ? 'active' : '' }}">Suhu</a>
                        </li>
                        <li>
                            <a href="{{ 'kelembapan' }}"
                                class="{{ Request::is('kelembapan') ? 'active' : '' }}">kelembapan</a>
                        </li>
                        <li>
                            <a href="{{ 'cuaca' }}" class="{{ Request::is('cuaca') ? 'active' : '' }}">cuaca</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title mt-30">
                    <span>Applications</span>
                </li>
                <li class="has-child {{ Request::is('public_api') ? 'open' : '' }}">
                    <a href="#" 
                    class="{{ Request::is('public_api') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-envelope"></span>
                        <span class="menu-text">API</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li class>
                            <a href="{{ url('public_api') }}" class="{{ Request::is('public_api') ? 'active' : '' }}">Public API</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('report') }}" class="{{ Request::is('report') ? 'active' : '' }}">
                        <span class="nav-icon uil uil-window-section"></span>
                        <span class="menu-text">Report</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
