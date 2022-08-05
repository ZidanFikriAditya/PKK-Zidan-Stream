@extends('layouts.before')
@section('section')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('storage/slider/img1.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('storage/slider/img3.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('storage/slider/img2.jpg') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container mt-5">
    <div class="row">
        <div class="col-md-9">
            <h3>Segera Berlangganan</h3>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam, maiores nemo fugiat dolores aspernatur animi molestias magnam dolorum, consequuntur officiis sequi saepe optio praesentium temporibus dignissimos. Nam tempora, rerum, pariatur temporibus nesciunt dolores culpa officiis quam atque assumenda sed facilis. Ducimus minus eligendi unde, accusantium temporibus labore voluptatem sequi a non, vero dicta. Saepe earum assumenda labore dolor ex atque ratione aut quis numquam incidunt architecto dolores, voluptate laudantium facilis impedit quia eum blanditiis possimus itaque. Atque ratione sunt ullam est iste! Praesentium distinctio nulla perferendis reprehenderit. Blanditiis esse quibusdam perspiciatis veritatis error ratione doloremque corrupti nemo fugit praesentium autem, dolorem, cum obcaecati ut commodi ullam consequuntur voluptates asperiores repellat explicabo ea. Magnam officiis vel et cum quisquam laboriosam nesciunt quibusdam ipsa minima modi rem blanditiis sed sunt repellat, voluptatum amet eius at eaque ea nemo aperiam eos ipsam iure omnis. Maxime nostrum provident ab magni ullam, nihil optio, laborum et ipsam molestiae eius in modi cum illum reprehenderit! Fugiat labore debitis, qui voluptas ad voluptatem sint laboriosam rerum in quasi. Voluptas cupiditate voluptatibus voluptates corporis sunt similique magni autem. Vero voluptatum explicabo sapiente magni excepturi exercitationem ratione facilis esse iste tempora aperiam dolores, quaerat recusandae saepe, non sit corporis?
        </div>
        <div class="col-md-3">
            <div class="box border shadow p-3">
                <h3>Sematan</h3>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt delectus ipsa doloremque necessitatibus beatae voluptates fugiat quod. Possimus a expedita ut deserunt consectetur tempora veniam unde, rerum, provident aliquid hic aperiam? Officiis quod natus nemo incidunt fugit officia quia molestiae quam maiores et. Animi veniam vitae quos facere odit rem!
            </div>
        </div>
    </div>
  </div>
@endsection