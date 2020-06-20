<!--begin::Modal-->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalLabel">Create New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                <form method="POST" action="{{ route('admin.categories.store') }}" class="kt-form"
                      id="newCategoryModalForm">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        <span class="form-text text-muted">Choose a name for new category.</span>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newSelect">Parent Category</label>
                        <select class="form-control @error('parent_id') is-invalid @enderror" id="newSelect"
                                name="parent_id">
                            <option disabled="disabled" selected="selected">Choose Parent Category</option>
                            <option value="null">New Parent category</option>

                            @foreach ($categories as $selectCategory)
                                @if ($selectCategory->isParent())
                                    <option value="{{ $selectCategory->id }}">{{ $selectCategory->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('parent_id')
                        <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea"
                                  name="description" rows="3"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </div>
                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->

@if ($errors->any())
@section('js')
    <script>
        $(document).ready(function () {
            $('#newCategoryModal').modal('show');
        });
    </script>
@endsection
@endif
