<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 ">
            <h2 >Edit Profile</h2>
        </div>
        <form action="{{ route('profile.update',$profile) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="mb-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control" >
            <img src="{{asset('uploads/'.$profile->image) }}" alt="User Image" class="avatar-img rounded-circle">

        </div>
        <button class="btn btn-success px-5">Add</button>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
    </script>
</body>
</html>
