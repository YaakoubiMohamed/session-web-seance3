@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD LARAVEL </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produits.create')}}" title="Create a product"> Ajouter Produit<i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-border table-responsive-lg">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits  as $produit)
                <tr>
                    <td>{{$produit->id}}</td>
                    <td>{{$produit->name}}</td>
                    <td>{{$produit->price}}</td>
                    <td>{{$produit->quantity}}</td>
                    <td>{{$produit->description}}</td>
                    <td>
                        <form action="{{action('ProduitController@destroy', $produit->id)}}" method="post">

                            @csrf
                            @method('DELETE')
                            <a href="{{ route('produits.show',$produit->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>
    
                            <a href="{{ route('produits.edit',$produit->id) }}">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>                            
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $produits->links() }}
@endsection