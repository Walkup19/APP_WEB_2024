from django.shortcuts import render, HttpResponse

# Create your views here.

def index(requests):
    return render(requests, 'mainapp/index.html',{
        'title':'Inicio | Página Principal',
        'content': 'Bienvenidos a la Pagina Principal'
    })

def about(requests):
    mensaje='Bienvenido Mi Nombre es Cristopher Walkup'
    return render(requests, 'mainapp/about.html', {
        'tittle': 'Acerca de Nosotros',
        'content':'Somos un grupo de Programadores bien ingones ajua',
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