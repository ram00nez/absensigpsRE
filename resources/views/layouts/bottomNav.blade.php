<div class="appBottomMenu">
    <a href="/dashboard" class="item {{ request()->is('dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="/absensi/history" class="item {{ request()->is('/absensi/history') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="book-outline" role="img" class="md hydrated"
                    aria-label="book outline"></ion-icon>
            <strong>History</strong>
        </div>
    </a>
    <a href="/absensi/create" class="item ">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="/absensi/izin" class="item {{ request()->is('/absensi/izin') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
            <strong>Izin</strong>
        </div>
    </a>
    <a href="/editprofile" class="item {{ request()->is('/editprofile') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
</div>