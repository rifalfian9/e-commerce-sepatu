@extends('layouts.adminApp')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Produk</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Status Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            ?>
                            <tbody>
                                @foreach ($b as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->harga_satuan }}</td>
                                        <td>{{ $item->jumlah_barang }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <form action="{{ url('status', $item->id_barang) }}" method="post">
                                                @csrf
                                                @if ($item->status == 'ready')
                                                    <input type="hidden" name="ready" value="ready">
                                                    <button class="btn " type="submit" disabled><i class="fa fa-eye"
                                                            style="color: green;"></i></button>
                                                    <input type="hidden" name="sold" value="soldout">
                                                    <button class="btn" type="submit"><i class="fa fa-eye-slash"
                                                            style="color: red;"></i></button>
                                                @elseif($item->status == 'soldout')
                                                    <input type="hidden" name="ready" value="ready">
                                                    <button class="btn " type="submit"><i class="fa fa-eye"
                                                            style="color: green;"></i></button>
                                                    <input type="hidden" name="sold" value="soldout">
                                                    <button class="btn" type="submit" disabled><i
                                                            class="fa fa-eye-slash" style="color: red;"></i></button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ url('item', $item->id_barang) }}" class="btn"
                                                onclick="centeredPopup(this.href,'myWindow','1508','1216','yes');return false"><i
                                                    class="fa fa-eye" style="color: blue;"></i></a>
                                            <a class="btn" data-toggle="modal"
                                                data-target="#edit-{{ $item->id_barang }}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('hapus', $item->id_barang) }}" class="btn"><i
                                                    class="fa fa-trash" style="color: red;"></i></a>
                                        </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($b as $item)
        <div class="modal fade" id="edit-{{ $item->id_barang }}" tabindex="-1" role="dialog"
            aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Tambah Menu {{ $item->id_barang }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form-horizontal row-fluid" action="{{ route('edit', $item->id_barang) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Kategori</label>
                                <select id="kategori" class="form-control @error('kategori') is-invalid @enderror"
                                    name="kategori" required autocomplete="kategori" autofocus>
                                    @if (!empty($k))
                                        @foreach ($k as $val)
                                            <option value="{{ $val->id_kategori_barang }}"
                                                @if ($val->id_kategori_barang == $item->id_kategori_barang) selected @endif>
                                                {{ $val->nama_kategori_barang }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input id="nama_barang" type="text" value="{{ old('nama_barang', $item->nama_barang) }}"
                                    class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
                                    autofocus>

                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Jumlah Barang</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="number" placeholder="total barang"
                                            value="{{ old('jumlah_barang', $item->jumlah_barang) }}"
                                            class="span8 @error('jumlah_barang') is-invalid @enderror"
                                            name="jumlah_barang"><span class="add-on">Pcs</span>
                                        @error('jumlah_barang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select id="size" class="form-control @error('size') is-invalid @enderror"
                                    name="size" required autocomplete="size" autofocus>
                                    @if (!empty($s))
                                        @foreach ($s as $val)
                                            <option value="{{ $val->id_size }}"
                                                @if ($val->id_size == $item->id_size) selected @endif>
                                                {{ $val->size }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Warna</label>
                                <select id="warna" class="form-control @error('warna') is-invalid @enderror"
                                    name="warna" required autocomplete="warna" autofocus>
                                    @if (!empty($w))
                                        @foreach ($w as $val)
                                            <option value="{{ $val->id_warna }}"
                                                @if ($val->id_warna == $item->id_warna) selected @endif>
                                                {{ $val->warna }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Harga Barang</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <span class="add-on">Rp.</span><input type="text" placeholder="5.000"
                                            value="{{ old('harga_satuan', $item->harga_satuan) }}"
                                            class="span8  @error('harga_satuan') is-invalid @enderror"
                                            name="harga_satuan">
                                        @error('harga_satuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="hidden" name="oldImage" value="{{ $item->foto_barang }}">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar">

                                <!-- error message untuk title -->
                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $item->foto_barang) }}" height="40%" width="40%">
                                </img>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="deskripsi" id="site-description">{{ old('discription', $item->deskripsi_barang) }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script language="javascript">
        var popupWindow = null;

        function centeredPopup(url, winName, w, h, scroll) {
            LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
            TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
            settings =
                'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll +
                ',resizable'
            popupWindow = window.open(url, winName, settings)
        }
        $(document).ready(function() {
            $('.zero_config').dataTable();
        });
    </script>
@endsection
