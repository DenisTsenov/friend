@extends('layouts.app')
@section('content')
<div class="main">
    <h1 align="center">Freind List!</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Country</th>
                <th scope="col">Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $row)
            <tr>
                <td> {{ $row->real_name }}</td>
                <td> {{ $row->email }}</td>
                <td> {{ $row->country_name }}</td>
                <td> {{ $row->fr2 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getPage(page);
    });

    function getPage(page) {
        $.ajax({
            url: '/show/friends?page=' + page
        }).done(function (data) {
            $('.main').html(data);
            //set page num in the url
            location.hash = page;
        });
    }
</script>
@endsection
