<!--**********************************Chat box start***********************************-->
<div class="chatbox">
    <div class="chatbox-close"></div>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#notes">NOTIZEN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#alerts">GEBURTSTAGE</a>
            </li>

        </ul>
        <div class="tab-content">
            @include('business.layouts.component.box.tab.tab-birthday')
            @include('business.layouts.component.box.tab.tab-note')
        </div>
    </div>
</div>
<!--**********************************Chat box End***********************************-->
