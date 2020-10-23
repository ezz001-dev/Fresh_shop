


<?php $no= 1;?>


     @foreach($carts as $cart)
          <tr>
            <th scope="row">{{$no++}}</th>
            <td>{{$cart->user->username}}</td>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->product->price}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->subtotal}}</td>
            <td>
                  <a href="#" class="btn btn-outline-danger btn-sm">Remove</a>
                  <a href="#" class="btn btn-outline-info btn-sm">Edit</a>
            </td>
          </tr>
          @endforeach

