function validarSenha(){
	email = document.formulario.email.value
	email_confirmation = document.formulario.email_confirmation.value

	if (email != email_confirmation){
		alert("E-mail não confere!")
    return false;
  }
}
