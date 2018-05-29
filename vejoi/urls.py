from django.urls import path
from . import views
from django.contrib.auth import views as ath_view

urlpatterns= [
	path('',views.index, name = 'askme'),
	path('login/', ath_view.login, {'template_name':'vejoi/login.html'}, name = 'login'),
	path('home/', views.HomeView.as_view(), name = 'home'),
	path('signup/', views.signup, name = 'signup'),
]
