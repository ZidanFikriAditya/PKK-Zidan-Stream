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
        use Carbon\Carbon;
        
        if(boolval(Auth::user()) == 'true'){
          $category = Category::get();
          $transaction = Transaction::where('user_id', auth()->user()->id);
        }
        
        $tgl =  Carbon::now()->format('Y-m-d');
        
        if(boolval(Auth::user()) == 'true'){
          $expired = Transaction::where('user_id', auth()->user()->id); 
        }
        ?>
        @auth
        
        {{-- Category --}}


            @can('user')
            <li class="nav-item dropdown">
              @if (boolval($transaction->pluck('reference')->first()))
              <a class="nav-link" href="/transaction/{{ $transaction->pluck('reference')->first() }}">
                Deatil Bayar
              </a>
              @elseif(boolval($transaction->pluck('reference')->first()) == 'NULL' AND boolval($transaction->first()) > 0)
              <a class="nav-link" href="/checkout">
                Checkout 
              </a>
              @else
              <a class="nav-link" href="/paket">
                Pilih Paket
              </a>
              @endif
              
            </li>
            
            @endcan
            
            @if ($tgl == $expired->pluck('expired')->first())
            <form action="/destroy-langganan/{{ $expired->pluck('id')->first() }}" method="post">
              @csrf
              <button class="nav-link btn btn-dark" type="submit">
                Home
              </button>
            </form>
            @else
            <a class="nav-link" href="/home">
              Home
            </a>
            @endif
            
            
            
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
                  @endauth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Daftar/Masuk
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/login">Login</a></li>
                      <li><a class="dropdown-item" href="/register">Registerasi</a></li>
                    </ul>
                  
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>