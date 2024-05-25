<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Barang</h1>

<table id="customers">
  <tr>
  <th>Nama Distributor</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Stok Barang</th>
  </tr>
  @foreach($barang as $b)
  <tr>
  <td>{{$b->Distributor->nama_distributor}}
                        </td>
                        <td>{{$b->nama_barang}}</td>
                        <td>{{$b->harga_barang}}</td>
                        <td>{{$b->stok_barang}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>
