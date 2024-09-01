function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        fallbackToIP();
    }
}

function showPosition(position) {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;

    const geocoder = new google.maps.Geocoder();
    const latlng = { lat: lat, lng: lng };

    geocoder.geocode({ location: latlng }, function (results, status) {
        if (status === "OK") {
            if (results[0]) {
                const components = results[0].address_components;
                let city, state, country, postalCode;

                components.forEach(component => {
                    if (component.types.includes("locality")) {
                        city = component.long_name;
                        let inputField = document.querySelector("[name='geo_city']");
                        if (inputField && typeof city === 'string' && city.trim() !== '')
                            inputField.value = city;
                    }
                    if (component.types.includes("administrative_area_level_1")) {
                        state = component.short_name;
                    }
                    if (component.types.includes("country")) {
                        country = component.short_name;
                    }
                    if (component.types.includes("postal_code")) {
                        postalCode = component.short_name;
                        let inputField = document.querySelector("[name='geo_pincode']")
                        if (inputField && typeof postalCode === 'string' && postalCode.trim() !== '')
                            inputField.value = postalCode;
                    }
                });

                document.getElementById("geo_location").innerText = `${city}, ${state}, ${country}`;

                selectCityInDropdown(city);
            } else {
                console.warn("No results found");
            }
        } else {
            console.warn("Geocoder failed due to: " + status);
            fallbackToIP();
        }
    });
}

function showError(error) {
    console.warn(`ERROR(${error.code}): ${error.message}`);
    fallbackToIP();
}

function fallbackToIP() {
    fetch("https://ipinfo.io/json?token=57e52e2c8b1098")
        .then(response => response.json())
        .then(data => {
            const loc = data.city + ", " + data.region + ", " + data.country;
            document.getElementById("geo_location").innerText = loc;

            let city = data.city;
            let cityField = document.querySelector("[name='geo_city']");
            if (cityField && typeof city === 'string' && city.trim() !== '')
                cityField.value = city;

            let postalCode = data.postal;
            let inputField = document.querySelector("[name='geo_pincode']")
            if (inputField && postalCode.trim() !== '')
                inputField.value = postalCode;

            selectCityInDropdown(city);
        })
        .catch(error => console.error("Error fetching IP info:", error));
}

function selectCityInDropdown(city) {
    city = city.toLowerCase();
    const selectElement = $('#location_area');
    const matchingOption = selectElement.find(`option[value="${city}"]`);

    if (matchingOption.length > 0) {
        selectElement.val(city).trigger('change');
    }
}


getLocation();

