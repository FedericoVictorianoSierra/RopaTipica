

<head>
    <link href="css/pagoTarjeta.css" rel="stylesheet">
</head>

    <div class="container">
  <div class="card">
    <button class="proceed"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
  <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
</svg></button>
   <img src="./img/VISA-logo.png" class="logo-card">
 <label>Número de tarjeta:</label>
 <input id="user" class="input cardnumber"  placeholder="1234 5678 9101 1121" type="number">
 <label>Nombre:</label>
 <input class="input name"  placeholder="Edgar Pérez" type="text">
 <label class="toleft">CCV:</label>
 <input class="input toleft ccv" placeholder="321" type="number" maxlength="3">
  </div>
  <div class="receipt">
    <div class="col"><p>Costo:</p>
    <h2 class="cost">$400</h2><br>
    <p>Nombre:</p>
    <h2 class="seller">Codedgar</h2>
    </div>
    <div class="col">
      <p>Lista de compra:</p>
      <h3 class="bought-items">Corsair Mouse</h3>
      <p class="bought-items description">Gaming mouse with shiny lights</p>
      <p class="bought-items price">$200 (50% discount)</p><br>
      <h3 class="bought-items">Gaming keyboard</h3>
      <p class="bought-items description">Look mommmy, it has colors!</p>
      <p class="bought-items price">$200 (50% discount)</p><br>
    </div>
    <p class="comprobe">Esta información será enviada por e-mail</p>
  </div>
</div>

