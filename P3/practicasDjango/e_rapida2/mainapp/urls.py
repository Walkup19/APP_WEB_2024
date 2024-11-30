from django.urls import path
from . import views

urlpatterns = [
    path('inicio/',views.index, name='inicio'),
    path('',views.index, name='inicio'),
    path('acercade/',views.about, name='acercade'),
    path('mision/',views.mision, name='mision'),
    path('vision/',views.vision, name='vision'),
    path('registro/',views.registro, name='registro'),
    path('login/',views.login_user, name='login_user'),
    path('logout/',views.logout_user, name='logout'),

]