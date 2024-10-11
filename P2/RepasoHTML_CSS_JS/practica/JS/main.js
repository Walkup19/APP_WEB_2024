//Esto es un cometario de una linea

/*
Esto es un comentario
de varias lineas
*/

//alert
//alert("Hola que tal soy una alerta")

//variables
var nombre="Cristopher Fano Walkup Nevarez";
let nombre2="Rodolofo el Reno";
let edad= 19;
let estatura=1.87;
let logico=true;


//Mostrar en consola
console. log ("Hola estoy en la consola");
console. log("Hola tengo" +edad+ " años");

//Mostrar en pantalla
document.write("Hola estoy en la pantalla <br>"); 
document.write("<h2>Hola tengo "+edad+" años <h2/>");

//Mostrar en pantalla getElementById
let datos=document. getElementById("informacion");
datos.innerHTML="Hola este es el contenido de innerHTML";
datos.innerHTML +="<hr><h3>Hola este es el contenido de innerHTML<h3/>";
datos.innerHTML +="<hr><h3>Mido: "+estatura+" metros</h3>";
datos.innerHTML+=`<br>
<hr>
<h1>
    Hola soy contenido de innerHTML mi nombre es: ${nombre}
    <br>y mi estatura es: ${estatura}
</h1>`; 

//Condicionales

if (edad>=18)
    datos.innerHTML+=`<hr> Soy mayor de edad<hr>`
else
    datos.innerHTML+=`<hr> Soy menor de edad<hr>`

//Ciclos
for(let i=1;i<=5;i++)
{
    datos.innerHTML+=`<hr><h3>For El numero es ${i}</h3>`
}

let i=1;
while (i<=5)
{
    datos.innerHTML+=`<hr><h3>While El numero es ${i}</h3>`;
    i++;   
}

i=1;
do
{
    datos.innerHTML+=`<hr><h3>Do El numero es ${i}</h3>`;
    i++;   
}
while (i<=5);

//Funciones
//1.- Funcion que no recibe paramentros y no rergresa valor
function suma1()
{
    let n1=2;
    let n2=3;
    let suma=n1+n2;
    datos.innerHTML+=`<hr><h3>El resultado de la suma1 es: ${suma}</h3>`;
}
suma1();

//2.-Funcion que no recibre parametros y regresa valor
function suma2()
{
    let n1=2;
    let n2=3;
    let suma=n1+n2;
    return suma;
}
let sum=suma2();
datos.innerHTML+=`<hr><h3>El resultado de la suma2 es: ${sum}</h3>`;

//3.-Funcion que recibre parametros y no regresa valor
function suma3(numero1,numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma=n1+n2;
    datos.innerHTML+=`<hr><h3>El resultado de la suma3 es: ${suma}</h3>`;
}
suma3(3,4);

//4.-Funcion que recibre parametros y regresa valor
function suma4(numero1,numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma=n1+n2;
    return suma;
}
sum=suma4(4,4);
datos.innerHTML+=`<hr><h3>El resultado de la suma4 es: ${sum}</h3>`;

//Arreglos
let animales=[];
animales[0]="Perro";
animales[1]="Gato";
animales[2]="Ave";

let animales2=["Tigre","Leon","Elefante"];

for(let i=0;i<animales2.length; i++)
{
    datos.innerHTML+=`<hr><h3>El animal es: ${animales[i]}</h3>`;
}
animales2.forEach(element => {
    datos.innerHTML+=`<hr><h3>El animal es: ${element}</h3>`;
});
