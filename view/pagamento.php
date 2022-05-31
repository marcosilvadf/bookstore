<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
</head>
<body>
    <form action="../controller/cadastrarPagamentoController.php" method="post">
        <input type="text" name="valor" id="" value="R$100,00" readonly>
        <input type="date" name="" id="" value="2001-09-18" readonly>
        <select name="tipoP" id="">
            <option value="" disabled selected>Selecione</option>
            <option value="Pix">Pix</option>
            <option value="Boleto">Boleto</option>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>