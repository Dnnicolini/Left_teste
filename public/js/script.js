
//mask de input
function moeda(a, e, r, t) {
  let n = ""
    , h = j = 0
    , u = tamanho2 = 0
    , l = ajd2 = ""
    , o = window.Event ? t.which : t.keyCode;
  a.value = a.value.replace('R$ ', '');
  if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
    return !1;
  for (u = a.value.replace('R$ ', '').length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
    ;
  for (l = ""; h < u; h++)
    -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
  if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "R$ 0" + r + "0" + l),
    2 == u && (a.value = "R$ 0" + r + l),
    u > 2) {
    for (ajd2 = "",
      j = 0,
      h = u - 3; h >= 0; h--)
      3 == j && (ajd2 += e,
        j = 0),
        ajd2 += l.charAt(h),
        j++;
    for (a.value = "R$ ",
      tamanho2 = ajd2.length,
      h = tamanho2 - 1; h >= 0; h--)
      a.value += ajd2.charAt(h);
    a.value += r + l.substr(u - 2, u)
  }
  return !1
}
function mask(o, f) {
  setTimeout(function () {
    var v = tel(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function tel(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

//request da api do laravel
function RequestCep() {
  let cep = document.getElementById('cep').value;
  if (cep !== "") {
    let url = "https://brasilapi.com.br/api/cep/v1/" + cep;
    let request = new XMLHttpRequest();
    request.open("GET", url);
    request.send();

    request.onload = function () {

      if (request.status === 200) {

        let endereco = JSON.parse(request.response);
        document.getElementById("rua").value = endereco.street;
        document.getElementById("bairro").value = endereco.neighborhood;
        document.getElementById("cidade").value = endereco.city;
        document.getElementById("estado").value = endereco.state;


      }
      else if (request.stauts === 404) {
        alert('Falha na requisição do CEP')

      }
    }
  }
}

window.onload = function() {
  let cep = document.getElementById("cep");
  cep.addEventListener("blur", RequestCep);
}