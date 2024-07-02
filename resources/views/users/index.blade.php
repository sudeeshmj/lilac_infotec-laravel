<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Search</h1>
    <input type="text" id="search" class="form-control" placeholder="Search name/designation/department">
    <div id="results" class="mt-4">
        @foreach($users as $user)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $user->designation->name }}</h6>
                    <p class="card-text">{{ $user->department->name }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
$(document).ready(function(){
    $('#search').on('keyup', function(){
        var query = $(this).val();
        $.ajax({
            url: "{{ route('search') }}",
            type: "GET",
            data: {'query': query},
            success: function(data){
                $('#results').html(data);
            }
        });
    });
});
</script>
</body>
</html>