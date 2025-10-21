
//-----------------------------------------------------------

/*centers page */
function filterCenters() {
  const search = document.getElementById("searchInput").value.toLowerCase();
  const city = document.getElementById("cityFilter").value;
  const type = document.getElementById("typeFilter").value;
  const centers = document.querySelectorAll(".center-card");

  centers.forEach(center => {
    const name = center.querySelector("h3").textContent.toLowerCase();
    const centerCity = center.getAttribute("data-city");
    const centerType = center.getAttribute("data-type");

    const matchesName = name.includes(search);
    const matchesCity = city === "" || city === centerCity;
    const matchesType = type === "" || type === centerType;

    if (matchesName && matchesCity && matchesType) {
      center.style.display = "block";
    } else {
      center.style.display = "none";
    }
  });
}






