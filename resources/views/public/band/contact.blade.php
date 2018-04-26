@extends('layouts.public.app')
@section('title', 'Kontakt')
@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Kontakt</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				Suchen Sie eine Band? - Wollen Sie uns engagieren? - Dürfen wir für Sie spielen? - Oder haben Sie Rückmeldungen?
 				<br><br>
                Dann nehmen Sie doch mit uns Kontakt auf. Wir freuen uns auf Ihre Anfrage.
			</div>
		</div>
		<div class="row contact-row">
			<div class="col-12 col-md-4 contact">
				<b>Pig Farmers Big Band</b><br>
				Postfach<br>
				4665 Oftringen
			</div>
			<div class="col-12 col-md-4 contact">
				<b>Bandleader</b><br>
				Hans Peter Brunner<br>
			    <a class="contact-mail" href="mailto:bandleader@pigfarmers.ch">bandleader@pigfarmers.ch</a>
			</div>
			<div class="col-12 col-md-4 contact">
				<b>Administration</b><br>
				Ruedi Studer<br>
				<a class="contact-mail" href="mailto:admin@pigfarmers.ch">admin@pigfarmers.ch</a>
			</div>
		</div>
		<div class="row contact-form-container">
			<div class="col-12">
				<h4>Kontaktformular</h4>
				<form action="" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="sexInput">Anrede</label><br>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="sexInput" id="sexInput1" value="female"> Frau
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="sexInput" id="sexInput2" value="male"> Herr
							</label>
						</div>
					</div>
					<div class="form-group">
					    <label for="prename">Vorname*</label>
					    <input type="text" class="form-control" name="prename" id="prename" placeholder="Vorname">
					</div>
					<div class="form-group">
					    <label for="name">Name*</label>
					    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
					</div>
					<div class="form-group">
					    <label for="phone">Telefon</label>
					    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefon">
					</div>
					<div class="form-group">
					    <label for="email">E-Mail*</label>
					    <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
					</div>
					<div class="form-group">
						<label for="message">Nachricht*</label>
						<textarea class="form-control" id="message" name="message" rows="8"></textarea>
						* Pflichtfelder
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Absenden</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
