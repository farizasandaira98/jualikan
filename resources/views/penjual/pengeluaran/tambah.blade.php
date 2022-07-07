<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                DATA PENGELUARAN - <strong>TAMBAH DATA</strong>
            </div>
            <div class="card-body">

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                </div>
                @endif

                <a href="/penjual/pengeluaran" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/penjual/pengeluaran/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nominal pengeluaran</label>
                        <input type="text" name="pengeluaran" class="form-control" placeholder="Nominal Pengeluaran ..">

                        @if($errors->has('pengeluaran'))
                        <div class="text-danger">
                            {{ $errors->first('pengeluaran')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi ..">

                        @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Foto Kwitansi</label>
                        <input type="file" accept=".jpg,.png,.jpeg" name="foto_kwitansi" class="form-control">

                        @if($errors->has('foto_kwitansi'))
                        <div class="text-danger">
                            {{ $errors->first('foto_kwitansi')}}
                        </div>
                        @endif
                    </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>

        </form>

    </div>
</div>
</div>
<script type="text/javascript">
var rev = "fwd";
function titlebar(val){
var msg  = "TAMBAH DATA PENGELUARAN - PASAR ONLINE IKAN ";
var res = " ";
var speed = 100;
var pos = val;
var le = msg.length;
if(rev == "fwd"){
  if(pos < le){
      pos = pos+1;
      scroll = msg.substr(0,pos);
      document.title = scroll;
      timer = window.setTimeout("titlebar("+pos+")",speed);
  } else {
      rev = "bwd";
      timer = window.setTimeout("titlebar("+pos+")",speed);
  }
} else {
  if(pos > 0) {
      pos = pos-1;
      var ale = le-pos;
      scrol = msg.substr(ale,le);
      document.title = scrol;
      timer = window.setTimeout("titlebar("+pos+")",speed);
  } else {
      rev = "fwd";
      timer = window.setTimeout("titlebar("+pos+")",speed);
  }
}
}
titlebar(0);
</script>
</body>
</html>
