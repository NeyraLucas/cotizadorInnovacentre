const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	numero: /^\d{10}$/ // 7 a 14 numeros.
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			if(expresiones.nombre.test(e.target.value)){
                document.getElementById('nomV').classList.remove('valError')
                document.getElementById('nomV').classList.add('valSuccess')
            }else{
                document.getElementById('nomV').classList.remove('valSuccess')
                document.getElementById('nomV').classList.add('valError')   
            }
        break;
        
        case "telefono":
			if(expresiones.numero.test(e.target.value)){
                document.getElementById('numeroV').classList.remove('valError')
                document.getElementById('numeroV').classList.add('valSuccess')
            }else{
                document.getElementById('numeroV').classList.remove('valSuccess')
                document.getElementById('numeroV').classList.add('valError')   
            }
		break;
		
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});