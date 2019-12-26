let alert = document.querySelector(".alert-danger");
let icone = document.querySelector(".icone");

function valider_requis() {
  let r = document.querySelectorAll(".r");
  let vide = false;
  for (let i = 0; i < r.length; i++) {
    if (r[i].value.trim() == "") {
      vide = true;
    }
  }
  if (vide) {
    // alert("champs requis");
    alert.style.display = "block";
    alert.innerHTML += "Champs requis<br>";
    icone.innerHTML = '<i class="fas fa-thumbs-down"></i>';
    icone.style.color = "red";
  }
}
function validerEmail() {
  let email = document.querySelector("#email");
  let model = /^[a-z_]{1,}[a-z0-9_.]{0,}@ifiag\.ma$/;
  let correct = model.test(email.value);
  if (!correct) {
    alert.style.display = "block";
    alert.innerHTML += "Email non valide<br>";
    icone.innerHTML = '<i class="fas fa-thumbs-down"></i>';
    icone.style.color = "red";
  }
}

function valider() {
  icone.innerHTML = '<i class="fas fa-thumbs-up"></i>';
  icone.style.color = "green";
  let form = document.querySelector("form");
  alert.innerHTML = "";
  alert.style.display = "none";
  valider_requis();
  validerEmail();
  if (alert.innerHTML == "") {
    form.submit();
  }
}
