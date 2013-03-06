//Store Class
function StadiumClass() {
	this.id
	this.location
	this.title
	this.address
	this.number
	this.description
}

//Stores Listing Array
var arrStadiums = new Array();

//Renderer Option
var rendererOptions = {
  draggable: true
};

//Load Event
google.maps.event.addDomListener(window, 'load', function() {
	
	//Set Default map view
	var map = new google.maps.Map(document.getElementById('canvas'), {
		center : new google.maps.LatLng(43.66836829614057, -79.44866180419922),
		zoom : 12,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	});

	//Get store Data
	var data = new StadiumData;

	//Set Store
	var store = new storeLocator.View(map, data);

	//Set custome information display
	var info = new InfoBubble;
	store.getInfoWindow = function(data) {
		if (!data)
			return info;

		//Get Store Details
		var storeDetails = data.getDetails();

		//Custome Store Details Display
		var html = ['<div class="store"><div class="locator-title">', storeDetails.title, '</div><div class="locator-address">', storeDetails.address, '</div>', '<div class="locator-description">', '', '</div>', '<br /><div class="locator-number">Tel: ', storeDetails.number, '</div></div>'].join('');

		info.setContent($(html)[0]);

		return info;
	};

	//Set Information Panel
	new storeLocator.Panel(document.getElementById('info'), {
		view : store
	});
});

function LoadStadiumData() {
	// Store Class Variable
	var stadiumClass;

	$.ajax({
		type : 'POST',
		url : '../stadium/load_stadium_data',
		dataType : "json",
		async : false,
		success : function(data) {
			for ( x = 0; x < data.length; x++) {
				//Insert Data to Event Class
				stadiumClass = new StadiumClass();
				stadiumClass.location = new google.maps.LatLng(data[x].Latitude, data[x].Longitude);
				stadiumClass.title = data[x].Name;
				stadiumClass.address = data[x].Address;
				stadiumClass.number = data[x].ContactNumber;
				stadiumClass.description = data[x].Description;

				//Push into event Array
				arrStadiums.push(stadiumClass);
			}
		}
	});
}

/**
 * @extends storeLocator.StaticDataFeed
 * @constructor
 */
function StadiumData() {
	//Load Store Data;
	LoadStadiumData();

	var StadiumData = this;

	//Extend from storeLocator.StaticDataFeed
	$.extend(StadiumData, new storeLocator.StaticDataFeed);

	//Set Stores
	StadiumData.setStores(GetStadiums());
}

function GetStadiums() {
	var stadiums = [];
	//Loop array and store into stores
	for ( i = 0; i < arrStadiums.length; i++) {
		stadium = arrStadiums[i];

		//Create new store object and add to array
		var newStadium = new storeLocator.Store(i, stadium.location, null, {
			title : stadium.title,
			address : stadium.address,
			number : stadium.number,
			hours : stadium.hours,
			description : stadium.description
		});

		stadiums.push(newStadium);
	}

	return stadiums;
}