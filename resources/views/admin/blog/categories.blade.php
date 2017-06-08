@extends('layouts.admin.master')

@section('styles')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{URL::to('css/admin/categories.css')}}">
@endsection

@section('content')

<div class="container">
  <section id="category-admin">
    <form  method="post">
      <div class="input-group">
        <label for="name">Category Name</label>
          <input type="text" name="name" id="name">
          <button type="submit" name="btn">Create Category</button>
      </div>
    </form>
    <section class="list">
      @foreach($categories as $category)
        <article class="">
          <div class="category-info" data-id='{{$category->id}}'>
              <h3>{{$category->name}}</h3>

          </div>
          <div class="edit">
            <nav>
              <ul>
                <li class="category-edit"><input type="text" name="" value=""></li>
                <li><a href="#">Edit</a></li>
                <li><a href="#" class="danger">delete</a></li>
              </ul>
            </nav>
          </div>
        </article>
      @endforeach


    </section>

    @if($categories->lastPage() > 1)
    <section class="pagination">
      @if($categories->currentPage()!== 1)
      <a href="{{$categories->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
      @endif

      @if($categories->currentPage()!== $categories->lastPage())
        <a href="{{$categories->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
      @endif
    </section>
    @endif
  </section>

</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var token = "{{Session::token()}}";
</script>
<script type="text/javascript" src = "{{URL::to('js/categories.js')}}">

</script>
@endsection
