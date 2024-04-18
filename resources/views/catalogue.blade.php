<img src="{{public_path('img/logo.png')}}"   />
<h1>Notre Catalogue </h1>
<h2> Liste des Prduits </h2>


<table class="table container">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prix initial</th>
        <th scope="col">Prix avec solde</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
@foreach ($products as $item)
<tr>
    <td>{{$item['nom']  }}</td>
    <td>{{$item['prix']  }}DH</td>
    <td>{{ (int)$item['prix'] - (0.4 * (int)$item['prix']) }} DH</td>
    

    <td><img src="{{ public_path('imgs/'.$item['image']) }}" alt="Image " class="img-fluid" width="100"></td>
    </td>
</tr>

@endforeach


    </tbody>
  </table>
