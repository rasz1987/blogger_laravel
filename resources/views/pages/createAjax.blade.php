@extends('layouts.app')

@section('content')
<div class="ajax">
    <h1>Teste pagination ajax</h1>
    
        @foreach ($products as $product)
            <h1> {{$product->title}} </h1>
        @endforeach
    
    

    {{$products->links()}}
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
    /*===========Pagination================*/
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        
        getProducts(page);
    });

    function getProducts(page) {
        

        $.ajax({
            url: 'ajax/products?page=' + page
        }).done(function(data){
            $('.ajax').html(data);
            location.hash=page;
        });
    }


    </script>

@endsection