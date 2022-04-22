// See post: https://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/

var map = L.map('map', {
    zoom: 13,
})

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: ['a', 'b', 'c'],
}).addTo(map)

var myURL = jQuery('script[src$="leaf.js"]')
    .attr('src')
    .replace('leaf.js', '')

var myIcon = L.icon({
    iconUrl: 'img/logo.png',
    iconRetinaUrl: 'img/logo.png',
    iconSize: [29, 24],
    iconAnchor: [9, 21],
    popupAnchor: [0, -14],
})



const URL = 'https://ipinfo.io/212.201.44.244?token=94d6bf55a02146';

async function viewLocation() {
    await fetch(URL, {
            method: "GET",
            headers: {
                "Accept": "application/json"
            },
        }).then(response => {
            // indicates whether the response is successful (status code 200-299) or not
            if (!response.ok) {
                throw new Error(`Request failed with status ${reponse.status}`)
            }
            return response.json()
        })
        .then(data => {
            var locArr = data.loc.split(',');
            L.marker([locArr[0], locArr[1]], { icon: myIcon })
                .bindPopup(
                    '<p>' +
                    data.region +
                    '</p>'
                )
                .addTo(map)
            map.setView([locArr[0], locArr[1]], 13);
        }).catch(error => console.log(error));

}
viewLocation();