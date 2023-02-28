<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                @include('livewire.admin.books.filter')
            </div>
        </div>
        @if ($mode == 1)
            @include('livewire.admin.books.card')
        @elseif ($mode == 0)
            @include('livewire.admin.books.table')
        @endif


    </div>
   

    <div class="d-flex justify-content-end">
        <div class="row">
            <div class="col-auto">
                {{ $books->links() }}
            </div>
            <div class="col-auto ml-4">

                <select wire:model="paginate" class="form-control mb-3 ">
                    @for ($i = 10; $i <= 50; $i += 10)
                        <option value="{{ $i }}"> {{ "${i} / หน้า" }}</option>
                    @endfor
                </select>
            </div>
        </div>
        {{-- <label for="">แสดงจำนวนต่อหน้า</label> --}}
    </div>
    @include('livewire.admin.books.form')

</div>
@push('scripts')
    <script type="text/javascript">
        window.livewire.on('Store', () => {
            $('#FormModal').modal('hide');
        });
    </script>
@endpush
