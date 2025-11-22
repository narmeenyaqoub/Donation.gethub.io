
const modal = document.getElementById("volunteerModal");
const openLinks = document.querySelectorAll('.btn-volunteer'); // select all links/buttons
const closeBtn = document.querySelector(".modal .close");

// Open modal when clicking any of the baxshin button
openLinks.forEach(link => {
  link.addEventListener("click", function(e) {
    e.preventDefault();
    modal.style.display = "flex";
    document.body.style.overflow = "hidden"; // stop background scroll
  });
});

// Close modal
closeBtn.addEventListener("click", function() {
  modal.style.display = "none";
  document.body.style.overflow = ""; // restore scroll
});

// Close when clicking outside modal
window.addEventListener("click", function(e) {
  if (e.target === modal) {
    modal.style.display = "none";
    document.body.style.overflow = "";
  }
});






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






