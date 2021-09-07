@extends('frontend.master.master_page')

@section('page_content')
	<!-- Begin page top -->
	<section class="page-top">
		<div class="container">
			<div class="page-top-in">
				<h2><span>Get In Touch</span></h2>
			</div>
		</div>
	</section>
	<!-- End page top -->

	<div class="container">
		<div class="row">
			<div class="col-sm-6 animation">
				<div class="contact-content">
					
					<h4>Contact Form</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Nam scelerisque faucibus risus non iaculis.</p>
					<form id="contact-form" name="form1" method="post" action="send_contact.php">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<div class='input-group date' id='datetimepicker1'>
										<input type='text' class="form-control" name="date_input" id="date_input">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								<div class="col-xs-6">
									<div class='input-group date' id='datetimepicker4'>
										<input type='text' class="form-control" name="time_input" id="time_input">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<label for="name">Your Name*</label>
									<input name="name" type="text" id="name" class="form-control" value="" data-msg-required="Please enter your name." required>
								</div>
								<div class="col-xs-6">
									<label for="customer_mail">Your Email*</label>
									<input name="customer_mail" type="text" id="customer_mail" class="form-control" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<label for="subject">Subject*</label>
									<input name="subject" type="text" id="subject" class="form-control" value="" data-msg-required="Please enter the subject." required>
								</div>
								<div class="col-xs-6">
									<label for="website">Website</label>
									<input type="text" class="form-control" id="website" name="website" value="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="comments">Your Message*</label>
							<textarea name="comments" id="comments" class="form-control" rows="3" data-msg-required="Please enter your message." required></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-6 animation">
				<div class="contact-content">
					<h4>Get in touch</h4>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
					<address>
						<i class="fa fa-map-marker"></i> Alexander Street. Vancouver, BC<br>
						V6A 1E1 Canada<br><i class="fa fa-phone"></i> 012.345.6789<br>
						<i class="fa fa-print"></i> 012.345.6789<br>
						<i class="fa fa-envelope"></i> <a href="mailto:mail@domainname.com">mail@domainname.com</a>
					</address>
				</div>
			</div>
		</div>
	</div>
	<!-- Google Map -->
	<div class="animation" id="googlemaps"></div>
@endsection

@section('custom_js')	
	<!-- Google Map -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="{{ asset('public/frontend/flatize/vendor/jquery.gmap.js') }}"></script>
	<script>

		/*
		Map Settings

			Find the Latitude and Longitude of your address:
				- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
				- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

		*/

		// Map Markers
		var mapMarkers = [{
			address: "1234 Pine Shade Pl, Salt Lake City, UT 84118",
			html: "<strong>Flatize Shop</strong><br>123 Name Ave, Suite 600, Salt Lake City, UT 84118<br><br>",
			popup: false,
			icon: {
				image: "images/maker.png",
				iconsize: [28, 42],
				iconanchor: [28, 32]
			}
		}];

		// Map Initial Location
		var initLatitude = 40.65610;
		var initLongitude = -112.02586;

		// Map Extended Settings
		var mapSettings = {
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				overviewMapControl: true
			},
			scrollwheel: false,
			markers: mapMarkers,
			latitude: initLatitude,
			longitude: initLongitude,
			zoom: 15
		};

		var map = $("#googlemaps").gMap(mapSettings);

		// Map Center At
		var mapCenterAt = function(options, e) {
			e.preventDefault();
			$("#googlemaps").gMap("centerAt", options);
		}

	</script>
@endsection