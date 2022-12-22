@extends('layouts.main')

@section('container')
<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1>Keranjang</h1>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php $no = 1; ?>
                            @foreach ($penjualan as $item)
                                {{-- @foreach ($item->produk as $list) --}}
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->total_bayar }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <form action="/penjualan/{{ $item->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Yakin Ingin Menghapus Post ?')"><i class="menu-icon tf-icons bx bx-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            @endforeach     
                           </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
<div class="row mt-4 mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1>Menu Kasir</h1>
    
                <div class="row">
                    <div class="col">
                        <form action="/penjualan" method="POST">
                            @csrf
                              <div class="mb-3">
                                <label for="nama_barang" class="form-label @error('nama_barang') is-invalid @enderror">Nama Barang</label>
                                <input type="text"  class="form-control" id="nama_barang" name="nama_barang" required autofocus>
                                  @error('nama_barang')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="row">
                                <div class="col">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" readonly>
                                </div>
                                <div class="col">
                                    <label for="harga_jual" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" readonly>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" >
                                </div>
                              </div>
                
                              <div class="mb-3 my-4 float-end">
                                <button type="submit" class="btn btn-primary">Tambah Barang</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1>Pembayaran</h1>
                <form action="{{ route('delete-all') }}" method="post" enctype="multipart/form-data">
                    @method('delete')
                    @csrf

                    <div class="col">
                        <label for="total_bayar" class="form-label">Total Yang Harus Dibayar</label>
                        <input type="text" class="form-control" id="total_bayar" name="total_bayar" value=" {{ $penjualan->sum('total_bayar') }}" disabled>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="uang_pembayaran" class="form-label">Nominal Pembayaran</label>
                            <input type="text" class="form-control" id="uang_pembayaran" name="uang_pembayaran">
                        </div>
                        <div class="col">
                            <label for="uang_kembalian" class="form-label">Kembalian</label>
                            <input type="number" class="form-control" id="uang_kembalian" name="uang_kembalian" readonly>
                        </div>
                    </div>
                    <div class="mb-3 my-4 float-end">
                        <form action="/penjualan/" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary">Selesai</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    document.getElementById('uang_pembayaran').addEventListener('input', function() {
    // Dapatkan nilai total harga dan jumlah uang yang diberikan
    var total_bayar = document.getElementById('total_bayar').value;
    var uang_pembayaran = this.value;

    // Hitung uang kembalian
    var uang_kembalian = uang_pembayaran - total_bayar;

    // Tampilkan hasil perhitungan di form uang kembalian
    document.getElementById('uang_kembalian').value = uang_kembalian;
    });

</script>






<script>
    $(function () {
        $('#nama_barang').autocomplete({
            source:function(request,response){
                
                $.getJSON('{{ url('api/penjualan') }}?term='+request.term,function(data){
                    var array = $.map(data,function(row){
                        return {
                            value:row.nama_barang,
                            label:row.nama_barang,
                            name:row.nama_barang,
                            kode_barang:row.kode_barang,
                            harga_jual:row.harga_jual
                        }
                    })

                    response($.ui.autocomplete.filter(array,request.term));
                })
            },
               minLength:1,
               delay:500,
               select:function(event,ui){
                   $('#kode_barang').val(ui.item.kode_barang)
                   $('#harga_jual').val(ui.item.harga_jual)
               }
           })
    })
</script>
@endsection