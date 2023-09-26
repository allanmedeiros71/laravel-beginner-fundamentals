<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <H1>
        List of tasks
        <br>
    </H1>

    @forelse ($tasks as $task)
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <h4 class="card-header"><b>{{ $task->title }}</b></h4>
            <div class="card-body">
                <h5 class="card-title">{{ $task->description }}</h5>
                <p class="card-text">{{ $task->long_description }}</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Updated at {{ $task->updated_at }} </small>
            </div>
        </div>
        <br>
    @empty
        <div>There are no tasks</div>
    @endforelse

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


