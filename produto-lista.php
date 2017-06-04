<?php include("cabecalho.php"); 

 include("conecta.php"); 

 include("banco-produto.php");?>

<?php
	if(array_key_exists("removido",$_GET)  && $_GET["removido"] == "true"){
?>
	<p class="alert-success">Produto removido com sucesso</p>
<?php
	}
?>

<table class="table table-striped table-bordered">
<?php
$produtos = listaProdutos($conexao);
foreach ($produtos as $produto):
?>	
<tr><td><?= $produto['nome'] ?></td>
	<td><?= $produto['preco'] ?></td>
	<td><?= substr($produto['descricao'], 0, 15) ?></td>	
	<form action="remove-produto.php?id=<?=$produto['id'] ?>" method="POST">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<td><button class="btn btn-danger">Remover</button></td>
	</form>
</tr>
<?php
endforeach

?> 
</table>

<?php include("rodape.php"); ?>
