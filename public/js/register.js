// EVITAR QUE SE COPIE, CORTE O PEGUE INFORMACIÓN DE LOS CAMPOS
const inputs = document.querySelectorAll('#email2, #email1, #contraseña2, #contraseña1');

inputs.forEach(input => {
  input.addEventListener('copy', (e) => {
    e.preventDefault();
    alert('No se permite copiar datos.');
  });

  input.addEventListener('paste', (e) => {
    e.preventDefault();
    alert('No se permite pegar datos.');
  });

  input.addEventListener('cut', (e) => {
    e.preventDefault();
    alert('No se permite cortar datos.');
  })

});

// VALIDAR CAMPOS
const form = document.getElementById('form');
const password = document.getElementById('contraseña1');
const confirmPassword = document.getElementById('contraseña2');
const email = document.getElementById('email1');
const confirmEmail = document.getElementById('email2');

const emailError = document.getElementById('error-email');
const passwordError = document.getElementById('error-password');

function validarCampos(){
  if(password.value !== confirmPassword.value){
    passwordError.classList.add('show');
  }else{
    passwordError.classList.remove('show');
  };

  if(email.value !== confirmEmail.value){
    emailError.classList.add('show');
  }else{
    emailError.classList.remove('show');
  };
};

form.addEventListener('submit', (e) => {
  validarCampos();

  if(password.value !== confirmPassword.value || email.value !== confirmEmail.value){
    e.preventDefault();
    alert('Valida los campos');
  }
});

password.addEventListener('input', validarCampos);
confirmPassword.addEventListener('input', validarCampos);
email.addEventListener('input', validarCampos);
confirmEmail.addEventListener('input', validarCampos);
