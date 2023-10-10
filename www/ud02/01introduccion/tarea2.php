<?php

/**
 * Indica cuál de los siguientes son nombres de variables válidas e inválidos, indica por qué (en comentarios) y corrige los fallos:
- valor // inválido, le falta el símbolo del dólar
    $valor
- $_N  // válido
- $valor_actual // válido
- $n // válido
- $#datos // inválido, no puede empezar por almohadilla
    $datos
- $valorInicial0 // válido
- $proba,valor // inválido, la coma no se puede usar 
- $2saldo // inválido no debe comenzar por un número
    $saldo2
- $n // válido
- $meuProblema // válido
- $meu Problema // inválido no puede contener espacios
    $meuProblema
- $echo // válido, pero se debería evitar para evitar confusión con la palabra reservada echo
- $m&m // inválido, no se puede usar el caracter "&"
    $mym
- $registro // válido
- $ABC // válido
- $85 Nome // inválido, no debe comenzar por un número y contiene un espacio
    $Nome85
- $AAAAAAAAA // válido, pero no recomendable, ya que es díficil de saber cuantas "A" contiene
- $nome_apelidos // válido
- $saldoActual // válido
- $92 // inválido, no puede empezar por un número
    $n92
- $*143idade // inválido, solo puede empezar por una letra o un guión bajo
    $idade143
 */
?>