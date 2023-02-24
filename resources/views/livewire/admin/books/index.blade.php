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

        @include('livewire.admin.books.form')

    </div>
    <div class="d-flex justify-content-end">

        {{ $books->links() }}

        {{-- <label for="">แสดงจำนวนต่อหน้า</label> --}}
        <select wire:model="paginate" class="form-control wide mb-3 ">
            @for ($i = 10; $i <= 50; $i += 10)
                <option value="{{ $i }}"> {{ "${i} / หน้า" }}</option>
            @endfor
        </select>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
@endpush
