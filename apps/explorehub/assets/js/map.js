const activities = [
  {name:"Rafting Sungai Brantas", city:"Batu, Jawa Timur", type:"air", lat:-7.883, lng:112.526, price:"Mulai Rp95.000/orang"},
  {name:"Trekking Bromo", city:"Probolinggo, Jawa Timur", type:"alam", lat:-7.942, lng:112.953, price:"Mulai Rp175.000/orang"},
  {name:"Offroad Merapi", city:"Yogyakarta", type:"adrenalin", lat:-7.540, lng:110.446, price:"Mulai Rp550.000/jeep"},
  {name:"Diving Menjangan", city:"Bali", type:"air", lat:-8.095, lng:114.532, price:"Mulai Rp450.000/orang"},
  {name:"Camping Rinjani", city:"Lombok, NTB", type:"alam", lat:-8.411, lng:116.457, price:"Mulai Rp650.000/orang"},
  {name:"Paralayang Puncak", city:"Bogor, Jawa Barat", type:"adrenalin", lat:-6.703, lng:106.980, price:"Mulai Rp450.000/orang"},
  {name:"Snorkeling Labuan Bajo", city:"NTT", type:"air", lat:-8.496, lng:119.887, price:"Mulai Rp350.000/orang"},
  {name:"Camping Ranu Kumbolo", city:"Lumajang, Jawa Timur", type:"alam", lat:-8.006, lng:112.917, price:"Mulai Rp250.000/orang"}
];

const map = L.map("map", { zoomControl: true }).setView([-2.3, 117.2], 5);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

const colors = {air:"#c66a32", alam:"#3d5648", adrenalin:"#93451f"};
const markerLayer = L.layerGroup().addTo(map);

function markerIcon(type) {
  return L.divIcon({
    className: "eh-marker-wrap",
    html: `<span style="display:block;width:18px;height:18px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);background:${colors[type]};border:3px solid white;box-shadow:0 2px 7px rgba(0,0,0,.3)"></span>`,
    iconSize:[18,18], iconAnchor:[9,18], popupAnchor:[0,-18]
  });
}

function renderMarkers(type="all") {
  markerLayer.clearLayers();
  const filtered = activities.filter(a => type === "all" || a.type === type);
  filtered.forEach(a => {
    const marker = L.marker([a.lat,a.lng], {icon:markerIcon(a.type)}).addTo(markerLayer);
    marker.bindPopup(`
      <div style="min-width:190px">
        <strong style="font:700 15px Manrope">${a.name}</strong>
        <div style="font-size:11px;color:#6d7478;margin:5px 0 8px">${a.city}</div>
        <div style="font-weight:700;font-size:12px;margin-bottom:10px">${a.price}</div>
        <a href="booking.html?activity=${encodeURIComponent(a.name)}&destination=${encodeURIComponent(a.city)}"
           style="display:inline-block;background:#263b31;color:#fff;padding:8px 11px;border-radius:4px;font-size:11px;font-weight:800">
          Lihat & Booking →
        </a>
      </div>
    `);
  });
  document.querySelector("#mapResult strong").textContent = `${filtered.length} pengalaman tersedia`;
}
renderMarkers();

document.querySelectorAll(".filter").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll(".filter").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    renderMarkers(btn.dataset.type);
  });
});

document.querySelector("#locateBtn").addEventListener("click", () => {
  const button = document.querySelector("#locateBtn");
  if (!navigator.geolocation) {
    button.textContent = "Lokasi tidak didukung browser";
    return;
  }
  button.textContent = "Mencari lokasi...";
  navigator.geolocation.getCurrentPosition(
    ({coords}) => {
      map.setView([coords.latitude, coords.longitude], 12);
      L.circleMarker([coords.latitude, coords.longitude], {
        radius:8, color:"#263b31", fillColor:"#d28a3a", fillOpacity:.9, weight:3
      }).addTo(map).bindPopup("Lokasi kamu").openPopup();
      button.textContent = "✓ Lokasi ditemukan";
    },
    () => { button.textContent = "Lokasi tidak diizinkan"; }
  );
});

const destinations = {
  malang: [-7.98,112.63,10],
  bali: [-8.41,115.18,9],
  lombok: [-8.58,116.10,9],
  yogyakarta: [-7.80,110.37,10],
  bogor: [-6.60,106.80,10],
  bandung: [-6.91,107.61,10]
};
document.querySelector("#searchBtn").addEventListener("click", searchCity);
document.querySelector("#citySearch").addEventListener("keydown", e => { if(e.key==="Enter") searchCity(); });

function searchCity() {
  const q = document.querySelector("#citySearch").value.trim().toLowerCase();
  const key = Object.keys(destinations).find(k => q.includes(k));
  if (!key) {
    document.querySelector("#mapResult span").textContent = "Kota belum ada di prototype. Coba Malang, Bali, Lombok, Yogyakarta, atau Bogor.";
    return;
  }
  const [lat,lng,zoom] = destinations[key];
  map.flyTo([lat,lng], zoom, {duration:1.2});
  document.querySelector("#mapResult span").textContent = `Menampilkan area ${key.charAt(0).toUpperCase()+key.slice(1)}.`;
}
