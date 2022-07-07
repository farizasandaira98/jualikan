<html>
<head>
	<title>CETAK DATA PEMASUKAN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
		}
	</style>

	<table width="100%">
    <tr>
    <td width="50" align="center"><h5>LAPORAN PEMASUKAN</h5><br><h6>PASAR ONLINE</h6></td>
    {{-- <td width="25" align="center"><img src="cetak/logohmjti.png" width="250%"></td> --}}
    </tr>
    </table>
    <hr>
	<table class='table table-bordered'>
		<thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Tanggal Pemasukan</th>
                      <th>Pemasukan</th>
                    </tr>
              </thead>
              <tbody>
              @foreach($pemasukan as $ang)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ang->created_at }}</td>
                    <td>{{ $ang->pemasukan }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Pemasukan</td>
                        <td>{{ $totalpemasukan }}</td>
                    </tr>
              </tbody>
	</table>
</body>
</html>
