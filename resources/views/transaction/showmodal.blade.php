<div class="portlet">
<div class="portlet-title">
<b>Tampilkan transaksi dari {{ $data->id }} - {{ $data->transaction_date }}</b>
</div>
<div class="portlet-body">
    <div class="row">
        @foreach ($products as $dp)
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="" alt="">
                    <div class="caption">
                        <p style="text-align: center"><b>{{ $dp->generic_name }}</b></p>
                        <p>Kategori : {{ $dp->category->name }}</p>
                        <p>Harga : Rp. {{ $dp->price }}</p>
                        <p>Jumlah beli: {{ $dp->pivot->quantity }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>