function operacion() {
    let n1,n2,tipoope,ope,simbolo,result;
    
    n1 = parseFloat(document.getElementById("n1").value);
    n2 = parseFloat(document.getElementById("n2").value);
    tipoope = document.getElementById("tipo").value;
    ope;
    simbolo;

  if (isNumber(n1)&&isNumber(n2))
  {
    switch (tipoope) {
        case "suma": 
            ope = n1 + n2; 
            simbolo = "+"; 
            break;
        case "resta": 
            ope = n1 - n2; 
            simbolo = "-"; 
            break;
        case "multiplicacion": 
            ope = n1 * n2; 
            simbolo = "*"; 
            break;
        case "division": 
            ope = n1 / n2; 
            simbolo = "/"; 
            break;
    }
    result= document.getElementById("resultado").innerHTML = `<h2>${n1} ${simbolo} ${n2} = ${ope}</h2>`; 
   
}
 else{result= document.getElementById("resultado").innerHTML = `<h2>Ingrese solo números...</h2>`;
    alert('Ingrse solo números...')
       }



function isNumber(n)
{
    return !isNaN(parseFloat(n)&& isFinite(n));
}
}