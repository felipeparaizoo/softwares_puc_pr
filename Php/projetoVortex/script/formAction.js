document.addEventListener("DOMContentLoaded", function () {
  function getUrlParameter(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    var results = regex.exec(location.search);
    return results === null
      ? ""
      : decodeURIComponent(results[1].replace(/\+/g, " "));
  }

  var name = getUrlParameter("name");
  var email = getUrlParameter("email");
  var celular = getUrlParameter("celular");
  var dt_nasc = getUrlParameter("dt_nasc");
  var agree_term = getUrlParameter("agree-term");

  document.getElementById("data-name").textContent = name || "Não informado";
  document.getElementById("data-email").textContent = email || "Não informado";
  document.getElementById("data-celular").textContent =
    celular || "Não informado";
  document.getElementById("data-dt_nasc").textContent =
    dt_nasc || "Não informado";
  document.getElementById("data-agree-term").textContent =
    agree_term === "on" ? "Concordou" : "Não concordou";
});
