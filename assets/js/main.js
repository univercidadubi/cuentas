class main {
    constructor() {
        this.url = "https://localhost/cuentas";
    }

    async postData(url = '', data = {}) {
        console.log(data);
        const response = await fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(data)
        });
        return response.json();
    }

    async verificar(codigo, monto) {
        let data = {
            "cuenta": codigo,
            "monto": monto,
            "tipo": "depocito",
            "tipomoneda": "BS"
        };
        $("#moneyimg").show();
        let resp = await $.post(this.url + "/tran.php", data);
        let rex = await $.get(this.url + "/ini.php?id=" + codigo);
        var respuesta = JSON.parse(rex);
        setTimeout(function () {
            $("#moneyimg").hide();
            $("#pantallamoney").hide();
            $("#pantallamoneydesc").show();
            $("#saldomoney").html(respuesta.saldos[0].monto);
            var li = "";
            for (let tran of respuesta.transacciones) {
                li += "<div class=\"alert alert-secondary\">Monto: " + tran.monto + " <br /> Fecha " + tran.fecha + " " + tran.hora + " </div>";
            }
            $("#listadotransacciones").html(li);
            $(".paddingtextbtn").attr("disabled", true);
        }, 1500);
    }
}

$(function () {
    var Main = new main();
    $(".paddingtextbtn").click(function () {
        var codigo = $("#textCod").val();
        var monto = $(this).val();
        if (codigo <= 0) {
            alert("Ingrese en numero de cuenta");
            return false;
        }
        Main.verificar(codigo, monto);
    });
});
