<div>
    {{-- <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Datatable</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-hover header-border display" style="min-width: 845px">
                    <thead>
                        <tr class="table-active">
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->status }}</td>
                                <td>{{ $book->location_id }}</td>
                                <td>{{ $book->material }}</td>
                                <td>
                                    @if ($book->img)
                                    @else
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div> --}}
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-b-30">
                            <div class="col-md-5 col-xxl-12">
                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                    <div class="new-arrivals-img-contnent">
                                        @if ($book->img)
                                            <img class="img-fluid" src="{{ asset('storage/images/1.jpg') }}"
                                                alt="">
                                        @else
                                            <img class="img-fluid" src="{{ asset('storage/images/product/2.jpg') }}"
                                                alt="">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xxl-12">
                                <div class="new-arrival-content position-relative">
                                    <h4>
                                        {{ $book->title }}
                                        @if ($book->title_another)
                                            , {{ $book->title_another }}
                                        @endif
                                    </h4>
                                    <div class="comment-review star-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="review-text">(34 reviews) / </span><a class="product-review"
                                            href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a
                                            review?</a>
                                        <p class="price">$320.00</p>
                                    </div>
                                    <p>Availability: <span class="item"> In stock <i
                                                class="fa fa-check-circle text-success"></i></span></p>
                                    <p>Product code: <span class="item">0405689</span> </p>
                                    <p>Brand: <span class="item">Lee</span></p>
                                    <p class="text-content">There are many variations of passages of Lorem Ipsum
                                        available,
                                        but the majority have suffered alteration in some form, by injected humour, or
                                        randomised words.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
