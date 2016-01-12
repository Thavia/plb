// Função para mascarar campos
function txtBoxFormat(objeto, sMask, evtKeyPress) {
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

if(document.all) { // Internet Explorer
    nTecla = evtKeyPress.keyCode;
} else if(document.layers) { // Nestcape
    nTecla = evtKeyPress.which;
} else {
    nTecla = evtKeyPress.which;
    if (nTecla == 8) {
        return true;
    }
}

    sValue = objeto.value;

    // Limpa todos os caracteres de formatação que
    // já estiverem no campo.
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( " ", "" );
    sValue = sValue.toString().replace( " ", "" );
    fldLen = sValue.length;
    mskLen = sMask.length;

    i = 0;
    nCount = 0;
    sCod = "";
    mskLen = fldLen;

    while (i <= mskLen) {
      bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/") || (sMask.charAt(i) == ":"))
      bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))

      if (bolMask) {
        sCod += sMask.charAt(i);
        mskLen++; }
      else {
        sCod += sValue.charAt(nCount);
        nCount++;
      }

      i++;
    }

    objeto.value = sCod;

    if (nTecla != 8) { // backspace
      if (sMask.charAt(i-1) == "9") { // apenas números...
        return ((nTecla > 47) && (nTecla < 58)); }
      else { // qualquer caracter...
        return true;
      }
    }
    else {
      return true;
    }
  }
function verifica_tipo_pessoa(tipo) {

if(tipo == "fisica") {
document.getElementById('cpf').disabled = false;
document.getElementById('rg').disabled = false;
document.getElementById('razao_social').disabled = true;
document.getElementById('cnpj').disabled = true;

document.getElementById('cpf').style.backgroundColor = "#FFFFFF";
document.getElementById('rg').style.backgroundColor = "#FFFFFF";
document.getElementById('razao_social').style.backgroundColor = "#CCCCCC";
document.getElementById('cnpj').style.backgroundColor = "#CCCCCC";
} else if(tipo == "juridica") {
document.getElementById('cpf').disabled = true;
document.getElementById('rg').disabled = true;
document.getElementById('razao_social').disabled = false;
document.getElementById('cnpj').disabled = false;

document.getElementById('cpf').style.backgroundColor = "#CCCCCC";
document.getElementById('rg').style.backgroundColor = "#CCCCCC";
document.getElementById('razao_social').style.backgroundColor = "#FFFFFF";
document.getElementById('cnpj').style.backgroundColor = "#FFFFFF";
} else {
document.getElementById('cpf').disabled = true;
document.getElementById('rg').disabled = true;
document.getElementById('razao_social').disabled = true;
document.getElementById('cnpj').disabled = true;

document.getElementById('cpf').style.backgroundColor = "#CCCCCC";
document.getElementById('rg').style.backgroundColor = "#CCCCCC";
document.getElementById('razao_social').style.backgroundColor = "#CCCCCC";
document.getElementById('cnpj').style.backgroundColor = "#CCCCCC";
}

}

// Validar CPF
function validarCPF() {
    var cpf = addcliente.cpf.value;
	 cpf = cpf.replace(/[^\d]+/g,'');

	if(cpf == '') return false;

	// Elimina CPFs invalidos conhecidos
	if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
	alert('	CPF Inválido');
		return false;
	
	// Valida 1o digito
	add = 0;
	for (i=0; i < 9; i ++)
		add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
		alert('	CPF Inválido');
		return false;
	
	// Valida 2o digito
	add = 0;
	for (i = 0; i < 10; i ++)
		add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
	    alert('	CPF Inválido');
		return false;
		
	return true;
   
}