<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Formulir Cek Ongkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="row">

        <div class=" col-8">
            <form action="#" method="post" class="">
                <center><h3>Create</h3></center><hr>
                @csrf
                
                {{-- <!-- Input untuk kolom 'Province' -->
                <label for="province">Asal Province:</label>
                <select name="province" id="province">
                    <option value="Pilih Province">Pilih Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
                    @endforeach
                </select> --}}
                <!-- Input untuk kolom 'origin' -->
                <label for="origin">Asal City:</label>
                <select name="origin" id="origin" class="form-control" required>
                    <option value="origin">Pilih City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                    @endforeach
                </select>

                {{-- <!-- Input untuk kolom 'Province' -->
                <label for="province">Tujuan Province:</label>
                <select name="province" id="province">
                    <option value="Pilih Province">Pilih Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
                    @endforeach
                </select> --}}
                <!-- Input untuk kolom 'destination' -->
                <label for="destination">Tujuan City:</label>
                <select name="destination" id="destination" class="form-control" required>
                    <option value="destination">Pilih City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                    @endforeach
                </select>

                <!-- Input untuk kolom 'weight' -->
                <label for="weight">Berat Paket:</label>
                <input type="text" id="weight" name="weight" required>

                <!-- Input untuk kolom 'courier' -->
                <label for="courier">Kurir:</label>
                <select name="courier" id="courier" class="form-control" required>
                    <option value="courier">Pilih Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>

                <!-- Tombol untuk mengirimkan formulir -->
                <input type="submit" name="cekOngkir" value="Submit">
            </form>
        </div>
        <div class="col-4 bg-white">
            @if ($ongkir != '')
                <h3>Rincian Ongkir</h3>
                @foreach ($ongkir as $item)
                    <div>
                        <label for="name">
                            {{ $item['name'] }}
                        </label>
                        @foreach ($item['costs'] as $cost)
                            <div class="mb-3">
                                <label for="service">
                                    Service : {{ $cost['service'] }}
                                </label>
                                @foreach ($cost['cost'] as $harga)
                                    <div >
                                        <label for="harga">
                                            Harga : {{ $harga['value'] }} (est : {{ $harga['etd'] }} hari)
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
