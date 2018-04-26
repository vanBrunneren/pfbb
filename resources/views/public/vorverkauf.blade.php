@extends('layouts.public.app')
@section('title', 'Vorverkauf')
@section('content')
<form action="" method="POST">
	{{ csrf_field() }}
	<div class="container content-container">
        <div class="row">
            <div class="col-12 vorverkauf-header">
                <img src="http://pigfarmers.ch/vorverkauf/header.png" class="img-fluid" alt="Pig Farmers onStage" />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Allgemeine Informationen</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Datum und Ort der Veranstaltung:
            </div>
            <div class="col-8">
                26. Mai 2018 / Mehrzweckhalle, Grubenweg, 4665 Oftringen
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Beginn der Veranstaltung:
            </div>
            <div class="col-8">
                20.00 Uhr, Türöffnung 19.15 Uhr
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Eintrittspreis:
            </div>
            <div class="col-8">
                CHF 30.00 ohne Konsumation, unter 16 Jahren CHF 15.00
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Verpflegung:
            </div>
            <div class="col-8">
                Es werden Getränke und reichhaltige Canapées zum Verkauf angeboten. Es gibt keine warme Küche.
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Reservation:
            </div>
            <div class="col-8">
                Die Plätze sind nummeriert und werden durch den Veranstalter zugewiesen. Pro Tisch werden 10 bis max. 12 Personen platziert. Nach der Reservation erhalten Sie eine Rechnung zur Einzahlung. Erst mit der fristgerechten Einzahlung ist die Reservation definitiv. Bei nicht fristgerechter Zahlung werden die Plätze wieder freigegeben. <b>Sie erhalten auch nach der Zahlung keine Tickets.</b> Diese liegen am Abend der Veranstaltung für Sie zur Abholung bereit.
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Rückerstattung:
            </div>
            <div class="col-8">
                Eine Rückerstattung für bezahlte Tickets erfolgt nicht.
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Abendkasse:
            </div>
            <div class="col-8">
                Sofern freie Plätze verfügbar sind, können an der Abendkasse noch Tickets gelöst werden, Kassaöffnung 19.15 Uhr.
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Vorverkauf:
            </div>
            <div class="col-8">
                Sie können sich unten die nötige Anzahl Tickets reservieren oder über 062 836 40 50 zu Geschäftszeiten. Der Vorverkauf endet am 23. Mai 2018, 12.00 Uhr, oder früher, falls ausverkauft.
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<hr>
        	</div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Vorverkauf</h3>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
        		Ich bestelle
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
	        		<div class="form-inline">
	        			<input type="text" class="form-control" name="inputAdults" id="inputAdults" placeholder="Anzahl">
						<label class="form-label" for="inputAdults">
							&nbsp;Tickets à CHF 30.00 (Erwachsene)
						</label>
					</div>
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
	        		<div class="form-inline">
	        			<input type="text" class="form-control" name="inputChildren" id="inputChildren" placeholder="Anzahl">
						<label class="form-label" for="inputChildren">
							&nbsp;Tickets à CHF 15.00 (Jugendliche bis vor dem 16. Geburtstag, Ausweispflicht)
						</label>
					</div>
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-check">
					<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
					<label class="form-check-label" for="exampleRadios1">
						im vorderen Teil des Saals
					</label>
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
						<label class="form-check-label" for="exampleRadios2">
							im hinteren Teil des Saals
						</label>
					</div>
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<label for="inputName">Name</label>
					<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<label for="inputPrename">Vorname</label>
					<input type="text" class="form-control" id="inputPrename" name="inputPrename" placeholder="Vorname">
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<label for="inputStreet">Strasse</label>
					<input type="text" class="form-control" id="inputStreet" name="inputStreet" placeholder="Strasse">
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-row">
        			<div class="form-group col-md-4">
				     	<label for="inputPLZ">PLZ</label>
				      	<input type="text" class="form-control" id="inputPLZ" name="inputPLZ" placeholder="PLZ">
				    </div>
        			<div class="form-group col-md-8">
				     	<label for="inputCity">Ort</label>
				      	<input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Ort">
				    </div>
        		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<label for="inputPhone">Telefonnummer</label>
					<input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Telefonnummer">
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<label for="inputEmail">E-Mail</label>
					<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-Mail Adresse">
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
					<label for="inputBemerkungen">Bemerkungen</label>
					<textarea class="form-control" id="inputBemerkungen" name="inputBemerkungen" rows="6"></textarea>
				</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<button type="submit" class="btn btn-primary">Absenden</button>
        	</div>
        </div>
	</div>
</form>
@endsection
