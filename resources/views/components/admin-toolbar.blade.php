@php use Illuminate\Support\Facades\Auth; @endphp

@if(Auth::check() && Auth::user()->is_admin)
    <div style="
        position: fixed;
        top: 10px;
        right: 10px;
        background: #343a40;
        color: white;
        padding: 10px 15px;
        border-radius: 8px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.3);
        z-index: 9999;
        display: flex;
        gap: 10px;
        align-items: center;
    ">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm">Admin Dashboard</a>
        <a href="{{ route('pricing') }}" class="btn btn-info btn-sm">View Pricing</a>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
@endif
