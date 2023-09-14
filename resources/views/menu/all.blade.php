<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        td,
        th {
            font-size: 11px;
        }
    </style>


    <title>TES - Venturo Camp Tahap 2</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <form action="/data-penjualan" method="GET">
                <div class="card-body">

                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option disabled selected>Pilih Tahun</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}"
                                            {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                            <a href="/data-penjualan/json-transaksi" target="_blank" rel="Array Menu"
                                class="btn btn-secondary">
                                Json Transaksi
                            </a>
                            <a href="/data-penjualan/json-menu" target="_blank" rel="Array Menu"
                                class="btn btn-secondary">
                                Json Menu
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" style="margin: 0;">
                            <thead>
                                <tr class="table-dark">
                                    <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">
                                        Menu
                                    </th>
                                    <th colspan="12" style="text-align: center;">Periode Pada 2022
                                    </th>
                                    <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total
                                    </th>
                                </tr>
                                <tr class="table-dark">
                                    <th style="text-align: center;width: 75px;">Jan</th>
                                    <th style="text-align: center;width: 75px;">Feb</th>
                                    <th style="text-align: center;width: 75px;">Mar</th>
                                    <th style="text-align: center;width: 75px;">Apr</th>
                                    <th style="text-align: center;width: 75px;">Mei</th>
                                    <th style="text-align: center;width: 75px;">Jun</th>
                                    <th style="text-align: center;width: 75px;">Jul</th>
                                    <th style="text-align: center;width: 75px;">Ags</th>
                                    <th style="text-align: center;width: 75px;">Sep</th>
                                    <th style="text-align: center;width: 75px;">Okt</th>
                                    <th style="text-align: center;width: 75px;">Nov</th>
                                    <th style="text-align: center;width: 75px;">Des</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                                </tr>
                                @foreach ($makanan as $menu)
                                    <tr>
                                        <td>{{ $menu->menu }}</td>
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @foreach (range(1, 12) as $bulan)
                                            <td style="text-align: right;">
                                                @if (date('n', strtotime($menu->tanggal)) == $bulan)
                                                    @if ($menu->total)
                                                        {{ number_format($menu->total, 0, ',', ',') }}
                                                        @php
                                                            $sum += $menu->total;
                                                        @endphp
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                        <td style="text-align: right;">
                                            {{ number_format($sum, 0, ',', ',') }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                                </tr>
                                @foreach ($minuman as $menu)
                                    <tr>
                                        <td>{{ $menu->menu }}</td>
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @foreach (range(1, 12) as $bulan)
                                            <td style="text-align: right;">
                                                @if (date('n', strtotime($menu->tanggal)) == $bulan)
                                                    @if ($menu->total)
                                                        {{ number_format($menu->total, 0, ',', ',') }}
                                                        @php
                                                            $sum += $menu->total;
                                                        @endphp
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                        <td style="text-align: right;">
                                            {{ number_format($sum, 0, ',', ',') }}
                                        </td>
                                    </tr>
                                @endforeach
                                <thead>
                                    <tr>
                                        <td class="table-secondary bg-dark text-white"><b>Total</b></td>
                                        @foreach ($totalMonths as $bulan => $total)
                                            <td style="text-align: right;"
                                                class="table-secondary text-right bg-dark text-white">
                                                <b>{{ $total > 0 ? number_format($total, 0, ',', ',') : '' }}</b>
                                            </td>
                                        @endforeach
                                        <td style="text-align: right;"
                                            class="table-secondary text-right bg-dark text-white">
                                            <b>{{ number_format($totals, 0, ',', ',') }}</b>
                                        </td>
                                    </tr>
                                </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>
