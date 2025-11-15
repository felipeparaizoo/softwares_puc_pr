function mascaraTelefone(event) {
  var campo = event.target;
  var valor = campo.value.replace(/\D/g, "");
  var formatado = "";

  if (valor.length > 0) {
    formatado += "(" + valor.substring(0, 2);
  }
  if (valor.length > 2) {
    formatado += ") " + valor.substring(2, 7);
  }
  if (valor.length > 7) {
    formatado += "-" + valor.substring(7, 11);
  }

  campo.value = formatado;
  return true;
}

function validateForm(event) {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var celular = document.getElementById("celular").value;
  var dt_nasc = document.getElementById("dt_nasc").value;
  var agree_term = document.getElementById("agree-term").checked;

  var nameRegex = /^[a-zA-Z\s]+$/;
  if (!nameRegex.test(name)) {
    alert("Por favor, insira um nome válido (apenas letras e espaços).");
    event.preventDefault();
    return false;
  }

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Por favor, insira um endereço de e-mail válido.");
    event.preventDefault();
    return false;
  }

  var celularRegex = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;
  if (!celularRegex.test(celular)) {
    alert(
      "Por favor, insira um número de celular válido no formato (xx) xxxxx-xxxx."
    );
    event.preventDefault();
    return false;
  }

  if (dt_nasc) {
    var dataNasc = new Date(dt_nasc);
    var hoje = new Date();
    if (dataNasc >= hoje) {
      alert("A data de nascimento deve ser uma data passada.");
      event.preventDefault();
      return false;
    }
  }

  if (!agree_term) {
    alert("Você deve concordar com os termos de serviço.");
    event.preventDefault();
    return false;
  }

  return true;
}

document.addEventListener("DOMContentLoaded", function () {
  var celularInput = document.getElementById("celular");
  if (celularInput) {
    celularInput.addEventListener("input", mascaraTelefone);
  }
});
