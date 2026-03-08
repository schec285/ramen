const mapElement = document.querySelector('gmp-map');
const placeAutocomplete = document.querySelector('gmp-place-autocomplete'); let innerMap;
let marker;
let infoWindow;

export function initLoadGoogleMapsAPI() {
    (g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })({
        key: import.meta.env.VITE_GOOGLE_MAPS_API_KEY,
        v: "weekly",
        // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
        // Add other bootstrap parameters as needed, using camel case.
    });
    initMap();
}

async function initMap() {


    //  Request the needed libraries.
    await Promise.all([
        google.maps.importLibrary('marker'),
        google.maps.importLibrary('places'),
    ]);
    // Get the inner map.
    innerMap = mapElement.innerMap;
    innerMap.setOptions({
        mapTypeControl: false,
        streetViewControl: false,
    });
    placeAutocomplete.includedRegionCodes = ['jp'];

    // Create the marker and infowindow.
    marker = new google.maps.marker.AdvancedMarkerElement({
        map: innerMap,
        // gmpDraggable: true, // ドラッグ可能にする, 将来的な拡張として検討
    });
    infoWindow = new google.maps.InfoWindow();
    google.maps.event.addListener(innerMap, 'click', (event) => {

        const lat = event.latLng.lat();
        const lng = event.latLng.lng();
        setPlace(lat, lng);
        const position = { lat, lng };

        // 情報ウィンドウ表示
        let content = document.createElement('div');
        let nameText = document.createElement('span');
        nameText.textContent = '選択した地点';
        content.appendChild(nameText);

        content.appendChild(document.createElement('br'));

        let addressText = document.createElement('span');
        addressText.textContent = `緯度:${lat} 経度:${lng}`;
        content.appendChild(addressText);

        updateInfoWindow(content, position);
        // マーカー移動
        marker.position = position;
    });

    // Add the gmp-placeselect listener, and display then result on the map.
    placeAutocomplete.addEventListener('gmp-select', async ({ placePrediction }) => {
        const place = placePrediction.toPlace();
        await place.fetchFields({
            fields: ['displayName', 'formattedAddress', 'location'],
        });
        // If the place has a geometry, then present it on a map.
        if (place.viewport) {
            innerMap.fitBounds(place.viewport);
        } else {
            innerMap.setCenter(place.location);
            innerMap.setZoom(19);
        }
        setPlace(place.location.lat(), place.location.lng());
        let content = document.createElement('div');
        let nameText = document.createElement('span');
        nameText.textContent = place.displayName;
        content.appendChild(nameText);
        content.appendChild(document.createElement('br'));
        let addressText = document.createElement('span');
        addressText.textContent = place.formattedAddress;
        content.appendChild(addressText);
        updateInfoWindow(content, place.location);
        marker.position = place.location;
    });
}

// Helper function to create an info window.
function updateInfoWindow(content, center) {
    infoWindow.setContent(content);
    infoWindow.setPosition(center);
    infoWindow.open({
        map: innerMap,
        anchor: marker,
        shouldFocus: true,
    });
}

function setPlace(lat, lng) {
    document.getElementById("lat").value = lat;
    document.getElementById("lng").value = lng;
}