fetch("backend/servizi.php")
  .then(res => res.json())
  .then(data => {
    let html = "";
    data.forEach(s => {
      html += `
        <div class="card">
          <h3>${s.nome}</h3>
          <p>${s.descrizione}</p>
          <strong>${s.prezzo} €</strong>
          <button onclick="acquista(${s.id})">Acquista</button>
        </div>
      `;
    });
    document.getElementById("servizi").innerHTML = html;
  });

function acquista(id) {
  window.location.href = "backend/checkout.php?id=" + id;
}

const reveals = document.querySelectorAll(".reveal");

window.addEventListener("scroll", () => {
  reveals.forEach(el => {
    const top = el.getBoundingClientRect().top;
    if (top < window.innerHeight - 100) {
      el.style.opacity = 1;
      el.style.transform = "translateY(0)";
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal");
  const items = document.querySelectorAll(".reveal-item");

  const animateOnScroll = () => {
    const trigger = window.innerHeight - 100;

    reveals.forEach(section => {
      const top = section.getBoundingClientRect().top;
      if (top < trigger) {
        section.classList.add("active");
      }
    });

    items.forEach((item, i) => {
      const top = item.getBoundingClientRect().top;
      if (top < trigger) {
        setTimeout(() => {
          item.classList.add("active");
        }, i * 120);
      }
    });
  };

  window.addEventListener("scroll", animateOnScroll);
  animateOnScroll(); // 🔥 ATTIVA SUBITO
});

<script>
  const userRank = "admin"; // questo deve arrivare dal backend

  if (userRank === "admin") {
    document.getElementById("staff-tools").style.display = "list-item";
  }
</script>

