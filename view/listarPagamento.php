<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pagamentos</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/alerts.js" defer></script>
</head>
<body>
<table>
        <tr>
        <th>Nome do autor</th>
        <th>Nome do livro</th>
        <th>comprovante</th>
        <th>Ativar livro</th>
        </tr>
    <?php
    require_once '../dao/pagamentoDAO.php';

    $pagamentoDAO = new PagamentoDAO();
    $pagamentos = $pagamentoDAO->listaDePagamento();

    foreach ( $pagamentos as $pagamento ) {
        $pagamento['comprovante'] == "sem" ? $pago = 'sem pagamento' : $pago = "Pagou";
        echo "<tr><td>$pagamento[nome]</td>";
        echo "<td>$pagamento[titulo]</td>";
        echo "<td>$pago</td>";
        echo "<td><a href='../controller/situacaoPagamento.php?id=$pagamento[id]'><i class='fa-solid fa-pen-to-square'></i></a></td></tr>";
    }
    ?>
    </th>
    </table>
</body>
</html>