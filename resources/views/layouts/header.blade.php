<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <?php 
        use App\Models\Category;
        use App\Models\Transaction;
        use Illuminate\Support\Facades\Auth;
        
        if(boolval(Auth::user()) == 'true'){
          $category = Category::get();
        $transaction = Transaction::where('user_id', auth()->user()->id);
        }
        ?>
        @auth
        
        {{-- Category --}}
        @if ($transaction->pluck('status')->first() == 'paid')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            @foreach ($category as $ctg)
            
            <li><a class="dropdown-item" href="#">{{ $ctg->name }}</a></li>
            
            @endforeach
        @else
        <li class="nav-item dropdown">
          @if (boolval($transaction))
          <a class="nav-link" href="/transaction/{{ $transaction->pluck('reference')->first() }}">
            Checkout
          </a>
          
          @else
          <a class="nav-link" href="/paket">
            Pilih Paket
          </a>
          @endif

        </li>
        @endif
        <a class="nav-link" href="/home">
              Home
        </a>
          
          
          {{-- Logout --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <li><button class="dropdown-item">Logout</button></li>
                @can('admin')                    
                <li><a href="/dashboard" class="dropdown-item">Dashboard</a></li>
                @endcan
              </form>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Daftar/Masuk
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Registerasi</a></li>
                </ul>
                @endauth
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>