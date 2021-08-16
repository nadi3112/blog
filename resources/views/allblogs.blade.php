@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S no.</th>
                            <th>Title</th>
                            
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php $count=1; ?>
                        @foreach($blogs as $blog)
						
						
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $blog->title }}</td>
                            
                            <td>
                            
                            <a href="blog/{{$blog->id}}/viewblog" class="btn btn-primary">View</a>
                           
                            </td>
                        </tr>
						<?php $count++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div> 
    </div>
</div>
@endsection