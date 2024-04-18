@extends('Master_page')
@section('title','espace admin')
@section('content')
<h1 class="text-center">Liste de produits</h1>


<table class="table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

@foreach ($products as $item)
<tr>
    <td>{{$item['titre']  }}</td>
    <td>{{$item['prix']  }}DH</td>
    <td><img src="{{ asset('imgs/'.$item['image']) }}" alt="Image " class="img-fluid" width="100"></td>
    <td style="display: flex">
        <a class="btn btn-dark" href="produits/{{ $item->id }}/edit">Modifier</a>
        &nbsp;&nbsp;

        <form action={{ route('destroy', ['id' => $item->id]) }} method="POST">
            @csrf
            @method('delete')

            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
                Supprimer
            </button>

            <!-- Modal de confirmation -->
            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer cet objet ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </td>
</tr>

@endforeach


    </tbody>
  </table>
  {{ $products->links('vendor\pagination\custom') }}
@endsection
