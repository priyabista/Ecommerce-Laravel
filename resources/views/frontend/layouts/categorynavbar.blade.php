<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e1e0e0; font-weight: 500;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav custom-bg">
        @foreach($categories as $category)
        <li class="nav-item px-5">
        <a class="nav-link" href="{{route('view.category',['category_id'=>$category->category_id])}}">{{$category->name}}</a>  
        <ul class="subcategoryname">
        <li><a class="nav-link" id="subcategory1" href="{{route('view.product',['subcategoryname'=>$category->subcategoryname])}}">{{$category->subcategoryname}}</a></li>
         </ul> 
            @endforeach   
        </li>
        </ul>
        </div>
    </div>
</nav>

