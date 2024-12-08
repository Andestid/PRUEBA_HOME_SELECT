@extends('layouts.app')

@section('content')
<!-- Sección Principal -->
<div class="jumbotron bg-primary text-white text-center py-5">
  <div class="container">
    <h1 class="display-3">Bienvenido Home Select</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
    <a href="/contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
  </div>
</div>

<!-- Sección Descripción -->
<div class="container my-5">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <h2>¿Por qué elegirnos?</h2>
      <p>
        Somos una agencia inmobiliaria con años de experiencia en el sector, especializados en propiedades de calidad y con atención personalizada para cada cliente. Ofrecemos una amplia variedad de propiedades para venta y alquiler en las mejores ubicaciones.
      </p>
    </div>
    <div class="col-lg-6 mb-4">
      <h2>Nuestros Servicios</h2>
      <ul>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
      </ul>
    </div>
  </div>
</div>

<!-- Galería de Propiedades Destacadas -->
<div class="container my-5">
  <h2 class="text-center mb-4">Propiedades Destacadas</h2>
  <div class="row">
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Casa Familiar Moderna</h5>
          <p class="card-text">Ubicación: Centro de la ciudad. 4 habitaciones, jardín amplio y garaje privado.</p>
          <a href="/propiedad/1" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Apartamento en la Playa</h5>
          <p class="card-text">Con vistas al mar, 2 habitaciones, completamente amueblado y con acceso directo a la playa.</p>
          <a href="/propiedad/2" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Villa Exclusiva</h5>
          <p class="card-text">Villa de lujo con piscina privada, 5 dormitorios y excelente ubicación.</p>
          <a href="/propiedad/3" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Llamado a la Acción -->
<div class="bg-dark text-white py-5">
  <div class="container text-center">
    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
    <p class="lead">Contáctanos hoy y comienza tu búsqueda con los mejores profesionales en el sector inmobiliario.</p>
    <a href="/contacto" class="btn btn-light mt-2">Contáctanos</a>
  </div>
</div>

@endsection