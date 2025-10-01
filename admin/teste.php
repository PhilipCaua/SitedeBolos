<?php
// Cria apasta e verifica se o usuário existe
// echo __DIR__;
$caminho = __DIR__ . "/img";
$pasta = str_pad(1, 4, "0", STR_PAD_LEFT);
// $pasta = sprintf("%03d", 1); // mesma coisa que a linha de cima, porém de forma mais rápida 
if (!is_dir("$caminho/$pasta")) {
    mkdir("$caminho/$pasta", 0755); // o 0755 é uma permissão para Linux.   
}

