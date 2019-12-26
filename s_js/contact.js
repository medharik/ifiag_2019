let alert = document.querySelector(".alert-danger");

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
  }
}
function validerEmail() {
  let email = document.querySelector("#email");
  let model = /^[a-z_]{1,}[a-z0-9_.]{0,}@ifiag\.ma$/;
  let correct = model.test(email.value);
  if (!correct) {
    alert.style.display = "block";
    alert.innerHTML += "Email non valide<br>";
  }
}

function valider() {
  let form = document.querySelector("form");
  alert.innerHTML = "";
  alert.style.display = "none";
  valider_requis();
  validerEmail();
  if (alert.innerHTML == "") {
    form.submit();
  }
}
