from django import forms
from django.core import validators
from django.contrib.auth.forms import UserCreationForm
from django.shortcuts import render, redirect
# from django.contrib.auth.forms import UserCreationForm
from mainapp.forms import RegisterForm
from django.contrib.auth import authenticate, login,logout
from django.contrib import messages
from django.contrib.auth.decorators import login_required

# Create your views here.

def index(requests):
    return render(requests, 'mainapp/index.html',{
        'title':'Inicio',
        'content': 'Bienvenidos a la Pagina Principal'
    })

def about(requests):
    mensaje='Bienvenido'
    return render(requests, 'mainapp/about.html', {
        'tittle': 'Acerca de Nosotros',
        'content':'Acerca de',
        'mensaje': mensaje
    })


def mision(requests):
    return render(requests, 'mainapp/mision.html', {
        'tittle': 'Mision de la Empresa',
        'content':'Nos comprometemos a ser una empresa de calidad y buen servicio',
        
    })


def vision(requests):
    return render(requests, 'mainapp/vision.html', {
        'tittle': 'Nuestra Vision',
        'content':'Nuestra Vision es que el cliente se sienta bien',
        
    })


def registro(requests):

    if requests.user.is_authenticated:
        return redirect('inicio')
    else:
        register_form=RegisterForm()

        if requests.method == "POST":
            register_form=RegisterForm(requests.POST)

            if register_form.is_valid():
                register_form.save()
                messages.success(requests,"¡Registro con Éxito!")
                return redirect('inicio')
    return render(requests, 'users/registro.html', {
        'tittle': 'Registro de usuario',
        'register_form':register_form
        
    })


def login_user(requests):

   if requests.user.is_authenticated:
    return redirect('inicio')
   else: 
    if requests.method == "POST":
       username=requests.POST.get('username')
       password=requests.POST.get('password')

       user=authenticate(requests,username=username,password=password)
       
       if user is not None:
          login(requests,user)
          messages.success(requests,"¡Bienvenido al inicio de Sesión!")
          return redirect('inicio')
       else:
          messages.warning(requests,"No es posbile iniciar sesión, por favor ingresa tus credenciales de acceso")
    
    return render(requests, 'users/login.html', {
        'tittle': 'Inicio de sesión',
    })

def redirigir_inicio(request,exception):
    return render(request,'mainapp/404.html')

def logout_user(requests):
   logout(requests)
   return redirect('login_user')