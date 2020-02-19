{{-- Partial to show flash messages --}}

@if (session()->has('success'))
    <div class="flash alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="flash alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
@if (session()->has('info'))
    <div class="flash alert alert-info">
        {{ session()->get('info') }}
    </div>
@endif