<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover"
       id="groups_table">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody class="list-groups">
    @foreach ($roles as $role)
        @include('admin.groups.each')
    @endforeach
    </tbody>
</table>
<!--end: Datatable -->
