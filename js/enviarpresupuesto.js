document.querySelector("#submit").addEventListener("click", e => {
  e.preventDefault();

  //INGRESE UN NUMERO DE WHATSAPP VALIDO AQUI:
  let telefono = "5493513412499";

  let cliente = document.querySelector("#cliente").value;
  let tel = document.querySelector("#tel").value;

  resp.classList.remove("fail");
  resp.classList.remove("send");

  let url = "https://api.whatsapp.com/send?phone=${telefono}&text=*Mi nombre es*%0A" + ${cliente}%0A + "*Estoy enterezad@ en los siguientes servicios:*%0A" + ${fecha}%0A

  if (cliente === "" || tel === "") {
    resp.classList.add("fail");
    resp.innerHTML = "Faltan algunos datos, ${cliente}";
    return false;
  }
  resp.classList.remove("fail");
  resp.classList.add("send");
  resp.innerHTML = "Se ha enviado tu reserva, ${cliente}";

  window.open(url);
});