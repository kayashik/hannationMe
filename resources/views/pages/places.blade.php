@extends('main')

@section('title', '| Places')

@section('content')

	<div class="navbar navbar-inverse navbar-fixed-left my-nav-bar col-md-2">
  <a class="navbar-brand" href="{{ route('categories.index') }}">Add Category</a>
  <div class="clearfix"></div>
  <hr class="page-menu">
  <ul class="nav navbar-nav">
  @foreach($categories as $category)
   <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}</a>
     <ul class="dropdown-menu" role="menu">
      @foreach($category->subcategories as $subcategory)
      <li><a href="{{ route('pages.placeList', $subcategory->id) }}">{{$subcategory->name}}</a></li>
      @endforeach
      <li class="divider"></li>
      <li><a href="{{ route('subcategories.index') }}">Add Subcategory</a></li>
     </ul>
   </li>
   @endforeach
</div>

<div class="container col-md-10">

  @if(isset($places))
    @if (!$places->isEmpty())
      {{var_dump($places->isEmpty())}}
      <table class="table event-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Type</th>
              <th>Description</th>
              <th>Fitures</th>
              <th>Address</th>
              <th></th>
            </tr>
          </thead>
          <tbody> 
            @foreach ($places as $place) 
            <tr>
                <td>{{ $place->id }}</td>
                <td>{{ $place->name }}</td>
                <td>{{ $place->type }}</td>
                <td>{{ substr($place->description, 0, 15) }}{{ strlen($place->description)>30 ? '...': '' }}</td>
                <td>{{ substr($place->fitures, 0, 15) }}{{ strlen($place->fitures)>30 ? '...': '' }}</td>
                <td>{{ substr($place->address, 0, 30) }}{{ strlen($place->fitures)>30 ? '...': '' }}</td>
                <td><a href="{{ route('places.show', $place->id)}}" class="btn btn-default btn-sm">View</a>
                  <a href="{{ route('places.edit', $place->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                            </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else        
        <h1>There is no Places here.</h1>
        <h2> You can create the first one!</h2>
        <div class="col-md-offset-3 col-md-6">
          <a href="{{ route('places.create') }}" class="btn btn-default btn-lg btn-block">Create New place!</a>
        </div>
      @endif 
          
  @endif
</div>
<div class="clearfix"></div>

@stop