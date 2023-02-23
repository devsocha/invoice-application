@extends('user.layout.layout')
@section('title','Nowa faktura')
@section('content')
    <form method="post" action="{{route('companyAddSubmit')}}">
        @csrf
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
        <label>
            <input type="radio" name="opcja" value="opcja1" onclick="showButton()"> Wybierz firmę z dodanych
        </label>
        <label>
            <input type="radio" name="opcja" value="opcja2" onclick="showButton()"> Dodaj nową firmę
        </label>
        </div>
        <div id="button-container"></div>

        <script>
            function showButton() {
                const selectedOption = document.querySelector('input[name="opcja"]:checked').value;
                const buttonContainer = document.getElementById("button-container");

                if (selectedOption === "opcja1") {
                    buttonContainer.innerHTML = '<div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">' +
                        '<input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Wybierz firmę"><datalist id="datalistOptions"><option value="San Francisco"></datalist></div>';
                } else if (selectedOption === "opcja2") {
                    buttonContainer.innerHTML = '<div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">' +
                        '<label for="name" class="form-label">Nazwa firmy</label>' +
                        '<input type="text" name="name" class="form-control" id="name" placeholder="Wpisz nazwę firmy"></div>' +
                        '<div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">' +
                        '<label for="adress" class="form-label">Adres</label>' +
                        '<input type="text" name="adress" class="form-control" id="adress"  placeholder="Wpisz adres firmy "> </div>'+
                        '<div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">' +
                        '<label for="zipCode" class="form-label">Kod pocztowy</label>' +
                        '<input type="text" name="zipCode" class="form-control" id="zipCode"  placeholder="Wpisz kod pocztowy "> </div>'+
                        '<div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">'+
                        '<label for="city" class="form-label">Miasto</label>' +
                        '<input type="text" name="city" class="form-control" id="city"  placeholder="Wpisz miasto "></div>' +
                        '<div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">' +
                        '<label for="nip" class="form-label">Numer NIP</label>' +
                        '<input type="text" name="nip" class="form-control" id="nip" value="" placeholder="Wpisz numer NIP"></div>';
                } else {
                    buttonContainer.innerHTML = '';
                }
            }
        </script>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
        <label for="exampleDataList" class="form-label">Konto do przelewu</label>
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Wybierz konto">
        <datalist id="datalistOptions">
            <option value="San Francisco">
            <option value="New York">
            <option value="Seattle">
            <option value="Los Angeles">
            <option value="Chicago">
        </datalist>
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="netto" class="form-label">Ile czasu do zapłaty</label>
            <input type="number" name="wartosc"id="netto">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="nazwa" class="form-label">Nazwa produktu / usługi</label>
            <input type="text" class="form-control" name="wartosc"id="nazwa" >
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="netto" class="form-label">Ile sztuk</label>
            <input type="number" name="wartosc"id="netto" step="1" value="1">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="netto" class="form-label">Kwota netto</label>
            <input type="number" name="wartosc"id="netto" step="0.01" value="12.34">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="netto" class="form-label">VAT</label>
            <select>
                <option>
                    23%
                </option>
                <option>
                    8%
                </option>
                <option>
                    0%
                </option>
            </select>
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <input type="submit" value="Dodaj" class="btn btn-success" >
            <a href="{{route('company')}}" class="btn btn-danger">Cofnij</a>
        </div>
    </form>
@endsection
