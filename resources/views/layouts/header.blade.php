<nav class="navbar navbar-expand-lg bg-black navbar-dark fixed-top ">
  <div class="container-fluid ">
    <a class="navbar-brand ms-3  rounded" href="/"><img src="{{ asset('image/head/logo.png') }}" class="shadow-white" alt="" width="100"></a>
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
              <a class="nav-link me-3 rounded" href="/transaction/{{ $transaction->pluck('reference')->first() }}">
                <i class="bi bi-journal-medical"></i>
              </a>
              @elseif(boolval($transaction->pluck('reference')->first()) == 'NULL' AND boolval($transaction->first()) > 0)
              <a class="nav-link me-3 rounded" href="/checkout">
                <i class="bi bi-cart-dash"></i>
              </a>
              @else
              <a class="nav-link me-3 rounded" href="/paket">
                Pilih Paket
              </a>
              @endif
              
            </li>
            
            @endcan
            
            @if ($tgl == $expired->pluck('expired')->first())
            <form action="/destroy-langganan/{{ $expired->pluck('id')->first() }}" method="post">
              @csrf
              <button class="nav-link btn btn-black me-3" type="submit">
                <i class="bi bi-house"></i>
              </button>
            </form>
            @else
            <a class="nav-link me-3 rounded {{ ($title == 'Home') ? 'active bg-warning' : "" }} 
            " id="nav-home" href="/home">
              <i class="bi bi-house"></i>
            </a>
            @endif
            
            
            
            {{-- Logout --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle pe-3 rounded" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu bg-dark">
                
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <li><button class="dropdown-item text-white">Logout</button></li>
                  @can('admin')                    
                  <li><a href="/dashboard" class="dropdown-item text-white">Dashboard</a></li>
                  @endcan
                </form>                
                  @endauth
                  @guest
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle rounded" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Daftar/Masuk
                    </a>
                    <ul class="dropdown-menu bg-dark">
                      <li><a class="dropdown-item text-white" href="/login">Login</a></li>
                      <li><a class="dropdown-item text-white" href="/register">Registerasi</a></li>
                    </ul>
                  @endguest
                  
                  
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>