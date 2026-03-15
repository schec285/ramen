const mapElement = document.querySelector('gmp-map');
const placeAutocomplete = document.querySelector('gmp-place-autocomplete');
let innerMap;
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
    });
    infoWindow = new google.maps.InfoWindow();
    
    // 緯度・経度の値取得、値があればマップに反映
    const latInput = document.getElementById("lat");
    const lngInput = document.getElementById("lng");
    if (latInput.value && lngInput.value) {
        const position = {
            lat: parseFloat(latInput.value),
            lng: parseFloat(lngInput.value)
        };
        marker.position = position;
        innerMap.setCenter(position);
        innerMap.setZoom(18);
    }

    // Add the gmp-placeselect listener, and display then result on the map.
    placeAutocomplete.addEventListener('gmp-select', async ({ placePrediction }) => {
        const place = placePrediction.toPlace();
        await place.fetchFields({
            fields: [
                'id',
                'displayName',
                'formattedAddress',
                'location',
                'addressComponents',
                'types',
            ],
        });
        // NGタイプ
        const blockedTypes = [
            "train_station",
            "subway_station",
            "transit_station",
            "airport"
        ];

        if (place.types?.some(type => blockedTypes.includes(type))) {
            alert("駅や空港は登録できません");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.viewport) {
            innerMap.fitBounds(place.viewport);
        } else {
            innerMap.setCenter(place.location);
            innerMap.setZoom(18);
        }
        setPlaceValues(place);
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
function updateInfoWindow(content, centerLocation) {
    infoWindow.setContent(content);
    infoWindow.setPosition(centerLocation);
    infoWindow.open({
        map: innerMap,
        anchor: marker,
        shouldFocus: true,
    });
}

function setPlaceValues(place) {
    document.getElementById("lat").value = place.location.lat();
    document.getElementById("lng").value = place.location.lng();
    document.getElementById("place_id").value = place.id;
    const country = place.addressComponents?.find(c => c.types.includes('country'));
    document.getElementById("country_iso").value = country.shortText;
    document.getElementById("postal_code").value = place.addressComponents?.find(c => c.types.includes('postal_code'))?.longText.replace(/-/g, "") || '';
    document.getElementById("prefecture").value = place.addressComponents?.find(c => c.types.includes('administrative_area_level_1'))?.longText || '';
    const city = place.addressComponents?.find(c => c.types.includes('locality'))?.longText || place.addressComponents?.find(c => c.types.includes('administrative_area_level_2'))?.longText || '';
    document.getElementById("city").value = city;
    document.getElementById("address").value = place.displayName || '';
    document.getElementById("formatted_address").value = place.formattedAddress || '';
    document.getElementById("address").value = cleanAddress(place.formattedAddress || '', country);
}

function cleanAddress(formattedAddress, country) {
    if (country.shortText === 'JP') {
        return formattedAddress
            .replace(new RegExp(`^${country.longText}、?`), "")
            .replace(/〒\d{3}-\d{4}\s*/, "");
    }
    return formattedAddress;
}