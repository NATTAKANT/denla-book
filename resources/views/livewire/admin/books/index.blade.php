<div>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-12 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-b-30">
                            <div class="col-md-5 col-xxl-12">
                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                    <div class="new-arrivals-img-contnent">
                                        @if ($book->img)
                                            <img class="img-fluid" src="{{ asset('storage/images/' . $book->img) }}"
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
                                        {{-- <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul> --}}
                                        <span class="review-text">34 การยืม/ครั้ง </span>
                                        {{-- <a class="product-review" href="" data-bs-toggle="modal"
                                            data-bs-target="#reviewModal">Write a
                                            review?</a>
                                        <p class="price">$320.00</p> --}}
                                    </div>
                                    <p>ผู้แต่ง: <span class="item">{{ $book->author }}</span> </p>
                                    <p>ผู้แต่งร่วม: <span class="item">{{ $book->author_co }}</span> </p>

                                    <p>สถานะการเผยแพร่:
                                        <span class="item">
                                            @switch($book->status)
                                                @case('active')
                                                    <br>
                                                    <i class="fa fa-eye   text-success"></i>
                                                    เผยแพร่
                                                @break

                                                @case('inactive')
                                                    <br>
                                                    <i class="fa fa-eye-slash  text-danger"></i>
                                                    ไม่เผยแพร่
                                                @break

                                                @default
                                            @endswitch
                                        </span>
                                    </p>
                                    <p>สถานะการยืม:
                                        <span class="item">
                                            @switch($book->status)
                                                @case('active')
                                                    <br>
                                                    <i class="fa fa-user  text-danger"></i>
                                                    อยู่ในระหว่างการยืม
                                                @break

                                                @case('inactive')
                                                    <br>
                                                    <i class="fa fa-user   text-success"></i>
                                                    ว่าง
                                                @break

                                                @default
                                            @endswitch
                                            {{-- <i class="fa fa-check text-success"></i> --}}
                                        </span>
                                    </p>
                                    {{-- <p>เลขหนังสือ: <span class="item">{{ $book->call_number ?? '-' }}</span> </p>
                                    <p>ISBN: <span class="item">{{ $book->ISBN ?? '-' }}</span> </p>
                                    <p>ISSN: <span class="item">{{ $book->ISSN ?? '-' }}</span> </p>
                                    <p>DOI: <span class="item">{{ $book->DOI ?? '-' }}</span> </p>
                                    <p>สำนักพิมพ์: <span class="item">{{ $book->publisher ?? '-' }}</span></p>
                                    <p>จำนวนหน้า: <span class="item">{{ $book->page ?? '-' }}</span></p>
                                    <p class="text-content">
                                        {{ $book->synopsis ??
                                            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae ad deserunt quod
                                                                                                                        libero, eius consequuntur soluta a aspernatur, voluptatum ea cupiditate sit ut
                                                                                                                        asperiores.' }}
                                    </p>
                                    <p>บันทึกโดย: <span class="item">{{ $book->created_by ?? '-' }}</span></p>
                                    <p>แก้ไขโดย: <span class="item">{{ $book->updated_by ?? '-' }}</span></p>
                                    <p>บันทึกเวลา: <span class="item">{{ $book->created_by ?? '-' }}</span></p>
                                    <p>แก้ไขเวลา: <span class="item">{{ $book->updated_by ?? '-' }}</span></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-end">
        {{ $books->links() }}
    </div>
</div>
