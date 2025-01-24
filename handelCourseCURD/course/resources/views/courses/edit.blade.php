<!-- resources/views/courses/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1 class="text-center mt-5">Edit Course</h1>

<form method="POST" action="{{ route('courses.update', $course->id) }}" class="w-50 m-auto">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Course Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ $course->name }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3" required>{{ $course->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="logo" class="form-label">Logo URL</label>
        <input type="url" name="logo" class="form-control" id="logo" value="{{ $course->logo }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</body>
</html>
