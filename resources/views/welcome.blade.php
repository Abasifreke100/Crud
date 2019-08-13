@extends('layouts.app')
@section('content')

    <div class="container jumbotron" style="margin-top:100px">
        <div class="content-center">
            <div class="row">
                <div class="col-md-6">
                    @if(session()->has('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="container">
                        <h3><strong>Assign Your Task</strong></h3>

                        <form action="{{route('post.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Assignee" name="assignee" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Task" name="task" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Description" name="description" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>

                @include('edit')

                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <th>#</th>
                            <th>Assignee</th>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </thead>
                            <tbody>

                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$post->assignee}}</td>
                                    <td>{{$post->task}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>
                                        <button data-toggle="modal" class="btn btn-info"
                                                data-post-id="{{$post->id}}"
                                                data-post-assignee="{{$post->assignee}}"
                                                data-post-task="{{$post->task}}"
                                                data-post-description="{{$post->description}}"
                                                data-target="#exampleModal"><i class="far fa-edit"></i>
                                        </button>
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('script')

    <script>
        let url ="{{ route('post.update') }}";
        $("#exampleModal").on('show.bs.modal', function(event){
            let btn = event.relatedTarget;
            let id = $(btn).data('post-id');
            let assignee = $(btn).data('post-assignee');
            let task = $(btn).data('post-task');
            let description = $(btn).data('post-description');
            $("#assignee").val(assignee);
            $("#task").val(task);
            $("#description").val(description);


            $("#update").attr('action', url+'/'+id)

        })
    </script>

@endsection