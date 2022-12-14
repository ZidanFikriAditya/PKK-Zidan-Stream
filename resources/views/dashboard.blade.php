    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 mt-3 mb-3">
                                    <a href="/film" class="card shadow " style="width: 18rem;">
                                            <i class="bi bi-person-circle fs-1 ms-3 card-img-top"></i>
                                        <div class="card-body">
                                            <h4><b>Tambah film </b></h4 >
                                        <p class="card-text">Tambahkan Film Disini</p>
                                        </div>
                                    </a>
                                </div>
                            <div class="col-lg-4 mt-3 mb-3">
                                <a href="/show" class="card shadow " style="width: 18rem;">
                                    <i class="bi bi-archive fs-1 ms-3 card-img-top"></i>
                                <div class="card-body">
                                    <h4><b>Lihat Data Film</b></h4 >
                                <p class="card-text">Lihat Data film</p>
                                </div>
                            </a>
                            </div>
                            <div class="col-lg-4 mt-3 mb-3">
                                <a href="/category" class="card shadow " style="width: 18rem;">
                                    <i class="bi bi-tags fs-1 ms-3 card-img-top"></i>
                                <div class="card-body">
                                    <h4><b>Category</b></h4 >
                                <p class="card-text">Lihat Data film</p>
                                </div>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
