<?php session_start(); ?>
<h1>
<?php

if(isset($_SESSION['msg_cpf_invalido'])) {
  echo $_SESSION['msg_cpf_invalido'];
  unset($_SESSION['msg_cpf_invalido']);
}
var_dump($_SESSION);
if(isset($_SESSION['msg_erro_cpf'])) {
  echo $_SESSION['msg_erro_cpf'];
  unset($_SESSION['msg_erro_cpf']);
}
if(isset($_SESSION['msg_erro_limit_aux'])) {
  echo $_SESSION['msg_erro_limit_aux'];
  unset($_SESSION['msg_erro_limit_aux']);
}
if(isset($_SESSION['msg_erro_limit_mass'])) {
  echo $_SESSION['msg_erro_limit_mass'];
  unset($_SESSION['msg_erro_limit_mass']);
}
if(isset($_SESSION['msg_erro_limit_prep'])) {
  echo $_SESSION['msg_erro_limit_prep'];
  unset($_SESSION['msg_erro_limit_prep']);
}
if(isset($_SESSION['msg_erro_limit_atlet'])) {
  echo $_SESSION['msg_erro_limit_atlet'];
  unset($_SESSION['msg_erro_limit_atlet']);
}
if(isset($_SESSION['msg_erro_limit_tec'])) {
  echo $_SESSION['msg_erro_limit_tec'];
  unset($_SESSION['msg_erro_limit_tec']);
}
?>
</h1>
Você não pode realizar essa ação!<br /><br />
<div>

<p>Entre em contato com o Presidente pelo e-mail, para mais detalhes
desta ação: <br />
  <strong>
      <a href="mailto:presidente@ligataubate.com.br" target="_blank">
      presidente@ligataubate.com.br
      </a>  
  </strong>

</p>

<br /> 

<button class="goback" 
  style="
  background-color: red; 
  color: white;
  border:0;
  padding: 8px;
  font-size: 14px;
  border-radius: 4px!important;"
  >
Voltar para Tarefa Anterior
</button>

<script>

const backButton = document.querySelector('.goback');
backButton.addEventListener('click', goBack);

function goBack(){
  window.history.back();
}

</script>