<div class="card">
    <div class="card-header card-header-primary d-flex">
        @if(isset($return))
        <div class="p-0">
            @include('components.buttons.return', ['route' => $return])
        </div>
        @endif
        <div class="ml-2">
            <h4 class="card-title">{{ $title }}</h4>
            <p class="card-category">{{ $category }}</p>
        </div>
    </div>
    <div class="card-body">
        {{ $body ?? '' }}
    </div>
    <div class="card-footer">
        {{ $footer ?? '' }}
    </div>
</div>
