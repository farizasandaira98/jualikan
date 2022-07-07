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
                DATA STOK IKAN - <strong>EDIT DATA</strong>
            </div>
            <div class="card-body">
                <a href="/penjual/ikan" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/penjual/ikan/update/{{ $stokikan->id }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Jenis Ikan</label>
                        <input type="text" name="jenis_ikan" class="form-control" placeholder="Jenis Ikan .." value="{{ $stokikan->jenis_ikan }}">

                        @if($errors->has('jenis_ikan'))
                        <div class="text-danger">
                            {{ $errors->first('jenis_ikan')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Jumlah Ikan</label>
                        <input type="text" name="jumlah_ikan" class="form-control" placeholder="Jumlah Ikan .." value="{{ $stokikan->jumlah_ikan }}">

                        @if($errors->has('jumlah_ikan'))
                        <div class="text-danger">
                            {{ $errors->first('jumlah_ikan')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input type="text" name="harga_satuan" class="form-control" placeholder="Harga Satuan .." value="{{ $stokikan->harga_satuan }}">

                        @if($errors->has('harga_satuan'))
                        <div class="text-danger">
                            {{ $errors->first('harga_satuan')}}
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
var msg  = "EDIT DATA STOK IKAN - PASAR ONLINE IKAN ";
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
