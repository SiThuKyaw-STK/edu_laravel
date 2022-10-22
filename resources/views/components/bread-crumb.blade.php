<div class="row m-0">
    <div class="p-3">
        <nav aria-label="breadcrumb" class="p-3 rounded rounded-3" style="background: #00000010">
            <ol class="breadcrumb bg-transparent m-0">
                <li class="breadcrumb-item fw-bolder"><a href="{{route('home')}}" class="text-secondary">Home</a></li>
                {{ $slot }}
            </ol>
        </nav>
    </div>
</div>
